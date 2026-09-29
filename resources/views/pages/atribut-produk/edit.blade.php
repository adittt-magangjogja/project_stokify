@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    <div class="mb-6">

        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Edit Atribut Produk
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Ubah informasi atribut produk.
        </p>

    </div>

    <div class="max-w-3xl bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <form class="p-6">

            @csrf
            @method('PUT')

            {{-- Nama Atribut --}}
            <div class="mb-5">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Atribut
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', 'Warna') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                @error('name')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Nilai Atribut --}}
            <div class="mb-5">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nilai Atribut
                </label>

                <textarea
                    name="values"
                    rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('values', 'Hitam, Putih, Merah, Biru') }}</textarea>

                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Pisahkan setiap nilai menggunakan tanda koma.
                </p>

                @error('values')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Status --}}
            <div class="mb-5">

                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Status
                </label>

                <select
                    name="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    <option value="active" selected>
                        Aktif
                    </option>

                    <option value="inactive">
                        Nonaktif
                    </option>

                </select>

            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3">

                <a href="#"
                   class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    Batal
                </a>

                <button
                    type="button"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection