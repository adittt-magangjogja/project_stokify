@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            Edit Supplier
        </h1>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Ubah informasi supplier.
        </p>
    </div>


    {{-- Card Form --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="p-6">

            <form action="#" method="POST">

                @csrf
                @method('PUT')


                {{-- Nama Supplier --}}
                <div class="mb-5">

                    <label
                        for="nama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nama Supplier
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="PT Maju Jaya"
                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                </div>


                {{-- Alamat --}}
                <div class="mb-5">

                    <label
                        for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Alamat
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="4"
                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >Jl. Merdeka No. 10, Surakarta</textarea>

                </div>


                {{-- Telepon --}}
                <div class="mb-5">

                    <label
                        for="telepon"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nomor Telepon
                    </label>

                    <input
                        type="text"
                        id="telepon"
                        name="telepon"
                        value="081234567890"
                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                </div>


                {{-- Email --}}
                <div class="mb-5">

                    <label
                        for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="majujaya@email.com"
                        class="block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                </div>


                {{-- Tombol --}}
                <div class="flex items-center gap-3">

                    {{-- Batal --}}
                    <a
                        href="{{ route('supplier.index') }}"
                        class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600">

                        Batal

                    </a>


                    {{-- Simpan --}}
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