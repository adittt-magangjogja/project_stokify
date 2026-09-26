@extends('layouts.dashboard')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Laporan
                </h1>

                <p class="text-gray-500 dark:text-gray-400 mt-1">
                    Lihat dan kelola laporan persediaan barang.
                </p>
            </div>

            <button
                type="button"
                class="mt-4 md:mt-0 text-white bg-green-600 hover:bg-green-700
                focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm
                px-5 py-2.5">
                Export Laporan
            </button>
        </div>

        {{-- Filter Laporan --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-6">

            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Filter Laporan
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Jenis Laporan --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Jenis Laporan
                    </label>

                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option selected>Semua Laporan</option>
                        <option>Laporan Stok</option>
                        <option>Laporan Stok Masuk</option>
                        <option>Laporan Stok Keluar</option>
                        <option>Laporan Stock Opname</option>

                    </select>
                </div>

                {{-- Dari Tanggal --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Dari Tanggal
                    </label>

                    <input
                        type="date"
                        value="2026-09-01"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                {{-- Sampai Tanggal --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Sampai Tanggal
                    </label>

                    <input
                        type="date"
                        value="2026-09-25"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

            </div>

            <div class="mt-4">
                <button
                    type="button"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4
                    focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Tampilkan Laporan
                </button>
            </div>

        </div>

        {{-- Ringkasan --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">

            {{-- Total Produk --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Produk
                </p>

                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
                    125
                </h3>
            </div>

            {{-- Total Stok Masuk --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Stok Masuk
                </p>

                <h3 class="text-2xl font-bold text-green-600 mt-2">
                    +350
                </h3>
            </div>

            {{-- Total Stok Keluar --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Stok Keluar
                </p>

                <h3 class="text-2xl font-bold text-red-600 mt-2">
                    -125
                </h3>
            </div>

        </div>

        {{-- Tabel Laporan --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">

            <div class="p-5 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ringkasan Persediaan
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Data persediaan produk berdasarkan periode yang dipilih.
                </p>
            </div>

            <div class="relative overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-100
                        dark:bg-gray-700 dark:text-gray-400">

                        <tr>
                            <th class="px-6 py-3">
                                No
                            </th>

                            <th class="px-6 py-3">
                                Kode Produk
                            </th>

                            <th class="px-6 py-3">
                                Produk
                            </th>

                            <th class="px-6 py-3">
                                Kategori
                            </th>

                            <th class="px-6 py-3">
                                Stok Awal
                            </th>

                            <th class="px-6 py-3">
                                Stok Masuk
                            </th>

                            <th class="px-6 py-3">
                                Stok Keluar
                            </th>

                            <th class="px-6 py-3">
                                Stok Akhir
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        {{-- Produk 1 --}}
                        <tr class="bg-white border-b dark:bg-gray-800
                        dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                1
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                PRD001
                            </td>

                            <td class="px-6 py-4">
                                Laptop ASUS
                            </td>

                            <td class="px-6 py-4">
                                Elektronik
                            </td>

                            <td class="px-6 py-4">
                                20
                            </td>

                            <td class="px-6 py-4 text-green-600 font-semibold">
                                +10
                            </td>

                            <td class="px-6 py-4 text-red-600 font-semibold">
                                -5
                            </td>

                            <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                                25
                            </td>

                        </tr>

                        {{-- Produk 2 --}}
                        <tr class="bg-white border-b dark:bg-gray-800
                        dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                2
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                PRD002
                            </td>

                            <td class="px-6 py-4">
                                Mouse Logitech
                            </td>

                            <td class="px-6 py-4">
                                Elektronik
                            </td>

                            <td class="px-6 py-4">
                                3
                            </td>

                            <td class="px-6 py-4 text-green-600 font-semibold">
                                +25
                            </td>

                            <td class="px-6 py-4 text-red-600 font-semibold">
                                -20
                            </td>

                            <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                                8
                            </td>

                        </tr>

                        {{-- Produk 3 --}}
                        <tr class="bg-white border-b dark:bg-gray-800
                        dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                3
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                PRD003
                            </td>

                            <td class="px-6 py-4">
                                Keyboard Mechanical
                            </td>

                            <td class="px-6 py-4">
                                ATK
                            </td>

                            <td class="px-6 py-4">
                                8
                            </td>

                            <td class="px-6 py-4 text-green-600 font-semibold">
                                +15
                            </td>

                            <td class="px-6 py-4 text-red-600 font-semibold">
                                -3
                            </td>

                            <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                                20
                            </td>

                        </tr>

                        {{-- Produk 4 --}}
                        <tr class="bg-white dark:bg-gray-800
                        hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">
                                4
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                PRD004
                            </td>

                            <td class="px-6 py-4">
                                Meja Kantor
                            </td>

                            <td class="px-6 py-4">
                                Furniture
                            </td>

                            <td class="px-6 py-4">
                                5
                            </td>

                            <td class="px-6 py-4 text-green-600 font-semibold">
                                +3
                            </td>

                            <td class="px-6 py-4 text-red-600 font-semibold">
                                -5
                            </td>

                            <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">
                                3
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Pagination --}}
        <div class="flex items-center justify-between mt-6">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan 1 sampai 4 dari 4 produk
            </span>

            <div class="inline-flex rounded-md shadow-sm">

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white
                    border border-gray-300 rounded-s-lg hover:bg-gray-100
                    dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Sebelumnya
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50
                    border-t border-b border-gray-300 dark:bg-gray-700
                    dark:border-gray-700">
                    1
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white
                    border border-gray-300 rounded-e-lg hover:bg-gray-100
                    dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Berikutnya
                </button>

            </div>

        </div>

    </div>
</div>

@endsection