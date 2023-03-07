<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;

//login - register
Route::post('/register',[UserController::class,'register']);
Route::post('/login', [UserController::class,'login']);
Route::post('/me', [UserController::class,'getAuthenticatedUser']);

Route::group(['middleware' => ['jwt.verify']], function () 
{
    

// api siswa
Route::get('/siswa', [siswaController::class, 'getSiswa']);
Route::get('/datasiswa', [siswaController::class, 'dataSiswa']);
Route::post('/addsiswa', [siswaController::class, 'createSiswa']);
Route::delete('/deletesiswa/{id_siswa}', [siswaController::class, 'deleteSiswa']);
Route::put('/ubahsiswa/{id_siswa}', [siswaController::class,'updateSiswa']);


//api kelas
Route::get('/kelas', [kelasController::class, 'getKelas']);
Route::get('/getkelas', [kelasController::class, 'allkelas']);
Route::post('/addkelas', [kelasController::class, 'createkelas']);
Route::delete('/deletekelas/{id_kelas}', [kelasController::class,'deleteKelas']);
Route::put('/ubahkelas/{id_kelas}', [KelasController::class,'updateKelas']);

//api buku
Route::get('/buku', [bukuController::class, 'getBuku']);
Route::get('/allbuku', [bukuController::class, 'allbuku']);
Route::post('/addbuku', [bukuController::class, 'createBuku']);
Route::delete('/deletebuku/{id_buku}', [bukuController::class,'deleteBuku']);
Route::put('/ubahbuku/{id_buku}', [bukuController::class,'updateBuku']);

//api peminjaman
Route::get('/detailpeminjaman', [peminjamanController::class,'getPeminjaman']);
Route::get('/peminjaman', [peminjamanController::class,'Peminjaman']);
Route::post('/addpeminjaman', [peminjamanController::class, 'createPeminjaman']);
Route::post('/kembalikanbuku/{id_peminjaman}', [peminjamanController::class,'kembalikanPeminjaman']);
Route::post('/bayardenda/{id_peminjaman}', [peminjamanController::class,'bayarPeminjaman']);

// api get jumlah
Route::get('/jumlahsiswa',[siswaController::class, 'jumlahsiswa']);
Route::get('/jumlahdenda', [peminjamanController::class,'jumlahDenda']);
Route::get('/jumlahbuku', [bukuController::class,'jumlahBuku']);
Route::get('/jumlahdenda', [peminjamanController::class,'jumlahDenda']);
Route::get('/jumlahkelas', [kelasController::class,'jumlahKelas']);
Route::get('/jumlahpeminjaman', [peminjamanController::class,'jumlahPeminjaman']);
Route::get('/jumlahbukubelumkembali', [peminjamanController::class,'jumlahBukuBelumKembali']);

});
