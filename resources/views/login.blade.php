<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Stockify</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md">

            {{-- Logo / Nama Aplikasi --}}
            <div class="text-center mb-8">

                <div class="flex justify-center mb-4">
                    <div class="flex items-center justify-center w-16 h-16
                    bg-blue-600 rounded-2xl shadow-lg">

                        <svg class="w-9 h-9 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 7.5 12 3 4 7.5m16 0v9L12 21l-8-4.5v-9m16 0L12 12m0 9v-9m0 0L4 7.5" />

                        </svg>

                    </div>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    Stockify
                </h1>

                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    Sistem Manajemen Stok Barang
                </p>

            </div>


            {{-- Card Login --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 sm:p-8">

                <div class="mb-6">

                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                        Selamat Datang
                    </h2>

                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Silakan masuk ke akun Anda
                    </p>

                </div>


                {{-- Form Login --}}
                <form action="#" method="POST">

                    @csrf

                    {{-- Email --}}
                    <div class="mb-5">

                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">

                            Email

                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="nama@email.com"
                            required

                            class="bg-gray-50 border border-gray-300
                            text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500
                            block w-full p-3
                            dark:bg-gray-700
                            dark:border-gray-600
                            dark:placeholder-gray-400
                            dark:text-white">

                    </div>


                    {{-- Password --}}
                    <div class="mb-5">

                        <div class="flex items-center justify-between mb-2">

                            <label
                                for="password"
                                class="text-sm font-medium text-gray-900 dark:text-white">

                                Password

                            </label>

                            <a
                                href="#"
                                class="text-sm text-blue-600 hover:underline
                                dark:text-blue-500">

                                Lupa password?

                            </a>

                        </div>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required

                            class="bg-gray-50 border border-gray-300
                            text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500
                            block w-full p-3
                            dark:bg-gray-700
                            dark:border-gray-600
                            dark:placeholder-gray-400
                            dark:text-white">

                    </div>


                    {{-- Remember Me --}}
                    <div class="flex items-center mb-6">

                        <input
                            id="remember"
                            type="checkbox"
                            class="w-4 h-4 text-blue-600
                            bg-gray-100 border-gray-300 rounded
                            focus:ring-blue-500
                            dark:focus:ring-blue-600
                            dark:ring-offset-gray-800
                            dark:bg-gray-700
                            dark:border-gray-600">

                        <label
                            for="remember"
                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">

                            Ingat saya

                        </label>

                    </div>


                    {{-- Button Login --}}
                    <button
                        type="submit"

                        class="w-full text-white bg-blue-600
                        hover:bg-blue-700 focus:ring-4
                        focus:ring-blue-300 font-medium
                        rounded-lg text-sm px-5 py-3
                        text-center
                        dark:bg-blue-600
                        dark:hover:bg-blue-700
                        dark:focus:ring-blue-800">

                        Masuk

                    </button>

                </form>


                {{-- Register --}}
                <div class="text-center mt-6">

                    <p class="text-sm text-gray-500 dark:text-gray-400">

                        Belum punya akun?

                        <a
                            href="/register"
                            class="font-medium text-blue-600 hover:underline
                            dark:text-blue-500">

                            Daftar sekarang

                        </a>

                    </p>

                </div>

            </div>


            {{-- Footer --}}
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">

                © 2026 Stockify. All rights reserved.

            </p>

        </div>

    </div>

</body>

</html>