<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiisController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // yg diubah
    return view('auth.loginnew');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);//->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//yg di tambahkan
Route::resource('fakultas', FakultasController::class)->middleware(['auth', 'verified']);
Route::resource('prodiis', ProdiisController::class)->middleware(['auth', 'verified']);
Route::resource('mahasiswa', MahasiswaController::class)->middleware(['auth', 'verified']);
require __DIR__.'/auth.php';

 