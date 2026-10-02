/* =====================================================
   app.js
   Berisi JavaScript GLOBAL yang dipakai di semua halaman.
   Untuk sekarang: fungsi buka/tutup menu di tampilan mobile.
   ===================================================== */

document.addEventListener('DOMContentLoaded', function () {
    var toggleBtn = document.getElementById('navToggle');
    var menu = document.querySelector('.navbar__menu');

    if (toggleBtn && menu) {
        toggleBtn.addEventListener('click', function () {
            // Menambah/menghapus class 'is-open' setiap tombol diklik
            menu.classList.toggle('is-open');
        });
    }
});
