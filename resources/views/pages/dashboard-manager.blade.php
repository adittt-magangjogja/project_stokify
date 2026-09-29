@extends('layouts.dashboard')

@section('content')


<div class="p-4 lg:p-6">
    <div class="p-4 mt-14">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                Dashboard Manager
            </h1>

            <p class="text-gray-500 dark:text-gray-400 mt-1">
                Ringkasan kondisi stok dan aktivitas gudang.
            </p>
        </div>


        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

            {{-- Stok Menipis --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Stok Menipis
                        </p>

                        <h2 class="text-3xl font-bold text-red-600 mt-2">
                            
                        </h2>
                    </div>

                    <div class="p-3 bg-red-100 dark:bg-red-900/30 rounded-lg">

                        <svg class="w-7 h-7 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>

                        </svg>

                    </div>

                </div>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                    Produk perlu segera diperiksa.
                </p>

            </div>


            {{-- Barang Masuk Hari Ini --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Barang Masuk Hari Ini
                        </p>

                        <h2 class="text-3xl font-bold text-green-600 mt-2">
                            0
                        </h2>
                    </div>

                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">

                        <svg class="w-7 h-7 text-green-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"/>

                        </svg>

                    </div>

                </div>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                    Total barang yang masuk hari ini.
                </p>

            </div>


            {{-- Barang Keluar Hari Ini --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Barang Keluar Hari Ini
                        </p>

                        <h2 class="text-3xl font-bold text-orange-600 mt-2">
                            0
                        </h2>
                    </div>

                    <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg">

                        <svg class="w-7 h-7 text-orange-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M5 12h14"/>

                        </svg>

                    </div>

                </div>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-4">
                    Total barang yang keluar hari ini.
                </p>

            </div>

        </div>


        {{-- Stok Menipis --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">

            <div class="p-5 border-b border-gray-200 dark:border-gray-700">

                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">
                    Produk dengan Stok Menipis
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Produk yang perlu mendapat perhatian.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-400">

                        <tr>
                            <th class="px-6 py-3">Kode</th>
                            <th class="px-6 py-3">Produk</th>
                            <th class="px-6 py-3">Stok</th>
                            <th class="px-6 py-3">Minimum</th>
                            <th class="px-6 py-3">Status</th>
                        </tr>

                    </thead>

                    <tbody>
                        

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>

@endsection