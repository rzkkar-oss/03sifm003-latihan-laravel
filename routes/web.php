<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page.home');
});

Route::get('/profile', [MahasiswaController::class, 'index']);
Route::get('/project', [ProjectController::class, 'index'])->name('ptoject.index');
Route::get('/project/{id}', [ProjectController::class, 'index'])->name('project.show');

Route::get('/about', function () {
    return view('page.about');
});
    
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);