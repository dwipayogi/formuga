<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\transaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');

    Route::get('/transaksi', [transaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksi/tambahTransaksi', [transaksiController::class, 'tambah'])->name('tambah-transaksi');
    Route::delete('/hapusTransaksi/{id_transaksi}', [transaksiController::class, 'hapus'])->name('hapus-transaksi');
    Route::put('/editTransaksi/{id_transaksi}', [transaksiController::class, 'edit'])->name('edit-transaksi');
});

require __DIR__ . '/auth.php';
