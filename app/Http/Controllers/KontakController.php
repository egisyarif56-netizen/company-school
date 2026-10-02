<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Menampilkan halaman Kontak.
     */
    public function index()
    {
        $namaSekolah = 'SMKN 4 KOTA BOGOR';
        $alamat = 'Jl. Raya Tajur Kp. Buntar, Muarasari, Bogor Selatan, Kota Bogor';
        $telepon = '+62 821 226 2442';
        $email = 'info@smkn4bogor.sch.id';
        $jamOperasional = [
            'senin_jumat' => '07.00 - 16.00 WIB',
            'sabtu' => '07.00 - 13.00 WIB',
            'minggu' => 'Tutup',
        ];

        return view('kontak', compact('namaSekolah', 'alamat', 'telepon', 'email', 'jamOperasional'));
    }

    /**
     */
    public function kirim(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string|max:1000',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'pesan.required' => 'Pesan tidak boleh kosong.',
        ]);

    
        logger()->info('Pesan baru dari halaman Kontak', $validated);

        return redirect()
            ->route('kontak')
            ->with('sukses', 'Terima kasih! Pesan Anda sudah kami terima dan akan segera kami tindak lanjuti.');
    }
}
