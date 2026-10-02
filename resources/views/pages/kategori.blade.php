@extends('layouts.dashboard')

@section('content')
<div class="mx-auto max-w-7xl space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-emerald-800">Master data</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Kategori produk</h1>
            <p class="mt-2 text-sm text-slate-500">Kelola pengelompokan produk agar inventaris lebih teratur.</p>
        </div>
        <a href="{{ route('kategori.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-800 px-5 py-3 text-sm font-semibold text-white shadow-sm shadow-emerald-900/15 transition hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-emerald-100">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"/></svg>
            Tambah kategori
        </a>
    </div>

    @if(session('success'))
        <div role="status" class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div role="alert" class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-800">{{ session('error') }}</div>
    @endif

    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="flex items-center justify-between border-b border-slate-100 px-5 py-4 sm:px-6">
            <div>
                <h2 class="font-semibold text-slate-900">Daftar kategori</h2>
                <p class="mt-1 text-sm text-slate-500">{{ $categories->count() }} kategori terdaftar</p>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[640px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr><th class="px-6 py-4 font-semibold">Nama kategori</th><th class="px-6 py-4 font-semibold">Deskripsi</th><th class="px-6 py-4 text-right font-semibold">Aksi</th></tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                        <tr class="transition hover:bg-slate-50/80">
                            <td class="px-6 py-4 font-semibold text-slate-800">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-slate-600">{{ $category->description ?: '—' }}</td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-3">
                                    <a class="font-semibold text-emerald-800 transition hover:text-emerald-950" href="{{ route('kategori.edit', $category) }}">Edit</a>
                                    <form method="POST" action="{{ route('kategori.destroy', $category) }}" data-delete-confirm data-delete-name="{{ $category->name }}">@csrf @method('DELETE')
                                        <button type="submit" class="font-semibold text-rose-600 transition hover:text-rose-800">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" class="px-6 py-14 text-center"><p class="font-semibold text-slate-700">Belum ada kategori</p><p class="mt-1 text-sm text-slate-500">Tambahkan kategori pertama untuk mulai mengelompokkan produk.</p></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection

