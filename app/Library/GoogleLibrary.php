<?php

namespace App\Library;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

use Google;

use Google\Auth\Credentials\UserRefreshCredentials;
use Google\Photos\Library\V1\PhotosLibraryClient;
use Google\Photos\Library\V1\PhotosLibraryResourceFactory;


class GoogleLibrary
{
    protected $mime_type_allowed;
    protected $service;
    protected $client;

    public function __construct(){
        $this->mime_type_allowed = [
            "image/png",
            "image/jpeg"
        ];

        $this->service = null;

        $this->client = new Google\Client();
        $this->client->setAuthConfig( resource_path('js/client_secret_dev.json') );
        $this->client->setRedirectUri( url()->current() );
        $this->client->setAccessType('offline');
        $this->client->setScopes( config('app.google.oauth.scopes') );
        if( Cache::get('access_token') ){
            $this->client->setAccessToken( Cache::get('access_token') );
        }else{
            $this->client->setAccessToken( config('app.google.access_token') );
        }

        if( !Cache::get('access_token') ){

            if( Request::query('code') ){
                $token = $this->client->fetchAccessTokenWithAuthCode( Request::query('code') );
                Cache::put('access_token', $token['access_token'], $token['expires_in']);
                return redirect()->to( url()->current() )->send();
            }

            $authenticationUrl = $this->client->createAuthUrl();
            return redirect()->to( $authenticationUrl )->send();
        }
    }

    public function auth()
    {
        if( Cache::get('access_token') ) return TRUE;

        if( Request::query('code') ){
            $token = $this->client->fetchAccessTokenWithAuthCode( Request::query('code') );
            Cache::put('access_token', $token['access_token'], $seconds = $token['expires_in']);
            return redirect()->to( url()->current() )->send();
        }

        $authenticationUrl = $this->client->createAuthUrl();
        return redirect()->to( $authenticationUrl )->send();
    }

    /* VIDEO */
    public function video_channel()
    {
        # channel detail
        $queryParams = [
            // 'mine' => TRUE,
            // 'managedByMe' => TRUE,
            'id' => 'UC4S8BMQwpazjerZdwbeIylg'
        ];
        $service =  new Google\Service\YouTube($this->client);
        $album = $service->channels->listChannels('snippet', $queryParams);

        return $album;
    }

    public function video_playlist()
    {
        try {
            $queryParams = [
                'maxResults' => 5,
                'mine' => TRUE,
            ];

            $data = [];

            $service =  new Google\Service\YouTube($this->client);
            $album = $service->playlists->listPlaylists('snippet', $queryParams);

            if( isset($album['etag']) AND isset($album['items']) ){
                foreach( $album['items'] as $item ){
                    if(!isset($item['id'])) continue;
                    $data[] = [
                        'id' => $item['id'],
                        'title' => isset( $item['snippet']['title'] ) ? $item['snippet']['title'] : null,
                        'description' => isset( $item['snippet']['description'] ) ? $item['snippet']['description'] : null,
                        'thumbnails' => [
                            'default' => isset( $item['snippet']['thumbnails']['default'] ) ? $item['snippet']['thumbnails']['default'] : null,
                            'medium' => isset( $item['snippet']['thumbnails']['medium'] ) ? $item['snippet']['thumbnails']['medium'] : null,
                            'high' => isset( $item['snippet']['thumbnails']['high'] ) ? $item['snippet']['thumbnails']['high'] : null,
                        ],
                    ];
                }
            }

            return [
                'status' => 'success',
                'data' => $data,
            ];

        } catch ( \Exception $e ) {
            $error  = json_decode( $e->getMessage(), TRUE );
            return [
                'status' => 'error',
                'message' => $error['error'],
            ];
        }
    }

    public function video_list($playlist_id = NULL)
    {
        if(!$playlist_id){
            return [
                'status' => 'warning',
                'message' => 'Playlist ID is empty'
            ];
        }

        try {
            $data = [];
            $service =  new Google\Service\YouTube($this->client);
            $album = $service->playlistItems->listPlaylistItems('snippet', [ 'playlistId' => $playlist_id ]);

            if( isset($album['etag']) AND isset($album['items']) ){
                foreach( $album['items'] as $item ){
                    if( !isset($item['id']) AND !isset( $item['snippet']['resourceId']['videoId'] ) ) continue;

                    $statistics = [
                        'comment' => 0,
                        'like' => 0,
                        'dislike' => 0,
                        'favorite' => 0,
                        'view' => 0,
                    ];

                    $detail = $this->video_detail($item['snippet']['resourceId']['videoId']);
                    if( $detail['status'] == 'success' and $detail['data'] and isset($detail['data']['statistics']) ){
                        $statistics = $detail['data']['statistics'];
                    }

                    $data[] = [
                        'id' => isset( $item['snippet']['resourceId']['videoId'] ) ? $item['snippet']['resourceId']['videoId'] : null,
                        'title' => isset( $item['snippet']['title'] ) ? $item['snippet']['title'] : null,
                        'description' => isset( $item['snippet']['description'] ) ? $item['snippet']['description'] : null,
                        'thumbnails' => [
                            'default' => isset( $item['snippet']['thumbnails']['default'] ) ? $item['snippet']['thumbnails']['default'] : null,
                            'medium' => isset( $item['snippet']['thumbnails']['medium'] ) ? $item['snippet']['thumbnails']['medium'] : null,
                            'high' => isset( $item['snippet']['thumbnails']['high'] ) ? $item['snippet']['thumbnails']['high'] : null,
                        ],
                        'statistics' => $statistics
                    ];
                }
            }

            return [
                'status' => 'success',
                'data' => $data,
            ];

        } catch ( \Exception $e ) {
            $error  = json_decode( $e->getMessage(), TRUE );

            return [
                'status' => 'error',
                'message' => $error['error'],
            ];
        }
    }

    public function video_detail($id)
    {
        if(!$id){
            return [
                'status' => 'warning',
                'message' => 'Video ID is empty'
            ];
        }

        try {
            $service    = new Google\Service\YouTube($this->client);
            $response   = $service->videos->listVideos('statistics', [ 'id' => $id ]);

            if( isset($response['etag']) AND isset($response['items']) and isset($response['items'][0]['id']) and $response['items'][0]['id'] == $id ){

                return [
                    'status' => 'success',
                    'data' => [
                        'id' => isset($response['items'][0]['id']) ? $response['items'][0]['id'] : null,
                        'statistics' => [
                            'comment' => isset($response['items'][0]['statistics']['commentCount']) ? (int)$response['items'][0]['statistics']['commentCount'] : 0,
                            'like' => isset($response['items'][0]['statistics']['likeCount']) ? (int)$response['items'][0]['statistics']['likeCount'] : 0,
                            'dislike' => isset($response['items'][0]['statistics']['dislikeCount']) ? (int)$response['items'][0]['statistics']['dislikeCount'] : 0,
                            'favorite' => isset($response['items'][0]['statistics']['favoriteCount']) ? (int)$response['items'][0]['statistics']['favoriteCount'] : 0,
                            'view' => isset($response['items'][0]['statistics']['viewCount']) ? (int)$response['items'][0]['statistics']['viewCount'] : 0,
                        ],
                    ]
                ];
            }

            return [
                'status' => 'success',
                'data' => NULL
            ];


        } catch ( \Exception $e ) {

            $error  = json_decode( $e->getMessage(), TRUE );
            return [
                'status' => 'error',
                'message' => $error['error'],
            ];
        }
    }

    /* PHOTO */

    public function photo_album_list()
    {
        try {
            $credentials = new UserRefreshCredentials(
                config('app.google.oauth.scopes'),
                [
                    'client_id' => config('app.google.oauth.client_id'),
                    'client_secret' => config('app.google.oauth.client_secret'),
                    'refresh_token' => Cache::get('access_token')
                ]
            );
            $photo_client = new PhotosLibraryClient(['credentials' => $credentials ]);
            $response = $photo_client->listAlbums();

            $data = [];
            foreach ($response->iterateAllElements() as $album) {
                $data[] = [
                    'album_id' => $album->getId(),
                    'title' => $album->getTitle(),
                ];
            }
            return [
                'status' => 'success',
                'data' => $data
            ];


        } catch (\Google\ApiCore\ApiException $e) {
            return [
                'status' => 'error',
                'message' => $e
            ];
        }
    }

    public function photo_album_create($album_name)
    {
        try {
            $credentials = new UserRefreshCredentials(
                config('app.google.oauth.scopes'),
                [
                    'client_id' => config('app.google.oauth.client_id'),
                    'client_secret' => config('app.google.oauth.client_secret'),
                    'refresh_token' => Cache::get('access_token')
                ]
            );
            $photo_client = new PhotosLibraryClient(['credentials' => $credentials ]);

            $newAlbum = PhotosLibraryResourceFactory::album( $album_name);
            $createdAlbum = $photo_client->createAlbum($newAlbum);

            return [
                'status' => 'success',
                'album_id' => $createdAlbum->getId(),
                'album_url' => $createdAlbum->getProductUrl(),
            ];

        } catch (\Google\ApiCore\ApiException $e) {
            return [
                'status' => 'error',
                'message' => $e
            ];
        }
    }

    public function photo_upload($album_id, $file_path, $file_description = null)
    {
        if( file_exists($file_path) === FALSE ) {
            return [ 'status' => 'error', 'message' => 'File not found' ];
        }

        if( in_array( mime_content_type($file_path), $this->mime_type_allowed ) === FALSE ){
            return [ 'status' => 'error', 'message' => 'File type invalid' ];
        }

        try {

            $credentials = new UserRefreshCredentials(
                config('app.google.oauth.scopes'),
                [
                    'client_id' => config('app.google.oauth.client_id'),
                    'client_secret' => config('app.google.oauth.client_secret'),
                    'refresh_token' => Cache::get('access_token')
                ]
            );
            $photo_client = new PhotosLibraryClient(['credentials' => $credentials ]);

            # new filename
            #   - slug(filename)-rand(5).ext
            $file_name = Str::slug( pathinfo( $file_path, PATHINFO_FILENAME ).'-'.Str::random(5) ).'.'.pathinfo( $file_path, PATHINFO_EXTENSION );

            $token = $photo_client->upload( file_get_contents( $file_path ), null, mime_content_type( $file_path ) );
            
            $response = $photo_client->batchCreateMediaItems(
                [
                    PhotosLibraryResourceFactory::newMediaItemWithDescriptionAndFileName( $token, $file_description, $file_name)
                ],
                [
                    'albumId' => $album_id
                    ]
                );
                
            $res = [ 'status' => 'process' ];
            foreach ($response->getNewMediaItemResults() as $itemResult) {
                $mediaItem = $itemResult->getMediaItem();
                $res = [
                    'status' => 'success',
                    'file_name' => $file_name,
                    'file_id' => $mediaItem->getId(),
                    'file_url' => $mediaItem->getProductUrl(),
                ];
            }
            return $res;

        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e
            ];
        }
    }
}
