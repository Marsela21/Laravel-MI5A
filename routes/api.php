<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// yang ditambahkan
Route::get('fakultas', [FakultasController::class, 'getFakultas']);
Route::get('prodi', [ProdiisController::class, 'getProdi']);
Route::get('mahasiswa', [MahasiswaController::class, 'getMahasiswa']);

//post utk menyimpan
Route::post('fakultas', [FakultasController::class, 'storeFakultas']);
//utk menghapus
Route::delete('fakultas/{id}', [FakultasController::class, 'destroyFakultas']);
//utk register (routes/api.php)
Route::post('register', [AuthController::class, 'register']);
//utk login (routes/api.php)
Route::post('login', [AuthController::class, 'login']);