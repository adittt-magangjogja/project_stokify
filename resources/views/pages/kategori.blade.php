@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Kategori
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Kelola kategori produk yang tersedia di Stockify.
        </p>
    </div>


    {{-- Card --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        {{-- Header Card --}}
        <div class="flex flex-col gap-4 p-5 md:flex-row md:items-center md:justify-between">

            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Daftar Kategori
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Data kategori produk
                </p>
            </div>

            {{-- Tambah --}}
            <button
                type="button"
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
            </button>

        </div>


        {{-- Search --}}
        <div class="px-5 pb-5">

            <div class="relative max-w-md">

                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400"
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
                    placeholder="Cari kategori..."
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

            </div>

        </div>


        {{-- Table --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>

                        <th class="px-6 py-3">
                            No
                        </th>

                        <th class="px-6 py-3">
                            Nama Kategori
                        </th>

                        <th class="px-6 py-3">
                            Deskripsi
                        </th>

                        <th class="px-6 py-3">
                            Jumlah Produk
                        </th>

                        <th class="px-6 py-3 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    {{-- Data 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            1
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            Elektronik
                        </td>

                        <td class="px-6 py-4">
                            Peralatan elektronik dan komputer
                        </td>

                        <td class="px-6 py-4">
                            45
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <button
                                    class="px-3 py-2 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300">
                                    Detail
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300">
                                    Edit
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-900 dark:text-red-300">
                                    Hapus
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- Data 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            2
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            ATK
                        </td>

                        <td class="px-6 py-4">
                            Alat tulis kantor
                        </td>

                        <td class="px-6 py-4">
                            32
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <button
                                    class="px-3 py-2 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300">
                                    Detail
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300">
                                    Edit
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-900 dark:text-red-300">
                                    Hapus
                                </button>

                            </div>

                        </td>

                    </tr>


                    {{-- Data 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            3
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            Furniture
                        </td>

                        <td class="px-6 py-4">
                            Perlengkapan meja dan ruangan
                        </td>

                        <td class="px-6 py-4">
                            18
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <button
                                    class="px-3 py-2 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300">
                                    Detail
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300">
                                    Edit
                                </button>

                                <button
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
                kategori
            </span>


            <div class="inline-flex">

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                    Previous
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-white border-t border-b border-gray-300 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-blue-400">
                    1
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700">
                    Next
                </button>

            </div>

        </div>

    </div>

</div>

@endsection