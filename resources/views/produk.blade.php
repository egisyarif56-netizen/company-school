{{-- ============================================================
     resources/views/produk.blade.php
     Halaman katalog Produk Sekolah dengan filter kategori + pencarian.
     ============================================================ --}}

@extends('layouts.app')

@section('title', 'Produk Sekolah')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/produk.css') }}">
@endpush

@section('content')

    {{-- ============ BANNER ============ --}}
    <div class="page-banner page-banner--dark">
        <div class="container">
            <div class="page-banner__breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>&gt;</span>
                Produk
            </div>
            <h1>Produk Sekolah</h1>
        </div>
    </div>

    <div class="container">

        {{-- ============ TOOLBAR: FILTER + PENCARIAN ============ --}}
        <div class="produk-toolbar">
            <div class="produk-filter">
                @foreach ($kategoriList as $kat)
                    <a href="{{ route('produk', array_filter(['kategori' => $kat['slug'] === 'semua' ? null : $kat['slug'], 'cari' => request('cari')])) }}"
                       class="{{ $kategoriAktif === $kat['slug'] ? 'active' : '' }}">
                        {{ $kat['nama'] }}
                    </a>
                @endforeach
            </div>

            <form action="{{ route('produk') }}" method="GET" class="produk-search">
                <svg width="16" height="16" viewBox="0 0 24 24"><path d="M10 4a6 6 0 1 0 3.8 10.6l4.8 4.8 1.4-1.4-4.8-4.8A6 6 0 0 0 10 4zm0 2a4 4 0 1 1 0 8 4 4 0 0 1 0-8z"/></svg>
                <input type="text" name="cari" placeholder="Cari produk..." value="{{ request('cari') }}">
                @if ($kategoriAktif !== 'semua')
                    <input type="hidden" name="kategori" value="{{ $kategoriAktif }}">
                @endif
            </form>
        </div>

        {{-- ============ GRID PRODUK ============ --}}
        @if (count($produkList) > 0)
            <div class="produk-grid">
                @foreach ($produkList as $produk)
                    <div class="produk-card">
                        <div class="produk-card__image">
                            {{-- Simpan foto produk di: public/images/produk/ --}}
                            <img src="{{ asset('images/produk/' . $produk['gambar']) }}" alt="{{ $produk['nama'] }}">
                        </div>
                        <div class="produk-card__body">
                            <div class="produk-card__category">{{ $produk['kategori'] }}</div>
                            <div class="produk-card__title">{{ $produk['nama'] }}</div>
                            <div class="produk-card__price">Rp {{ number_format($produk['harga'], 0, ',', '.') }}</div>
                            <a href="#" class="produk-card__btn">Lihat Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="produk-empty">Produk tidak ditemukan.</div>
        @endif

    </div>

@endsection
