<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Services\ProductAttributeService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductAttributeController extends Controller
{
    public function __construct(private ProductAttributeService $service) {}

    public function index() { return view('pages.atribut-produk.index', ['attributes' => $this->service->list()]); }
    public function create() { return view('pages.atribut-produk.create'); }
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:100|unique:product_attributes,name']);
        $this->service->create($data);
        return redirect()->route('atribut-produk.index')->with('success', 'Atribut ditambahkan.');
    }
    public function edit(ProductAttribute $attribute) { return view('pages.atribut-produk.edit', compact('attribute')); }
    public function update(Request $request, ProductAttribute $attribute)
    {
        $data = $request->validate(['name' => ['required', 'string', 'max:100', Rule::unique('product_attributes', 'name')->ignore($attribute->id)]]);
        $this->service->update($attribute, $data);
        return redirect()->route('atribut-produk.index')->with('success', 'Atribut diperbarui.');
    }
    public function destroy(ProductAttribute $attribute) { $this->service->delete($attribute); return redirect()->route('atribut-produk.index')->with('success', 'Atribut dihapus.'); }
}
