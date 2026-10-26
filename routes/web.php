<?php

use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route; // 'illuminate' harus kapital 'Illuminate'

Route::get('/', function () {
    return view('page.home');
});

Route::get('/profile', [MahasiswaController::class, 'index']);
Route::get('/project', [ProjectController::class, 'index'])->name('project.index'); // typo 'ptoject' -> 'project'
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show'); // pakai method 'show', bukan 'index'

Route::get('/about', function () {
    return view('page.about');
});

Route::prefix('admin')->name('admin.')->group(function () { 
    Route::get('/', function () { 
        return view('admin.home'); 
    })->name('home');

    route::resource('projects', AdminProjectController::class);
});