@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Dashboard
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Selamat datang di Stockify. Berikut ringkasan persediaan saat ini.
        </p>
    </div>


    {{-- Statistik --}}
    <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-2 xl:grid-cols-4">

        {{-- Total Produk --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="flex items-center justify-between">

                <div>
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        Total Produk
                    </p>

                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        0
                    </h2>
                </div>

                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-blue-100 dark:bg-blue-900">

                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-300"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                        </path>

                    </svg>

                </div>

            </div>

            <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                Produk terdaftar
            </p>

        </div>


        {{-- Stok Masuk --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="flex items-center justify-between">

                <div>
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        Stok Masuk
                    </p>

                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        0
                    </h2>
                </div>

                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-green-100 dark:bg-green-900">

                    <svg class="w-6 h-6 text-green-600 dark:text-green-300"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 19V5m0 0l-6 6m6-6l6 6">
                        </path>

                    </svg>

                </div>

            </div>

            <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                Barang masuk
            </p>

        </div>


        {{-- Stok Keluar --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="flex items-center justify-between">

                <div>
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        Stok Keluar
                    </p>

                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        0
                    </h2>
                </div>

                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-orange-100 dark:bg-orange-900">

                    <svg class="w-6 h-6 text-orange-600 dark:text-orange-300"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 5v14m0 0l-6-6m6 6l6-6">
                        </path>

                    </svg>

                </div>

            </div>

            <p class="mt-4 text-xs text-gray-500 dark:text-gray-400">
                Barang keluar
            </p>

        </div>


        {{-- Stok Minimum --}}
        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="flex items-center justify-between">

                <div>
                    <p class="mb-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        Stok Minimum
                    </p>

                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                        0
                    </h2>
                </div>

                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-red-100 dark:bg-red-900">

                    <svg class="w-6 h-6 text-red-600 dark:text-red-300"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z">
                        </path>

                    </svg>

                </div>

            </div>

            <p class="mt-4 text-xs text-red-500">
                Perlu diperiksa
            </p>

        </div>

    </div>


    {{-- Dua kolom --}}
    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">


        {{-- Produk Stok Minimum --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="flex items-center justify-between p-5 border-b border-gray-200 dark:border-gray-700">

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Produk Stok Minimum
                    </h3>

                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Produk yang perlu segera diperiksa
                    </p>
                </div>

                <span class="px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full dark:bg-red-900 dark:text-red-300">
                    3 Produk
                </span>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        <tr>

                            <th class="px-5 py-3">
                                Produk
                            </th>

                            <th class="px-5 py-3">
                                Stok
                            </th>

                            <th class="px-5 py-3">
                                Minimum
                            </th>

                            <th class="px-5 py-3">
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>


                    </tbody>

                </table>

            </div>

        </div>


        {{-- Aktivitas Terbaru --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="p-5 border-b border-gray-200 dark:border-gray-700">

                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Aktivitas Terbaru
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Aktivitas persediaan terbaru
                </p>

            </div>


            <div class="p-5">

                <ol class="relative border-l border-gray-200 dark:border-gray-700">

                    <li class="mb-8 ml-6">

                        <span class="absolute flex items-center justify-center w-8 h-8 bg-green-100 rounded-full -left-4 ring-8 ring-white dark:ring-gray-800 dark:bg-green-900">

                            <svg class="w-4 h-4 text-green-600 dark:text-green-300"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 6v6l4 2">
                                </path>

                            </svg>

                        </span>

                        

                    </li>


                    <li class="mb-8 ml-6">

                        <span class="absolute flex items-center justify-center w-8 h-8 bg-orange-100 rounded-full -left-4 ring-8 ring-white dark:ring-gray-800 dark:bg-orange-900">

                            <svg class="w-4 h-4 text-orange-600 dark:text-orange-300"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 5v14m0 0l-6-6m6 6l6-6">
                                </path>

                            </svg>

                        </span>

                       
                        </span>

                    </li>


                    <li class="ml-6">

                        <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full -left-4 ring-8 ring-white dark:ring-gray-800 dark:bg-blue-900">

                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-300"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7">
                                </path>

                            </svg>

                        </span>

                        
                        
                        </span>

                    </li>

                </ol>

            </div>

        </div>

    </div>

</div>

@endsection