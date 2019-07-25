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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tabeljurusan', 'JurusanController@index');

Route::get('/tabelkelas', 'KelasController@index');

Route::get('/tabelguru', 'GuruController@index');

Route::get('/tabelsiswa', 'SiswaController@index');

Route::get('/tabelnilai', 'NilaiController@index');

Route::get('/tabeldetailnilai', 'DetailNilaiController@index');

Route::get('/tabelmapel', 'MapelController@index');

Route::get('/tabeljadwal', 'JadwalController@index');