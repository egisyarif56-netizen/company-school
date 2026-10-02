<?php

/**
 * CATATAN:
 * Ini BUKAN file yang berdiri sendiri. Ini cuplikan kode yang perlu
 * kamu TAMBAHKAN ke dalam file routes/web.php yang sudah ada di
 * project Laravel kamu.
 */

use App\Http\Controllers\HomeController;

// Tambahkan baris ini di routes/web.php
Route::get('/', [HomeController::class, 'index'])->name('home');
