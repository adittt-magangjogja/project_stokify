@extends('layouts.dashboard')
@section('content')<main class="mx-auto max-w-3xl p-6"><h1 class="mb-5 text-2xl font-bold">Stock opname</h1><form method="POST" action="{{ route('stok.opname.store') }}" class="grid gap-4">@csrf
<label>Produk<select required name="product_id" class="mt-1 block w-full rounded border p-2"><option value="">Pilih produk</option>@foreach($products->where('stock', '>', 0) as $product)<option value="{{ $product->id }}">{{ $product->name }} (stok sistem {{ $product->stock }})</option>@endforeach</select></label><label>Stok fisik<div class="mt-1 flex"><input required maxlength="13" pattern="[0-9]+([.][0-9]{1,3})?" inputmode="decimal" type="text" name="physical_stock" data-stepper-input class="block min-w-0 flex-1 rounded border p-2"><span class="ml-1 flex flex-col"><button type="button" data-step="1" aria-label="Tambah 1" class="flex h-1/2 items-center rounded-t border border-slate-300 px-2 text-xs text-slate-600 hover:bg-slate-100">&#9650;</button><button type="button" data-step="-1" aria-label="Kurangi 1" class="flex h-1/2 items-center rounded-b border border-t-0 border-slate-300 px-2 text-xs text-slate-600 hover:bg-slate-100">&#9660;</button></span></div>@error('physical_stock')<span class="mt-1 block text-sm text-red-600">{{ $message }}</span>@enderror</label><label>Tanggal<input type="date" name="opname_date" value="{{ now()->toDateString() }}" class="mt-1 block w-full rounded border p-2"></label><label>Catatan<textarea name="note" class="mt-1 block w-full rounded border p-2"></textarea></label><div><button class="rounded bg-blue-700 px-4 py-2 text-white">Simpan</button> <a href="{{ route('stok.opname') }}">Batal</a></div></form></main><script>
document.querySelectorAll('[data-stepper-input]').forEach(input => {
    input.parentElement.querySelectorAll('[data-step]').forEach(button => {
        button.addEventListener('click', () => {
            const current = Number(input.value.replace(',', '.')) || 0;
            input.value = Math.max(0, Math.round((current + Number(button.dataset.step)) * 1000) / 1000).toString();
            input.dispatchEvent(new Event('input', { bubbles: true }));
        });
    });
});
</script>
@endsection
