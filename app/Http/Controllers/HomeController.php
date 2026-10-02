<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Data kartu statistik
        $stats = [
            [
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3Zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3Zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5Zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5Z"/></svg>',
                'number' => '1.160',
                'label' => 'SISWA AKTIF',
            ],
            [
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2H6v2H2v5c0 2.21 1.79 4 4 4h.29c.55 1.72 2.15 3 4.21 3.44V19H7v2h10v-2h-3.5v-2.56c2.06-.44 3.66-1.72 4.21-3.44H18c2.21 0 4-1.79 4-4V4h-4V2ZM4 9V6h2v5.83A2 2 0 0 1 4 9Zm16 0a2 2 0 0 1-2 2.83V6h2v3Z"/></svg>',
                'number' => '100+',
                'label' => 'PRESTASI',
            ],
            [
                'icon' => '<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 1 8l11 6 9-4.91V17h2V8L12 2Zm0 12.5-7-3.82V13c0 2.76 3.13 5 7 5s7-2.24 7-5v-2.32l-7 3.82Z"/></svg>',
                'number' => '4',
                'label' => 'JURUSAN',
            ],
        ];

        // Data artikel
        $articles = [
            [
                'image' => 'images/mpls.jpeg',
                'date' => '2 JULI 2026',
                'title' => 'Kegiatan MPLS Tahun 2026',
                'excerpt' => 'Masa Pengenalan Lingkungan Sekolah (MPLS) tahun ini berjalan dengan
lancar dan penuh semangat.…',
            ],
            [
                'image' => 'images/prestasi.jpeg',
                'date' => '5 Mei 2025',
                'title' => 'Siswa Berprestasi di Pramuka',
                'excerpt' => 'Prestasi membanggakan kembali diukir oleh siswa SMKN 4 KOTA BOGOR tim sekolah berhasil membawa pulang tiga medali emas sekaligus, membuktikan kualitas…',
            ],
            [
                'image' => 'images/kunjungan.jpeg',
                'date' => '15 Juli 2024',
                'title' => 'Kunjungan Industri',
                'excerpt' => 'Kunjungan Industri ...',
            ],
        ];

        // Data galeri
        $galleries = [
            'images/nari.jpeg',
            'images/upacara.jpeg',
            'images/sup.jpeg',
            'images/kurban.jpeg',
        ];

        // Data produk
        $products = [
            [
                'image' => 'images/seragamsekolahkomplit.jpeg',
                'name' => 'Seragam Sekolah Komplit',
                'description' => 'Bahan berkualitas premium dengan logo bordir',
                'price' => 1000000,
            ],
            [
                'image' => 'images/topi-dasi.jpeg',
                'name' => 'Topi - Dasi',
                'description' => 'Bahan berkualitas premium dengan logo bordir',
                'price' => 100000,
            ],
        ];

        return view('home', compact(
            'stats',
            'articles',
            'galleries',
            'products'
        ));
    }
}   