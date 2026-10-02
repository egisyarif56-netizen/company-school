{{--
    PARTIAL: FOOTER
    Sama seperti navbar, footer dipisah jadi partial sendiri.

    date('Y') -> otomatis menampilkan tahun berjalan, jadi tahun di
    "© 2026 ..." tidak perlu diganti manual tiap tahun.

    Icon-icon (lokasi, telepon, email, sosmed) saya buat pakai SVG
    inline langsung supaya file ini tidak butuh library icon dari luar
    (lebih ringan & gampang diganti warnanya lewat CSS).
--}}
<footer class="footer">
    <div class="container footer-grid">

        {{-- Kolom 1: Info sekolah + sosial media --}}
        <div>
            <h3 class="footer-title">SMKN 4 KOTA BOGOR</h3>
            <p class="footer-desc">
                Sekolah menengah kejuruan yang mencetak generasi profesional,
                berakhlak, dan berprestasi di tingkat internasional.
            </p>
            <div class="footer-social">
                <a href="#" aria-label="Instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="2" width="20" height="20" rx="5"/>
                        <circle cx="12" cy="12" r="4"/>
                        <circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/>
                    </svg>
                </a>
                <a href="#" aria-label="YouTube">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="5" width="20" height="14" rx="4"/>
                        <polygon points="10,9 16,12 10,15" fill="currentColor" stroke="none"/>
                    </svg>
                </a>
                <a href="#" aria-label="TikTok">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M16 3c.4 2.2 1.9 3.7 4 4v3c-1.4 0-2.8-.4-4-1.2v5.7A5.5 5.5 0 1 1 10.5 9c.3 0 .7 0 1 .1v3.1a2.5 2.5 0 1 0 1.8 2.4V3H16Z"/>
                    </svg>
                </a>
            </div>
        </div>

        {{-- Kolom 2: Daftar Jurusan --}}
        <div>
            <h4 class="footer-label">JURUSAN</h4>
            <ul class="footer-links">
                <li><a href="#">PPLG</a></li>
                <li><a href="#">TJKT</a></li>
                <li><a href="#">TPFL</a></li>
                <li><a href="#">TO</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Informasi kontak --}}
        <div>
            <h4 class="footer-label">INFORMASI</h4>
            <ul class="footer-contact">
                <li>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 21s-7-6.4-7-11a7 7 0 1 1 14 0c0 4.6-7 11-7 11Z"/>
                        <circle cx="12" cy="10" r="2.5"/>
                    </svg>
                    <span>Jl. Raya Tajur Kp. Buntar, Muarasari, Bogor Selatan, Kota Bogor</span>
                </li>
                <li>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3.1-8.7A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 2 .7 3a2 2 0 0 1-.5 2.1L8 10a16 16 0 0 0 6 6l1.2-1.3a2 2 0 0 1 2.1-.5c1 .3 2 .5 3 .7a2 2 0 0 1 1.7 2Z"/>
                    </svg>
                    <span>+62 821 226 2442</span>
                </li>
                <li>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="4" width="20" height="16" rx="2"/>
                        <path d="m2 6 10 7 10-7"/>
                    </svg>
                    <span>info@smkn4bogor.sch.id</span>
                </li>
            </ul>
        </div>

        {{-- Kolom 4: Jam operasional --}}
        <div>
            <h4 class="footer-label">JAM OPERASIONAL</h4>
            <ul class="footer-hours">
                <li>
                    <span class="day">Senin - Jumat:</span>
                    <span>07.00 - 16.00 WIB</span>
                </li>
                <li>
                    <span class="day">Sabtu:</span>
                    <span>07.00 - 13.00 WIB</span>
                </li>
                <li>
                    <span class="closed-label">Minggu:</span>
                    <span class="closed">Tutup</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; {{ date('Y') }} SMKN 4 Kota Bogor. Semua Hak Dilindungi.
    </div>
</footer>
