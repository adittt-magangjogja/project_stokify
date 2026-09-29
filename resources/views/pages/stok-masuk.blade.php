@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Stok Masuk
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Kelola pencatatan barang yang masuk ke gudang.
        </p>
    </div>


    {{-- Card --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        {{-- Header --}}
        <div class="flex flex-col gap-4 p-5 md:flex-row md:items-center md:justify-between">

            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Riwayat Stok Masuk
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Daftar transaksi barang masuk
                </p>
            </div>

            <button
                type="button"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300">

                <svg class="w-5 h-5 mr-2"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4">
                    </path>

                </svg>

                Tambah Stok Masuk

            </button>

        </div>


        {{-- Filter --}}
        <div class="flex flex-col gap-3 px-5 pb-5 md:flex-row">

            <div class="relative w-full md:max-w-md">

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                    <svg class="w-5 h-5 text-gray-500"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z">
                        </path>

                    </svg>

                </div>

                <input
                    type="text"
                    placeholder="Cari produk atau supplier..."
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

            </div>


            <input
                type="date"
                class="p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

        </div>


        {{-- Table --}}
        <div class="w-full">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>

                        <th class="px-6 py-3">
                            No
                        </th>

                        <th class="px-6 py-3">
                            Kode Transaksi
                        </th>

                        <th class="px-6 py-3">
                            Tanggal
                        </th>

                        <th class="px-6 py-3">
                            Produk
                        </th>

                        <th class="px-6 py-3">
                            Supplier
                        </th>

                        <th class="px-6 py-3">
                            Jumlah
                        </th>

                        <th class="px-6 py-3 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                 

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        <div class="flex flex-col items-center justify-between gap-4 p-5 md:flex-row">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan
                <span class="font-semibold text-gray-900 dark:text-white">
                    1-3
                </span>
                dari
                <span class="font-semibold text-gray-900 dark:text-white">
                    3
                </span>
                transaksi
            </span>

            <div class="inline-flex">

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                    Previous
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-green-600 bg-white border-t border-b border-gray-300">
                    1
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700">
                    Next
                </button>

            </div>

        </div>

    </div>

</div>

@endsection