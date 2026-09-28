<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', [ProfileController::class, 'profile']);

Route::get('/user', [MahasiswaController::class, 'index'])->name('user.index');
Route::get('/user/create', [MahasiswaController::class, 'create'])->name('user.create');
Route::post('/user', [MahasiswaController::class, 'store'])->name('user.store');
