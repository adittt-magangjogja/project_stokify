<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#2055a0">
    <title>Masuk · Stockify</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="login-screen">
    <main class="login-frame">
        <section class="login-visual" aria-label="Stockify">
            <div class="login-brand-lockup">
                <span class="stockify-mark stockify-mark-large" aria-hidden="true">
                    <svg viewBox="0 0 48 48" fill="none"><path d="m24 3 12 7-12 7-12-7 12-7Z" fill="#60A5FA"/><path d="m12 10 12 7v14l-12-7V10Z" fill="#3B82F6"/><path d="m36 10-12 7v14l12-7V10Z" fill="#2563EB"/><path d="m12 26 12 7-12 7-12-7 12-7Z" fill="#93C5FD"/><path d="m0 33 12 7v5L0 38v-5Z" fill="#60A5FA"/><path d="m24 33-12 7v5l12-7v-5Z" fill="#3B82F6"/><path d="m36 26 12 7-12 7-12-7 12-7Z" fill="#BFDBFE"/><path d="m24 33 12 7v5l-12-7v-5Z" fill="#60A5FA"/><path d="m48 33-12 7v5l12-7v-5Z" fill="#2563EB"/></svg>
                </span>
                <span class="login-brand-name">Stockify</span>
                <span class="login-brand-tagline">Sistem Manajemen Stok Barang</span>
            </div>
            <span class="login-visual-accent" aria-hidden="true"></span>
        </section>

        <section class="login-panel">
            <div class="login-form-wrap">
                <div class="login-mobile-brand" aria-hidden="true">
                    <span class="stockify-mark"><svg viewBox="0 0 48 48" fill="none"><path d="m24 3 12 7-12 7-12-7 12-7Z" fill="#60A5FA"/><path d="m12 10 12 7v14l-12-7V10Z" fill="#3B82F6"/><path d="m36 10-12 7v14l12-7V10Z" fill="#2563EB"/><path d="m12 26 12 7-12 7-12-7 12-7Z" fill="#93C5FD"/><path d="m0 33 12 7v5L0 38v-5Z" fill="#60A5FA"/><path d="m24 33-12 7v5l12-7v-5Z" fill="#3B82F6"/><path d="m36 26 12 7-12 7-12-7 12-7Z" fill="#BFDBFE"/><path d="m24 33 12 7v5l-12-7v-5Z" fill="#60A5FA"/><path d="m48 33-12 7v5l12-7v-5Z" fill="#2563EB"/></svg></span>
                    <strong>Stockify</strong>
                </div>
                <span class="login-eyebrow">SELAMAT DATANG KEMBALI</span>
                <h1>Masuk ke akun Anda</h1>
                <p class="login-intro">Silakan login untuk melanjutkan ke sistem Stockify.</p>

                @if($errors->any())
                    <div class="login-alert" role="alert">{{ $errors->first() }}</div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="login-form">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" autocomplete="username" required autofocus>

                    <label for="password">Kata sandi</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" autocomplete="current-password" required>

                    <div class="login-options">
                        <label class="login-remember"><input type="checkbox" name="remember" value="1"><span>Ingat saya</span></label>
                    </div>
                    <button type="submit" class="login-submit">Masuk <span aria-hidden="true">→</span></button>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
