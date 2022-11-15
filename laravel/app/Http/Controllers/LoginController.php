<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function form(){
        return view('login.form');
    }


    public function check(Request $request){
        
        $request->validate([
            'email' => ['required', 'email', 'max:50'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        return response([
            'email' => $email,
            'password' => $password,
        ]);
    }

}
