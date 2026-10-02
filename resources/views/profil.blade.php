{{-- ============================================================
     resources/views/profil.blade.php
     Ini adalah HALAMAN, bukan layout. File ini "meminjam"
     kerangka HTML dari layouts/app.blade.php lewat @extends,
     lalu hanya mengisi bagian @section('content').
     ============================================================ --}}

@extends('layouts.app')

@section('title', 'Profil Sekolah')

{{-- CSS khusus halaman ini saja, tidak ikut dimuat di halaman lain --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
@endpush

@section('content')

    {{-- ============ BANNER JUDUL HALAMAN ============ --}}
    <div class="page-banner">
        <h1>Profil Sekolah</h1>
    </div>

    <div class="container profil-section">

        {{-- ============ SAMBUTAN KEPALA SEKOLAH ============ --}}
        <div class="sambutan-card">
            <div class="sambutan-card__photo">
                {{-- Ganti src ini dengan foto asli kepala sekolah.
                     Simpan foto di: public/images/kepala-sekolah.jpg --}}
                <img src="{{ asset('images/kepsk.jpeg') }}" alt="Foto {{ $kepalaSekolah['nama'] }}">
            </div>
            <div class="sambutan-card__body">
                <span class="sambutan-card__quote-icon">&ldquo;</span>
                <h3>Sambutan Kepala Sekolah</h3>
                <p>{{ $kepalaSekolah['sambutan'] }}</p>
                <div class="sambutan-card__name">{{ $kepalaSekolah['nama'] }}</div>
                <div class="sambutan-card__role">{{ $kepalaSekolah['jabatan'] }}</div>
            </div>
        </div>

        {{-- ============ SEJARAH SEKOLAH ============ --}}
        <span class="section-label">Tentang Kami</span>
        <h2 class="section-title">Sejarah Sekolah</h2>

        <div class="sejarah-grid">
            <div>
                @foreach ($sejarah['paragraf'] as $paragraf)
                    <p>{{ $paragraf }}</p>
                @endforeach
            </div>

            <div class="sejarah-grid__image">
                {{-- Ganti src ini dengan foto asli fasilitas/gedung sekolah.
                     Simpan foto di: public/images/sejarah-sekolah.jpg --}}
                <img src="{{ asset('images/pang.jpeg') }}" alt="Fasilitas {{ config('app.name') }}">
                <div class="sejarah-grid__caption">{{ $sejarah['caption_foto'] }}</div>
            </div>
        </div>

        {{-- ============ VISI & MISI ============ --}}
        <div class="visimisi-grid">
            {{-- Kotak Visi --}}
            <div class="visimisi-box visimisi-box--light">
                <div class="visimisi-box__icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="{{ '#1a4d8f' }}" stroke-width="2">
                        <circle cx="12" cy="12" r="9"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="12" cy="12" r="0.5" fill="#1a4d8f"/>
                    </svg>
                </div>
                <h4>Visi</h4>
                <p>{{ $visiMisi['visi'] }}</p>
            </div>

            {{-- Kotak Misi --}}
            <div class="visimisi-box visimisi-box--dark">
                <div class="visimisi-box__icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2">
                        <rect x="5" y="3" width="14" height="18" rx="2"/>
                        <line x1="8" y1="8" x2="16" y2="8"/>
                        <line x1="8" y1="12" x2="16" y2="12"/>
                        <line x1="8" y1="16" x2="12" y2="16"/>
                    </svg>
                </div>
                <h4>Misi</h4>
                <ul style="padding-left: 18px;">
                    @foreach ($visiMisi['misi'] as $poinMisi)
                        <li>{{ $poinMisi }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

@endsection
