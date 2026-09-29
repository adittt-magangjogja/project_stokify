@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Tambah Stok Masuk
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Catat transaksi barang masuk ke gudang.
        </p>
    </div>

    {{-- Form --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-6">

            <form>

                <div class="grid gap-6 md:grid-cols-2">

                    {{-- Kode Transaksi --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Kode Transaksi
                        </label>

                        <input
                            type="text"
                            name="kode_transaksi"
                            value="IN-004"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            placeholder="Contoh: IN-001">
                    </div>

                    {{-- Tanggal --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tanggal
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
                            name="produk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                            <option selected>Pilih Produk</option>
                            <option>Laptop ASUS</option>
                            <option>Mouse Logitech</option>
                            <option>Keyboard Mechanical</option>
                            <option>Meja Kantor</option>

                        </select>
                    </div>

                    {{-- Supplier --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Supplier
                        </label>

                        <select
                            name="supplier"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                            <option selected>Pilih Supplier</option>
                            <option>PT Maju Jaya</option>
                            <option>CV Sumber Makmur</option>
                            <option>PT Teknologi Indonesia</option>

                        </select>
                    </div>

                    {{-- Jumlah --}}
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jumlah
                        </label>

                        <input
                            type="number"
                            name="jumlah"
                            min="1"
                            placeholder="Masukkan jumlah barang"
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
                        placeholder="Masukkan keterangan jika diperlukan..."
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white"></textarea>
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
                        Simpan Stok Masuk
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection