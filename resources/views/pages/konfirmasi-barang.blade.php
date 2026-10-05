@extends('layouts.dashboard')

@section('content')
<main class="p-6">
    <h1 class="mb-5 text-2xl font-bold">Konfirmasi transaksi stok</h1>

    @if(session('success'))
        <p class="mb-4 text-green-700">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-700">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="overflow-x-auto rounded bg-white shadow">
        <table class="w-full text-left">
            <thead>
                <tr>
                    <th class="p-3">Tanggal</th>
                    <th class="p-3">Tipe</th>
                    <th class="p-3">Produk</th>
                    <th class="p-3">Jumlah</th>
                    <th class="p-3">Catatan</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $item)
                    @php
                        $insufficientStock = $item->type === 'out' && $item->product->stock < $item->quantity;
                    @endphp
                    <tr class="border-t">
                        <td class="p-3">{{ $item->transaction_date->format('Y-m-d') }}</td>
                        <td class="p-3">{{ $item->type === 'in' ? 'Masuk' : 'Keluar' }}</td>
                        <td class="p-3">{{ $item->product->name }}</td>
                        <td class="p-3">{{ (int) $item->quantity }}</td>
                        <td class="p-3">{{ $item->note }}</td>
                        <td class="p-3">
                            @if($insufficientStock)
                                <span class="text-red-600 text-sm font-medium">
                                    Stok tidak cukup (tersisa {{ (int) $item->product->stock }})
                                </span>
                            @else
                                <form method="POST" action="{{ route('konfirmasi-barang.confirm', $item->id) }}">
                                    @csrf
                                    <button class="rounded bg-green-700 px-3 py-2 text-white hover:bg-green-800">
                                        Konfirmasi
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-3">Tidak ada transaksi menunggu konfirmasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
