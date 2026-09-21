<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { 
    return view('layout.home');
    return view('welcome');
});

Route::get('/profile', [MahasiswaController::class, 'index']);

Route::get('/', function () { 
    return view('page.profile');
});

Route::get('/', function () {
    return view('page.about');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);