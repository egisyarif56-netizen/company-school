<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $namaSekolah = 'SMKN 4 KOTA BOGOR';

        $kategoriList = [
            ['nama' => 'Semua', 'slug' => 'semua'],
            ['nama' => 'Kegiatan Sekolah', 'slug' => 'kegiatan-sekolah'],
            ['nama' => 'Prestasi', 'slug' => 'prestasi'],
            ['nama' => 'Pengumuman', 'slug' => 'pengumuman'],
        ];

        // Kategori yang sedang aktif, default 'semua' kalau tidak ada di URL
        $kategoriAktif = $request->query('kategori', 'semua');

        $semuaArtikel = [
            [
                'judul' => 'Kegiatan MPLS Tahun 2026',
                'kategori' => 'Kegiatan Sekolah',
                'kategori_slug' => 'kegiatan-sekolah',
                'tanggal' => '2 Juli 2026',
                'ringkasan' => 'Masa Pengenalan Lingkungan Sekolah (MPLS) tahun ini berjalan dengan lancar dan penuh semangat….',
                'gambar' => 'mpls2.jpeg',
            ],
            [
                'judul' => 'Siswa Berprestasi di Pramuka',
                'kategori' => 'Prestasi',
                'kategori_slug' => 'prestasi',
                'tanggal' => '18 Mei 2025',
                'ringkasan' => 'Prestasi membanggakan kembali diukir oleh siswa SMKN 4 KOTA BOGOR, tim sekolah berhasil membawa pulang tiga medali emas sekaligus, membuktikan kualitas…',
                'gambar' => 'prestasi2.jpeg',
            ],
            [
                'judul' => 'Kunjungan Industri ke Yogyakarta',
                'kategori' => 'Kegiatan Sekolah',
                'kategori_slug' => 'kegiatan-sekolah',
                'tanggal' => '15 Mei 2024',
                'ringkasan' => 'Sebagai bagian dari kurikulum merdeka, siswa kelas 12 melakukan kunjungan industri ke UNIV AMIKOM yang ada di Yogyakarta. Kegiatan ini bertujuan untuk memberikan wawasan nyata kepada siswa …',
                'gambar' => 'kunjungan2.jpeg',
            ],
            [
                'judul' => 'Kelulusan Tahun 2025',
                'kategori' => 'Pengumuman',
                'kategori_slug' => 'pengumuman',
                'tanggal' => '10 Mei 2025',
                'ringkasan' => 'Selamat kepada seluruh siswa kelas 12 SMKN 4 KOTA BOGOR atas kelulusan 100% tahun ini.',
                'gambar' => 'kelulusan2.jpeg',
            ],
        ];

        // Filter artikel sesuai kategori yang dipilih (kalau bukan 'semua')
        $artikelList = $kategoriAktif === 'semua'
            ? $semuaArtikel
            : array_values(array_filter($semuaArtikel, fn ($a) => $a['kategori_slug'] === $kategoriAktif));

        return view('artikel', compact('namaSekolah', 'kategoriList', 'kategoriAktif', 'artikelList'));
    }
}