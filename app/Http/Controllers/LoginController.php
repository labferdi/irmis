<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // class

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function get_data(Request $req)
    {

        $req->validate(
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

        // $req->session()->put('inisesi', $req->input('email') );

        $file = $req->file('nama_file'); // binary file / file fisik
        $data = [
            'email' => $req->input('email'),
            'password' => $req->input('password'),
            'checkme' => $req->input('checkme'),
            'file nama' => $file ? $file->getClientOriginalName() : '',
            'file ext' => $file ? $file->extension() : '',
        ];
        return response($data);
    }
}
