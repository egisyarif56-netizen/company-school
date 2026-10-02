<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin SMKN 4 Kota Bogor</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body class="admin-body">

    <div class="admin-layout">

        {{-- ============ SIDEBAR ============ --}}
        <aside class="admin-sidebar">
            <div class="admin-sidebar__brand">
                <div class="admin-sidebar__brand-title">Admin Panel</div>
                <div class="admin-sidebar__brand-sub">SMKN 4 BOGOR</div>
            </div>

            <nav class="admin-sidebar__nav">
                <a href="{{ route('admin.dashboard') }}"
                   class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                    Dashboard
                </a>
                <a href="#" class="admin-nav-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="4" y="3" width="16" height="18" rx="1"/><line x1="8" y1="8" x2="16" y2="8"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="8" y1="16" x2="12" y2="16"/>
                    </svg>
                    Artikel
                </a>
                <a href="#" class="admin-nav-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M6 2h12l1 5H5l1-5z"/><path d="M4 7h16l-1 13a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 7z"/>
                    </svg>
                    Produk
                </a>
                <a href="#" class="admin-nav-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="14" rx="2"/><circle cx="8" cy="10" r="1.5"/><path d="M21 15l-5-4-4 3-3-2-6 5"/>
                    </svg>
                    Galeri
                </a>
            </nav>

            <div class="admin-sidebar__footer">
                <div class="admin-user">
                    <div class="admin-user__avatar">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-6 8-6s8 2 8 6"/></svg>
                    </div>
                    <div>
                        <div class="admin-user__name">Admin Utama</div>
                        <div class="admin-user__role">Super Admin</div>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="admin-logout-link">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- ============ KONTEN UTAMA ============ --}}
        <div class="admin-main">
            @yield('content')

            <footer class="admin-footer">
                &copy; {{ date('Y') }} SMKN 4 KOTA BOGOR. All rights reserved.
            </footer>
        </div>

    </div>

    @stack('scripts')
</body>
</html>
