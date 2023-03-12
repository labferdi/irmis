<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

use App\Http\Controllers\cms\UserController;


Route::get('/', function(){
    return view('welcome');
});

// Route::get('/photo', [ GoogleController::class, 'photo' ] );
Route::get('/photo', [ GoogleController::class, 'photo' ] );
Route::get('/video', [ GoogleController::class, 'video' ] );


Route::name('cms-')->prefix('cms')->group(function () {

    Route::get('/', function () {
        return view('pages/blank');
    })->name('index');
    
    /* -------------------------------- */

    # user list
    Route::get('/user', [ UserController::class, 'index' ] )->name('user-list');

    # user create
    Route::get('/user/create', [ UserController::class, 'create' ] )->name('user-create');
    Route::post('/user/create', [ UserController::class, 'store' ] )->name('user-save');

    # user detail
    Route::get('/user/{id}', [ UserController::class, 'show' ] )->name('user-show')->where('id', '[0-9]+');
    Route::post('/user/{id}', [ UserController::class, 'update' ] )->name('user-update')->where('id', '[0-9]+');


});
