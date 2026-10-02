{{--
    PARTIAL: NAVBAR
    Dipisah dari layout supaya file app.blade.php tidak terlalu panjang,
    dan kalau nanti navbar mau dipakai ulang di tempat lain, tinggal
    @include('partials.navbar') lagi.

    request()->routeIs('home') -> mengecek apakah route AKTIF saat ini
    namanya 'home'. Dipakai untuk kasih class "active" pada menu yang
    sedang dibuka (garis bawah kuning di desain).

    Catatan: route('profil'), route('artikel'), dst di bawah ini
    mengasumsikan kamu akan membuat route dengan nama tersebut di
    routes/web.php. Untuk sekarang saya arahkan ke route('home') / '#'
    dulu supaya tidak error kalau route-nya belum dibuat semua.
--}}
<nav class="navbar">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">SMKN 4 KOTA BOGOR</a>

        <div class="navbar-menu">
            <ul class="navbar-links">
                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Artikel</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Produk</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>

            <a href="#" class="btn btn-primary">LOGIN ADMIN</a>
        </div>

        <button type="button" class="navbar-toggle" aria-label="Buka menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>
