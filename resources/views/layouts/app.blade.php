<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Judul tab browser, tiap halaman bisa override bagian 'title' ini --}}
    <title>@yield('title', 'SMKN 4 Kota') - Company Profile</title>

    {{-- CSS global, dipakai di semua halaman --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Slot tambahan kalau ada halaman yang butuh CSS khusus,
         contoh pemakaian di halaman anak: @push('styles') ... @endpush --}}
    @stack('styles')
</head>
<body>

    {{-- ============ NAVBAR ============ --}}
    <header class="navbar">
        <div class="navbar__logo">
            SMKN 4 KOTA BOGOR
        </div>

        <nav>
            <ul class="navbar__menu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profile</a></li>
                <li><a href="{{ route('artikel') }}" class="{{ request()->routeIs('artikel*') ? 'active' : '' }}">Artikel</a></li>
                <li><a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri') ? 'active' : '' }}">Galeri</a></li>
                <li><a href="{{ route('produk') }}" class="{{ request()->routeIs('produk') ? 'active' : '' }}">Produk</a></li>
                <li><a href="{{ route('kontak') }}" class="{{ request()->routeIs('kontak') ? 'active' : '' }}">Kontak</a></li>
            </ul>
        </nav>

        <div class="navbar__actions">
            <a href="{{ route('login') }}" class="btn btn--gold">Login Admin</a>

            {{-- Tombol hamburger, hanya muncul di layar kecil (diatur via CSS) --}}
            <button class="navbar__toggle" id="navToggle" aria-label="Buka menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    {{-- ============ KONTEN HALAMAN ============
         Setiap halaman (profil, beranda, dll) akan
         mengisi bagian ini lewat @section('content') --}}
    <main>
        @yield('content')
    </main>

    {{-- ============ FOOTER ============ --}}
    <footer class="footer">
        <div class="container">
            <div class="footer__grid">

                {{-- Kolom 1: Nama Sekolah + Deskripsi + Sosial Media --}}
                <div>
                    <h4 class="footer__title footer__title--brand">SMKN 4 KOTA BOGOR</h4>
                    <p class="footer__text">
                        Sekolah menengah kejuruan yang mencetak generasi profesional,
                        berakhlak, dan berprestasi di tingkat internasional.
                    </p>
                    <div class="footer__social">
                        <a href="#" aria-label="Instagram">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="#ffffff"><path d="M12 2c2.7 0 3.1 0 4.1.1 1.1 0 1.8.2 2.5.5.7.3 1.2.6 1.7 1.1.5.5.9 1.1 1.1 1.7.2.6.4 1.4.5 2.5v8.2c0 1.1-.2 1.8-.5 2.5-.3.7-.6 1.2-1.1 1.7-.5.5-1.1.9-1.7 1.1-.6.2-1.4.4-2.5.5H7.9c-1.1 0-1.8-.2-2.5-.5-.7-.3-1.2-.6-1.7-1.1-.5-.5-.9-1.1-1.1-1.7-.2-.6-.4-1.4-.5-2.5V7.9c0-1.1.2-1.8.5-2.5.3-.7.6-1.2 1.1-1.7.5-.5 1.1-.9 1.7-1.1.6-.2 1.4-.4 2.5-.5C8.9 2 9.3 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 8.2a3.2 3.2 0 1 1 0-6.4 3.2 3.2 0 0 1 0 6.4zm5.3-8.4a1.2 1.2 0 1 0 0-2.4 1.2 1.2 0 0 0 0 2.4z"/></svg>
                        </a>
                        <a href="#" aria-label="YouTube">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="#ffffff"><path d="M23 12s0-3.6-.5-5.3c-.3-1-1-1.7-2-2C18.9 4.2 12 4.2 12 4.2s-6.9 0-8.5.5c-1 .3-1.7 1-2 2C1 8.4 1 12 1 12s0 3.6.5 5.3c.3 1 1 1.7 2 2 1.6.5 8.5.5 8.5.5s6.9 0 8.5-.5c1-.3 1.7-1 2-2 .5-1.7.5-5.3.5-5.3zM9.7 15.3V8.7L15.8 12l-6.1 3.3z"/></svg>
                        </a>
                        <a href="#" aria-label="TikTok">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="#ffffff"><path d="M16.6 2h-3.2v13.6a2.8 2.8 0 1 1-2-2.7v-3.3a6.1 6.1 0 1 0 5.2 6V8.8a7.6 7.6 0 0 0 4.4 1.4V7a4.4 4.4 0 0 1-4.4-4.4V2z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Kolom 2: Navigasi --}}
                <div>
                    <h4 class="footer__title">Navigasi</h4>
                    <ul class="footer__links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('profil') }}">Profil</a></li>
                        <li><a href="{{ route('artikel') }}">Artikel</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri</a></li>
                    </ul>
                </div>

                {{-- Kolom 3: Informasi Kontak --}}
                <div>
                    <h4 class="footer__title">Informasi</h4>
                    <div class="footer__contact-item">
                        <svg width="16" height="16" viewBox="0 0 24 24"><path d="M12 2C7.6 2 4 5.6 4 10c0 5.4 7 11.5 7.3 11.7a1 1 0 0 0 1.4 0C13 21.5 20 15.4 20 10c0-4.4-3.6-8-8-8zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/></svg>
                        <span>Jl. Raya Tajur Kp. Buntar, Muarasari, Bogor Selatan, Kota Bogor</span>
                    </div>
                    <div class="footer__contact-item">
                        <svg width="16" height="16" viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.7 3.6 5 6.4 6.4l2.1-2.1c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.5.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1C10.6 21 3 13.4 3 4c0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.2.2 2.4.6 3.5.1.4 0 .8-.2 1L6.6 10.8z"/></svg>
                        <span>+62 821 226 2442</span>
                    </div>
                    <div class="footer__contact-item">
                        <svg width="16" height="16" viewBox="0 0 24 24"><path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6zm2 0v.2l8 5.3 8-5.3V6H4zm16 2.4-7.4 4.9a1 1 0 0 1-1.1 0L4 8.4V18h16V8.4z"/></svg>
                        <span>info@smkn4bogor.sch.id</span>
                    </div>
                </div>

                {{-- Kolom 3: Jam Operasional --}}
                <div>
                    <h4 class="footer__title">Jam Operasional</h4>
                    <div class="footer__jam-row">
                        <span>Senin - Jumat:</span>
                        <span>07.00 - 16.00 WIB</span>
                    </div>
                    <div class="footer__jam-row">
                        <span>Sabtu:</span>
                        <span>07.00 - 13.00 WIB</span>
                    </div>
                    <div class="footer__jam-row footer__jam-row--tutup">
                        <span>Minggu:</span>
                        <span>Tutup</span>
                    </div>
                </div>
            </div>

            <div class="footer__bottom">
                &copy; {{ date('Y') }} SMKN 4 Kota Bogor. Semua Hak Dilindungi.
            </div>
        </div>
    </footer>

    {{-- JS global --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Slot tambahan kalau ada halaman yang butuh JS khusus --}}
    @stack('scripts')
</body>
</html>
