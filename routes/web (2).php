<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua halaman utama sudah lengkap: Home, Profil, Artikel,
| Galeri, Kontak, Produk, dan Login Admin.
*/

// Halaman Home / Beranda
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Profil Sekolah
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

// Halaman Artikel Sekolah (daftar artikel + filter kategori + pencarian)
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

// Halaman Galeri Sekolah (grid foto + filter kategori)
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

// Halaman Kontak (tampilan + proses form kirim pesan)
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kontak/kirim', [KontakController::class, 'kirim'])->name('kontak.kirim');

// Halaman Produk Sekolah (filter kategori + pencarian)
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

// Login & Logout Admin
Route::get('/login-admin', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login-admin', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout-admin', [AuthController::class, 'logout'])->name('logout');
