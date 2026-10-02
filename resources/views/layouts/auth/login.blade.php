{{-- ============================================================
     resources/views/auth/login.blade.php
     Halaman Login Admin. Pakai layouts/auth.blade.php,
     BUKAN layouts/app.blade.php, karena tidak butuh navbar/footer.
     ============================================================ --}}

@extends('layouts.auth')

@section('title', 'Login Admin')

@section('content')
    <div class="auth-wrapper">

        {{-- Logo sekolah --}}
        <div class="auth-logo">
            {{-- Simpan logo sekolah di: public/images/logo-sekolah.png --}}
            <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo {{ $namaSekolah }}">
        </div>

        <div class="auth-title">Login Admin</div>
        <div class="auth-subtitle">{{ $namaSekolah }}</div>

        <div class="auth-card">
            <div class="auth-card__body">

                {{-- Pesan error kalau username/password salah --}}
                @if ($errors->has('login'))
                    <div class="auth-alert-error">{{ $errors->first('login') }}</div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="auth-form-group">
                        <label for="username">Username</label>
                        <div class="auth-input-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24"><path d="M12 12a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0 2c-4.4 0-8 2.2-8 5v1h16v-1c0-2.8-3.6-5-8-5z"/></svg>
                            <input type="text" id="username" name="username" placeholder="Masukkan username" value="{{ old('username') }}" autofocus>
                        </div>
                        @error('username') <small style="color:#c0392b;">{{ $message }}</small> @enderror
                    </div>

                    <div class="auth-form-group">
                        <label for="password">Password</label>
                        <div class="auth-input-wrap">
                            <svg width="18" height="18" viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="9" rx="2"/><path d="M8 11V8a4 4 0 0 1 8 0v3"/></svg>
                            <input type="password" id="password" name="password" placeholder="Masukkan password">
                            <button type="button" class="auth-toggle-password" id="togglePassword" aria-label="Tampilkan password">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                        @error('password') <small style="color:#c0392b;">{{ $message }}</small> @enderror
                    </div>

                    <div class="auth-form-row">
                        <label class="auth-remember">
                            <input type="checkbox" name="ingat_saya">
                            Ingat saya
                        </label>
                        <a href="#" class="auth-forgot">Lupa Password?</a>
                    </div>

                    <button type="submit" class="auth-submit-btn">
                        Login
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><path d="M10 17l5-5-5-5"/><path d="M15 12H3"/></svg>
                    </button>
                </form>
            </div>

            <div class="auth-card__footer">
                Kembali ke <a href="{{ route('home') }}">Halaman Utama</a>
            </div>
        </div>

        <div class="auth-copyright">&copy; {{ date('Y') }} {{ $namaSekolah }} All rights reserved.</div>
    </div>
@endsection

@push('scripts')
    <script>
        // Toggle tampil/sembunyi password saat ikon mata diklik
        document.getElementById('togglePassword').addEventListener('click', function () {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        });
    </script>
@endpush
