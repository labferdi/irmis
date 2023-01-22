<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

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

        if ( Session::has('inisesi') ) {

            $data = [
                'name' => $name
            ];
            return view('user.admin', $data);
        }
        abort('401');
    }

    public function login()
    {
        return view('user.login');
    }

    public function loginCheck(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');
        
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'email.required'=> 'Email harus diisi',
                'email.email'=> 'Email tidak valid',
                'password.required'=> 'Password harus diisi',
                'password.min'=> 'Password minimal 8 huruf',
            ]
        );

        $res = [
            'email' => $email,
            'password' => $password,
            'file' => null,
        ];

        $request->session()->put('inisesi', $res['email'] );

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
