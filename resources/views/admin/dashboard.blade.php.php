@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="admin-topbar">
        <div>
            <h1>Dashboard Overview</h1>
            <p>Selamat datang kembali, Admin.</p>
        </div>
        <div class="admin-topbar__right">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/>
            </svg>
            <div class="admin-topbar__date">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
                {{ now()->translatedFormat('d F Y') }}
            </div>
        </div>
    </div>

    {{-- ============ KARTU STATISTIK ============ --}}
    <div class="admin-stats-grid">
        @foreach ($stats as $stat)
            <div class="admin-stat-card admin-stat-card--{{ $stat['style'] }}">
                <span class="admin-stat-card__badge">{{ $stat['badge'] }}</span>
                <div class="admin-stat-card__icon">
                    @switch($stat['icon'])
                        @case('artikel')
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="3" width="16" height="18" rx="1"/><line x1="8" y1="8" x2="16" y2="8"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="8" y1="16" x2="12" y2="16"/></svg>
                            @break
                        @case('produk')
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2h12l1 5H5l1-5z"/><path d="M4 7h16l-1 13a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2L4 7z"/></svg>
                            @break
                        @case('galeri')
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="14" rx="2"/><circle cx="8" cy="10" r="1.5"/><path d="M21 15l-5-4-4 3-3-2-6 5"/></svg>
                            @break
                        @case('pengunjung')
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 17 9 11 13 15 21 7"/><polyline points="14 7 21 7 21 14"/></svg>
                            @break
                    @endswitch
                </div>
                <div class="admin-stat-card__number">{{ number_format($stat['jumlah'], 0, ',', '.') }}</div>
                <div class="admin-stat-card__label">{{ $stat['label'] }}</div>
            </div>
        @endforeach
    </div>

    {{-- ============ AKTIVITAS TERBARU ============ --}}
    <div class="admin-content-grid">
        <div></div>
        <div class="admin-card">
            <h2>Aktivitas Terbaru</h2>
            @foreach ($aktivitasTerbaru as $aktivitas)
                <div class="admin-activity-item {{ $aktivitas['tipe'] === 'warning' ? 'admin-activity-item--warning' : '' }}">
                    <div class="admin-activity-item__dot"></div>
                    <div>
                        <p class="admin-activity-item__title">{{ $aktivitas['judul'] }}</p>
                        <p class="admin-activity-item__desc">{{ $aktivitas['deskripsi'] }}</p>
                        <span class="admin-activity-item__time">{{ $aktivitas['waktu'] }}</span>
                    </div>
                </div>
            @endforeach
            <button type="button" class="admin-btn-outline">Lihat Semua Aktivitas</button>
        </div>
    </div>

@endsection
