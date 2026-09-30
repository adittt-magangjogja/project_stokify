@extends('layouts.dashboard')

@section('content')
@php
    $isLowStock = $product->stock <= $product->minimum_stock;
@endphp

<main class="w-full max-w-none space-y-5">
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
        <div>
            <nav class="mb-2 flex items-center gap-2 text-xs font-medium text-slate-500" aria-label="Breadcrumb">
                <a href="{{ route('produk.index') }}" class="transition hover:text-blue-700">Produk</a>
                <span aria-hidden="true">/</span>
                <span class="text-slate-700">Detail produk</span>
            </nav>
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-blue-600">Informasi produk</p>
            <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">{{ $product->name }}</h1>
            <div class="mt-3 flex flex-wrap items-center gap-2">
                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-blue-700">{{ $product->code }}</span>
                @if($product->category)
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600">{{ $product->category->name }}</span>
                @endif
            </div>
        </div>
        <div class="flex shrink-0 items-center gap-2">
            <a href="{{ route('produk.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-semibold text-slate-600 shadow-sm transition hover:bg-slate-50 hover:text-slate-900">
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 12H5m7 7-7-7 7-7"/></svg>
                Kembali
            </a>
            @if(auth()->user()->role->value === 'Admin')
                <a href="{{ route('produk.edit', $product->id) }}" class="inline-flex items-center gap-2 rounded-xl bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-100">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m14 5 5 5M4 20l4.5-1 10.8-10.8a2.1 2.1 0 0 0-3-3L5.5 16 4 20Z"/></svg>
                    Edit produk
                </a>
            @endif
        </div>
    </div>

    <section class="grid w-full gap-4 lg:grid-cols-[minmax(280px,0.36fr)_minmax(0,0.64fr)]">
        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-sm lg:col-span-1">
            <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden rounded-xl bg-slate-50 sm:min-h-[280px]">
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-blue-50/70 via-transparent to-slate-100/60"></div>
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="relative z-10 h-[240px] w-full max-w-[320px] rounded-xl object-contain p-3 sm:h-[280px]">
                @else
                    <div class="relative z-10 flex flex-col items-center gap-3 px-6 text-center text-slate-400">
                        <span class="flex h-20 w-20 items-center justify-center rounded-2xl bg-white text-blue-500 shadow-sm ring-1 ring-slate-200">
                            <svg class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Zm0 0v9m8-4.5-8 4.5m0 0-8-4.5m8 4.5V21"/></svg>
                        </span>
                        <span class="text-sm font-medium">Belum ada gambar produk</span>
                    </div>
                @endif
                <span class="absolute left-4 top-4 z-20 inline-flex items-center gap-1.5 rounded-full border border-white/80 bg-white/90 px-3 py-1.5 text-xs font-semibold shadow-sm backdrop-blur {{ $isLowStock ? 'text-amber-700' : 'text-emerald-700' }}">
                    <span class="h-1.5 w-1.5 rounded-full {{ $isLowStock ? 'bg-amber-500' : 'bg-emerald-500' }}"></span>
                    {{ $isLowStock ? 'Stok minimum' : 'Stok tersedia' }}
                </span>
            </div>
            <div class="mt-4 flex items-center justify-between gap-4 px-1">
                <div class="min-w-0"><p class="text-xs font-medium text-slate-500">Kode produk</p><p class="mt-1 truncate font-semibold text-slate-800">{{ $product->code }}</p></div>
                <span class="rounded-lg bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-600">{{ $product->unit }}</span>
            </div>
        </article>

        <div class="min-w-0 space-y-4 lg:col-span-1">
            <section class="grid gap-3 sm:grid-cols-2" aria-label="Ringkasan produk">
                <article class="rounded-2xl border border-blue-100 bg-gradient-to-br from-white to-blue-50/70 p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Harga jual</p>
                    <p class="mt-2 text-2xl font-bold tracking-tight text-slate-900">Rp {{ number_format((float) $product->selling_price, 0, ',', '.') }}</p>
                    <p class="mt-1 text-xs text-slate-500">Harga per {{ $product->unit }}</p>
                </article>
                <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <p class="text-sm font-medium text-slate-500">Stok tersedia</p>
                    <div class="mt-1 flex items-end gap-2">
                        <p class="text-3xl font-bold tracking-tight text-slate-900">{{ number_format($product->stock) }}</p>
                        <span class="pb-1 text-sm text-slate-500">{{ $product->unit }}</span>
                    </div>
                    <p class="mt-1 text-xs {{ $isLowStock ? 'font-semibold text-amber-700' : 'text-slate-500' }}">Batas minimum: {{ number_format($product->minimum_stock) }} {{ $product->unit }}</p>
                </article>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-4 flex items-center gap-3 border-b border-slate-100 pb-4">
                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M7 4h10a2 2 0 0 1 2 2v14l-7-3-7 3V6a2 2 0 0 1 2-2Zm2 4h6m-6 4h6"/></svg>
                    </span>
                    <div><h2 class="font-bold text-slate-900">Informasi produk</h2><p class="mt-0.5 text-xs text-slate-500">Spesifikasi dan data pemasok</p></div>
                </div>

                <dl class="grid gap-x-8 gap-y-4 sm:grid-cols-2">
                    <div><dt class="text-xs font-medium text-slate-500">Kategori</dt><dd class="mt-1 text-sm font-semibold text-slate-800">{{ $product->category?->name ?? '—' }}</dd></div>
                    <div><dt class="text-xs font-medium text-slate-500">Supplier</dt><dd class="mt-1 text-sm font-semibold text-slate-800">{{ $product->supplier?->name ?? 'Tanpa supplier' }}</dd></div>
                    <div><dt class="text-xs font-medium text-slate-500">Harga beli</dt><dd class="mt-1 text-sm font-semibold text-slate-800">Rp {{ number_format((float) $product->purchase_price, 0, ',', '.') }}</dd></div>
                    <div><dt class="text-xs font-medium text-slate-500">Satuan</dt><dd class="mt-1 text-sm font-semibold text-slate-800">{{ $product->unit }}</dd></div>
                </dl>

                <div class="mt-5 border-t border-slate-100 pt-4">
                    <h3 class="text-xs font-medium text-slate-500">Deskripsi</h3>
                    <p class="mt-1.5 whitespace-pre-line text-sm leading-6 text-slate-700">{{ $product->description ?: 'Belum ada deskripsi untuk produk ini.' }}</p>
                </div>
            </section>

            <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="mb-4 flex items-center justify-between gap-3">
                    <div><h2 class="font-bold text-slate-900">Atribut produk</h2><p class="mt-0.5 text-xs text-slate-500">Spesifikasi tambahan</p></div>
                    <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">{{ $product->attributeValues->count() }} atribut</span>
                </div>
                @if($product->attributeValues->isNotEmpty())
                    <dl class="flex flex-wrap gap-2">
                        @foreach($product->attributeValues as $value)
                            <div class="rounded-xl border border-blue-100 bg-blue-50/60 px-3.5 py-2.5">
                                <dt class="text-[11px] font-medium text-slate-500">{{ $value->attribute?->name ?? 'Atribut' }}</dt>
                                <dd class="mt-0.5 text-sm font-semibold text-slate-800">{{ $value->value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                @else
                    <p class="rounded-xl bg-slate-50 px-4 py-3 text-sm text-slate-500">Belum ada atribut tambahan.</p>
                @endif
            </section>
        </div>
    </section>
</main>
@endsection
