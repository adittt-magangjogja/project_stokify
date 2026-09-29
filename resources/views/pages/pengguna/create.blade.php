@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Tambah Pengguna
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Tambahkan pengguna baru ke dalam sistem Stockify.
        </p>
    </div>

    {{-- Form --}}
    <div class="max-w-3xl bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <form class="p-6">

            @csrf

            <div class="grid gap-5 md:grid-cols-2">

                {{-- Nama --}}
                <div class="md:col-span-2">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama lengkap"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    @error('name')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Email --}}
                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    @error('email')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Role --}}
                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Role
                    </label>

                    <select
                        name="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option value="">Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="staff">Staff</option>

                    </select>

                    @error('role')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Password --}}
                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    @error('password')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Konfirmasi Password --}}
                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Konfirmasi Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                </div>

                {{-- Status --}}
                <div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>

                    <select
                        name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option value="active">Aktif</option>
                        <option value="inactive">Nonaktif</option>

                    </select>

                </div>

            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 mt-6">

                <a href="#"
                   class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    Batal
                </a>

                <button
                    type="button"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Simpan Pengguna
                </button>

            </div>

        </form>

    </div>

</div>

@endsection