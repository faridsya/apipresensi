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

//Auth
Route::post('auth/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('auth/cekemail', [App\Http\Controllers\Api\AuthController::class, 'cekemail']);
Route::post('auth/validasiregister', [App\Http\Controllers\Api\AuthController::class, 'validasiregister']);


//Karyawan
Route::apiResource('/presensi', App\Http\Controllers\Api\PresensiController::class);
//Route::apiResource('/karyawan', App\Http\Controllers\Api\KaryawanController::class);
Route::get('/karyawan', [App\Http\Controllers\Api\KaryawanController::class, 'index']);
Route::post('karyawan/simpankaryawan', [App\Http\Controllers\Api\KaryawanController::class, 'store']);
Route::get('karyawan/{karyawan}', [App\Http\Controllers\Api\KaryawanController::class, 'show']);
Route::put('karyawan/{karyawan}', [App\Http\Controllers\Api\KaryawanController::class, 'update']);
Route::delete('karyawan/{karyawan}', [App\Http\Controllers\Api\KaryawanController::class, 'destroy']);
