@extends('layouts.dashboard')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Kategori
                </h1>

                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Kelola kategori produk
                </p>
            </div>

            {{-- Tombol Tambah Kategori --}}
            <a href="{{ route('kategori.create') }}"
               class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">

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

                Tambah Kategori
            </a>

        </div>

        {{-- Card --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">

            {{-- Search --}}
            <div class="p-4 border-b border-gray-200 dark:border-gray-700">

                <div class="relative max-w-md">

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.04 6.04a7.5 7.5 0 0 0 10.61 10.61Z">
                            </path>

                        </svg>

                    </div>

                    <input
                        type="text"
                        placeholder="Cari kategori..."
                        class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                    >

                </div>

            </div>


            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        <tr>

                            <th scope="col" class="px-6 py-3">
                                No
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Nama Kategori
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Jumlah Produk
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        {{-- Kategori 1 --}}
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">
                                1
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Elektronik
                            </td>

                            <td class="px-6 py-4">
                                Produk elektronik dan perangkat teknologi
                            </td>

                            <td class="px-6 py-4">
                                12
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex gap-2">

                                    {{-- Detail --}}
                                    <button
                                        type="button"
                                        class="px-3 py-2 text-xs font-medium text-green-700 bg-green-100 rounded-lg hover:bg-green-200 dark:bg-green-900 dark:text-green-300">
                                        Detail
                                    </button>

                                    {{-- Edit --}}
                                    <a href="{{ route('kategori.edit', 1) }}"
                                       class="px-3 py-2 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300">
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <button
                                        type="button"
                                        class="px-3 py-2 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-900 dark:text-red-300">
                                        Hapus
                                    </button>

                                </div>

                            </td>

                        </tr>


                        {{-- Kategori 2 --}}
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="px-6 py-4">
                                2
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                ATK
                            </td>

                            <td class="px-6 py-4">
                                Alat tulis kantor dan perlengkapan kerja
                            </td>

                            <td class="px-6 py-4">
                                8
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex gap-2">

                                    {{-- Detail --}}
                                    <button
                                        type="button"
                                        class="px-3 py-2 text-xs font-medium text-green-700 bg-green-100 rounded-lg hover:bg-green-200 dark:bg-green-900 dark:text-green-300">
                                        Detail
                                    </button>

                                    {{-- Edit --}}
                                    <a href="{{ route('kategori.edit', 2) }}"
                                       class="px-3 py-2 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300">
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <button
                                        type="button"
                                        class="px-3 py-2 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-900 dark:text-red-300">
                                        Hapus
                                    </button>

                                </div>

                            </td>

                        </tr>


                        {{-- Kategori 3 --}}
                        <tr class="bg-white dark:bg-gray-800">

                            <td class="px-6 py-4">
                                3
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                Furniture
                            </td>

                            <td class="px-6 py-4">
                                Perabotan dan perlengkapan kantor
                            </td>

                            <td class="px-6 py-4">
                                5
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex gap-2">

                                    {{-- Detail --}}
                                    <button
                                        type="button"
                                        class="px-3 py-2 text-xs font-medium text-green-700 bg-green-100 rounded-lg hover:bg-green-200 dark:bg-green-900 dark:text-green-300">
                                        Detail
                                    </button>

                                    {{-- Edit --}}
                                    <a href="{{ route('kategori.edit', 3) }}"
                                       class="px-3 py-2 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300">
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <button
                                        type="button"
                                        class="px-3 py-2 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-900 dark:text-red-300">
                                        Hapus
                                    </button>

                                </div>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            <div class="flex items-center justify-between p-4">

                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Menampilkan
                    <span class="font-semibold text-gray-900 dark:text-white">
                        1-3
                    </span>
                    dari
                    <span class="font-semibold text-gray-900 dark:text-white">
                        3
                    </span>
                </span>


                <div class="inline-flex">

                    <button
                        class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                        Sebelumnya
                    </button>

                    <button
                        class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border-t border-b border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                        1
                    </button>

                    <button
                        class="px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                        Berikutnya
                    </button>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection