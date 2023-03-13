<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Mail;
use Str;
use DB;
use Carbon\Carbon;

use App\Models\User;
use App\Mail\ForgotPasswordMail;


class AuthenticateController extends Controller
{

    /*  ----------------- LOGIN ----------------- */

    public function login_form()
    {
        return view('cms.authentication.login', ['class' => 'login-page']);
    }

    public function login_validate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => TRUE ])) {
            $request->session()->regenerate();

            return redirect()->route('cms-user-list')->with('message_success', [ 'subject' => 'Login berhasil', 'message' => '' ] );
        }

        return back()->with('message_error', [ 'subject' => 'Login gagal', 'message' => 'Email atau password tidak valid' ] );
    }

    /*  ----------------- LOGOUT ----------------- */

    public function logout(Request $request)
    {
        try {
            Auth::logout();
            return redirect()->route('cms-login-form')->with('message_success', [ 'subject' => 'Logout berhasil', 'message' => '' ] );
        } catch (\Throwable $th) {
            return back()->with('message_error', [ 'subject' => 'Logout error', 'message' => $th->getMessage() ] );
        }
    }


    /*  ----------------- FORGOT PASSWORD ----------------- */

    public function forgot_password_form()
    {
        return view('cms.authentication.forgot_password', ['class' => 'login-page']);
    }

    public function forgot_password_validate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
        ],[
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
        ]);

        $user = User::where('email', $request->get('email'))->firstOrFail();

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        try {
            Mail::to( $request->email )->send(new ForgotPasswordMail($user, $token) );
            return back()->with('message_success', [ 'subject' => 'Send email berhasil', 'message' => 'Silahkan cek email Anda' ] );
        } catch (\Throwable $th) {
            return back()->with('message_error', [ 'subject' => 'Send email error', 'message' => $th->getMessage() ] );
        }

        return response()->json( [ 'email', $user, $request->only('email') ] );
    }


    /*  ----------------- RESET PASSWORD ----------------- */

    public function reset_password_form($token)
    {
        return response()->json(['token' => $token ]);

        return view('cms.authentication.reset_password', ['class' => 'login-page']);
    }

    public function reset_password_validate(Request $request)
    {
        return response('reset password validate');
    }
}
