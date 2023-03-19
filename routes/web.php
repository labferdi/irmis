<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

use App\Http\Controllers\cms\AuthenticateController;
use App\Http\Controllers\cms\UserController;


Route::get('/', function(){
    return view('welcome');
});

Route::get('/canvas', function(){
    return view('cms.index');
});

Route::get('/photo', [ GoogleController::class, 'photo' ] );
Route::get('/video', [ GoogleController::class, 'video' ] );


Route::name('cms-')->prefix('cms')->group(function () {

    Route::get('/', function () {
        return view('cms.pages.blank');
    })->name('index');


    /* -------------------------------- */
    
    // Route::get('/register', [ AuthenticateController::class, 'register_form' ] )->name('register-form');
    // Route::post('/register', [ AuthenticateController::class, 'register_validate' ] )->name('register-validate');
    
    Route::get('/forgot/password', [ AuthenticateController::class, 'forgot_password_form' ] )->name('forgot-password');
    Route::post('/forgot/password', [ AuthenticateController::class, 'forgot_password_validate' ] )->name('forgot-password-save');

    Route::get('/reset/password/{token}', [ AuthenticateController::class, 'reset_password_form' ] )->name('reset-password');
    Route::post('/reset/password/{token}', [ AuthenticateController::class, 'reset_password_validate' ] )->name('reset-password-save');

    Route::get('/login', [ AuthenticateController::class, 'login_form' ] )->name('login');
    Route::post('/login', [ AuthenticateController::class, 'login_validate' ] )->name('login-save');
    
    
    /* -------------------------------- */
    
    Route::middleware(['auth'])->group(function () {

        # logout
        Route::get('/logout', [ AuthenticateController::class, 'logout' ] )->name('logout');

        # change password
        Route::get('/change/password', [ AuthenticateController::class, 'change_password_form' ] )->name('change-password');
        Route::post('/change/password', [ AuthenticateController::class, 'change_password_save' ] )->name('change-password-save');


    });
    
    
    /* -------------------------------- */

    Route::middleware(['cms'])->group(function () {
        
        # user list
        Route::get('/user', [ UserController::class, 'index' ] )->name('user-list');
        
        # user create
        Route::get('/user/create', [ UserController::class, 'create' ] )->name('user-create');
        Route::post('/user/create', [ UserController::class, 'store' ] )->name('user-save');
        
        # user detail & update
        Route::get('/user/{id}', [ UserController::class, 'show' ] )->name('user-show')->where('id', '[0-9]+');
        Route::post('/user/{id}', [ UserController::class, 'update' ] )->name('user-update')->where('id', '[0-9]+');

    });
});
