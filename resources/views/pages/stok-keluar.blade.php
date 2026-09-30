@extends('layouts.dashboard')

@section('content')
<main class="space-y-5">
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
        <div><p class="text-xs font-bold uppercase tracking-[0.16em] text-rose-600">Operasional</p><h1 class="mt-1 text-2xl font-bold text-slate-900">Stok keluar</h1><p class="mt-1 text-sm text-slate-500">Pantau barang yang dikeluarkan dan status konfirmasinya.</p></div>
        <a class="inline-flex items-center justify-center rounded-xl bg-blue-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-800" href="{{ route('stok.keluar.create') }}">Catat stok keluar</a>
    </div>

    <section class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
        <div class="mb-3"><h2 class="font-bold text-slate-900">Grafik pergerakan stok</h2><p class="mt-1 text-sm text-slate-500">Jumlah barang masuk dan keluar yang dikonfirmasi · 14 hari terakhir</p></div>
        <div data-stock-flow-chart data-labels='@json($chartLabels)' data-incoming='@json($incomingValues)' data-outgoing='@json($outgoingValues)' class="min-h-[280px]"></div>
    </section>

    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-4 py-4 sm:px-5"><h2 class="font-bold text-slate-900">Riwayat stok keluar</h2><p class="mt-1 text-sm text-slate-500">Daftar transaksi barang keluar.</p></div>
        <div class="overflow-x-auto"><table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500"><tr><th class="px-4 py-3 sm:px-5">Tanggal</th><th class="px-4 py-3 sm:px-5">Produk</th><th class="px-4 py-3 sm:px-5">Jumlah</th><th class="px-4 py-3 sm:px-5">Status</th></tr></thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($transactions as $item)
                    <tr class="text-slate-700"><td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $item->transaction_date->format('Y-m-d') }}</td><td class="px-4 py-3 font-medium text-slate-900 sm:px-5">{{ $item->product->name }}</td><td class="px-4 py-3 sm:px-5">{{ number_format($item->quantity) }} {{ $item->product->unit }}</td><td class="px-4 py-3 sm:px-5"><span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $item->status === 'confirmed' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }}">{{ ucfirst($item->status) }}</span></td></tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-10 text-center text-slate-500">Belum ada transaksi stok keluar.</td></tr>
                @endforelse
            </tbody>
        </table></div>
        <div class="border-t border-slate-100 px-4 py-3 sm:px-5">{{ $transactions->links() }}</div>
    </section>
</main>
@endsection
