<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\KelahiranKematianController as AdminKelahiranKematianController;
use App\Http\Controllers\admin\PenyakitController as AdminPenyakitController;
use App\Http\Controllers\admin\TumbuhKembangController as AdminTumbuhKembangController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\KelahiranKematianController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TumbuhKembangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','role:admin')->group(function () {
    Route::resource('/dashboard/hewan', HewanController::class);
    Route::resource('/dashboard/akun', AccountController::class);
    Route::get('/dashboard/tumbuh/proses', [AdminTumbuhKembangController::class, 'proses'])->name('admin.tumbuh.proses');
    Route::get('/dashboard/tumbuh/riwayat', [AdminTumbuhKembangController::class, 'riwayat'])->name('admin.tumbuh.riwayat');
    Route::patch('/dashboard/tumbuh/proses/{id}', [AdminTumbuhKembangController::class, 'update'])->name('admin.tumbuh.update');

    Route::get('/dashboard/penyakit/proses', [AdminPenyakitController::class, 'proses'])->name('admin.penyakit.proses');
    Route::get('/dashboard/penyakit/riwayat', [AdminPenyakitController::class, 'riwayat'])->name('admin.penyakit.riwayat');
    Route::patch('/dashboard/penyakit/proses/{id}', [AdminPenyakitController::class, 'update'])->name('admin.penyakit.update');

    Route::get('/dashboard/kelahiran-kematian/proses', [AdminKelahiranKematianController::class, 'proses'])->name('admin.kelahiran-kematian.proses');
    Route::get('/dashboard/kelahiran-kematian/riwayat', [AdminKelahiranKematianController::class, 'riwayat'])->name('admin.kelahiran-kematian.riwayat');
    Route::patch('/dashboard/kelahiran-kematian/proses/{id}', [AdminKelahiranKematianController::class, 'update'])->name('admin.kelahiran-kematian.update');


});

Route::middleware('auth','role:admin|user')->group(function () {
    Route::resource('/dashboard/tumbuh', TumbuhKembangController::class);
    Route::resource('/dashboard/penyakit', PenyakitController::class);
    Route::resource('dashboard/kelahiran-kematian', KelahiranKematianController::class);
});

require __DIR__.'/auth.php';
