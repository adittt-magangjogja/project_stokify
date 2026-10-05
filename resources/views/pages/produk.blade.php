@extends('layouts.dashboard')

@section('content')

<div class="p-4 lg:p-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Produk</h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
            Kelola data produk dan persediaan Stockify.
        </p>
    </div>

    {{-- Notifikasi sukses / error --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 bg-green-50 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 bg-red-50 rounded-lg dark:bg-gray-800 dark:text-red-400" role="alert">
            {{ session('error') }}
        </div>
    @endif

    {{-- Card utama --}}
    <div class="bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">

        {{-- Header tabel --}}
        <div class="flex flex-col gap-4 p-5 lg:flex-row lg:items-center lg:justify-between">

            <div>
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Produk</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    Menampilkan daftar produk yang tersedia
                </p>
            </div>

            <div class="flex flex-col gap-2 sm:flex-row">

                {{-- Tombol tambah --}}
                <a href="{{ route('produk.create') }}"
                   class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Produk
                </a>
                @if (auth()->user()->role->value === 'Admin')
                <a href="{{ route('produk.export') }}" class="rounded-lg bg-green-700 px-4 py-2 text-white">Export Excel</a>
                @endif

            </div>

        </div>

        @if (auth()->user()->role->value === 'Admin')
        <form method="POST" action="{{ route('produk.import') }}" enctype="multipart/form-data" class="flex flex-wrap items-center gap-3 border-t p-5">
            @csrf
            <label class="text-sm font-medium">Import produk (.xlsx/.csv)<input required type="file" name="file" accept=".xlsx,.xls,.csv" class="ml-3 text-sm"></label>
            <button class="rounded-lg bg-indigo-700 px-4 py-2 text-white">Import</button>
            @error('file')<span class="text-sm text-red-600">{{ $message }}</span>@enderror
        </form>
        @endif


        {{-- Filter dan Search (dibungkus form GET supaya benar-benar terkirim) --}}
        <form method="GET" action="{{ route('produk.index') }}" class="flex flex-col gap-3 px-5 pb-5 md:flex-row">

            {{-- Search --}}
            <div class="relative w-full md:max-w-md">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0z"></path>
                    </svg>
                </div>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari kode atau nama produk..."
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            </div>

            {{-- Filter kategori --}}
            <select
                name="category_id"
                class="p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            {{-- Filter stok --}}
            <select
                name="stok"
                class="p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="">Semua Stok</option>
                <option value="tersedia" @selected(request('stok') == 'tersedia')>Stok Tersedia</option>
                <option value="minimum" @selected(request('stok') == 'minimum')>Stok Minimum</option>
                <option value="habis" @selected(request('stok') == 'habis')>Stok Habis</option>
            </select>

            {{-- Tombol cari & reset --}}
            <div class="flex gap-2">
                <button type="submit"
                    class="px-4 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Cari
                </button>
                <a href="{{ route('produk.index') }}"
                   class="px-4 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    Reset
                </a>
            </div>

        </form>


        {{-- Tabel Produk --}}
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Kode</th>
                        <th class="px-6 py-3">Nama Produk</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Harga</th>
                        <th class="px-6 py-3">Stok</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">{{ $products->firstItem() + $loop->index }}</td>

                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $product->code }}</td>

                            <td class="px-6 py-4">{{ $product->name }}</td>

                            <td class="px-6 py-4">{{ $product->category->name ?? '-' }}</td>

                            <td class="px-6 py-4">Rp {{ number_format((float) $product->selling_price, 0, ',', '.') }}</td>

                            {{-- Stok produk --}}
                            @php
                                $stock = $product->stock ?? 0;
                                $formattedStock = number_format($stock);
                            @endphp

                            <td class="px-6 py-4 font-semibold
                                {{ $stock == 0 ? 'text-red-600' : ($stock <= $product->minimum_stock ? 'text-yellow-600' : '') }}">
                                {{ $formattedStock }}
                            </td>

                            <td class="px-6 py-4">
                                @if ($stock == 0)
                                    <span class="px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded dark:bg-red-900 dark:text-red-300">
                                        Habis
                                    </span>
                                @elseif ($stock <= $product->minimum_stock)
                                    <span class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded dark:bg-yellow-900 dark:text-yellow-300">
                                        Stok Minimum
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded dark:bg-green-900 dark:text-green-300">
                                        Tersedia
                                    </span>
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">

                                    {{-- Detail --}}
                                    <a href="{{ route('produk.detail', $product->id) }}"
                                       class="px-3 py-2 text-xs font-medium text-blue-700 bg-blue-100 rounded-lg hover:bg-blue-200 dark:bg-blue-900 dark:text-blue-300">
                                        Detail
                                    </a>

                                    @if (auth()->user()->role->value === 'Admin')
                                    <a href="{{ route('produk.edit', array_merge(['id' => $product->id], request()->only('search', 'category_id', 'stok'))) }}"
                                       class="px-3 py-2 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-lg hover:bg-yellow-200 dark:bg-yellow-900 dark:text-yellow-300">
                                        Edit
                                    </a>

                                    {{-- Hapus (membuka modal konfirmasi) --}}
                                 <button type="button"
                                    data-delete-trigger
                                    data-action="{{ route('produk.destroy', $product->id) }}"
                                    data-name="{{ $product->name }}"
                                    data-delete-type="produk"
                                    class="btn-delete px-3 py-2 text-xs font-medium text-red-700 bg-red-100 rounded-lg hover:bg-red-200 dark:bg-red-900 dark:text-red-300">
                                    Hapus
                                    </button>
                                    @endif

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr class="bg-white dark:bg-gray-800">
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        <div class="flex flex-col items-center justify-between gap-4 p-5 md:flex-row">

            <span class="text-sm text-gray-500 dark:text-gray-400">
                Menampilkan
                <span class="font-semibold text-gray-900 dark:text-white">{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</span>
                dari
                <span class="font-semibold text-gray-900 dark:text-white">{{ $products->total() }}</span>
                produk
            </span>

            <div>
                {{ $products->links() }}
            </div>

        </div>

    </div>

</div>



@endsection

