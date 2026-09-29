@extends('layouts.dashboard')

@section('content')

<div class="w-full p-4">
    <div class="p-4 mt-14">

        {{-- HEADER --}}
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Konfirmasi Barang Masuk
            </h1>

            <p class="mt-2 text-gray-500 dark:text-gray-400">
                Periksa dan konfirmasi barang yang telah diterima.
            </p>
        </div>


        {{-- RINGKASAN --}}
        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3">

            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Menunggu Konfirmasi
                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    0
                </h2>

            </div>


            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Sudah Dikonfirmasi
                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    0
                </h2>

            </div>


            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm
                        dark:bg-gray-800 dark:border-gray-700">

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Total Barang Masuk
                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">
                    0
                </h2>

            </div>

        </div>


        {{-- FILTER --}}
        <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm
                    dark:bg-gray-800 dark:border-gray-700">

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Cari Barang
                    </label>

                    <input type="text"
                           placeholder="Cari kode atau nama barang"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>


                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal
                    </label>

                    <input type="date"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                  dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                </div>


                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Status
                    </label>

                    <select
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                               focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                               dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                        <option>Semua Status</option>
                        <option>Menunggu</option>
                        <option>Dikonfirmasi</option>

                    </select>
                </div>

            </div>

        </div>


        {{-- TABLE --}}
        <div class="relative overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-sm
                    dark:bg-gray-800 dark:border-gray-700">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50
                              dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th class="px-6 py-3">Kode</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3">Produk</th>
                        <th class="px-6 py-3">Supplier</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    {{-- Data akan diisi dari backend --}}

                    <tr>
                        <td colspan="7"
                            class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">

                            Belum ada barang masuk yang perlu dikonfirmasi.

                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>
</div>

@endsection