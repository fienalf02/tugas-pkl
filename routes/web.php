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

        //admin
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tabeljurusan', 'JurusanController@index')->name('jurusan.index');
Route::get('/jurusan/tambah', 'JurusanController@create')->name('jurusan.create');
Route::post('/jurusan/store', 'JurusanController@store')->name('jurusan.store');
Route::get('/jurusan/edit/{id}', 'JurusanController@edit')->name('jurusan.edit');
Route::post('/jurusan/update/{id}', 'JurusanController@update')->name('jurusan.update');
Route::get('/jurusan/delete/{id}', 'JurusanController@destroy')->name('jurusan.destroy');
Route::get('/jurusan/search', 'JurusanController@search')->name('jurusan.search');
Route::get('/jurusan/pdf', 'JurusanController@pdf');
Route::get('/jurusan/export', 'JurusanController@export');

Route::get('/tabelkelas', 'KelasController@index')->name('kelas.index');
Route::get('/kelas/tambah', 'KelasController@create')->name('kelas.create');
Route::post('/kelas/store', 'KelasController@store')->name('kelas.store');
Route::get('/kelas/edit/{id}', 'KelasController@edit')->name('kelas.edit');
Route::post('/kelas/update/{id}', 'KelasController@update')->name('kelas.update');
Route::get('/kelas/delete/{id}', 'KelasController@destroy')->name('kelas.destroy');
Route::get('/kelas/search', 'KelasController@search')->name('kelas.search');
Route::get('/kelas/pdf', 'KelasController@pdf');
Route::get('/kelas/export', 'KelasController@export');

Route::get('/tabelguru', 'GuruController@index')->name('guru.index');
Route::get('/guru/tambah', 'GuruController@create')->name('guru.create');
Route::post('/guru/store', 'GuruController@store')->name('guru.store');
Route::get('/guru/edit/{id}', 'GuruController@edit')->name('guru.edit');
Route::post('/guru/update/{id}', 'GuruController@update')->name('guru.update');
Route::get('/guru/delete/{id}', 'GuruController@destroy')->name('guru.destroy');
Route::get('/guru/search', 'GuruController@search')->name('guru.search');
Route::get('/guru/pdf', 'GuruController@pdf');
Route::get('/guru/export', 'GuruController@export');
Route::get('/guru/import', 'GuruController@import')->name('guru.import');

Route::get('/tabelsiswa', 'SiswaController@index')->name('siswa.index');
Route::get('/tabelnilaisiswa', 'SiswaController@nilai')->name('siswa.nilai');
Route::get('/tabelsppsiswa', 'SiswaController@pembayaran')->name('siswa.spp');
Route::get('/siswa/tambah', 'SiswaController@create')->name('siswa.create');
Route::post('/siswa/store', 'SiswaController@store')->name('siswa.store');
Route::get('/siswa/edit/{id}', 'SiswaController@edit')->name('siswa.edit');
Route::post('/siswa/update/{id}', 'SiswaController@update')->name('siswa.update');
Route::get('/siswa/delete/{id}', 'SiswaController@destroy')->name('siswa.destroy');
Route::get('/siswa/search', 'SiswaController@search')->name('siswa.search');
Route::get('/siswa/pdf', 'SiswaController@pdf');
Route::get('/siswa/export', 'SiswaController@export');
Route::get('/siswa/filter', 'SiswaController@filter')->name('siswa.filter');

Route::get('/tabelnilai', 'NilaiController@index')->name('nilai.index');
Route::get('/nilai/tambah/{id}', 'NilaiController@create')->name('nilai.create');
Route::post('/nilai/store', 'NilaiController@store')->name('nilai.store');
Route::get('/nilai/edit/{id}', 'NilaiController@edit')->name('nilai.edit');
Route::post('/nilai/update/{id}', 'NilaiController@update')->name('nilai.update');
Route::get('/nilai/delete/{id}', 'NilaiController@destroy')->name('nilai.destroy');
Route::get('/nilai/search/{id}', 'NilaiController@search')->name('nilai.search');
Route::get('/nilai/pdf', 'NilaiController@pdf');
Route::get('/nilai/export', 'NilaiController@export');
Route::get('/nilai/nilaisiswa/{id}', 'NilaiController@show')->name('nilai.show');
//Route::get('/nilai/nilaisiswanilai/{id_siswa}', 'NilaiController@showSiswa')->name('showsiswa');

Route::get('/tabelmapel', 'MapelController@index')->name('mapel.index');
Route::get('/mapel/tambah', 'MapelController@create')->name('mapel.create');
Route::post('/mapel/store', 'MapelController@store')->name('mapel.store');
Route::get('/mapel/edit/{id}', 'MapelController@edit')->name('mapel.edit');
Route::post('/mapel/update/{id}', 'MapelController@update')->name('mapel.update');
Route::get('/mapel/delete/{id}', 'MapelController@destroy')->name('mapel.destroy');
Route::get('/mapel/search', 'MapelController@search')->name('mapel.search');
Route::get('/mapel/pdf', 'MapelController@pdf');
Route::get('/mapel/export', 'MapelController@export');

Route::get('/tabeljadwal', 'JadwalController@index')->name('jadwal.index');
Route::get('/jadwal/tambah', 'JadwalController@create')->name('jadwal.create');
Route::post('/jadwal/store', 'JadwalController@store')->name('jadwal.store');
Route::get('/jadwal/edit/{id}', 'JadwalController@edit')->name('jadwal.edit');
Route::post('/jadwal/update/{id}', 'JadwalController@update')->name('jadwal.update');
Route::get('/jadwal/delete/{id}', 'JadwalController@destroy')->name('jadwal.destroy');
Route::get('/jadwal/search', 'JadwalController@search')->name('jadwal.search');
Route::get('/jadwal/pdf', 'JadwalController@pdf');
Route::get('/jadwal/export', 'JadwalController@export');

Route::get('/tabelpembayaran', 'PembayaranController@index')->name('pembayaran.index');
Route::get('/pembayaran/tambah/{id}', 'PembayaranController@create')->name('pembayaran.create');
Route::post('/pembayaran/store', 'PembayaranController@store')->name('pembayaran.store');
Route::get('/pembayaran/edit/{id}', 'PembayaranController@edit')->name('pembayaran.edit');
Route::post('/pembayaran/update/{id}', 'PembayaranController@update')->name('pembayaran.update');
Route::get('/pembayaran/delete/{id}', 'PembayaranController@destroy')->name('pembayaran.destroy');
Route::get('/pembayaran/search/{id}', 'PembayaranController@search')->name('pembayaran.search');
Route::get('/pembayaran/pdf', 'PembayaranController@pdf');
Route::get('/pembayaran/export', 'PembayaranController@export');
Route::get('/pembayaran/nilaisiswa/{id}', 'PembayaranController@show')->name('pembayaran.show');

    //guru
Route::get('/tabeljurusanguru', 'JurusanController@indexguru')->name('jurusan.indexguru');

Route::get('/tabelkelasguru', 'KelasController@indexguru')->name('kelas.indexguru');

Route::get('/tabelguruguru', 'GuruController@indexguru')->name('guru.indexguru');

Route::get('/tabelsiswaguru', 'SiswaController@indexguru')->name('siswa.indexguru');
Route::get('/tabelnilaisiswaguru', 'SiswaController@nilaiguru')->name('siswa.nilai.guru');
Route::get('/tabelsppsiswaguru', 'SiswaController@pembayaranguru')->name('siswa.spp.guru');

Route::get('/tabelnilaiguru', 'NilaiController@indexguru')->name('nilai.indexguru');
Route::get('/nilai/tambahguru/{id}', 'NilaiController@createguru')->name('nilai.create.guru');
Route::post('/nilai/storeguru', 'NilaiController@storeguru')->name('nilai.store.guru');
Route::get('/nilai/editguru/{id}', 'NilaiController@editguru')->name('nilai.edit.guru');
Route::post('/nilai/updateguru/{id}', 'NilaiController@updateguru')->name('nilai.update.guru');
Route::get('/nilai/deleteguru/{id}', 'NilaiController@destroyguru')->name('nilai.destroy.guru');
Route::get('/nilai/searchguru/{id}', 'NilaiController@searchguru')->name('nilai.searchguru');
Route::get('/nilai/pdfguru', 'NilaiController@pdfguru');
Route::get('/nilai/nilaisiswaguru/{id}', 'NilaiController@showguru')->name('nilai.showguru');

Route::get('/tabelmapelguru', 'MapelController@indexguru')->name('mapel.indexguru');

Route::get('/tabeljadwalguru', 'JadwalController@indexguru')->name('jadwal.indexguru');

Route::get('/tabelpembayaranguru', 'PembayaranController@indexguru')->name('pembayaran.indexguru');
Route::get('/pembayaran/searchguru/{id}', 'PembayaranController@searchguru')->name('pembayaran.search.guru');
Route::get('/pembayaran/pdfguru', 'PembayaranController@pdfguru');
Route::get('/pembayaran/nilaisiswaguru/{id}', 'PembayaranController@showguru')->name('pembayaran.showguru');

Route::get('/tabelpembayaranTU', 'PembayaranController@indexTU')->name('pembayaran.indexTU');
Route::get('/pembayaran/tambahTU/{id}', 'PembayaranController@createTU')->name('pembayaran.createTU');
Route::post('/pembayaran/storeTU', 'PembayaranController@storeTU')->name('pembayaran.storeTU');
Route::get('/pembayaran/editTU/{id}', 'PembayaranController@editTU')->name('pembayaran.editTU');
Route::post('/pembayaran/updateTU/{id}', 'PembayaranController@updateTU')->name('pembayaran.updateTU');
Route::get('/pembayaran/deleteTU/{id}', 'PembayaranController@destroyTU')->name('pembayaran.destroyTU');
Route::get('/pembayaran/searchTU/{id}', 'PembayaranController@searchTU')->name('pembayaran.searchTU');
Route::get('/pembayaran/pdfTU', 'PembayaranController@pdfTU');
Route::get('/pembayaran/nilaisiswaTU/{id}', 'PembayaranController@showTU')->name('pembayaran.showTU');