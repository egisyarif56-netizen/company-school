<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman Dashboard Admin.
     *
     * CATATAN: Angka-angka statistik di bawah ini masih ditulis
     * manual (hardcode). Kalau nanti belajar Eloquent Model +
     * database, bagian ini bisa diganti jadi hitungan otomatis,
     * misalnya:
     *   'jumlah' => Artikel::count(),
     */
    public function index(Request $request)
    {
        $stats = [
            [
                'label' => 'Total Artikel',
                'jumlah' => 4,
                'badge' => '+2 baru',
                'style' => 'primary',
                'icon' => 'artikel',
            ],
            [
                'label' => 'Produk Sekolah',
                'jumlah' => 2,
                'badge' => 'Stok aman',
                'style' => 'default',
                'icon' => 'produk',
            ],
            [
                'label' => 'Foto Galeri',
                'jumlah' => 7,
                'badge' => '24 Album',
                'style' => 'default',
                'icon' => 'galeri',
            ],
            [
                'label' => 'Pengunjung',
                'jumlah' => 1250,
                'badge' => '+12%',
                'style' => 'dark',
                'icon' => 'pengunjung',
            ],
        ];

        $aktivitasTerbaru = [
            [
                'judul' => 'Artikel Baru Dipublikasi',
                'deskripsi' => '"Kegiatan MPLS Tahun 2024" baru saja tayang.',
                'waktu' => '2 jam yang lalu',
                'tipe' => 'normal',
            ],
            [
                'judul' => 'Update Produk',
                'deskripsi' => 'Stok "Aksesoris" telah diperbarui.',
                'waktu' => '5 jam yang lalu',
                'tipe' => 'warning',
            ],
            [
                'judul' => 'Galeri Foto',
                'deskripsi' => '5 foto baru ditambahkan ke album "Nebrazka".',
                'waktu' => 'Kemarin, 14:20',
                'tipe' => 'normal',
            ],
        ];

        return view('admin.dashboard', compact('stats', 'aktivitasTerbaru'));
    }
}
