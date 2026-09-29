@extends('layouts.dashboard')

@section('content')

<div class="p-4">
    <div class="p-4 mt-14">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Stok Keluar
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1">
                    Kelola transaksi barang yang keluar dari gudang.
                </p>
            </div>

            <button
                type="button"
                class="mt-4 md:mt-0 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none">
                + Tambah Stok Keluar
            </button>
        </div>

        {{-- Filter --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Search --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Cari Transaksi
                    </label>

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.04 6.04a7.5 7.5 0 0 0 10.61 10.61Z"/>
                            </svg>
                        </div>

                        <input
                            type="text"
                            placeholder="Cari kode transaksi atau produk..."
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                            dark:text-white">
                    </div>
                </div>

                {{-- Date --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Filter Tanggal
                    </label>

                    <input
                        type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

            </div>
        </div>

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-3">
                            No
                        </th>

                        <th scope="col" class="px-3 py-3">
                            Kode Transaksi
                        </th>

                        <th scope="col" class="px-3 py-3">
                            Tanggal
                        </th>

                        <th scope="col" class="px-3 py-3">
                            Produk
                        </th>

                        <th scope="col" class="px-3 py-3">
                            Tujuan
                        </th>

                        <th scope="col" class="px-3 py-3">
                            Jumlah
                        </th>

                        <th scope="col" class="px-3 py-3 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>

                   

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex items-center justify-between mt-6">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan 1 sampai 3 dari 3 transaksi
            </span>

            <div class="inline-flex rounded-md shadow-sm">

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Sebelumnya
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 border-t border-b border-gray-300 dark:bg-gray-700 dark:border-gray-700">
                    1
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Berikutnya
                </button>

            </div>

        </div>

    </div>
</div>

@endsection