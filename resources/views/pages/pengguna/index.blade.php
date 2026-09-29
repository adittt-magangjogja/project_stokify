@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="flex flex-col gap-4 mb-6 sm:flex-row sm:items-center sm:justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                Pengguna
            </h1>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Kelola pengguna dan hak akses sistem Stockify.
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

            Tambah Pengguna
        </a>

    </div>

    {{-- Search --}}
    <div class="p-5 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        <div class="flex flex-col gap-4 md:flex-row">

            <div class="flex-1">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Cari Pengguna
                </label>

                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama atau email..."
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>

            <div class="w-full md:w-56">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Role
                </label>

                <select
                    name="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">

                    <option selected>Semua Role</option>
                    <option>Admin</option>
                    <option>Manager</option>
                    <option>Staff</option>

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
                Daftar Pengguna
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Role</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    {{-- User 1 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">1</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Admin Stockify
                        </td>

                        <td class="px-6 py-4">
                            admin@stockify.com
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium text-purple-800 bg-purple-100 rounded-full">
                                Admin
                            </span>
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

                    {{-- User 2 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">2</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Manager Gudang
                        </td>

                        <td class="px-6 py-4">
                            manager@stockify.com
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">
                                Manager
                            </span>
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

                    {{-- User 3 --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">3</td>

                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Staff Gudang
                        </td>

                        <td class="px-6 py-4">
                            staff@stockify.com
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded-full">
                                Staff
                            </span>
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
        <div class="flex items-center justify-between p-5">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan
                <span class="font-semibold text-gray-900 dark:text-white">1-3</span>
                dari
                <span class="font-semibold text-gray-900 dark:text-white">3</span>
                pengguna
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