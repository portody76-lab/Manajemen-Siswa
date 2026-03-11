<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PengumpulanController;

// Halaman awal langsung ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// ─── Auth ────────────────────────────────────────────
Route::get('/login',  [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register',  [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// ─── Guru ────────────────────────────────────────────
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [TugasController::class, 'dashboardGuru'])->name('dashboard');

    // Taruh route spesifik di atas resource untuk hindari konflik wildcard
    Route::get('/tugas/kiriman/{pengumpulan}/download', [PengumpulanController::class, 'download'])->name('kiriman.download');
    Route::get('/tugas/{tugas}/kiriman', [PengumpulanController::class, 'lihatKiriman'])->name('tugas.kiriman');

    Route::resource('/tugas', TugasController::class);
});

// ─── Siswa ───────────────────────────────────────────
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [TugasController::class, 'dashboardSiswa'])->name('dashboard');
    Route::get('/tugas', [TugasController::class, 'indexSiswa'])->name('tugas.index');
    Route::post('/tugas/{tugas}/kirim', [PengumpulanController::class, 'kirim'])->name('tugas.kirim');
});

Route::get('/user/home', function () {
    return view('user.home');
});

Route::get('/user/', function () {
    return view('user.home');
});