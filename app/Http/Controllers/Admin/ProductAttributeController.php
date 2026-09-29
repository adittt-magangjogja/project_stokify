<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductAttributeController extends Controller
{
    public function index() { return view('pages.atribut-produk.index', ['attributes' => ProductAttribute::withCount('values')->orderBy('name')->paginate(15)]); }
    public function create() { return view('pages.atribut-produk.create'); }
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:100|unique:product_attributes,name']);
        ProductAttribute::create($data);
        return redirect()->route('atribut-produk.index')->with('success', 'Atribut ditambahkan.');
    }
    public function edit(ProductAttribute $attribute) { return view('pages.atribut-produk.edit', compact('attribute')); }
    public function update(Request $request, ProductAttribute $attribute)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:100', Rule::unique('product_attributes', 'name')->ignore($attribute->id)]]);
        $attribute->update($data);
        return redirect()->route('atribut-produk.index')->with('success', 'Atribut diperbarui.');
    }
    public function destroy(ProductAttribute $attribute) { $attribute->delete(); return redirect()->route('atribut-produk.index')->with('success', 'Atribut dihapus.'); }
}
