<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman form Login Admin.
     */
    public function showLogin()
    {
        $namaSekolah = 'SMKN 4 KOTA BOGOR';

        return view('auth.login', compact('namaSekolah'));
    }

    /**
     * Memproses login admin.
     *
     * CATATAN PENTING UNTUK TUGAS KAMU:
     * Ini pakai sistem Auth BAWAAN Laravel (Auth::attempt), yang
     * otomatis mengecek ke tabel 'users' di database (tabel ini
     * sudah otomatis dibuat sejak awal lewat migration bawaan
     * Laravel: database/migrations/..._create_users_table.php).
     *
     * Supaya bisa login, kamu perlu punya 1 akun dulu di tabel users.
     * Cara termudah, jalankan di terminal (di folder project):
     *
     *   php artisan tinker
     *
     * lalu di dalam tinker, ketik:
     *
     *   \App\Models\User::create([
     *       'name' => 'Admin',
     *       'email' => 'admin@smkn4bogor.sch.id',
     *       'password' => bcrypt('admin123'),
     *   ]);
     *
     * Setelah itu, login pakai email 'admin@smkn4bogor.sch.id'
     * dan password 'admin123' di kolom Username.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $ingatSaya = $request->boolean('ingat_saya');

        
        $berhasilLogin = Auth::attempt([
            'email' => $credentials['username'],
            'password' => $credentials['password'],
        ], $ingatSaya);

        if (! $berhasilLogin) {
            return back()
                ->withErrors(['login' => 'Username atau password yang Anda masukkan salah.'])
                ->onlyInput('username');
        }

        $request->session()->regenerate();

        
        return redirect()->route('home')->with('sukses', 'Berhasil login sebagai admin.');
    }

    /**
     * Logout admin.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
