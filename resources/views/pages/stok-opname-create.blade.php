@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Tambah Stok Opname
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Catat hasil pemeriksaan stok fisik barang di gudang.
        </p>
    </div>

    {{-- Form --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-6">

            <form>

                <div class="grid gap-6 md:grid-cols-2">

                    {{-- Tanggal --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal Opname
                        </label>

                        <input
                            type="date"
                            name="tanggal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    {{-- Produk --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Produk
                        </label>

                        <select
                            name="product_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                            <option selected>Pilih Produk</option>
                            <option value="1">PRD001 - Laptop ASUS</option>
                            <option value="2">PRD002 - Mouse Logitech</option>
                            <option value="3">PRD003 - Keyboard Mechanical</option>
                            <option value="4">PRD004 - Meja Kantor</option>

                        </select>
                    </div>

                    {{-- Stok Sistem --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Stok Sistem
                        </label>

                        <input
                            type="number"
                            name="system_stock"
                            placeholder="Stok dari sistem"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    {{-- Stok Fisik --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Stok Fisik
                        </label>

                        <input
                            type="number"
                            name="physical_stock"
                            min="0"
                            placeholder="Masukkan hasil hitung fisik"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                </div>

                {{-- Keterangan --}}
                <div class="mt-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        placeholder="Masukkan keterangan jika terdapat selisih stok..."
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"></textarea>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-3 mt-6">

                    <a
                        href="#"
                        class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                        Batal
                    </a>

                    <button
                        type="button"
                        class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        Simpan Stok Opname
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection