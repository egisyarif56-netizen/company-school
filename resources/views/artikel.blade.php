{{-- ============================================================
     resources/views/artikel.blade.php
     Halaman daftar Artikel Sekolah.
     ============================================================ --}}

@extends('layouts.app')

@section('title', 'Artikel Sekolah')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/artikel.css') }}">
@endpush

@section('content')

    {{-- ============ BANNER: BREADCRUMB + JUDUL ============ --}}
    <div class="page-banner">
        <div class="container">
            <div class="page-banner__breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>&gt;</span>
                Artikel
            </div>
            <h1>Artikel Sekolah</h1>
            <p>Ikuti perkembangan terbaru, prestasi siswa, dan berbagai kegiatan edukatif
                yang berlangsung di lingkungan {{ $namaSekolah }}</p>
        </div>
    </div>

    <div class="container artikel-layout">

        {{-- ============ SIDEBAR ============ --}}
        <aside>
            {{-- Kotak Cari Artikel --}}
            <div class="artikel-search-box">
                <h3>Cari Artikel</h3>
                <form action="{{ route('artikel') }}" method="GET" class="artikel-search-box__input">
                    <svg width="16" height="16" viewBox="0 0 24 24"><path d="M10 4a6 6 0 1 0 3.8 10.6l4.8 4.8 1.4-1.4-4.8-4.8A6 6 0 0 0 10 4zm0 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></svg>
                    <input type="text" name="cari" placeholder="Masukkan kata kunci..." value="{{ request('cari') }}">
                </form>
            </div>

            {{-- Kotak Kategori --}}
            <div class="artikel-kategori-box">
                <h3>Kategori</h3>
                <ul class="artikel-kategori-list">
                    @foreach ($kategoriList as $kat)
                        <li>
                            <a href="{{ route('artikel', ['kategori' => $kat['slug']]) }}"
                               class="{{ $kategoriAktif === $kat['slug'] ? 'active' : '' }}">
                                {{ $kat['nama'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        {{-- ============ DAFTAR ARTIKEL ============ --}}
        <div class="artikel-list">
            @foreach ($artikelList as $artikel)
                <article class="artikel-card">
                    <div class="artikel-card__image">
                        {{-- Simpan gambar artikel di: public/images/artikel/ --}}
                        <img src="{{ asset('images/artikel/' . $artikel['gambar']) }}" alt="{{ $artikel['judul'] }}">
                    </div>
                    <div class="artikel-card__body">
                        <div class="artikel-card__meta">
                            <span class="artikel-badge">{{ $artikel['kategori'] }}</span>
                            <span class="artikel-card__date">
                                <svg width="14" height="14" viewBox="0 0 24 24"><path d="M7 2v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2H7zM5 10h14v10H5V10z"/></svg>
                                {{ $artikel['tanggal'] }}
                            </span>
                        </div>
                        <h2 class="artikel-card__title">{{ $artikel['judul'] }}</h2>
                        <p class="artikel-card__excerpt">{{ $artikel['ringkasan'] }}</p>
                        <a href="#" class="artikel-card__link">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

    </div>

@endsection
