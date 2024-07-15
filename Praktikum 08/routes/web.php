<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/salam', function (){
    return "Selamat Datang di Website App Puskesmas!";
});
Route::get('/profil', function (){
    return view('profil');
});
Route::get('/about', function (){
    return view('about');
});
Route::get('/dashboard', [DashboardController::class, 'show']);
Route::get('/dashboard/laporan', [DashboardController::class, 'laporan']);
