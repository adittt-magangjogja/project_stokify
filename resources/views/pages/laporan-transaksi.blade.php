@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Laporan Transaksi
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Laporan transaksi barang masuk dan barang keluar.
        </p>
    </div>

    {{-- Filter --}}
    <div class="mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-5">

            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                Filter Laporan
            </h2>

            <div class="grid gap-4 md:grid-cols-4">

                {{-- Jenis Transaksi --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Transaksi
                    </label>

                    <select
                        name="jenis_transaksi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option selected>Semua Transaksi</option>
                        <option>Stok Masuk</option>
                        <option>Stok Keluar</option>

                    </select>
                </div>

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

                {{-- Pencarian --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Cari Transaksi
                    </label>

                    <input
                        type="text"
                        name="search"
                        placeholder="Kode atau produk..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                </div>

            </div>

            {{-- Tombol Filter --}}
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

        {{-- Total Transaksi --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Total Transaksi
            </p>

            <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                6
            </h3>

        </div>

        {{-- Barang Masuk --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Barang Masuk
            </p>

            <h3 class="mt-2 text-2xl font-bold text-green-600">
                +50
            </h3>

        </div>

        {{-- Barang Keluar --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Barang Keluar
            </p>

            <h3 class="mt-2 text-2xl font-bold text-red-600">
                -18
            </h3>

        </div>

    </div>

    {{-- Tabel Transaksi --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        {{-- Header tabel --}}
        <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Data Transaksi
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Riwayat transaksi barang masuk dan keluar.
                </p>
            </div>

            {{-- Export --}}
            <button
                type="button"
                class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">

                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                        <th class="px-6 py-3">Kode Transaksi</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Jenis</th>
                        <th class="px-6 py-3">Produk</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Keterangan</th>
                    </tr>

                </thead>

                <tbody>

                    {{-- Transaksi 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">1</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            IN-001
                        </td>

                        <td class="px-6 py-4">
                            25-09-2026
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                Stok Masuk
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Laptop ASUS
                        </td>

                        <td class="px-6 py-4 font-semibold text-green-600">
                            +10
                        </td>

                        <td class="px-6 py-4">
                            PT Maju Jaya
                        </td>

                    </tr>

                    {{-- Transaksi 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">2</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            IN-002
                        </td>

                        <td class="px-6 py-4">
                            24-09-2026
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                Stok Masuk
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Mouse Logitech
                        </td>

                        <td class="px-6 py-4 font-semibold text-green-600">
                            +25
                        </td>

                        <td class="px-6 py-4">
                            CV Sumber Makmur
                        </td>

                    </tr>

                    {{-- Transaksi 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">3</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            IN-003
                        </td>

                        <td class="px-6 py-4">
                            23-09-2026
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                Stok Masuk
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Keyboard Mechanical
                        </td>

                        <td class="px-6 py-4 font-semibold text-green-600">
                            +15
                        </td>

                        <td class="px-6 py-4">
                            PT Teknologi Indonesia
                        </td>

                    </tr>

                    {{-- Transaksi 4 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">4</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            OUT-001
                        </td>

                        <td class="px-6 py-4">
                            25-09-2026
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-300">
                                Stok Keluar
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Laptop ASUS
                        </td>

                        <td class="px-6 py-4 font-semibold text-red-600">
                            -5
                        </td>

                        <td class="px-6 py-4">
                            Divisi IT
                        </td>

                    </tr>

                    {{-- Transaksi 5 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">5</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            OUT-002
                        </td>

                        <td class="px-6 py-4">
                            24-09-2026
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-300">
                                Stok Keluar
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Mouse Logitech
                        </td>

                        <td class="px-6 py-4 font-semibold text-red-600">
                            -10
                        </td>

                        <td class="px-6 py-4">
                            Divisi Marketing
                        </td>

                    </tr>

                    {{-- Transaksi 6 --}}
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">6</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            OUT-003
                        </td>

                        <td class="px-6 py-4">
                            23-09-2026
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-300">
                                Stok Keluar
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            Keyboard Mechanical
                        </td>

                        <td class="px-6 py-4 font-semibold text-red-600">
                            -3
                        </td>

                        <td class="px-6 py-4">
                            Divisi Keuangan
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
                <span class="font-semibold text-gray-900 dark:text-white">6</span>
                transaksi
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