@extends('layouts.dashboard')

@section('content')
<main class="space-y-5">
    <div>
        <p class="text-xs font-bold uppercase tracking-[0.16em] text-blue-600">Aktivitas gudang</p>
        <h1 class="mt-1 text-2xl font-bold text-slate-900">Riwayat transaksi</h1>
        <p class="mt-1 text-sm text-slate-500">Transaksi barang masuk dan keluar yang sudah dikonfirmasi staf.</p>
    </div>

    <form method="GET" class="flex flex-wrap items-end gap-3 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
        <label class="text-sm font-medium text-slate-700">Tipe transaksi
            <select name="type" class="mt-1 block rounded-lg border-slate-300 text-sm">
                <option value="">Semua tipe</option>
                <option value="in" @selected(request('type') === 'in')>Barang masuk</option>
                <option value="out" @selected(request('type') === 'out')>Barang keluar</option>
            </select>
        </label>
        <label class="text-sm font-medium text-slate-700">Dikonfirmasi dari
            <input type="date" name="from" value="{{ request('from') }}" class="mt-1 block rounded-lg border-slate-300 text-sm">
        </label>
        <label class="text-sm font-medium text-slate-700">Sampai
            <input type="date" name="to" value="{{ request('to') }}" class="mt-1 block rounded-lg border-slate-300 text-sm">
        </label>
        <button class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800">Terapkan filter</button>
        <a href="{{ route('riwayat-transaksi') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50">Reset</a>
    </form>

    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr><th class="px-4 py-3 sm:px-5">Waktu konfirmasi</th><th class="px-4 py-3 sm:px-5">Tipe</th><th class="px-4 py-3 sm:px-5">Produk</th><th class="px-4 py-3 sm:px-5">Jumlah</th><th class="px-4 py-3 sm:px-5">Supplier</th><th class="px-4 py-3 sm:px-5">Dibuat oleh</th><th class="px-4 py-3 sm:px-5">Dikonfirmasi oleh</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($transactions as $item)
                        <tr class="text-slate-700">
                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{ $item->confirmed_at?->format('d-m-Y H:i') ?? '—' }}</td>
                            <td class="px-4 py-3 sm:px-5"><span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $item->type === 'in' ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">{{ $item->type === 'in' ? 'Masuk' : 'Keluar' }}</span></td>
                            <td class="px-4 py-3 font-medium text-slate-900 sm:px-5">{{ $item->product?->name ?? 'Produk dihapus' }}</td>
                            <td class="px-4 py-3 sm:px-5">{{ number_format($item->quantity) }} {{ $item->product?->unit }}</td>
                            <td class="px-4 py-3 sm:px-5">{{ $item->supplier?->name ?? '—' }}</td>
                            <td class="px-4 py-3 sm:px-5">{{ $item->user?->name ?? '—' }}</td>
                            <td class="px-4 py-3 sm:px-5">{{ $item->confirmer?->name ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-4 py-12 text-center text-slate-500">Belum ada transaksi yang dikonfirmasi pada filter ini.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-slate-100 px-4 py-3 sm:px-5">{{ $transactions->links() }}</div>
    </section>
</main>
@endsection
