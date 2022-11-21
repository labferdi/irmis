<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Route;

class WelcomeController extends Controller
{

    public function index(){
        $url = route('welcome-param', [20]);
        return response('ini welcome index :'. $url);
    }


    public function view(){

        $data = [
            'text' => 'Ini text dari controller',
            'list' => ['berita', 'news', 'terkini', 'berita terkini'],
        ];

        return view('welcome_view', $data);

    }

    public function param($parameter = null){
        
        if($parameter){
            return response('ini welcome dengan parameter '.$parameter);
        }
        
        return response('ini welcome tanpa parameter');
    }
    
}
