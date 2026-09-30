@extends('layouts.dashboard')
@section('content')
<div class="mx-auto max-w-[1500px] space-y-5">
    <section class="rounded-2xl bg-gradient-to-r from-white to-emerald-50 px-6 py-6">
        <p class="text-xs font-bold uppercase tracking-[0.17em] text-blue-600">Stockify / Staff gudang</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Halo, {{ auth()->user()->name }} <span aria-hidden="true">👋</span></h1>
        <p class="mt-2 text-sm text-slate-500">Berikut tugas konfirmasi yang perlu ditangani hari ini.</p>
    </section>

    <section class="grid gap-4 xl:grid-cols-2">
        @foreach(['Masuk' => $pending_in, 'Keluar' => $pending_out] as $type => $items)
            <article class="dashboard-card overflow-hidden p-0">
                <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4 sm:px-6">
                    <div><h2 class="font-bold text-slate-900">Konfirmasi barang {{ strtolower($type) }}</h2><p class="mt-1 text-xs text-slate-500">Periksa barang lalu konfirmasi penerimaan atau pengiriman.</p></div>
                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">{{ $items->count() }} tugas</span>
                </div>
                <div class="divide-y divide-slate-100 px-5 sm:px-6">
                    @forelse($items as $item)
                        <div class="flex flex-col gap-3 py-4 sm:flex-row sm:items-center sm:justify-between">
                            <div><p class="font-semibold text-slate-800">{{ $item->product->name }}</p><p class="mt-1 text-xs text-slate-500">{{ number_format($item->quantity) }} unit <span class="mx-1">·</span> {{ $item->transaction_date->format('d M Y') }}</p></div>
                            <form method="POST" action="{{ route('konfirmasi-barang.confirm', $item->id) }}">@csrf<button class="rounded-lg bg-blue-600 px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-100">Konfirmasi</button></form>
                        </div>
                    @empty
                        <div class="py-12 text-center"><p class="font-semibold text-slate-700">Tidak ada tugas tertunda</p><p class="mt-1 text-xs text-slate-500">Semua transaksi barang {{ strtolower($type) }} sudah diproses.</p></div>
                    @endforelse
                </div>
            </article>
        @endforeach
    </section>
</div>
@endsection
