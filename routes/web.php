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
//rute web untuk akses website
Route::get('/', 'SiteController@home');
Route::get('/register','SiteController@register');
Route::get('/registerwisata','SiteController@registerwisata');
Route::post('/postregister','SiteController@postregister');
Route::post('/postregister2','SiteController@postregister2');


Route::get('login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');


Route::group(['middleware' => ['auth','cekrole:admin']],function(){
  Route::get('/dashboard','DashboardController@index');

  Route::get('/akun','AkunController@index');
  Route::get('/profiladmin','AkunController@profiladmin');
  Route::get('/akun/{id}/edit','AkunController@edit');
  Route::post('/akun/{id}/update','AkunController@update');
  Route::get('/akun/{id}/delete','AkunController@delete');

  Route::get('/pengelola','PengelolaController@index');
  Route::post('/pengelola/create','PengelolaController@create');
  Route::get('/pengelola/{id}/edit','PengelolaController@edit');
  Route::post('/pengelola/{id}/update','PengelolaController@update');
  Route::get('/pengelola/{id}/delete','PengelolaController@delete');
  Route::get('/pengelola/{id}/profile','PengelolaController@profile');
  Route::get('/pengelola/{id}/ktp','PengelolaController@ktp');

  Route::get('/wisatawan','WisatawanController@index');
  Route::post('/wisatawan/create','WisatawanController@create');
  Route::get('/wisatawan/{id}/edit','WisatawanController@edit');
  Route::post('/wisatawan/{id}/update','WisatawanController@update');
  Route::get('/wisatawan/{id}/delete','WisatawanController@delete');
  Route::get('/wisatawan/{id}/profile','WisatawanController@profile');
});

Route::group(['middleware' => ['auth','cekrole:admin,pengelola,wisatawan']],function(){
  Route::get('/dashboard','DashboardController@index');
});

Route::group(['middleware' => ['auth','cekrole:pengelola,admin']],function(){
  Route::get('/profilku','PengelolaController@profilku');
  Route::get('/pengelola/{id}/edit','PengelolaController@edit');
  Route::post('/pengelola/{id}/update','PengelolaController@update');
});

Route::group(['middleware' => ['auth','cekrole:wisatawan,admin']],function(){
  Route::get('/profilsaya','WisatawanController@profilsaya');
  Route::get('/wisatawan/{id}/edit','WisatawanController@edit');
  Route::post('/wisatawan/{id}/update','WisatawanController@update');
});
