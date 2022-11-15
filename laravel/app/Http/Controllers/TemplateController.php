<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    
    public function index()
    {
        return view('template.index');
    }


    public function news()
    {
        return view('template.news');
    }


    public function article()
    {
        return view('template.article');
    }

}
