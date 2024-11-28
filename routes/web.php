<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BKMController;
use App\Http\Controllers\BKMPController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerdaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\PengaduanController;

Route::get('/', function () {
    return view('login');
});

Route::post('login', [LoginController::class, 'login']);
Route::get('login', [LoginController::class, 'index'])->name('login');

Route::get('/logout', [LogoutController::class, 'logout']);
Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('superadmin', [HomeController::class, 'superadmin']);

    Route::get('superadmin/user', [UserController::class, 'index']);
    Route::get('superadmin/user/create', [UserController::class, 'create']);
    Route::post('superadmin/user/create', [UserController::class, 'store']);
    Route::get('superadmin/user/cari', [UserController::class, 'cari']);
    Route::get('superadmin/user/delete/{id}', [UserController::class, 'delete']);
    Route::get('superadmin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('superadmin/user/edit/{id}', [UserController::class, 'update']);


    Route::get('superadmin/petugas', [PetugasController::class, 'index']);
    Route::get('superadmin/petugas/create', [PetugasController::class, 'create']);
    Route::post('superadmin/petugas/create', [PetugasController::class, 'store']);
    Route::get('superadmin/petugas/cari', [PetugasController::class, 'cari']);
    Route::get('superadmin/petugas/delete/{id}', [PetugasController::class, 'delete']);
    Route::get('superadmin/petugas/edit/{id}', [PetugasController::class, 'edit']);
    Route::post('superadmin/petugas/edit/{id}', [PetugasController::class, 'update']);

    Route::get('superadmin/perda', [PerdaController::class, 'index']);
    Route::get('superadmin/perda/create', [PerdaController::class, 'create']);
    Route::post('superadmin/perda/create', [PerdaController::class, 'store']);
    Route::get('superadmin/perda/cari', [PerdaController::class, 'cari']);
    Route::get('superadmin/perda/delete/{id}', [PerdaController::class, 'delete']);
    Route::get('superadmin/perda/edit/{id}', [PerdaController::class, 'edit']);
    Route::post('superadmin/perda/edit/{id}', [PerdaController::class, 'update']);

    Route::get('superadmin/pelapor', [PelaporController::class, 'index']);
    Route::get('superadmin/pelapor/create', [PelaporController::class, 'create']);
    Route::post('superadmin/pelapor/create', [PelaporController::class, 'store']);
    Route::get('superadmin/pelapor/cari', [PelaporController::class, 'cari']);
    Route::get('superadmin/pelapor/delete/{id}', [PelaporController::class, 'delete']);
    Route::get('superadmin/pelapor/edit/{id}', [PelaporController::class, 'edit']);
    Route::post('superadmin/pelapor/edit/{id}', [PelaporController::class, 'update']);

    Route::get('superadmin/lokasi', [LokasiController::class, 'index']);
    Route::get('superadmin/lokasi/create', [LokasiController::class, 'create']);
    Route::post('superadmin/lokasi/create', [LokasiController::class, 'store']);
    Route::get('superadmin/lokasi/cari', [LokasiController::class, 'cari']);
    Route::get('superadmin/lokasi/delete/{id}', [LokasiController::class, 'delete']);
    Route::get('superadmin/lokasi/edit/{id}', [LokasiController::class, 'edit']);
    Route::post('superadmin/lokasi/edit/{id}', [LokasiController::class, 'update']);

    Route::get('superadmin/pengaduan', [PengaduanController::class, 'index']);
    Route::get('superadmin/pengaduan/create', [PengaduanController::class, 'create']);
    Route::post('superadmin/pengaduan/create', [PengaduanController::class, 'store']);
    Route::get('superadmin/pengaduan/cari', [PengaduanController::class, 'cari']);
    Route::get('superadmin/pengaduan/delete/{id}', [PengaduanController::class, 'delete']);
    Route::get('superadmin/pengaduan/edit/{id}', [PengaduanController::class, 'edit']);
    Route::post('superadmin/pengaduan/edit/{id}', [PengaduanController::class, 'update']);

    Route::get('superadmin/tindakan', [TindakanController::class, 'index']);
    Route::get('superadmin/tindakan/create', [TindakanController::class, 'create']);
    Route::post('superadmin/tindakan/create', [TindakanController::class, 'store']);
    Route::get('superadmin/tindakan/cari', [TindakanController::class, 'cari']);
    Route::get('superadmin/tindakan/delete/{id}', [TindakanController::class, 'delete']);
    Route::get('superadmin/tindakan/edit/{id}', [TindakanController::class, 'edit']);
    Route::post('superadmin/tindakan/edit/{id}', [TindakanController::class, 'update']);


    Route::get('superadmin/laporan', [LaporanController::class, 'index']);
    Route::get('superadmin/laporan/print', [LaporanController::class, 'pdf']);
});
