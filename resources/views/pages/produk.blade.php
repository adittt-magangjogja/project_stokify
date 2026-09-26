@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Produk
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Kelola data produk dan persediaan Stockify.
        </p>
    </div>


    {{-- Card utama --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        {{-- Header tabel --}}
        <div class="flex flex-col gap-4 p-5 lg:flex-row lg:items-center lg:justify-between">

            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Daftar Produk
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Menampilkan daftar produk yang tersedia
                </p>
            </div>


            {{-- Tombol tambah --}}
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

                Tambah Produk

            </button>

        </div>


        {{-- Filter dan Search --}}
        <div class="flex flex-col gap-3 px-5 pb-5 md:flex-row">

            {{-- Search --}}
            <div class="relative w-full md:max-w-md">

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
                    placeholder="Cari kode atau nama produk..."
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

            </div>


            {{-- Filter kategori --}}
            <select
                class="p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                <option selected>
                    Semua Kategori
                </option>

                <option>
                    Elektronik
                </option>

                <option>
                    ATK
                </option>

                <option>
                    Furniture
                </option>

            </select>


            {{-- Filter stok --}}
            <select
                class="p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                <option selected>
                    Semua Stok
                </option>

                <option>
                    Stok Tersedia
                </option>

                <option>
                    Stok Minimum
                </option>

                <option>
                    Stok Habis
                </option>

            </select>

        </div>


        {{-- Tabel Produk --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>

                        <th class="px-6 py-3">
                            No
                        </th>

                        <th class="px-6 py-3">
                            Kode
                        </th>

                        <th class="px-6 py-3">
                            Nama Produk
                        </th>

                        <th class="px-6 py-3">
                            Kategori
                        </th>

                        <th class="px-6 py-3">
                            Harga
                        </th>

                        <th class="px-6 py-3">
                            Stok
                        </th>

                        <th class="px-6 py-3">
                            Status
                        </th>

                        <th class="px-6 py-3 text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody>

                    {{-- Produk 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            1
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD001
                        </td>

                        <td class="px-6 py-4">
                            Laptop ASUS
                        </td>

                        <td class="px-6 py-4">
                            Elektronik
                        </td>

                        <td class="px-6 py-4">
                            Rp 8.500.000
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            25
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                Tersedia
                            </span>

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


                    {{-- Produk 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            2
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD002
                        </td>

                        <td class="px-6 py-4">
                            Mouse Logitech
                        </td>

                        <td class="px-6 py-4">
                            Elektronik
                        </td>

                        <td class="px-6 py-4">
                            Rp 350.000
                        </td>

                        <td class="px-6 py-4 font-semibold text-yellow-600">
                            8
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                Menipis
                            </span>

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


                    {{-- Produk 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            3
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD003
                        </td>

                        <td class="px-6 py-4">
                            Keyboard Mechanical
                        </td>

                        <td class="px-6 py-4">
                            ATK
                        </td>

                        <td class="px-6 py-4">
                            Rp 750.000
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            20
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                Tersedia
                            </span>

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


                    {{-- Produk 4 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            4
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            PRD004
                        </td>

                        <td class="px-6 py-4">
                            Meja Kantor
                        </td>

                        <td class="px-6 py-4">
                            Furniture
                        </td>

                        <td class="px-6 py-4">
                            Rp 1.250.000
                        </td>

                        <td class="px-6 py-4 font-semibold text-red-600">
                            3
                        </td>

                        <td class="px-6 py-4">

                            <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-300">
                                Stok Minimum
                            </span>

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
                    1-4
                </span>

                dari

                <span class="font-semibold text-gray-900 dark:text-white">
                    4
                </span>

                produk

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