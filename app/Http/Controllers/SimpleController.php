<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleController extends Controller
{
    public function index(Request $request)
    {
        $value = $request->session()->get('inisesi', '-');

        return response('Halo Selamat Datang => ' . $value);
    }
}
