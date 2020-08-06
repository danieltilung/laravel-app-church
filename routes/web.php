<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home','HomeController@home');
Route::post('/jemaat/create','HomeController@create');
Route::post('/kehadiran/{id}','HomeController@kehadiran');

Route::get('/profile/{id}','ProfileController@profile');
Route::post('/profile/{id}/update','ProfileController@update');
Route::post('/profile/{id}/delete','ProfileController@delete');

Route::get('/jadwalibadah','JadwalController@jadwalibadah');
Route::post('/jadwalibadah/create','JadwalController@create_jadwal');