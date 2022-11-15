<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index(){
        return response('ini welcome index');
    }


    public function view(){

        $data = [
            'text' => 'Ini text dari controller',
            'list' => ['berita', 'news', 'terkini', 'berita terkini'],
        ];

        return view('welcome_view', $data);

    }
    
}
