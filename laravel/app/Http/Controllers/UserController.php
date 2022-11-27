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

    public function login()
    {
        return view('user.login');
    }

    public function loginCheck(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        

        $res = [
            'email' => $email,
            'password' => $password,
            'file' => null,
        ];

        if ($request->hasFile('file')) {
            $res['file'] = [
                'name' => $request->file->getClientOriginalName(),
                'path' => $request->file->path(),
                'extension' => $request->file->extension(),
            ];
        }

        
        return response($res);
    }

}
