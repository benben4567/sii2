<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'as' => 'admin.'], function () {
  // Materi
  Route::get('materi',['as' => 'materi.index', 'uses' => 'MateriController@index']);
  Route::get('materi/create',['as' => 'materi.create', 'uses' => 'MateriController@create']);
  Route::get('materi/edit',['as' => 'materi.edit', 'uses' => 'MateriController@edit']);

  // Judul Pembelajaran
  Route::get('judul',['as' => 'judul.index', 'uses' => 'JudulController@index']);
  Route::get('judul/create',['as' => 'judul.create', 'uses' => 'JudulController@create']);
  Route::get('judul/edit',['as' => 'judul.edit', 'uses' => 'JudulController@edit']);

  // Early Warning
  Route::get('warning/',['as' => 'warning.index', 'uses' => 'WarningController@index']);
  Route::get('warning/create',['as' => 'warning.create', 'uses' => 'WarningController@create']);
  Route::get('warning/edit',['as' => 'warning.edit', 'uses' => 'WarningController@edit']);

  // Instruktur
  Route::get('instruktur/',['as' => 'instruktur.index', 'uses' => 'InstrukturController@index']);
  Route::get('instruktur/create',['as' => 'instruktur.create', 'uses' => 'InstrukturController@create']);
  Route::get('instruktur/update',['as' => 'instruktur.update', 'uses' => 'InstrukturController@update']);
  Route::get('instruktur/show',['as' => 'instruktur.show', 'uses' => 'InstrukturController@show']);

  // Penyusun
  Route::get('penyusun/',['as' => 'penyusun.index', 'uses' => 'PenyusunController@index']);
  Route::get('penyusun/create',['as' => 'penyusun.create', 'uses' => 'PenyusunController@create']);
  Route::get('penyusun/update',['as' => 'penyusun.update', 'uses' => 'PenyusunController@update']);

  // Role
  Route::get('role',['as' => 'role.create', 'uses' => 'RoleController@create']);
  Route::post('role',['as' => 'role.store', 'uses' => 'RoleController@store']);

  // User
  Route::get('users/',['as' => 'users.index', 'uses' => 'UserController@index']);
  Route::get('profil/',['as' => 'users.profil', 'uses' => 'UserController@profil']);



});

Route::group(['as' => 'instruktur.'], function () {

  // Magang
  Route::get('pengalaman-magang', [ 'as' => 'magang.index', 'uses' => 'MagangController@index']);
  Route::get('pengalaman-magang/show/{id}', [ 'as' => 'magang.show', 'uses' => 'MagangController@show']);
  Route::post('pengalaman-magang', [ 'as' => 'magang.store', 'uses' => 'MagangController@store']);
  Route::put('pengalaman-magang/update/{id}', [ 'as' => 'magang.update', 'uses' => 'MagangController@update']);

  // Mengajar
  Route::get('pengalaman-mengajar', [ 'as' => 'mengajar.index', 'uses' => 'MengajarController@index']);
  Route::get('pengalaman-mengajar/show/{id}', [ 'as' => 'mengajar.show', 'uses' => 'MengajarController@show']);
  Route::post('pengalaman-mengajar', [ 'as' => 'mengajar.store', 'uses' => 'MengajarController@store']);
  Route::put('pengalaman-mengajar/update/{id}', [ 'as' => 'mengajar.update', 'uses' => 'MengajarController@update']);

  // Pendalaman Materi
  Route::get('pendalaman-materi', [ 'as' => 'pendalaman-materi.index', 'uses' => 'PendalamanMateriController@index']);
  Route::get('pendalaman-materi/show/{id}', [ 'as' => 'pendalaman-materi.show', 'uses' => 'PendalamanMateriController@show']);
  Route::post('pendalaman-materi', [ 'as' => 'pendalaman-materi.store', 'uses' => 'PendalamanMateriController@store']);
  Route::put('pendalaman-materi/update/{id}', [ 'as' => 'pendalaman-materi.update', 'uses' => 'PendalamanMateriController@update']);

  // Judul
  Route::get('judul-instruktur', ['as' => 'judul.index', 'uses' => 'JudulController@index']);

  // Warning
  Route::get('warning/kategori', ['as' => 'warning.kategori', 'uses' => 'WarningController@show']);

  // Kompetensi
  Route::get('pengalaman-kompetensi', [ 'as' => 'kompetensi.index', 'uses' => 'KompetensiController@index']);
  Route::get('pengalaman-kompetensi/show/{id}', [ 'as' => 'kompetensi.show', 'uses' => 'KompetensiController@show']);
  Route::post('pengalaman-kompetensi', [ 'as' => 'kompetensi.store', 'uses' => 'KompetensiController@store']);
  Route::put('pengalaman-kompetensi/update/{id}', [ 'as' => 'kompetensi.update', 'uses' => 'KompetensiController@update']);

  // Bidang
  Route::get('pengalaman-bidang', [ 'as' => 'bidang.index', 'uses' => 'BidangController@index']);
  Route::get('pengalaman-bidang/show/{id}', [ 'as' => 'bidang.show', 'uses' => 'BidangController@show']);
  Route::post('pengalaman-bidang', [ 'as' => 'bidang.store', 'uses' => 'BidangController@store']);
  Route::put('pengalaman-bidang/update/{id}', [ 'as' => 'bidang.update', 'uses' => 'BidangController@update']);

  // Narasumber
  Route::get('pengalaman-narasumber', ['as' => 'narasumber.index', 'uses' => 'NarasumberController@index']);
  Route::get('pengalaman-narasumber/create', ['as' => 'narasumber.create', 'uses' => 'NarasumberController@create']);
  Route::get('pengalaman-narasumber/edit', ['as' => 'narasumber.edit', 'uses' => 'NarasumberController@edit']);

  // Penyusun
  Route::get('pengalaman-penyusun', ['as' => 'penyusun.index', 'uses' => 'PenyusunController@index']);
  Route::get('pengalaman-penyusun/create', ['as' => 'penyusun.create', 'uses' => 'PenyusunController@create']);
  Route::get('pengalaman-penyusun/edit', ['as' => 'penyusun.edit', 'uses' => 'PenyusunController@edit']);

});
