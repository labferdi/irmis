<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\GoogleLibrary;


class GoogleController extends Controller
{

    public function photo(Request $request)
    {
        // session()->flush(); session()->save();
        // dd(['a', session()->get('photo_access_token'), session()->get('video_access_token'), session()->get('access_token'), ]);
        // cache()->flush(); dd(['a', cache()->get('access_token'), ]);

        $lib = new GoogleLibrary();
        $album = $lib->photo_album_list();
        // $album = $lib->photo_album_create('lorem ipsum 2');

        // $album_id = 'AMeSTCRFm4bv6kbLWu2lwOlDWe2zKWRl5BeVAtV_gWethAxDnsxloHogQ4bEtqDt9MekSNqwdDvs';
        // $album_id = 'AMeSTCRoB6ENIqOnnDIl9-LqRWxDE-e1sItb0FhuRq220itRanNW-M9CW_oL3ZrUa0Qa2RFGj4cA';

        // $file = resource_path('images/1.png'); $desc = 'images/1.png';
        // $file = resource_path('images/2.jpeg'); $desc = 'images-2.jpeg';
        // $file = resource_path('images/3.jpg'); $desc = Str::random(20);

        // $file_id = 'AMeSTCQWUiWN2MqhSQYgOiRhRItfYUXGTkV3pjRMp9Q29m6bc1_24gYB7oAQfRKHq41PoEf715KkCWUTHsZlMPp8zQJ_16LdOA';
        // $file_url = 'https://photos.google.com/lr/album/AMeSTCQvXWOqEUeGn_Ga3k9_FBZpacsikLzlpSgWR74EAsVxoj9xaFdjOWyJKmdJBlrZKP1HFMVV/photo/AMeSTCRqFxPvaKU-OxzfCJRffMyQE_DcdgXxjQtoAY7CptyaExWAHrhvJ1JHfWhz-Z06ovLDJTavzsCYzaYheOSWKObFy8fwww';

        // $album = $lib->photo_upload($album_id, $file, $desc);

        return response()->json($album);
    }

    public function video(Request $request)
    {
        // session()->forget('video_credentials'); dd('flush');
        // dd(cache()->get('access_token'));
        $lib = new GoogleLibrary();
        $album = $lib->video_channel();
        // $album = $lib->video_playlist();
        // $album = $lib->video_list('PLaqScG_BqUDpjpCwYm0x32faNbAnGIWgd');
        // $album = $lib->video_detail('VbS3wAMBSpM');

        return response()->json($album);
    }

}
