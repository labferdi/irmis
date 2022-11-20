<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function(){
    return response('hello world');
});

Route::get('/login', function(){
    return response('login pages');
});




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
Route::get('/welcome/view', [WelcomeController::class, 'view'])->name('welcome-view');
Route::get('/welcome/param/{param?}', [WelcomeController::class, 'param'])->name('welcome-param');


/*  Template Controller */
use App\Http\Controllers\TemplateController;

Route::get('/template', [TemplateController::class, 'index'])->name('template-index');
Route::get('/template/news', [TemplateController::class, 'news'])->name('template-news');
Route::get('/template/article', [TemplateController::class, 'article'])->name('template-article');

