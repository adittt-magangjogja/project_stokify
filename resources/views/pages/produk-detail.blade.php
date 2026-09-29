@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Detail Produk
                </h1>

                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Informasi lengkap produk.
                </p>
            </div>

            <div class="flex gap-2">

                <a
                    href="{{ route('produk.index') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                    Kembali
                </a>

                <a
                    href="{{ route('produk.edit', 1) }}"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Edit Produk
                </a>

            </div>

        </div>
    </div>


    {{-- Informasi Produk --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- Foto Produk --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <div class="p-6">

                <div class="flex items-center justify-center h-64 bg-gray-100 rounded-lg dark:bg-gray-700">

                    <svg
                        class="w-24 h-24 text-gray-400"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="1.5"
                            d="M3 7a2 2 0 0 1 2-2h3l2-2h4l2 2h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7z">
                        </path>

                        <circle
                            cx="12"
                            cy="12"
                            r="3">
                        </circle>

                    </svg>

                </div>

                <p class="mt-3 text-sm text-center text-gray-500 dark:text-gray-400">
                    Foto produk
                </p>

            </div>

        </div>


        {{-- Data Produk --}}
        <div class="lg:col-span-2">

            <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

                <div class="p-6">

                    <h2 class="mb-6 text-lg font-semibold text-gray-900 dark:text-white">
                        Informasi Produk
                    </h2>


                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                        {{-- SKU --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                SKU / Kode Produk
                            </p>

                            <p class="mt-1 font-medium text-gray-900 dark:text-white">
                                PRD001
                            </p>
                        </div>


                        {{-- Nama --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Nama Produk
                            </p>

                            <p class="mt-1 font-medium text-gray-900 dark:text-white">
                                Laptop ASUS
                            </p>
                        </div>


                        {{-- Kategori --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Kategori
                            </p>

                            <p class="mt-1 font-medium text-gray-900 dark:text-white">
                                Elektronik
                            </p>
                        </div>


                        {{-- Harga Beli --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Harga Beli
                            </p>

                            <p class="mt-1 font-medium text-gray-900 dark:text-white">
                                Rp 7.500.000
                            </p>
                        </div>


                        {{-- Harga Jual --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Harga Jual
                            </p>

                            <p class="mt-1 font-medium text-gray-900 dark:text-white">
                                Rp 8.500.000
                            </p>
                        </div>


                        {{-- Stok --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Stok Saat Ini
                            </p>

                            <p class="mt-1 font-medium text-green-600">
                                25
                            </p>
                        </div>


                        {{-- Minimum Stok --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Minimum Stok
                            </p>

                            <p class="mt-1 font-medium text-gray-900 dark:text-white">
                                5
                            </p>
                        </div>


                        {{-- Status --}}
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Status
                            </p>

                            <span class="inline-flex px-2.5 py-1 mt-1 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300">
                                Tersedia
                            </span>
                        </div>

                    </div>


                    {{-- Deskripsi --}}
                    <div class="pt-5 mt-6 border-t border-gray-200 dark:border-gray-700">

                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Deskripsi
                        </p>

                        <p class="mt-2 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                            Laptop ASUS untuk kebutuhan kerja dan operasional kantor.
                            Produk termasuk kategori elektronik dan tersedia dalam stok.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Ringkasan Stok --}}
    <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">

        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Stok Saat Ini
            </p>

            <p class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                25
            </p>

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                unit
            </p>

        </div>


        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Stok Minimum
            </p>

            <p class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                5
            </p>

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                batas minimum
            </p>

        </div>


        <div class="p-5 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Status Stok
            </p>

            <p class="mt-2 text-lg font-bold text-green-600">
                Aman
            </p>

            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                stok masih di atas minimum
            </p>

        </div>

    </div>

</div>

@endsection