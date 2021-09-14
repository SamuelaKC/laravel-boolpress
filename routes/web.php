<?php

use GuzzleHttp\Middleware;
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

Route::get('/', 'HomeController@index'); 

Auth::routes();

Route::get('/index', 'HomeController@public')->name('index');
// Route::get('/home', 'HomeController@private')->name('home')->middleware('auth');

Route::resource('posts', 'PostController'); 