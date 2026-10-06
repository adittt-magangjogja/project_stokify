@extends('layouts.dashboard')
@section('content')
<main class="mx-auto max-w-4xl p-6"><div class="mb-6"><h1 class="text-2xl font-bold">Edit produk</h1><p class="mt-1 text-sm text-gray-500">Stok tetap dikelola melalui transaksi atau opname.</p></div>
<form method="POST" enctype="multipart/form-data" action="{{ route('produk.update',$product->id) }}" class="grid gap-5 rounded-xl bg-white p-6 shadow-sm md:grid-cols-2">@csrf @method('PUT')
@foreach($filters as $key => $value)<input type="hidden" name="{{ $key }}" value="{{ $value }}">@endforeach
<label class="text-sm font-medium">Kode produk<input required name="code" data-product-code pattern="JS[0-9]{3,10}" minlength="5" maxlength="12" title="Gunakan format JS diikuti 3–10 angka, contoh: JS001 atau JS1000" placeholder="Contoh: JS001 atau JS1000" value="{{ old('code',$product->code) }}" class="mt-1 block w-full rounded-lg border p-2.5"><span data-product-code-error class="mt-1 hidden text-xs text-rose-600">Format kode harus JS diikuti 3–10 angka, contohnya JS001 atau JS1000.</span>@error('code')<span class="mt-1 block text-xs text-rose-600">{{ $message }}</span>@enderror</label><label class="text-sm font-medium">Nama produk<input required name="name" value="{{ old('name',$product->name) }}" class="mt-1 block w-full rounded-lg border p-2.5"></label>
<label class="text-sm font-medium text-slate-700">Kategori<select required name="category_id" data-category-select class="mt-1 block w-full rounded-xl border border-slate-300 p-2.5"><option value="">Pilih kategori</option>@foreach($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>@endforeach</select>@error('category_id')<span class="mt-1 block text-xs text-rose-600">Pilih kategori yang tersedia.</span>@enderror</label><label class="text-sm font-medium text-slate-700">Supplier <span class="font-normal text-slate-400">(opsional)</span><select name="supplier_id" data-supplier-select class="mt-1 block w-full rounded-xl border border-slate-300 p-2.5"><option value="">Tanpa supplier</option>@foreach($suppliers as $supplier)<option value="{{ $supplier->id }}" data-category-id="{{ $supplier->category_id ?? '' }}" @selected(old('supplier_id', $product->supplier_id) == $supplier->id)>{{ $supplier->name }} -- {{ $supplier->category?->name ?? 'Semua kategori' }}</option>@endforeach</select><span class="mt-1 block text-xs font-normal text-slate-400">Kategori supplier ditampilkan. Supplier khusus kategori hanya tersedia untuk kategori produk yang sesuai.</span>@error('supplier_id')<span class="mt-1 block text-xs text-rose-600">Pilih supplier yang tersedia.</span>@enderror</label>
<label class="text-sm font-medium">Satuan<select required name="unit" data-unit-select class="mt-1 block w-full rounded-lg border p-2.5"><option value="">Pilih satuan</option>@php($units = array_unique(['Pcs', 'Unit', 'Buah', 'Box', 'Pack', 'Kg', 'Gram', 'Liter', 'Meter', 'Set', $product->unit]))@foreach($units as $unit)<option value="{{ $unit }}" @selected(old('unit', $product->unit) === $unit)>{{ $unit }}</option>@endforeach</select></label><label data-package-size-field class="text-sm font-medium text-slate-700 {{ in_array(old('unit', $product->unit), ['Box', 'Pack', 'Set', 'Liter'], true) ? '' : 'hidden' }}">Isi per {{ old('unit', $product->unit) }} <span data-package-size-unit>({{ old('unit', $product->unit) === 'Liter' ? 'Liter' : 'pcs' }})</span><input type="text" inputmode="decimal" name="units_per_package" value="{{ old('units_per_package', $product->units_per_package) }}" class="mt-1 block w-full rounded-xl border border-slate-300 bg-white px-4 py-4 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-100" data-package-size-input>@error('units_per_package')<span class="mt-1 block text-xs text-rose-600">Isi jumlah per kemasan dengan benar.</span>@enderror</label><label class="text-sm font-medium">Stok minimum<input required type="number" inputmode="decimal" step="0.001" min="0" name="minimum_stock" value="{{ old('minimum_stock',$product->minimum_stock) }}" class="mt-1 block w-full rounded-lg border p-2.5"></label>
<label class="text-sm font-medium">Harga beli (Rp)<input required type="text" inputmode="numeric" data-currency-input data-currency-target="purchase_price" value="{{ number_format((float) old('purchase_price', $product->purchase_price), 0, ',', '.') }}" placeholder="Contoh: 700.000" class="mt-1 block w-full rounded-lg border p-2.5"><input type="hidden" name="purchase_price" value="{{ old('purchase_price', $product->purchase_price) }}"></label><label class="text-sm font-medium">Harga jual (Rp)<input required type="text" inputmode="numeric" data-currency-input data-currency-target="selling_price" value="{{ number_format((float) old('selling_price', $product->selling_price), 0, ',', '.') }}" placeholder="Contoh: 700.000" class="mt-1 block w-full rounded-lg border p-2.5"><input type="hidden" name="selling_price" value="{{ old('selling_price', $product->selling_price) }}"></label>
<label class="text-sm font-medium">Ganti gambar<input type="file" accept="image/*" name="image" class="mt-1 block w-full rounded-lg border p-2.5"></label><label class="text-sm font-medium md:col-span-2">Deskripsi<textarea name="description" rows="3" class="mt-1 block w-full rounded-lg border p-2.5">{{ old('description',$product->description) }}</textarea></label>
@foreach($attributes as $attribute)<label data-category-attribute data-attribute-name="{{ $attribute->name }}" data-category-ids="{{ $attribute->categories->modelKeys() ? implode(',', $attribute->categories->modelKeys()) : '' }}" class="text-sm font-medium">{{ $attribute->name }}<input data-attribute-input type="{{ \Illuminate\Support\Str::lower(trim($attribute->name)) === 'tanggal kadaluarsa' ? 'date' : 'text' }}" name="attribute_values[{{ $attribute->id }}]" value="{{ old('attribute_values.'.$attribute->id, optional($product->attributeValues->firstWhere('product_attribute_id',$attribute->id))->value) }}" class="mt-1 block w-full rounded-lg border p-2.5"></label>@endforeach
<div class="flex gap-3 md:col-span-2"><button class="rounded-lg bg-blue-700 px-5 py-2.5 font-medium text-white">Simpan perubahan</button><a class="rounded-lg border px-5 py-2.5" href="{{ route('produk.index', $filters) }}">Batal</a></div></form><script>
document.addEventListener('DOMContentLoaded', () => {
    const unit = document.querySelector('[data-unit-select]');
    const field = document.querySelector('[data-package-size-field]');
    const input = document.querySelector('[data-package-size-input]');
    const sync = () => {
        const isPackage = ['Box', 'Pack', 'Set', 'Liter'].includes(unit.value);
        field.classList.toggle('hidden', !isPackage);
        field.firstChild.textContent = `Isi per ${unit.value || 'kemasan'} `;
        field.querySelector('[data-package-size-unit]').textContent = unit.value === 'Liter' ? '(Liter)' : '(pcs)';
        input.required = isPackage;
        if (!isPackage) input.value = '';
    };
    unit.addEventListener('change', sync);
    sync();
});
</script><script>
document.addEventListener('DOMContentLoaded', () => {
    const category = document.querySelector('[data-category-select]');
    const supplier = document.querySelector('[data-supplier-select]');
    const syncAttributes = () => document.querySelectorAll('[data-category-attribute]').forEach((field) => {
        const selectedCategory = category.selectedOptions[0]?.textContent.trim().toLocaleLowerCase();
        const isTieCategory = selectedCategory === 'dasi';
        const isSizeAttribute = field.dataset.attributeName.trim().toLocaleLowerCase() === 'ukuran';
        const visible = field.dataset.categoryIds.split(',').includes(category.value) && !(isTieCategory && isSizeAttribute);
        field.classList.toggle('hidden', !visible);
        field.querySelector('[data-attribute-input]').disabled = !visible;
    });
    const syncSuppliers = () => {
        Array.from(supplier.options).forEach((option) => {
            if (!option.value) return;
            const categoryId = option.dataset.categoryId;
            option.disabled = Boolean(categoryId && category.value && categoryId !== category.value);
        });
        if (supplier.selectedOptions[0]?.disabled) supplier.value = '';
    };
    category.addEventListener('change', syncSuppliers);
    category.addEventListener('change', syncAttributes);
    syncSuppliers();
    syncAttributes();
});
</script></main>@endsection
