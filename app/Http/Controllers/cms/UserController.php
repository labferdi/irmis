<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $keyword = NULL;
        if( $request->query('keyword') ){
            $keyword = $request->query('keyword');
        }

        $users = new User;
        if( $keyword ){
            $users = $users->Where('name', 'like', '%'.$keyword.'%' )->orWhere('email', 'like', '%'.$keyword.'%' );
        }
        $users = $users->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('cms.users.list', ['users' => $users, 'keyword' => $keyword ]);
    }

    public function create()
    {
        return view('cms.users.form', ['user' => NULL, 'modules' => config('app.modules') ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:users,email|email:rfc,dns',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'Nama lengkap wajib diisi',
            'name.max' => 'Nama lengkap maksimal 200 karakter',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah ada sebelumnya',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'privilege' => $request->privilege,
                'is_active' => $request->is_active ? TRUE : FALSE,
            ]);

            return redirect()->route('cms-user-list')->with('message_success', [ 'subject' => 'Tambah pengguna baru berhasil', 'message' => 'Pengguna <strong>'.$user.'</strong> berhasil ditambah' ] );
        } catch (\Throwable $th) {
            return redirect()->route('cms-user-create')->with('message_error', [ 'subject' => 'Tambah pengguna baru gagal', 'message' => $th->getMessage() ] );
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('cms.users.form', ['user' => $user, 'modules' => config('app.modules') ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:users,email,'.$user->id.'|email:rfc,dns',
            'password' => 'nullable|min:8',
        ],[
            'name.required' => 'Nama lengkap wajib diisi',
            'name.max' => 'Nama lengkap maksimal 200 karakter',
            'email.unique' => 'Email sudah ada sebelumnya',
            'email.email' => 'Format email tidak valid',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            if($request->password){
                $user->password = Hash::make($request->password);
            }
            $user->privilege = $request->privilege;
            $user->is_active = $request->is_active ? TRUE : FALSE;
            $user->save();

            return redirect()->route('cms-user-show', ['id' => $id])->with('message_success', [ 'subject' => 'Perbarui data berhasil', 'message' => 'Data pengguna <strong>'.$user->name.'</strong> berhasil diperbarui']);
        } catch (\Throwable $th) {
            return redirect()->route('cms-user-show', ['id' => $id])->with('message_error', [ 'subject' => 'Perbarui data gagal', 'message' => $th->getMessage() ]);
        }
    }

}
