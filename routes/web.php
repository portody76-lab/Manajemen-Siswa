<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\GuruController;

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

    // Dashboard
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard');

    // Kelola tugas (spesifik di atas resource untuk hindari konflik wildcard)
    Route::get('/tugas/kiriman/{pengumpulan}/download', [PengumpulanController::class, 'download'])->name('kiriman.download');
    Route::get('/tugas/{tugas}/kiriman', [PengumpulanController::class, 'lihatKiriman'])->name('tugas.kiriman');
    Route::resource('/tugas', TugasController::class);

    // Kelola siswa
    Route::get('/siswa', [GuruController::class, 'siswaIndex'])->name('siswa.index');
    Route::get('/siswa/{siswa}/edit', [GuruController::class, 'siswaEdit'])->name('siswa.edit');
    Route::put('/siswa/{siswa}', [GuruController::class, 'siswaUpdate'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [GuruController::class, 'siswaDestroy'])->name('siswa.destroy');

    // Pembuatan Akun
    Route::get('/buat-akun', [GuruController::class, 'buatAkunIndex'])->name('buat-akun');
    Route::post('/buat-akun', [GuruController::class, 'buatAkunStore'])->name('buat-akun.store');

    // Lihat semua tugas & pengumpulan
    Route::get('/semua-tugas', [GuruController::class, 'tugasIndex'])->name('semua-tugas.index');
    Route::get('/semua-pengumpulan', [GuruController::class, 'pengumpulanIndex'])->name('semua-pengumpulan.index');
});

// ─── Siswa ───────────────────────────────────────────
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [TugasController::class, 'dashboardSiswa'])->name('dashboard');
    Route::get('/home', function () {
        return view('user.home');
    })->name('home');
    Route::get('/tugas', [TugasController::class, 'indexSiswa'])->name('tugas.index');

    Route::get('/tugas/{id}/kirim', [PengumpulanController::class, 'showKirim'])->name('tugas.kirim');
    Route::post('/tugas/{tugas}/kirim', [PengumpulanController::class, 'kirim'])->name('tugas.kirim.store');
});
