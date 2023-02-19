<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('cms.user.list');
    }

    public function create()
    {
        return view('cms.user.form');
    }

    public function store(Request $request)
    {
        return response()->json([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'privilege' => $request->privilege,
            'is_active' => $request->is_active,
        ]);
    }

}
