<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


use App\Models\User;
use App\Mail\ForgotPassword;



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
        return view('cms.authentication.forgot-password', ['class' => 'login-page']);
    }


    public function forgot_password_validate(Request $request)
    {
        // nama@email.com

        $request->validate([
            'email' => 'required|email:rfc,dns|exists:users,email',
        ],[
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
        ]);

        $user = User::where('email', $request->get('email'))->firstOrFail();
        $token = hash_hmac('sha256', $request->email, config('app.key') );

        DB::table('password_resets')->where('email', $request->email)->delete();
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);

        try {
            Mail::to( $request->email )->send(new ForgotPassword($user, $token) );
            return back()->with('message_success', [ 'subject' => 'Send email berhasil', 'message' => 'Silahkan cek email Anda' ] );
        } catch (\Throwable $th) {
            return back()->with('message_error', [ 'subject' => 'Send email error', 'message' => $th->getMessage() ] );
        }

        return response()->json( [ 'email', $user, $request->only('email') ] );
    }




    /*  ----------------- RESET PASSWORD ----------------- */

    public function reset_password_form(Request $request, $token)
    {
        $get = DB::table('password_resets')->where('token', $token)->first();
        if($get){
            $ack = hash_hmac('sha256', $get->email, config('app.key') );
            if($ack == $token){
                $user = User::where('email', $get->email)->firstOrFail();

                return view('cms.authentication.reset-password', ['class' => 'login-page', 'user' => $user]);
            }
        }
        abort(404);
    }


    public function reset_password_validate(Request $request, $token)
    {
        $get = DB::table('password_resets')->where('token', $token)->first();
        if($get){
            $ack = hash_hmac('sha256', $get->email, config('app.key') );
            if($ack == $token){

                $expired_at = Carbon::createFromFormat('Y-m-d H:i:s', $get->created_at)->addMinutes(60);

                if( now() > $expired_at ){
                    return redirect()->route('cms-forgot-password-form')->with('message_warning', [ 'subject' => 'Token Expired', 'message' => 'Sesi Anda sudah habis, silahkan melakukan permintaan link reset password yang baru' ] );
                }

                $request->validate([
                    'password' => 'required|min:8',
                    'password-confirm' => 'same:password',
                ],[
                    'password.required' => 'Password wajib diisi',
                    'password.min' => 'Password minimal 8 karakter',
                    'password-confirm.same' => 'Konfirmasi password harus sama dengan Password',
                ]);

                try {
                    $user = User::where('email', $get->email)->first();
                    $user->password = Hash::make($request->password);
                    $user->save();
                    
                    DB::table('password_resets')->where('token', $token)->where('email', $get->email)->delete();

                    return redirect()->route('cms-login-form')->with('message_success', [ 'subject' => 'Reset password berhasil', 'message' => 'Reset password Anda berhasil, silahkan login kembali.' ] );
                } catch (\Throwable $th) {
                    return back()->with('message_error', [ 'subject' => 'Reset password error', 'message' => $th->getMessage() ] );
                }
            }
        }
        abort(404);
    }
}
