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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:super-admin'], 'as' => 'admin.'], function () {
  // Materi
  Route::get('materi', ['as' => 'materi.index', 'uses' => 'MateriController@index']);
  Route::get('materi/getData', ['as' => 'materi.getdata', 'uses' => 'MateriController@getData']);
  Route::get('materi/create', ['as' => 'materi.create', 'uses' => 'MateriController@create']);
  Route::get('materi/edit', ['as' => 'materi.edit', 'uses' => 'MateriController@edit']);

  // Judul Pembelajaran
  Route::get('judul', ['as' => 'judul.index', 'uses' => 'JudulController@index']);
  Route::get('judul/getdata', ['as' => 'judul.getdata', 'uses' => 'JudulController@getData']);
  Route::get('judul/create', ['as' => 'judul.create', 'uses' => 'JudulController@create']);
  Route::get('judul/edit', ['as' => 'judul.edit', 'uses' => 'JudulController@edit']);

  // Early Warning
  Route::get('/warning/{id}/detail', ['as' => 'warning.detail', 'uses' => 'WarningController@detail']);
  Route::get('warning/', ['as' => 'warning.index', 'uses' => 'WarningController@index']);
  Route::get('warning/getdata', ['as' => 'warning.getdata', 'uses' => 'WarningController@getData']);
  Route::get('warning/edit', ['as' => 'warning.edit', 'uses' => 'WarningController@edit']);
  Route::get('warning/show/{id}/{type?}', ['as' => 'warning.show', 'uses' => 'WarningController@showDetail']);

  // Instruktur
  Route::get('instruktur/', ['as' => 'instruktur.index', 'uses' => 'InstrukturController@index']);
  Route::get('instruktur/getdata', ['as' => 'instruktur.getdata', 'uses' => 'InstrukturController@getData']);
  Route::get('instruktur/create', ['as' => 'instruktur.create', 'uses' => 'InstrukturController@create']);
  Route::get('instruktur/update', ['as' => 'instruktur.update', 'uses' => 'InstrukturController@update']);
  Route::get('instruktur/show/{id}/{type?}', ['as' => 'instruktur.show', 'uses' => 'InstrukturController@show']);

  // Penyusun
  Route::get('penyusun/', ['as' => 'penyusun.index', 'uses' => 'PenyusunController@index']);
  Route::get('penyusun/create', ['as' => 'penyusun.create', 'uses' => 'PenyusunController@create']);
  Route::get('penyusun/update', ['as' => 'penyusun.update', 'uses' => 'PenyusunController@update']);

  //Evaluasi 
  Route::get('evaluasi/terbuka', ['as' => 'evaluasi.terbuka', 'uses' => 'EvaluasiController@indexTerbuka']);
  Route::get('evaluasi/getdataterbuka', ['as' => 'evaluasi.getdataterbuka', 'uses' => 'EvaluasiController@getDataTerbuka']);
  Route::get('evaluasi/tertutup', ['as' => 'evaluasi.tertutup', 'uses' => 'EvaluasiController@indexTertutup']);
  Route::get('evaluasi/getdatatertutup', ['as' => 'evaluasi.getdatatertutup', 'uses' => 'EvaluasiController@getDataTertutup']);

  // Role
  Route::get('role', ['as' => 'role.create', 'uses' => 'RoleController@create']);
  Route::post('role', ['as' => 'role.store', 'uses' => 'RoleController@store']);

  // User
  Route::get('users/', ['as' => 'users.index', 'uses' => 'UserController@index']);
  Route::get('profil/', ['as' => 'users.profil', 'uses' => 'UserController@profil']);
});

Route::group(['middleware' => ['role:instruktur'], 'as' => 'instruktur.'], function () {

  // Magang
  Route::get('pengalaman-magang', ['as' => 'magang.index', 'uses' => 'MagangController@index']);
  Route::get('pengalaman-magang/getdata', ['as' => 'magang.getdata', 'uses' => 'MagangController@getData']);
  Route::get('pengalaman-magang/show/{id}', ['as' => 'magang.show', 'uses' => 'MagangController@show']);
  Route::post('pengalaman-magang', ['as' => 'magang.store', 'uses' => 'MagangController@store']);
  Route::put('pengalaman-magang/update/{id}', ['as' => 'magang.update', 'uses' => 'MagangController@update']);

  // Mengajar
  Route::get('pengalaman-mengajar', ['as' => 'mengajar.index', 'uses' => 'MengajarController@index']);
  Route::get('pengalaman-mengajar/getdata', ['as' => 'mengajar.getdata', 'uses' => 'MengajarController@getData']);
  Route::get('pengalaman-mengajar/select2', ['as' => 'mengajar.select2', 'uses' => 'MengajarController@select2']);
  Route::get('pengalaman-mengajar/show/{id}', ['as' => 'mengajar.show', 'uses' => 'MengajarController@show']);
  Route::post('pengalaman-mengajar', ['as' => 'mengajar.store', 'uses' => 'MengajarController@store']);
  Route::put('pengalaman-mengajar/update/{id}', ['as' => 'mengajar.update', 'uses' => 'MengajarController@update']);

  // Pendalaman Materi
  Route::get('pendalaman-materi', ['as' => 'pendalaman-materi.index', 'uses' => 'PendalamanMateriController@index']);
  Route::get('pendalaman-materi/getdata', ['as' => 'mengajar.getdata', 'uses' => 'PendalamanMateriController@getData']);
  Route::get('pendalaman-materi/select2', ['as' => 'mengajar.select2', 'uses' => 'PendalamanMateriController@select2']);
  Route::get('pendalaman-materi/show/{id}', ['as' => 'pendalaman-materi.show', 'uses' => 'PendalamanMateriController@show']);
  Route::post('pendalaman-materi', ['as' => 'pendalaman-materi.store', 'uses' => 'PendalamanMateriController@store']);
  Route::put('pendalaman-materi/update/{id}', ['as' => 'pendalaman-materi.update', 'uses' => 'PendalamanMateriController@update']);
  // Kompetensi
  Route::get('pengalaman-kompetensi', ['as' => 'kompetensi.index', 'uses' => 'KompetensiController@index']);
  Route::get('pengalaman-kompetensi/getdata', ['as' => 'kompetensi.getdata', 'uses' => 'KompetensiController@getData']);
  Route::get('pengalaman-kompetensi/show/{id}', ['as' => 'kompetensi.show', 'uses' => 'KompetensiController@show']);
  Route::post('pengalaman-kompetensi', ['as' => 'kompetensi.store', 'uses' => 'KompetensiController@store']);
  Route::put('pengalaman-kompetensi/update/{id}', ['as' => 'kompetensi.update', 'uses' => 'KompetensiController@update']);

  // Bidang
  Route::get('pengalaman-bidang', ['as' => 'bidang.index', 'uses' => 'BidangController@index']);
  Route::get('pengalaman-bidang/getdata', ['as' => 'bidang.getdata', 'uses' => 'BidangController@getData']);
  Route::get('pengalaman-bidang/show/{id}', ['as' => 'bidang.show', 'uses' => 'BidangController@show']);
  Route::post('pengalaman-bidang', ['as' => 'bidang.store', 'uses' => 'BidangController@store']);
  Route::put('pengalaman-bidang/update/{id}', ['as' => 'bidang.update', 'uses' => 'BidangController@update']);

  // Narasumber
  Route::get('pengalaman-narasumber', ['as' => 'narasumber.index', 'uses' => 'NarasumberController@index']);
  Route::get('pengalaman-narasumber/getdata', ['as' => 'narasumber.getdata', 'uses' => 'NarasumberController@getData']);
  Route::get('pengalaman-narasumber/select2', ['as' => 'narasumber.select2', 'uses' => 'NarasumberController@select2']);
  Route::get('pengalaman-narasumber/create', ['as' => 'narasumber.create', 'uses' => 'NarasumberController@create']);
  Route::post('pengalaman-narasumber/store', ['as' => 'narasumber.store', 'uses' => 'NarasumberController@store']);
  Route::get('pengalaman-narasumber/edit', ['as' => 'narasumber.edit', 'uses' => 'NarasumberController@edit']);

  // Penyusun
  Route::get('pengalaman-penyusun', ['as' => 'penyusun.index', 'uses' => 'PenyusunController@index']);
  Route::get('pengalaman-penyusun/select2', ['as' => 'penyusun.select2', 'uses' => 'PenyusunController@select2']);
  Route::get('pengalaman-penyusun/getdata', ['as' => 'penyusun.getdata', 'uses' => 'PenyusunController@getData']);
  Route::get('pengalaman-penyusun/create', ['as' => 'penyusun.create', 'uses' => 'PenyusunController@create']);
  Route::post('pengalaman-penyusun/store', ['as' => 'penyusun.store', 'uses' => 'PenyusunController@store']);
  Route::get('pengalaman-penyusun/edit', ['as' => 'penyusun.edit', 'uses' => 'PenyusunController@edit']);

  // Toefl
  Route::get('pengalaman-toefl', ['as' => 'toefl.index', 'uses' => 'ToeflController@index']);
  Route::get('pengalaman-toefl/getdata', ['as' => 'toefl.getdata', 'uses' => 'ToeflController@getData']);
  Route::post('pengalaman-toefl', ['as' => 'toefl.store', 'uses' => 'ToeflController@store']);

  // Jurnal Ilmiah
  Route::get('pengalaman/jurnalilmiah', ['as' => 'jurnalilmiah.index', 'uses' => 'JurnalIlmiahController@index']);
  Route::get('pengalaman-jurnalilmiah/getdata', ['as' => 'jurnalilmiah.getdata', 'uses' => 'JurnalIlmiahController@getData']);

  // Judul
  Route::get('judul-instruktur', ['as' => 'judul.index', 'uses' => 'JudulController@index']);
  Route::get('judul-instruktur/getdata', ['as' => 'judul.getdata', 'uses' => 'JudulController@getData']);


  // Warning
  Route::get('warning/kategori/{id}', ['as' => 'warning.kategori', 'uses' => 'WarningController@show']);
  Route::post('warning/store', ['as' => 'warning.store', 'uses' => 'WarningController@store']);

  // Review judul pembelajaran
  Route::get('review', ['as' => 'review', 'uses' => 'ReviewController@index']);
  Route::post('review/kurikulum', ['as' => 'review.kurikulum', 'uses' => 'ReviewController@storeKurikulum']);
  Route::post('review/silabus', ['as' => 'review.silabus', 'uses' => 'ReviewController@storeSilabus']);
  Route::post('review/handout', ['as' => 'review.handout', 'uses' => 'ReviewController@storeHandout']);
  Route::post('review/materi_tayang', ['as' => 'review.materi_tayang', 'uses' => 'ReviewController@storeMateriTayang']);
  Route::post('review/petunjuk_instruktur', ['as' => 'review.petunjuk_instruktur', 'uses' => 'ReviewController@storePetunjukInstruktur']);
  Route::post('review/petunjuk_penyelenggara', ['as' => 'review.petunjuk_penyelenggara', 'uses' => 'ReviewController@storePetunjukPenyelenggara']);
  Route::post('review/tools_evaluasi', ['as' => 'review.tools_evaluasi', 'uses' => 'ReviewController@storeToolsEvaluasi']);
  Route::post('review/petunjuk_praktik', ['as' => 'review.petunjuk_praktik', 'uses' => 'ReviewController@storePetunjukPraktik']);
});
