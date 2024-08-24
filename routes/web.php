<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return view('admin.pages.beranda');
})->middleware(['auth', 'verified'])->name('beranda');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nasabah
    Route::get('/approval', [NasabahController::class, 'index'])->name('nasabah.list');
    Route::get('/pembukaan-rekening', [NasabahController::class, 'create'])->name('nasabah.create');
    
});

require __DIR__.'/auth.php';