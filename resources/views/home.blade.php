{{--
    HALAMAN: HOME
    @extends -> pakai kerangka dari layouts/app.blade.php
    @section('content') -> ini akan mengisi @yield('content') di layout

    Semua data ($stats, $articles, $galleries, $products) DIKIRIM dari
    HomeController@index lewat compact(), bukan ditulis manual di sini.
    Blade view sebaiknya cuma urusan TAMPILAN, bukan tempat naruh data.
--}}
@extends('layouts.app')

@section('title', 'Home - SMKN 4 KOTA BOGOR')

{{-- CSS khusus halaman Home saja --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

    {{-- ============ HERO SECTION ============ --}}
    <section class="hero" style="--hero-image: url('{{ asset('images/lapang.jpeg') }}')">
        <div class="container">
            <div class="hero-content">
                <h1>Mewujudkan Generasi Berprestasi dan Berkarakter</h1>
                <p>
                    Sekolah yang berkomitmen untuk memberikan pendidikan berkualitas dan
                    mencetak generasi yang siap bersaing di masa depan melalui program
                    unggulan dan bimbingan karakter yang kuat.
                </p>
                <div class="hero-actions">
                    <a href="#" class="btn btn-primary">Lihat Profil</a>
                    <a href="#" class="btn btn-outline">Artikel Terbaru</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ KARTU STATISTIK ============
         Menimpa bagian bawah hero (lihat margin-top negatif di home.css).
         Data $stats berbentuk array asosiatif dari controller. --}}
    <section class="stats-card">
        <div class="container">
            @foreach ($stats as $stat)
                <div class="stat-item">
                    <div class="stat-icon">{!! $stat['icon'] !!}</div>
                    <div class="stat-number">{{ $stat['number'] }}</div>
                    <div class="stat-label">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============ ARTIKEL TERBARU ============ --}}
    <section class="section section-bg-light">
        <div class="container">
            <div class="section-head">
                <div>
                    <h2>Artikel Terbaru</h2>
                    <p>Berita dan informasi terkini dari lingkungan sekolah</p>
                </div>
                <a href="#" class="section-link">
                    Lihat Semua
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M13 6l6 6-6 6"/>
                    </svg>
                </a>
            </div>

            <div class="article-grid">
                @foreach ($articles as $article)
                    <article class="article-card">
                        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="article-thumb">
                        <div class="article-body">
                            <div class="article-date">{{ $article['date'] }}</div>
                            <h3>{{ $article['title'] }}</h3>
                            <p>{{ $article['excerpt'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ GALERI TERBARU & PRODUK UNGGULAN ============ --}}
    <section class="section">
        <div class="container gallery-product-grid">

            {{-- Kolom kiri: Galeri --}}
            <div>
                <div class="section-head">
                    <h2 style="margin:0">Galeri Terbaru</h2>
                    <a href="#" class="section-link">Lihat Semua</a>
                </div>
                <div class="gallery-grid">
                    @foreach ($galleries as $photo)
                        <img src="{{ $photo }}" alt="Galeri sekolah">
                    @endforeach
                </div>
            </div>

            {{-- Kolom kanan: Produk Unggulan --}}
            <div>
                <div class="section-head">
                    <h2 style="margin:0">Produk Unggulan</h2>
                    <a href="#" class="section-link">Semua Produk</a>
                </div>
                <div class="product-list">
                    @foreach ($products as $product)
                        <div class="product-card">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-thumb">
                            <div class="product-info">
                                <h3>{{ $product['name'] }}</h3>
                                <p>{{ $product['description'] }}</p>
                                <div class="product-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                            </div>
                            <button type="button" class="product-cart-btn" aria-label="Tambah ke keranjang">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"/>
                                    <circle cx="20" cy="21" r="1"/>
                                    <path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
