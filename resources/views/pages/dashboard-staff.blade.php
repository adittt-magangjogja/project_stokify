@extends('layouts.dashboard')

@section('content')

<div class="w-full p-4">
    <div class="w-full p-4 mt-14">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Dashboard Staff
            </h1>

            <p class="mt-2 text-gray-500 dark:text-gray-400">
                Daftar tugas yang perlu diselesaikan.
            </p>
        </div>


        {{-- Daftar Tugas --}}
        <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-2">


            {{-- Barang Masuk --}}
            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <div class="flex items-start justify-between">

                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            Barang Masuk
                        </h2>

                        <p class="mt-2 text-gray-500 dark:text-gray-400">
                            Barang masuk yang perlu diperiksa.
                        </p>
                    </div>

                    <div class="p-3 bg-blue-100 rounded-lg dark:bg-blue-900">
                        <svg class="w-7 h-7 text-blue-600 dark:text-blue-300"
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

                <div class="mt-6">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">
                        0
                    </span>

                    <span class="ml-2 text-gray-500 dark:text-gray-400">
                        barang perlu diperiksa
                    </span>
                </div>

                <div class="mt-6">
                    <a href="{{ route('konfirmasi-barang') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium
                              text-white bg-blue-700 rounded-lg hover:bg-blue-800">

                        Lihat Barang Masuk

                        <svg class="w-4 h-4 ml-2"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5l7 7-7 7"/>
                        </svg>

                    </a>
                </div>

            </div>


            {{-- Barang Keluar --}}
            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <div class="flex items-start justify-between">

                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                            Barang Keluar
                        </h2>

                        <p class="mt-2 text-gray-500 dark:text-gray-400">
                            Barang keluar yang perlu disiapkan.
                        </p>
                    </div>

                    <div class="p-3 bg-red-100 rounded-lg dark:bg-red-900">
                        <svg class="w-7 h-7 text-red-600 dark:text-red-300"
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

                <div class="mt-6">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">
                        0
                    </span>

                    <span class="ml-2 text-gray-500 dark:text-gray-400">
                        barang perlu disiapkan
                    </span>
                </div>

                <div class="mt-6">
                    <a href="{{ route('konfirmasi-pengeluaran') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium
                              text-white bg-red-700 rounded-lg hover:bg-red-800">

                        Lihat Barang Keluar

                        <svg class="w-4 h-4 ml-2"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5l7 7-7 7"/>
                        </svg>

                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection