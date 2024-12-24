<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'cekrole:Admin,Karyawan'], function() {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);
    Route::resource('/data-staff', StaffController::class)->names('data-staff');
    Route::resource('/data-anggota', AnggotaController::class)->names('data-anggota');
    Route::resource('/data-kategori', KategoriController::class)->names('data-kategori');
    Route::resource('/data-penulis', PenulisController::class)->names('data-penulis');
    Route::resource('/data-buku', BukuController::class)->names('data-buku');
    Route::resource('/data-peminjam', PeminjamController::class)->names('data-peminjam');
});

