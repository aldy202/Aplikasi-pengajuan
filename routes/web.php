<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DataPinjamanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UploadDokumenController;
use App\Http\Controllers\StatusController;

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

Route::resource('konsumen', KonsumenController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::resource('data_pinjaman', DataPinjamanController::class);
Route::resource('pengajuan', PengajuanController::class);
Route::resource('laporan', LaporanController::class);
Route::resource('upload_dokumen', UploadDokumenController::class);
Route::resource('status', StatusController::class);
