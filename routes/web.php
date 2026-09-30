<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

Route::get('/user', [MahasiswaController::class, 'index'])->name('user.index');
Route::get('/user/create', [MahasiswaController::class, 'create'])->name('user.create');
Route::post('/user', [MahasiswaController::class, 'store'])->name('user.store');

Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');