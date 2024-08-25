<?php

use App\Http\Controllers\NasabahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WilayahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/beranda', function () {
    return view('admin.pages.beranda');
})->middleware(['auth', 'verified'])->name('beranda');



Route::middleware('auth')->group(function () {
    Route::name('profile.')->prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Nasabah
    Route::name('pembukaan-rekening.')->prefix('nasabah')->group(function () {
        Route::get('/approval', [NasabahController::class, 'list'])->name('list');
        Route::get('/', [NasabahController::class, 'create'])->name('create');
        Route::post('/', [NasabahController::class, 'store'])->name('store');
        Route::post('/approval', [NasabahController::class, 'approve'])->name('approve');
    });

    // Wilayah
    Route::name('wilayah.')->prefix('wilayah')->group(function () {
        Route::get('/get-kabupaten', [WilayahController::class, 'getKabupaten'])->name('get-kabupaten');
        Route::get('/get-kecamatan', [WilayahController::class, 'getKecamatan'])->name('get-kecamatan');
        Route::get('/get-kelurahan', [WilayahController::class, 'getKelurahan'])->name('get-kelurahan');
    });
    
});

require __DIR__.'/auth.php';
