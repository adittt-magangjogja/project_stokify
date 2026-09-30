@extends('layouts.dashboard')
@section('content')
<div class="mx-auto max-w-[1600px] space-y-5">
    <section class="rounded-2xl bg-gradient-to-r from-white to-emerald-50 px-6 py-6">
        <p class="text-xs font-bold uppercase tracking-[0.17em] text-blue-600">Stockify / Manajer gudang</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Halo, {{ auth()->user()->name }} <span aria-hidden="true">👋</span></h1>
        <p class="mt-2 text-sm text-slate-500">Pantau pergerakan dan kondisi persediaan gudang hari ini.</p>
    </section>

    <section class="grid gap-4 md:grid-cols-3">
        <article class="stat-card stat-card-green"><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v12m0 0 4-4m-4 4-4-4M4 19h16"/></svg></span><div><p class="text-sm text-emerald-800">Stok masuk hari ini</p><strong class="mt-1 block text-3xl font-bold text-emerald-950">{{ number_format($in_today) }}</strong><p class="mt-1 text-xs text-emerald-700">Transaksi tercatat</p></div></article>
        <article class="stat-card stat-card-rose"><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21V9m0 0 4 4m-4-4-4 4m-4-8h16"/></svg></span><div><p class="text-sm text-rose-800">Stok keluar hari ini</p><strong class="mt-1 block text-3xl font-bold text-rose-950">{{ number_format($out_today) }}</strong><p class="mt-1 text-xs text-rose-700">Transaksi tercatat</p></div></article>
        <article class="stat-card stat-card-blue"><span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.3 3.9 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3l-7.5-13.1a2 2 0 0 0-3.4 0Z"/></svg></span><div><p class="text-sm text-blue-800">Produk stok rendah</p><strong class="mt-1 block text-3xl font-bold text-slate-900">{{ number_format($low_stock->count()) }}</strong><p class="mt-1 text-xs text-slate-500">Perlu diperiksa</p></div></article>
    </section>

    <section class="dashboard-card overflow-hidden p-0">
        <div class="border-b border-slate-100 px-5 py-4 sm:px-6"><h2 class="font-bold text-slate-900">Perlu restock</h2><p class="mt-1 text-xs text-slate-500">Produk yang stoknya mencapai batas minimum.</p></div>
        <div class="overflow-x-auto"><table class="w-full min-w-[560px] text-left text-sm"><thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500"><tr><th class="px-6 py-3 font-semibold">Produk</th><th class="px-6 py-3 font-semibold">Stok tersedia</th><th class="px-6 py-3 font-semibold">Batas minimum</th><th class="px-6 py-3 font-semibold">Status</th></tr></thead><tbody class="divide-y divide-slate-100">@forelse($low_stock as $product)<tr class="hover:bg-slate-50"><td class="px-6 py-4 font-semibold text-slate-800">{{ $product->name }}</td><td class="px-6 py-4 text-slate-600">{{ number_format($product->stock) }}</td><td class="px-6 py-4 text-slate-600">{{ number_format($product->minimum_stock) }}</td><td class="px-6 py-4"><span class="rounded-full bg-rose-50 px-2.5 py-1 text-xs font-semibold text-rose-700">Perlu restock</span></td></tr>@empty<tr><td colspan="4" class="px-6 py-12 text-center"><p class="font-semibold text-slate-700">Stok aman</p><p class="mt-1 text-xs text-slate-500">Tidak ada produk yang perlu di-restock saat ini.</p></td></tr>@endforelse</tbody></table></div>
    </section>
</div>
@endsection
