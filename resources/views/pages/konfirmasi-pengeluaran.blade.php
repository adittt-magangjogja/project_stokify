@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">
    <div class="p-4 mt-14">

        {{-- Header --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Konfirmasi Barang Keluar
            </h1>

            <p class="mt-2 text-gray-500 dark:text-gray-400">
                Konfirmasi barang yang akan dikeluarkan dari gudang.
            </p>

        </div>


        {{-- Informasi --}}
        <div class="p-4 mb-6 text-sm text-blue-800 rounded-lg bg-blue-50
                    dark:bg-gray-800 dark:text-blue-400">

            Silakan periksa barang sebelum melakukan konfirmasi pengeluaran.

        </div>


        {{-- Table --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm
                    dark:bg-gray-800 dark:border-gray-700">

            <div class="p-6">

                <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                    Daftar Barang Keluar
                </h2>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-100
                                   dark:bg-gray-700 dark:text-gray-400">

                        <tr>

                            <th class="px-6 py-4">
                                No
                            </th>

                            <th class="px-6 py-4">
                                Kode
                            </th>

                            <th class="px-6 py-4">
                                Produk
                            </th>

                            <th class="px-6 py-4">
                                Tujuan
                            </th>

                            <th class="px-6 py-4">
                                Jumlah
                            </th>

                            <th class="px-6 py-4 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        {{-- Data akan diisi dari backend --}}

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>

@endsection