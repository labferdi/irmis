<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*  Welcome Controller */
use App\Http\Controllers\WelcomeController;

Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome-index');
Route::get('/welcome-view', [WelcomeController::class, 'view'])->name('welcome-view');