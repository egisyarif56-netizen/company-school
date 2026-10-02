@extends('layouts.auth.login')

@section('title', 'Login')

@section('content')
<style>
    .auth-body {
        background: linear-gradient(180deg, #f5f7fa 0%, #eef1f5 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    .login-wrapper {
        width: 100%;
        max-width: 400px;
        margin: 60px auto;
        text-align: center;
    }

    .login-logo {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .login-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .login-title {
        color: #1e3a8a;
        font-size: 26px;
        font-weight: 700;
        margin: 0 0 4px 0;
    }

    .login-subtitle {
        color: #4b5563;
        font-size: 14px;
        letter-spacing: 0.5px;
        margin-bottom: 24px;
    }

    .login-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        text-align: left;
        overflow: hidden;
    }

    .login-card-body {
        padding: 32px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 6px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper .icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        display: flex;
        align-items: center;
    }

    .input-wrapper input {
        width: 100%;
        padding: 10px 12px 10px 38px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
        outline: none;
        transition: border-color 0.15s;
    }

    .input-wrapper input:focus {
        border-color: #1e3a8a;
    }

    .input-wrapper .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #6b7280;
        background: none;
        border: none;
        display: flex;
        align-items: center;
        padding: 0;
    }

    .form-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .form-row label {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #374151;
        cursor: pointer;
    }

    .form-row a {
        color: #1e3a8a;
        text-decoration: none;
        font-weight: 500;
    }

    .form-row a:hover {
        text-decoration: underline;
    }

    .btn-login {
        width: 100%;
        background: #1e3a8a;
        color: #fff;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: background 0.15s;
    }

    .btn-login:hover {
        background: #16306e;
    }

    .login-card-footer {
        background: #f9fafb;
        text-align: center;
        padding: 14px;
        font-size: 14px;
        color: #374151;
        border-top: 1px solid #eee;
    }

    .login-card-footer a {
        color: #1e3a8a;
        font-weight: 600;
        text-decoration: none;
    }

    .login-card-footer a:hover {
        text-decoration: underline;
    }

    .login-footer-note {
        text-align: center;
        margin-top: 20px;
        font-size: 13px;
        color: #6b7280;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 14px;
        margin-bottom: 16px;
    }
</style>

<div class="login-wrapper">
    <div class="login-logo">
        <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo Sekolah">
    </div>
    <h1 class="login-title">Login Admin</h1>
    <div class="login-subtitle">{{ $namaSekolah }}</div>

    <div class="login-card">
        <div class="login-card-body">

            @if ($errors->any())
                <div class="alert-error">
                    {{ $errors->first('login') ?: $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-6 8-6s8 2 8 6"/></svg>
                        </span>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="Masukkan username" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <span class="icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="10" width="16" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3"/></svg>
                        </button>
                    </div>
                </div>

                <div class="form-row">
                    <label>
                        <input type="checkbox" name="ingat_saya"> Ingat saya
                    </label>
                    <a href="#">Lupa Password?</a>
                </div>

                <button type="submit" class="btn-login">
                    Login
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </button>
            </form>

        </div>
        <div class="login-card-footer">
            Kembali ke <a href="{{ route('home') }}">Halaman Utama</a>
        </div>
    </div>

    <div class="login-footer-note">
        &copy; {{ date('Y') }} {{ $namaSekolah }} All rights reserved.
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
@endsection