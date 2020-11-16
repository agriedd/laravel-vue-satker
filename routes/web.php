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


Auth::routes([
    'register'  => false
]);

Route::post('login/pimpinan', 'Auth\LoginPimpinanController@login')->name('login.pimpinan');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/petugas', 'HomeController@petugas')->name('home.petugas');
Route::get('/bidang', 'HomeController@bidang')->name('home.bidang');
Route::get('/kegiatan', 'HomeController@kegiatan')->name('home.kegiatan');
Route::get('/struktur', 'HomeController@struktur')->name('home.struktur');
Route::get('/visi-misi', 'HomeController@visimisi')->name('home.visi-misi');
Route::get('/galeri', 'HomeController@galeri')->name('home.galeri');

Route::post('/api/logout', 'Api\UserController@logout');

Route::middleware('auth:web')->prefix('/admin')->group(function($app){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/{any}', 'AdminController@index')->where('any', '.*');
});

Route::middleware('auth:pimpinan')->prefix('/pimpinan')->group(function($app){
    Route::get('/', 'PimpinanController@index')->name('admin.pimpinan');
    Route::get('/{any}', 'PimpinanController@index')->where('any', '.*');
});
