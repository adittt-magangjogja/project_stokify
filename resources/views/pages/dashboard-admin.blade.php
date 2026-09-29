@extends('layouts.dashboard')

@section('content')

<div class="w-full p-4">
    <div class="p-4 mt-14">

        {{-- HEADER --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Dashboard Admin
            </h1>

            <p class="mt-2 text-gray-500 dark:text-gray-400">
                Ringkasan informasi dan aktivitas aplikasi Stockify.
            </p>
        </div>


        {{-- RINGKASAN --}}
        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2 xl:grid-cols-4">

            {{-- JUMLAH PRODUK --}}
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Jumlah Produk
                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    0
                </h2>

                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Total produk terdaftar
                </p>

            </div>


            {{-- BARANG MASUK --}}
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Transaksi Barang Masuk
                </p>

                <h2 class="mt-2 text-3xl font-bold text-green-600">
                    0
                </h2>

                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Dalam periode tertentu
                </p>

            </div>


            {{-- BARANG KELUAR --}}
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Transaksi Barang Keluar
                </p>

                <h2 class="mt-2 text-3xl font-bold text-red-600">
                    0
                </h2>

                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Dalam periode tertentu
                </p>

            </div>


            {{-- PENGGUNA --}}
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Jumlah Pengguna
                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    0
                </h2>

                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                    Pengguna terdaftar
                </p>

            </div>

        </div>


        {{-- PERIODE --}}
        <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm
                    dark:bg-gray-800 dark:border-gray-700">

            <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">
                Periode Transaksi
            </h2>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Dari
                    </label>

                    <input type="date"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:text-white">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Sampai
                    </label>

                    <input type="date"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                                  dark:text-white">
                </div>

                <div class="flex items-end">
                    <button type="button"
                            class="w-full px-5 py-2.5 text-sm font-medium text-white
                                   bg-blue-700 rounded-lg hover:bg-blue-800">
                        Tampilkan
                    </button>
                </div>

            </div>

        </div>


        {{-- GRAFIK STOK --}}
        <div class="grid grid-cols-1 gap-6 mb-6 xl:grid-cols-2">

            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Grafik Stok Barang
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Grafik akan menampilkan data stok setelah terhubung dengan backend.
                </p>

                <div class="flex items-center justify-center h-64 mt-4
                            border-2 border-dashed border-gray-300 rounded-lg
                            dark:border-gray-600">

                    <span class="text-gray-500 dark:text-gray-400">
                        Belum ada data stok
                    </span>

                </div>

            </div>


            {{-- AKTIVITAS PENGGUNA --}}
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Aktivitas Pengguna Terbaru
                </h2>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Aktivitas pengguna akan ditampilkan setelah backend terhubung.
                </p>

                <div class="flex items-center justify-center h-64 mt-4
                            border-2 border-dashed border-gray-300 rounded-lg
                            dark:border-gray-600">

                    <span class="text-gray-500 dark:text-gray-400">
                        Belum ada aktivitas
                    </span>

                </div>

            </div>

        </div>


        {{-- INFORMASI ADMIN --}}
        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                    dark:bg-gray-800 dark:border-gray-700">

            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                Informasi Sistem
            </h2>

            <p class="mt-2 text-gray-500 dark:text-gray-400">
                Data dashboard akan otomatis ditampilkan berdasarkan data produk,
                transaksi, stok, dan aktivitas pengguna dari database.
            </p>

        </div>

    </div>
</div>

@endsection