<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ClassController; // Tambahkan ini

// Halaman utama daftar siswa
Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');

// Halaman tambah siswa & simpan
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');

// Halaman detail siswa
Route::get('/siswa/show/{id}', [SiswaController::class, 'show'])->name('siswa.show');

// Halaman edit & update siswa
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');

// Hapus siswa
Route::get('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');

// Route untuk kelas
Route::get('/clas', [ClassController::class, 'index'])->name('clas.index');
Route::get('/clas/create', [ClassController::class, 'create'])->name('clas.create');
Route::post('/clas/store', [ClassController::class, 'store'])->name('clas.store');
Route::get('/clas/delete/{id}', [ClassController::class, 'destroy'])->name('clas.delete');
Route::get('/clas/show/{id}', [ClassController::class, 'show'])->name('clas.show');
Route::get('/clas/edit/{id}', [ClassController::class, 'edit'])->name('clas.edit');
Route::post('/clas/update/{id}', [ClassController::class, 'update'])->name('clas.update');
