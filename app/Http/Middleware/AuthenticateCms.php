<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateCms
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);

        if( $request->user() AND $request->user()->is_active == TRUE ){

            $module_name = explode('-', $request->route()->getName())[1] ?? '';
            $action_name = explode('-', $request->route()->getName())[2] ?? '';
            
            if( in_array($module_name, $request->user()->privilege ) == TRUE OR $action_name == 'list' ) {
                return $next($request);
            }

            return back()->with('message_warning', [ 'subject' => 'Akses gagal', 'message' => 'Anda tidak mendapatkan mengakses halaman ini' ] );
        }
        return redirect()->route('cms-login-form');
    }
}
