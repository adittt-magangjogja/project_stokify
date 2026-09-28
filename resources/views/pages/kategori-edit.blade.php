@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Edit Kategori
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Ubah informasi kategori produk.
        </p>
    </div>

    {{-- Card Form --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-6">

            <form action="#" method="POST">

                @csrf
                @method('PUT')

                {{-- Nama Kategori --}}
                <div class="mb-5">
                    <label for="nama"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="Elektronik"
                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                </div>

                {{-- Deskripsi --}}
                <div class="mb-5">
                    <label for="deskripsi"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="4"
                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >Perangkat elektronik dan aksesoris komputer.</textarea>
                </div>

                {{-- Tombol --}}
                <div class="flex items-center gap-3">

                    <a href="{{ route('kategori.index') }}"
                       class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection
