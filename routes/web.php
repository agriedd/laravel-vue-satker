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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/logout', 'Api\UserController@logout');

Route::middleware('auth:web')->prefix('/admin')->group(function($app){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/{any}', 'AdminController@index')->where('any', '.*');
});
