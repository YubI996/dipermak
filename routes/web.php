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

Route::get('/', 'GuestController@index');
Route::get("/page", function(){
   return view("mold.index");
});
Route::get("/form", function(){
   return view("mold.index3");
});

Auth::routes(['verify' => true]);
Route::Group(['middleware' => ['verified']],function(){

    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/pengaturan', 'pengaturanController@index')->name('pengaturan');
    
    Route::resource('roles', 'roleController');
    
    Route::resource('kotas', 'kotaController');
    
    
    
    Route::resource('kecamatans', 'kecamatanController');
    
    

    Route::resource('kelurahans', 'kelurahanController');
    
    Route::resource('rts', 'rtController');
    
    Route::resource('jenKegs', 'jenKegController');
    
    
    
    
    
    Route::resource('kegiatans', 'kegiatanController');
    
    Route::resource('partisipasis', 'partisipasiController');
    
    Route::resource('users', 'userController');
    
    Route::resource('dokumentasis', 'dokumentasiController');
});