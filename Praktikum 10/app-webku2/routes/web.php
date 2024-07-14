<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\ParamedikController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\UnitKerjaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/pasien', [PasienController::class, 'show'])->name('pasien');
Route::get('/kategori', [KategoriController::class, 'show'])->name('kategori');
Route::get('/kelurahan', [KelurahanController::class, 'show'])->name('kelurahan');
Route::get('/paramedik', [ParamedikController::class, 'show'])->name('paramedik');
Route::get('/periksa', [PeriksaController::class, 'show'])->name('periksa');
Route::get('/unitkerja', [UnitKerjaController::class, 'show'])->name('unitkerja');
