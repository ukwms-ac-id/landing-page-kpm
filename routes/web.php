<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
// use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;


// Landing page dengan components baru
Route::get('/', function () {
    return Inertia::render('Home');
});

// Demo page untuk lihat semua components
Route::get('/components-demo', function () {
    return Inertia::render('ComponentsDemo');
})->name('components.demo');

// Existing routes
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

