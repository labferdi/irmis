<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cms\UserController;

Route::get('/', function(){
    return view('welcome');
});;

Route::name('cms-')->prefix('cms')->group(function () {
    
    Route::get('/', function () {
        return view('pages/blank');
    })->name('index');


    # user list
    Route::get('/user', [ UserController::class, 'index' ] )->name('user-list');
    Route::get('/user/create', [ UserController::class, 'create' ] )->name('user-create');
    Route::post('/user/create', [ UserController::class, 'store' ] )->name('user-save');


});
