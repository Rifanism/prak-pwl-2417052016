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
Route::delete('/user/{id}', [MahasiswaController::class, 'destroy'])->name('user.destroy');

Route::get('/user/{id}/edit', [MahasiswaController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [MahasiswaController::class, 'update'])->name('user.update');

Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');

Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');