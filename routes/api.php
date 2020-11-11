<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/self', 'Api\UserController@index');

Route::get('satker/count', 'Api\SatkerController@count');
Route::get('struktur/count', 'Api\StrukturController@count');

Route::resources([
    'admin' => 'Api\AdminController',
    'satker' => 'Api\SatkerController',
    'struktur' => 'Api\StrukturController',
    'pimpinan' => 'Api\PimpinanController',
    'bidang' => 'Api\BidangController',
    'petugas' => 'Api\PetugasController',
    'kegiatan' => 'Api\KegiatanController',
]);
