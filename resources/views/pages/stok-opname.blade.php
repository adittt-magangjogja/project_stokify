@extends('layouts.dashboard')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Stock Opname
                </h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1">
                    Kelola dan catat hasil pemeriksaan stok fisik.
                </p>
            </div>

            <button
                type="button"
                class="mt-4 md:mt-0 text-white bg-purple-600 hover:bg-purple-700
                focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm
                px-5 py-2.5 dark:bg-purple-600 dark:hover:bg-purple-700">
                + Tambah Stock Opname
            </button>
        </div>

        {{-- Filter --}}
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- Search --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Cari Produk
                    </label>

                    <input
                        type="text"
                        placeholder="Cari kode atau nama produk..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                        dark:text-white">
                </div>

                {{-- Tanggal --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Opname
                    </label>

                    <input
                        type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>

                {{-- Status --}}
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>

                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
                        rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                        dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option selected>Semua Status</option>
                        <option>Sesuai</option>
                        <option>Selisih</option>

                    </select>
                </div>

            </div>

        </div>

        {{-- Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-100
                dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Kode Produk
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Produk
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Stok Sistem
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Stok Fisik
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Selisih
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                        <th scope="col" class="px-6 py-3 text-center">
                            Aksi
                        </th>
                    </tr>

                </thead>

                <tbody>

                    {{-- Data 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700
                    hover:bg-gray-50 dark:hover:bg-gray-600">

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
                            25
                        </td>

                        <td class="px-6 py-4">
                            25
                        </td>

                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-600">
                                0
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium
                            text-green-800 bg-green-100 rounded-full">
                                Sesuai
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <button
                                    class="px-3 py-2 text-xs font-medium text-blue-700
                                    bg-blue-100 rounded-lg hover:bg-blue-200">
                                    Detail
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-red-700
                                    bg-red-100 rounded-lg hover:bg-red-200">
                                    Hapus
                                </button>

                            </div>
                        </td>

                    </tr>

                    {{-- Data 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700
                    hover:bg-gray-50 dark:hover:bg-gray-600">

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
                            8
                        </td>

                        <td class="px-6 py-4">
                            6
                        </td>

                        <td class="px-6 py-4">
                            <span class="font-semibold text-red-600">
                                -2
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium
                            text-red-800 bg-red-100 rounded-full">
                                Selisih
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <button
                                    class="px-3 py-2 text-xs font-medium text-blue-700
                                    bg-blue-100 rounded-lg hover:bg-blue-200">
                                    Detail
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-red-700
                                    bg-red-100 rounded-lg hover:bg-red-200">
                                    Hapus
                                </button>

                            </div>
                        </td>

                    </tr>

                    {{-- Data 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700
                    hover:bg-gray-50 dark:hover:bg-gray-600">

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
                            20
                        </td>

                        <td class="px-6 py-4">
                            18
                        </td>

                        <td class="px-6 py-4">
                            <span class="font-semibold text-red-600">
                                -2
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium
                            text-red-800 bg-red-100 rounded-full">
                                Selisih
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <button
                                    class="px-3 py-2 text-xs font-medium text-blue-700
                                    bg-blue-100 rounded-lg hover:bg-blue-200">
                                    Detail
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-red-700
                                    bg-red-100 rounded-lg hover:bg-red-200">
                                    Hapus
                                </button>

                            </div>
                        </td>

                    </tr>

                    {{-- Data 4 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700
                    hover:bg-gray-50 dark:hover:bg-gray-600">

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
                            3
                        </td>

                        <td class="px-6 py-4">
                            3
                        </td>

                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-600">
                                0
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-medium
                            text-green-800 bg-green-100 rounded-full">
                                Sesuai
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                <button
                                    class="px-3 py-2 text-xs font-medium text-blue-700
                                    bg-blue-100 rounded-lg hover:bg-blue-200">
                                    Detail
                                </button>

                                <button
                                    class="px-3 py-2 text-xs font-medium text-red-700
                                    bg-red-100 rounded-lg hover:bg-red-200">
                                    Hapus
                                </button>

                            </div>
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="flex items-center justify-between mt-6">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan 1 sampai 4 dari 4 produk
            </span>

            <div class="inline-flex rounded-md shadow-sm">

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white
                    border border-gray-300 rounded-s-lg hover:bg-gray-100
                    dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Sebelumnya
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-purple-600 bg-purple-50
                    border-t border-b border-gray-300 dark:bg-gray-700 dark:border-gray-700">
                    1
                </button>

                <button
                    class="px-4 py-2 text-sm font-medium text-gray-500 bg-white
                    border border-gray-300 rounded-e-lg hover:bg-gray-100
                    dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                    Berikutnya
                </button>

            </div>

        </div>

    </div>
</div>

@endsection