<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     
     */
    public function index(Request $request)
    {
        $namaSekolah = 'SMKN 4 KOTA BOGOR';

        $kategoriList = [
            ['nama' => 'Semua', 'slug' => 'semua'],
            ['nama' => 'Seragam', 'slug' => 'seragam'],
            ['nama' => 'Aksesoris', 'slug' => 'aksesoris'],
        ];

        $kategoriAktif = $request->query('kategori', 'semua');
        $kataKunci = trim((string) $request->query('cari', ''));

        // ============ PRODUK KATEGORI: SERAGAM ============
        $produkSeragam = [
            ['nama' => 'Seragam Sekolah', 'harga' => 1000000, 'gambar' => 'seragam-sekolah.jpeg'],
        ];

        // ============ PRODUK KATEGORI: AKSESORIS ============
        $produkAksesoris = [
            ['nama' => 'Topi-Dasi', 'harga' => 100000, 'gambar' => 'topi-dasi.jpeg'],
        ];

        // ------------------------------------------------------------
        // ------------------------------------------------------------
        $semuaProduk = array_merge(
            $this->lengkapiKategori($produkSeragam, 'Pakaian', 'seragam'),
            $this->lengkapiKategori($produkAksesoris, 'Aksesoris', 'aksesoris'),
        );

        // Filter berdasarkan kategori yang dipilih
        if ($kategoriAktif !== 'semua') {
            $semuaProduk = array_filter($semuaProduk, fn ($p) => $p['kategori_slug'] === $kategoriAktif);
        }

        // Filter berdasarkan kata kunci pencarian (kalau ada)
        if ($kataKunci !== '') {
            $semuaProduk = array_filter(
                $semuaProduk,
                fn ($p) => str_contains(strtolower($p['nama']), strtolower($kataKunci))
            );
        }

        $produkList = array_values($semuaProduk);

        return view('produk', compact('namaSekolah', 'kategoriList', 'kategoriAktif', 'produkList'));
    }

    /**
     * Helper kecil: menambahkan 'kategori' (label tampilan) & 'kategori_slug'
     * secara otomatis ke setiap produk dalam satu grup.
     */
    private function lengkapiKategori(array $daftarProduk, string $namaKategori, string $slugKategori): array
    {
        return array_map(function ($produk) use ($namaKategori, $slugKategori) {
            $produk['kategori'] = $namaKategori;
            $produk['kategori_slug'] = $slugKategori;
            return $produk;
        }, $daftarProduk);
    }
}
