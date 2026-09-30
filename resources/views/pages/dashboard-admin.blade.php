@extends('layouts.dashboard')

@section('content')
<div class="mx-auto max-w-[1600px] space-y-5">
    <section class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-white via-white to-emerald-50 px-6 py-6 sm:px-8">
        <div class="relative z-10 flex flex-col justify-between gap-5 lg:flex-row lg:items-center">
            <div class="max-w-2xl">
                <p class="text-xs font-bold uppercase tracking-[0.17em] text-blue-600">Stockify / Admin</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Halo, {{ auth()->user()->name }} <span aria-hidden="true">👋</span></h1>
                <p class="mt-2 max-w-xl text-sm leading-6 text-slate-500">Selamat datang di sistem manajemen stok. Berikut ringkasan aktivitas dan kondisi stok Anda hari ini.</p>
            </div>
            <div class="flex shrink-0 items-center gap-3 rounded-xl border border-blue-100 bg-white/80 px-4 py-3 text-sm shadow-sm">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 3v3m8-3v3M4 9h16M5 5h14a1 1 0 0 1 1 1v14H4V6a1 1 0 0 1 1-1Z"/></svg>
                </span>
                <span><strong id="dashboard-date" class="block text-slate-800">{{ now()->setTimezone('Asia/Jakarta')->locale('id')->translatedFormat('l, d F Y') }}</strong><time id="dashboard-time" class="mt-0.5 block text-xs text-slate-500" datetime="{{ now()->setTimezone('Asia/Jakarta')->toIso8601String() }}" data-timezone="Asia/Jakarta">{{ now()->setTimezone('Asia/Jakarta')->format('H:i') }} WIB</time></span>
            </div>
        </div>
        <svg class="pointer-events-none absolute -right-3 -top-8 hidden h-48 w-64 text-emerald-100/80 lg:block" viewBox="0 0 240 180" fill="none" aria-hidden="true">
            <path d="M31 137h181v27H31z" fill="currentColor"/><path d="M55 137V74l67-42 67 42v63" stroke="currentColor" stroke-width="12" stroke-linejoin="round"/><path d="M99 137V96h46v41M70 91h20v20H70zm84 0h20v20h-20z" fill="currentColor"/><circle cx="35" cy="53" r="25" fill="currentColor" opacity=".35"/><circle cx="204" cy="45" r="34" fill="currentColor" opacity=".45"/>
        </svg>
    </section>

    <section class="grid gap-4 md:grid-cols-3" aria-label="Ringkasan stok">
        <article class="stat-card stat-card-blue">
            <span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Zm0 0v9m8-4.5-8 4.5m0 0-8-4.5m8 4.5V21"/></svg></span>
            <div class="min-w-0 flex-1"><p class="text-sm text-slate-600">Total produk</p><strong class="mt-1 block text-3xl font-bold text-slate-900">{{ number_format($total_products) }}</strong><a href="{{ route('produk.index') }}" class="mt-1 inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:text-blue-800">Lihat produk <span aria-hidden="true">→</span></a></div>
            <span class="stat-arrow">→</span>
        </article>
        <article class="stat-card stat-card-green">
            <span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Zm0 0v9m8-4.5-8 4.5m0 0-8-4.5m8 4.5V21"/></svg></span>
            <div class="min-w-0 flex-1"><p class="text-sm text-emerald-800">Barang masuk</p><strong class="mt-1 block text-3xl font-bold text-emerald-950">{{ number_format($in_count) }}</strong><p class="mt-1 text-xs text-emerald-700">Transaksi terkonfirmasi</p></div>
            <span class="stat-arrow">→</span>
        </article>
        <article class="stat-card stat-card-rose">
            <span class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke-width="1.8"/><path stroke-linecap="round" stroke-width="2" d="M8 12h8"/></svg></span>
            <div class="min-w-0 flex-1"><p class="text-sm text-rose-800">Barang keluar</p><strong class="mt-1 block text-3xl font-bold text-rose-950">{{ number_format($out_count) }}</strong><p class="mt-1 text-xs text-rose-700">Transaksi terkonfirmasi</p></div>
            <span class="stat-arrow">→</span>
        </article>
    </section>

    <section class="grid gap-4 xl:grid-cols-5">
        <article class="dashboard-card xl:col-span-3">
            <div class="mb-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3"><span class="panel-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 19V5m0 14h16M8 15V9m4 6V5m4 10v-4m4 4V7"/></svg></span><div><h2 class="text-base font-bold text-slate-900">Grafik stok barang</h2><p class="mt-0.5 text-xs text-slate-500">10 produk dengan jumlah stok tertinggi</p></div></div>
                <a href="{{ route('produk.index') }}" class="rounded-full border border-blue-100 px-3 py-1.5 text-xs font-semibold text-blue-600 transition hover:bg-blue-50">Lihat semua <span aria-hidden="true">›</span></a>
            </div>
            @if($stock_chart->isNotEmpty())
                <div class="mb-2 flex items-center justify-between rounded-xl bg-blue-50/70 px-4 py-3">
                    <span class="text-xs font-medium text-slate-600">Total stok dari produk teratas</span>
                    <strong class="text-sm font-bold text-blue-700">{{ number_format($stock_chart->sum()) }} unit</strong>
                </div>
            @else
                <p class="mb-2 rounded-xl bg-slate-50 px-4 py-3 text-xs text-slate-500">Grafik akan menampilkan perbandingan saat produk tersedia.</p>
            @endif
            <div id="stock-overview-chart" class="h-[290px] w-full" data-labels="{{ json_encode($stock_chart->keys()->values()) }}" data-values="{{ json_encode($stock_chart->values()->values()) }}" role="img" aria-label="Grafik jumlah stok per produk"></div>
        </article>

        <article class="dashboard-card xl:col-span-2">
            <div class="mb-4 flex items-center gap-3"><span class="panel-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke-width="1.8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 7v5l3 2"/></svg></span><div><h2 class="text-base font-bold text-slate-900">Aktivitas terbaru</h2><p class="mt-0.5 text-xs text-slate-500">Perubahan terakhir di aplikasi</p></div></div>
            <div class="divide-y divide-slate-100">
                @forelse($recent_activities as $activity)
                    <div class="flex gap-3 py-3 first:pt-0"><span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-50 text-blue-500"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m12-14a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/></svg></span><div class="min-w-0"><p class="text-xs font-bold text-slate-800">{{ $activity->user?->name ?? 'System' }}</p><p class="mt-1 text-xs text-slate-600">{{ $activity->description }}</p><time class="mt-1 block text-[11px] text-slate-400">{{ $activity->created_at?->diffForHumans() }}</time></div></div>
                @empty
                    <div class="py-10 text-center"><p class="text-sm font-semibold text-slate-700">Belum ada aktivitas</p><p class="mt-1 text-xs text-slate-500">Aktivitas terbaru akan ditampilkan di sini.</p></div>
                @endforelse
            </div>
            <a href="{{ route('laporan.aktivitas') }}" class="mt-3 inline-flex items-center gap-1 text-xs font-semibold text-blue-600 hover:text-blue-800">Buka laporan aktivitas <span aria-hidden="true">→</span></a>
        </article>
    </section>
</div>
@endsection
