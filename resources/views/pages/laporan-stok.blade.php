@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Laporan Stok
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Lihat dan pantau laporan persediaan produk Stockify.
        </p>
    </div>

    {{-- Filter --}}
    <div class="mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-5">

            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                Filter Laporan
            </h2>

            <div class="grid gap-4 md:grid-cols-3">

                {{-- Kategori --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kategori
                    </label>

                    <select
                        name="kategori"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option selected>Semua Kategori</option>
                        <option>Elektronik</option>
                        <option>ATK</option>
                        <option>Furniture</option>

                    </select>
                </div>

                {{-- Status Stok --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status Stok
                    </label>

                    <select
                        name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option selected>Semua Status</option>
                        <option>Tersedia</option>
                        <option>Stok Minimum</option>
                        <option>Stok Habis</option>

                    </select>
                </div>

                {{-- Pencarian --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Cari Produk
                    </label>

                    <input
                        type="text"
                        name="search"
                        placeholder="Cari kode atau nama produk..."
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
    <div class="grid gap-4 mb-6 sm:grid-cols-2 lg:grid-cols-4">

        {{-- Total Produk --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Total Produk
            </p>

            <h3 class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                4
            </h3>
        </div>

        {{-- Stok Tersedia --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Stok Tersedia
            </p>

            <h3 class="mt-2 text-2xl font-bold text-green-600">
                45
            </h3>
        </div>

        {{-- Stok Minimum --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Stok Minimum
            </p>

            <h3 class="mt-2 text-2xl font-bold text-yellow-600">
                2
            </h3>
        </div>

        {{-- Stok Habis --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Stok Habis
            </p>

            <h3 class="mt-2 text-2xl font-bold text-red-600">
                0
            </h3>
        </div>

    </div>

    {{-- Tabel --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        {{-- Header tabel --}}
        <div class="flex flex-col gap-3 p-5 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Data Stok Produk
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Daftar persediaan produk saat ini.
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
                        <th class="px-6 py-3">Kode Produk</th>
                        <th class="px-6 py-3">Nama Produk</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Stok</th>
                        <th class="px-6 py-3">Stok Minimum</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>

                </thead>

                <tbody>

                    {{-- Produk 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">1</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD001
                        </td>

                        <td class="px-6 py-4">
                            Laptop ASUS
                        </td>

                        <td class="px-6 py-4">
                            Elektronik
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            25
                        </td>

                        <td class="px-6 py-4">
                            5
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                Tersedia
                            </span>
                        </td>

                    </tr>

                    {{-- Produk 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">2</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD002
                        </td>

                        <td class="px-6 py-4">
                            Mouse Logitech
                        </td>

                        <td class="px-6 py-4">
                            Elektronik
                        </td>

                        <td class="px-6 py-4 font-semibold text-yellow-600">
                            8
                        </td>

                        <td class="px-6 py-4">
                            8
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                Stok Minimum
                            </span>
                        </td>

                    </tr>

                    {{-- Produk 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">3</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD003
                        </td>

                        <td class="px-6 py-4">
                            Keyboard Mechanical
                        </td>

                        <td class="px-6 py-4">
                            ATK
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            20
                        </td>

                        <td class="px-6 py-4">
                            5
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                Tersedia
                            </span>
                        </td>

                    </tr>

                    {{-- Produk 4 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">4</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD004
                        </td>

                        <td class="px-6 py-4">
                            Meja Kantor
                        </td>

                        <td class="px-6 py-4">
                            Furniture
                        </td>

                        <td class="px-6 py-4 font-semibold text-yellow-600">
                            3
                        </td>

                        <td class="px-6 py-4">
                            5
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                Stok Minimum
                            </span>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="flex flex-col items-center justify-between gap-4 p-5 md:flex-row">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan
                <span class="font-semibold text-gray-900 dark:text-white">1-4</span>
                dari
                <span class="font-semibold text-gray-900 dark:text-white">4</span>
                produk
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