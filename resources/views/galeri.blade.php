{{-- ============================================================
     resources/views/galeri.blade.php
     Halaman Galeri Sekolah dengan filter kategori.

     CATATAN: pada desain Figma yang dikirim, area foto galerinya
     masih kosong (belum ada contoh foto), jadi saya buat struktur
     grid galeri standar (foto + overlay judul & kategori saat hover).
     Silakan kirim desain lanjutannya kalau area ini di Figma
     ternyata punya tampilan yang berbeda.
     ============================================================ --}}

@extends('layouts.app')

@section('title', 'Galeri Sekolah')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/galeri.css') }}">
@endpush

@section('content')

    {{-- ============ BANNER: BREADCRUMB + JUDUL ============ --}}
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>&gt;</span>
                Galeri
            </div>
            <h1>Galeri Sekolah</h1>
            <p>Dokumentasi kegiatan akademik, ekstrakurikuler, dan berbagai event
                yang berlangsung di {{ $namaSekolah }}</p>
        </div>
    </div>

    <div class="container galeri-section">

        {{-- ============ FILTER KATEGORI ============ --}}
        <div class="galeri-filter">
            @foreach ($kategoriList as $kat)
                <a href="{{ route('galeri', $kat['slug'] === 'semua' ? [] : ['kategori' => $kat['slug']]) }}"
                   class="{{ $kategoriAktif === $kat['slug'] ? 'active' : '' }}">
                    {{ $kat['nama'] }}
                </a>
            @endforeach
        </div>

        {{-- ============ GRID FOTO ============ --}}
        @if (count($fotoList) > 0)
            <div class="galeri-grid">
                @foreach ($fotoList as $foto)
                    <div class="galeri-item">
                        {{-- Simpan foto galeri di: public/images/galeri/ --}}
                        <img src="{{ asset('images/galeri/' . $foto['gambar']) }}" alt="{{ $foto['judul'] }}">
                        <div class="galeri-item__overlay">
                            <span class="galeri-item__category">{{ $foto['kategori'] }}</span>
                            <div class="galeri-item__caption">{{ $foto['judul'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="galeri-empty">Belum ada foto untuk kategori ini.</div>
        @endif

    </div>

@endsection
