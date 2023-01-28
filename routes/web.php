<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('welcome');
});

Route::prefix('cms')->group(function () {
    
    Route::get('/users', function () {
        return view('template');
    });

});
