<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\peminjamanController;



Route::middleware(['auth'])->group(function(){

//     Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

//         Route::get('/login',[AuthController::class,'login']);
//         Route::post('logout', 'AuthController@logout');
//         Route::post('refresh', 'AuthController@refresh');
//         Route::post('me', 'AuthController@me');
     
//     });
    

Route::get('/', [pagesController::class, 'index']);

Route::get('/siswa', [siswaController::class, 'getSiswa']);
Route::get('/siswa/add', [siswaController::class, 'addSiswa']);
Route::post('/siswa', [siswaController::class, 'createSiswa']);
Route::get('/siswa/delete{id_siswa}', [siswaController::class, 'deleteSiswa']);
Route::get('/siswa/{id_siswa}', [siswaController::class,'editSiswa']);
Route::put('/siswa/edit{id_siswa}', [siswaController::class,'updateSiswa']);

Route::get('/kelas', [kelasController::class, 'getKelas']);
Route::get('/kelas/add', [kelasController::class, 'addKelas']);
Route::post('/kelas', [kelasController::class, 'createKelas']);
Route::get('/kelas/delete{id_kelas}', [kelasController::class,'deleteKelas']);
Route::get('/kelas/{id_kelas}', [kelasController::class,'editKelas']);
Route::put('/kelas/edit{id_kelas}', [KelasController::class,'updateKelas']);

Route::get('/buku', [bukuController::class, 'getBuku']);
Route::get('/buku/add', [bukuController::class, 'addBuku']);
Route::post('/buku', [bukuController::class, 'createBuku']);
Route::get('/buku/delete{id_buku}', [bukuController::class,'deleteBuku']);
Route::get('/buku/{id_buku}', [bukuController::class,'editBuku']);
Route::put('/buku/edit{id_buku}', [bukuController::class,'updateBuku']);

Route::get('/peminjaman', [peminjamanController::class,'getPeminjaman']);
Route::get('/peminjaman/add', [peminjamanController::class, 'addPeminjaman']);
Route::post('/peminjaman', [peminjamanController::class, 'createPeminjaman']);
Route::get('/peminjaman/kembali{id_peminjaman}', [peminjamanController::class,'kembalikanPeminjaman']);
Route::get('/peminjaman/bayar{id_peminjaman}', [peminjamanController::class,'bayarPeminjaman']);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\pagesController::class, 'index'])->name('pages.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
