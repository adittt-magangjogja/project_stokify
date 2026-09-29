@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Atribut Produk
            </h1>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Kelola atribut yang digunakan pada produk.
            </p>
        </div>

        <a href="#"
           class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">

            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4">
                </path>
            </svg>

            Tambah Atribut
        </a>

    </div>

    {{-- Search --}}
    <div class="p-5 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="flex flex-col gap-4 md:flex-row">

            <div class="flex-1">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Cari Atribut
                </label>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama atribut..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

            </div>

            <div class="w-full md:w-56">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Status
                </label>

                <select
                    name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    <option selected>Semua Status</option>
                    <option>Aktif</option>
                    <option>Nonaktif</option>

                </select>

            </div>

            <div class="flex items-end">

                <button
                    type="button"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Cari
                </button>

            </div>

        </div>

    </div>

    {{-- Table --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-5 border-b border-gray-200 dark:border-gray-700">

            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                Daftar Atribut
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama Atribut</th>
                        <th class="px-6 py-3">Nilai</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    {{-- Atribut 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">
                            1
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Warna
                        </td>

                        <td class="px-6 py-4">
                            Hitam, Putih, Merah, Biru
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-2.5 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                Aktif
                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="#"
                                   class="px-3 py-2 text-xs font-medium text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-700 hover:text-white">
                                    Edit
                                </a>

                                <button
                                    type="button"
                                    class="px-3 py-2 text-xs font-medium text-red-700 border border-red-700 rounded-lg hover:bg-red-700 hover:text-white">
                                    Hapus
                                </button>

                            </div>

                        </td>

                    </tr>

                    {{-- Atribut 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">
                            2
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Ukuran
                        </td>

                        <td class="px-6 py-4">
                            S, M, L, XL
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-2.5 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                Aktif
                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="#"
                                   class="px-3 py-2 text-xs font-medium text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-700 hover:text-white">
                                    Edit
                                </a>

                                <button
                                    type="button"
                                    class="px-3 py-2 text-xs font-medium text-red-700 border border-red-700 rounded-lg hover:bg-red-700 hover:text-white">
                                    Hapus
                                </button>

                            </div>

                        </td>

                    </tr>

                    {{-- Atribut 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">
                            3
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Satuan
                        </td>

                        <td class="px-6 py-4">
                            Pcs, Box, Unit, Kg
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-2.5 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                Aktif
                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                <a href="#"
                                   class="px-3 py-2 text-xs font-medium text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-700 hover:text-white">
                                    Edit
                                </a>

                                <button
                                    type="button"
                                    class="px-3 py-2 text-xs font-medium text-red-700 border border-red-700 rounded-lg hover:bg-red-700 hover:text-white">
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
                <span class="font-semibold text-gray-900 dark:text-white">1-3</span>
                dari
                <span class="font-semibold text-gray-900 dark:text-white">3</span>
                atribut
            </span>

            <div>

                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Previous
                </button>

                <button
                    type="button"
                    class="px-4 py-2 ml-1 text-sm font-medium text-blue-600 bg-white border border-gray-300 rounded-lg">
                    1
                </button>

                <button
                    type="button"
                    class="px-4 py-2 ml-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Next
                </button>

            </div>

        </div>

    </div>

</div>

@endsection