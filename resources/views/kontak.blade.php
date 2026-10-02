{{-- ============================================================
     resources/views/kontak.blade.php
     Halaman Kontak: peta lokasi, info kontak, form kirim pesan,
     dan banner ajakan kolaborasi.
     ============================================================ --}}

@extends('layouts.app')

@section('title', 'Kontak')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
@endpush

@section('content')

    {{-- ============ BANNER (versi gelap khusus Kontak) ============ --}}
    <div class="page-banner page-banner--dark">
        <div class="container">
            <div class="page-banner__breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>&gt;</span>
                Kontak
            </div>
            <h1>Kontak</h1>
        </div>
    </div>

    <div class="container">

        {{-- ============ PETA LOKASI ============
             Pakai Google Maps embed tanpa perlu API Key,
             cukup modal alamat sekolah lewat query pencarian. --}}
        <div class="kontak-map">
            <iframe
                src="https://www.google.com/maps?q={{ urlencode($alamat) }}&output=embed"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        {{-- ============ HUBUNGI KAMI + FORM ============ --}}
        <div class="kontak-grid">

            {{-- Kolom kiri: info kontak --}}
            <div class="kontak-info">
                <h2>Hubungi Kami</h2>
                <p>Kami selalu siap membantu dan mendengarkan aspirasi Anda. Silakan
                    hubungi kami melalui kanal informasi di bawah ini atau kunjungi
                    sekolah kami secara langsung.</p>

                <div class="kontak-info-item">
                    <div class="kontak-info-item__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24"><path d="M12 2C7.6 2 4 5.6 4 10c0 5.4 7 11.5 7.3 11.7a1 1 0 0 0 1.4 0C13 21.5 20 15.4 20 10c0-4.4-3.6-8-8-8zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                    </div>
                    <div>
                        <h4>Alamat</h4>
                        <p>{{ $alamat }}</p>
                    </div>
                </div>

                <div class="kontak-info-item">
                    <div class="kontak-info-item__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.7 3.6 5 6.4 6.4l2.1-2.1c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.5.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.5.1.4 0 .8-.2 1L6.6 10.8z"/></svg>
                    </div>
                    <div>
                        <h4>Telepon</h4>
                        <p>{{ $telepon }}</p>
                    </div>
                </div>

                <div class="kontak-info-item">
                    <div class="kontak-info-item__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24"><path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6zm2 0v.2l8 5.3 8-5.3V6H4zm16 2.4-7.4 4.9a1 1 0 0 1-1.1 0L4 8.4V18h16V8.4z"/></svg>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <p>{{ $email }}</p>
                    </div>
                </div>

                <div class="kontak-info-item">
                    <div class="kontak-info-item__icon">
                        <svg width="20" height="20" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>
                    </div>
                    <div>
                        <h4>Jam Operasional</h4>
                        <p>
                            Senin - Jumat: {{ $jamOperasional['senin_jumat'] }}<br>
                            Sabtu: {{ $jamOperasional['sabtu'] }}<br>
                            Minggu: {{ $jamOperasional['minggu'] }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Kolom kanan: form kirim pesan --}}
            <div class="kontak-form-card">
                <h2>Kirim Pesan</h2>

                {{-- Notifikasi sukses setelah form dikirim --}}
                @if (session('sukses'))
                    <div class="kontak-alert">{{ session('sukses') }}</div>
                @endif

                <form action="{{ route('kontak.kirim') }}" method="POST">
                    @csrf

                    <div class="kontak-form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" value="{{ old('nama') }}">
                        @error('nama') <small style="color:#c0392b;">{{ $message }}</small> @enderror
                    </div>

                    <div class="kontak-form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="alamat@email.com" value="{{ old('email') }}">
                        @error('email') <small style="color:#c0392b;">{{ $message }}</small> @enderror
                    </div>

                    <div class="kontak-form-group">
                        <label for="pesan">Pesan</label>
                        <textarea id="pesan" name="pesan" placeholder="Tuliskan pesan Anda di sini...">{{ old('pesan') }}</textarea>
                        @error('pesan') <small style="color:#c0392b;">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="kontak-submit-btn">
                        Kirim Pesan
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="#ffffff"><path d="M3 20l18-8L3 4v6l12 2-12 2z"/></svg>
                    </button>
                </form>
            </div>
        </div>

        {{-- ============ CTA: MARI BERKOLABORASI ============ --}}
        <div class="kontak-cta">
            {{-- Simpan foto gedung sekolah di: public/images/kontak/gedung-sekolah.jpg --}}
            <img src="{{ asset('images/kontak/gedung-sekolah.jpg') }}" alt="Gedung {{ $namaSekolah }}">
            <div class="kontak-cta__body">
                <h2>Mari Berkolaborasi</h2>
                <p>Kami menyambut baik setiap kolaborasi dari orang tua, alumni, dan institusi pendidikan
                    untuk memajukan generasi masa depan.</p>
            </div>
        </div>

    </div>

@endsection
