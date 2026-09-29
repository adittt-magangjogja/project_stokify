<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - Stockify</title>

    {{-- Ganti baris ini dengan cara login.blade.php memuat Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex flex-col items-center justify-center px-4 py-8">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-gray-900">Buat Akun</h1>
        <p class="text-gray-500 mt-1 mb-6">Daftar untuk mulai menggunakan Stockify</p>

        @if ($errors->any())
            <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-700 text-sm p-3">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-900 mb-1">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    placeholder="Nama lengkap"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-gray-900 mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    placeholder="nama@email.com"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-900 mb-1">Password</label>
                <input type="password" id="password" name="password" required
                    placeholder="Minimal 8 karakter"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-900 mb-1">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    placeholder="Ulangi password"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit"
                class="w-full rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 transition">
                Daftar
            </button>
        </form>

        <p class="text-center text-gray-500 mt-6">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-blue-600 hover:underline">Masuk</a>
        </p>
    </div>

    <p class="text-sm text-gray-500 mt-6">© 2026 Stockify. All rights reserved.</p>
</body>
</html>