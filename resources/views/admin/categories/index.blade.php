@extends('layouts.dashboard')

@section('content')
    <section class="p-4 sm:p-6">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">Kategori</h1>
            <a href="{{ route('admin.categories.create') }}" class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800">Tambah kategori</a>
        </div>

        @if (session('success'))
            <div class="mb-4 rounded-lg bg-green-100 p-4 text-sm text-green-800">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
            <table class="w-full text-left text-sm text-gray-600 dark:text-gray-300">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-300">
                    <tr><th class="px-6 py-3">Nama</th><th class="px-6 py-3">Deskripsi</th><th class="px-6 py-3">Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr class="border-t dark:border-gray-700">
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4">{{ $category->description ?: '—' }}</td>
                            <td class="px-6 py-4">
                                <a class="mr-3 text-blue-600 hover:underline" href="{{ route('admin.categories.edit', $category) }}">Ubah</a>
                                <form class="inline" method="POST" action="{{ route('admin.categories.destroy', $category) }}" onsubmit="return confirm('Hapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td class="px-6 py-6 text-center" colspan="3">Belum ada kategori.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
