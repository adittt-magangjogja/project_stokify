@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Laporan Aktivitas
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Lihat riwayat aktivitas pengguna dalam sistem Stockify.
        </p>
    </div>

    {{-- Filter --}}
    <div class="mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-5">

            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                Filter Aktivitas
            </h2>

            <div class="grid gap-4 md:grid-cols-4">

                {{-- Dari Tanggal --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Dari Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal_mulai"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                {{-- Sampai Tanggal --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Sampai Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal_selesai"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                {{-- Pengguna --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Pengguna
                    </label>

                    <select
                        name="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option selected>Semua Pengguna</option>
                        <option>Admin</option>
                        <option>Manager</option>
                        <option>Staff Gudang</option>

                    </select>
                </div>

                {{-- Jenis Aktivitas --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Aktivitas
                    </label>

                    <select
                        name="aktivitas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option selected>Semua Aktivitas</option>
                        <option>Login</option>
                        <option>Tambah Data</option>
                        <option>Edit Data</option>
                        <option>Hapus Data</option>
                        <option>Transaksi</option>

                    </select>
                </div>

            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 mt-5">

                <button
                    type="button"
                    class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    Reset
                </button>

                <button
                    type="button"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Tampilkan
                </button>

            </div>

        </div>

    </div>

    {{-- Ringkasan --}}
    <div class="grid gap-4 mb-6 sm:grid-cols-2 lg:grid-cols-3">

        {{-- Total Aktivitas --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Total Aktivitas
            </p>

            <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                8
            </h3>

        </div>

        {{-- Aktivitas Hari Ini --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Aktivitas Hari Ini
            </p>

            <h3 class="mt-2 text-2xl font-bold text-blue-600">
                3
            </h3>

        </div>

        {{-- Pengguna Aktif --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Pengguna Aktif
            </p>

            <h3 class="mt-2 text-2xl font-bold text-green-600">
                3
            </h3>

        </div>

    </div>

    {{-- Tabel Aktivitas --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        {{-- Header tabel --}}
        <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Riwayat Aktivitas
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Daftar aktivitas pengguna dalam sistem.
                </p>
            </div>

            {{-- Export --}}
            <button
                type="button"
                class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">

                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 10v6m0 0 3-3m-3 3-3-3m9 5H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h5l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2z">
                    </path>
                </svg>

                Export Excel
            </button>

        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Tanggal & Waktu</th>
                        <th class="px-6 py-3">Pengguna</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Aktivitas</th>
                        <th class="px-6 py-3">Keterangan</th>
                    </tr>

                </thead>

                <tbody>

                    {{-- Aktivitas 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">1</td>

                        <td class="px-6 py-4">
                            25-09-2026 08:15
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Admin
                        </td>

                        <td class="px-6 py-4">
                            Admin
                        </td>

                        <td class="px-6 py-4">
                            Login
                        </td>

                        <td class="px-6 py-4">
                            Pengguna berhasil masuk ke sistem
                        </td>

                    </tr>

                    {{-- Aktivitas 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">2</td>

                        <td class="px-6 py-4">
                            25-09-2026 09:10
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Admin
                        </td>

                        <td class="px-6 py-4">
                            Admin
                        </td>

                        <td class="px-6 py-4">
                            Tambah Data
                        </td>

                        <td class="px-6 py-4">
                            Menambahkan produk Laptop ASUS
                        </td>

                    </tr>

                    {{-- Aktivitas 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">3</td>

                        <td class="px-6 py-4">
                            25-09-2026 10:25
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Manager
                        </td>

                        <td class="px-6 py-4">
                            Manager
                        </td>

                        <td class="px-6 py-4">
                            Transaksi
                        </td>

                        <td class="px-6 py-4">
                            Melakukan pemeriksaan stok
                        </td>

                    </tr>

                    {{-- Aktivitas 4 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">4</td>

                        <td class="px-6 py-4">
                            25-09-2026 11:05
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Staff Gudang
                        </td>

                        <td class="px-6 py-4">
                            Staff
                        </td>

                        <td class="px-6 py-4">
                            Transaksi
                        </td>

                        <td class="px-6 py-4">
                            Mencatat barang masuk
                        </td>

                    </tr>

                    {{-- Aktivitas 5 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">5</td>

                        <td class="px-6 py-4">
                            25-09-2026 11:30
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Staff Gudang
                        </td>

                        <td class="px-6 py-4">
                            Staff
                        </td>

                        <td class="px-6 py-4">
                            Transaksi
                        </td>

                        <td class="px-6 py-4">
                            Mencatat barang keluar
                        </td>

                    </tr>

                    {{-- Aktivitas 6 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">6</td>

                        <td class="px-6 py-4">
                            25-09-2026 12:10
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Admin
                        </td>

                        <td class="px-6 py-4">
                            Admin
                        </td>

                        <td class="px-6 py-4">
                            Edit Data
                        </td>

                        <td class="px-6 py-4">
                            Mengubah data supplier
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="flex flex-col items-center justify-between gap-4 p-5 md:flex-row">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan
                <span class="font-semibold text-gray-900 dark:text-white">1-6</span>
                dari
                <span class="font-semibold text-gray-900 dark:text-white">8</span>
                aktivitas
            </span>

            <div class="inline-flex">

                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                    Previous
                </button>

                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-white border-t border-b border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-blue-400">
                    1
                </button>

                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                    Next
                </button>

            </div>

        </div>

    </div>

</div>

@endsection