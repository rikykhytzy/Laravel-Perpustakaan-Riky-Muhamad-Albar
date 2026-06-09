<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua Route di bawah ini WAJIB LOGIN dulu
Route::middleware('auth')->group(function () {
    
    // Fitur Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Semua user (Admin & Member) BISA melihat data buku dan kategori
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

    // Cuma USER DENGAN ROLE ADMIN yang bisa nambah data (POST)
    Route::middleware(['admin'])->group(function () {
        Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
        Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
        
    }); // <-- Penutup middleware admin yang tadi hilang
}); // <-- Penutup middleware auth

require __DIR__.'/auth.php';