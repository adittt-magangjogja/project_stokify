@extends('layouts.dashboard')
@section('content')<main class="mx-auto max-w-3xl p-6"><h1 class="mb-5 text-2xl font-bold">Tambah stok masuk</h1><form method="POST" action="{{ route('stok.masuk.store') }}" class="grid gap-4 md:grid-cols-2" onsubmit="const button=this.querySelector('button[type=submit]');if(button.disabled)return false;button.disabled=true;button.textContent='Menyimpan…';">@csrf<input type="hidden" name="type" value="in"><input type="hidden" name="request_key" value="{{ (string) \Illuminate\Support\Str::uuid() }}">
<label>Produk<select required name="product_id" id="stock-product" class="mt-1 block w-full rounded border p-2"><option value="">Pilih produk</option>@foreach($products as $product)<option value="{{ $product->id }}" data-category-id="{{ $product->category_id }}">{{ $product->name }} -- {{ $product->category?->name ?? 'Tanpa kategori' }}</option>@endforeach</select></label><label>Supplier<select required name="supplier_id" id="stock-supplier" class="mt-1 block w-full rounded border p-2" disabled><option value="">Pilih produk terlebih dahulu</option>@foreach($suppliers as $supplier)<option value="{{ $supplier->id }}" data-category-id="{{ $supplier->category_id ?? '' }}">{{ $supplier->name }} -- {{ $supplier->category?->name ?? 'Semua kategori' }}</option>@endforeach</select><span class="mt-1 block text-xs text-slate-500">Supplier difilter menurut kategori produk.</span></label><label>Jumlah<input required min="0.001" step="0.001" inputmode="decimal" type="number" name="quantity" class="mt-1 block w-full rounded border p-2"></label><label>Tanggal<input type="date" name="transaction_date" value="{{ now()->toDateString() }}" class="mt-1 block w-full rounded border p-2"></label><label class="md:col-span-2">Catatan<textarea name="note" class="mt-1 block w-full rounded border p-2"></textarea></label><div class="md:col-span-2"><button type="submit" class="rounded bg-blue-700 px-4 py-2 text-white">Simpan</button> <a href="{{ route('stok.masuk') }}">Batal</a></div></form></main><script>
(() => {
    const product = document.getElementById('stock-product');
    const supplier = document.getElementById('stock-supplier');
    const options = [...supplier.options].slice(1);
    const placeholder = supplier.options[0];
    const filterSuppliers = () => {
        const categoryId = product.selectedOptions[0]?.dataset.categoryId;
        supplier.value = '';
        supplier.disabled = !categoryId;
        placeholder.textContent = categoryId ? 'Pilih supplier' : 'Pilih produk terlebih dahulu';
        options.forEach(option => {
            option.hidden = !categoryId || (option.dataset.categoryId && option.dataset.categoryId !== categoryId);
        });
    };
    product.addEventListener('change', filterSuppliers);
    filterSuppliers();
})();
</script>
@endsection
