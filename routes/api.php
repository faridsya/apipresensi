<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('/presensi', App\Http\Controllers\Api\PresensiController::class);
//Route::apiResource('/karyawan', App\Http\Controllers\Api\KaryawanController::class);
Route::get('/karyawan', [App\Http\Controllers\Api\KaryawanController::class, 'index']);
Route::post('karyawan/simpankaryawan', [App\Http\Controllers\Api\KaryawanController::class, 'store']);
Route::post('karyawan/cekemail', [App\Http\Controllers\Api\KaryawanController::class, 'cekemail']);
Route::post('karyawan/validasiregister', [App\Http\Controllers\Api\KaryawanController::class, 'validasiregister']);
Route::get('karyawan/{karyawan}', [App\Http\Controllers\Api\KaryawanController::class, 'show']);
Route::put('karyawan/{karyawan}', [App\Http\Controllers\Api\KaryawanController::class, 'update']);
Route::delete('karyawan/{karyawan}', [App\Http\Controllers\Api\KaryawanController::class, 'destroy']);
