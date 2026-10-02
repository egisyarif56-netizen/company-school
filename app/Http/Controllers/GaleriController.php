<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class GaleriController extends Controller
{
    /**
     
     */
    public function index(Request $request)
    {
        $namaSekolah = 'SMKN 4 KOTA BOGOR';
 
        $kategoriList = [
            ['nama' => 'Semua', 'slug' => 'semua'],
            ['nama' => 'Akademik', 'slug' => 'akademik'],
            ['nama' => 'Ekstrakulikuler', 'slug' => 'ekstrakulikuler'],
            ['nama' => 'Event', 'slug' => 'event'],
        ];
 
        $kategoriAktif = $request->query('kategori', 'semua');
 
        // ============ FOTO KATEGORI: EVENT ============ 
        $fotoAkademik = [
            ['judul' => 'Acara Neospragma', 'gambar' => 'neos.jpeg'],
            ['judul' => 'Kegiatan Suporter', 'gambar' => 'super.jpeg'],
        ];
 
        // ============ FOTO KATEGORI: EKSTRAKULIKULER ============
        $fotoEkstrakulikuler = [
            ['judul' => 'Acara Neospragma', 'gambar' => 'neos.jpeg'],
            ['judul' => 'Kegiatan Suporter', 'gambar' => 'super.jpeg'],
        ];
 
        // ============ FOTO KATEGORI: EVENT ============
        $fotoEvent = [
            ['judul' => 'Upacara Kemerdekaan', 'gambar' => 'super.jpeg'],
            ['judul' => 'Lebaran Qurban', 'gambar' => 'kurba.jpeg'],
        ];
 
        
        // ------------------------------------------------------------
        $semuaFoto = array_merge(
            $this->lengkapiKategori($fotoAkademik, 'Akademik', 'akademik'),
            $this->lengkapiKategori($fotoEkstrakulikuler, 'Ekstrakulikuler', 'ekstrakulikuler'),
            $this->lengkapiKategori($fotoEvent, 'Event', 'event'),
        );
 
        $fotoList = $kategoriAktif === 'semua'
            ? $semuaFoto
            : array_values(array_filter($semuaFoto, fn ($f) => $f['kategori_slug'] === $kategoriAktif));
 
        return view('galeri', compact('namaSekolah', 'kategoriList', 'kategoriAktif', 'fotoList'));
    }
 
    /**
     
     */
    private function lengkapiKategori(array $daftarFoto, string $namaKategori, string $slugKategori): array
    {
        return array_map(function ($foto) use ($namaKategori, $slugKategori) {
            $foto['kategori'] = $namaKategori;
            $foto['kategori_slug'] = $slugKategori;
            return $foto;
        }, $daftarFoto);
    }
}
