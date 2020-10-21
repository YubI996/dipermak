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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('roles', 'roleAPIController');

Route::resource('kotas', 'kotaAPIController');



Route::resource('kecamatans', 'kecamatanAPIController');



Route::resource('kelurahans', 'kelurahanAPIController');

Route::resource('rts', 'rtAPIController');

Route::resource('jen_kegs', 'jenKegAPIController');





Route::resource('kegiatans', 'kegiatanAPIController');

Route::resource('partisipasis', 'partisipasiAPIController');

Route::resource('users', 'userAPIController');

Route::resource('dokumentasis', 'dokumentasiAPIController');