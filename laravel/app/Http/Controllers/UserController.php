<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){
        return view('user.index');
    }

    public function detail($id){

        $data = [
            'id' => $id
        ];
        return view('user.detail', $data);
    }

    public function admin($name = 'administrator'){

        $data = [
            'name' => $name
        ];
        return view('user.admin', $data);
    }

}
