<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\Category;
use App\Services\ProductAttributeService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductAttributeController extends Controller
{
    public function __construct(private ProductAttributeService $service) {}

    public function index() { return view('pages.atribut-produk.index', ['attributes' => $this->service->list()]); }
    public function create() { return view('pages.atribut-produk.create', ['categories' => Category::orderBy('name')->get()]); }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:product_attributes,name',
            'category_ids' => 'required|array|min:1',
            'category_ids.*' => 'required|integer|distinct|exists:categories,id',
        ]);
        $attribute = $this->service->create(['name' => $data['name']]);
        $attribute->categories()->sync($data['category_ids']);
        return redirect()->route('atribut-produk.index')->with('success', 'Atribut ditambahkan.');
    }
    public function edit(ProductAttribute $attribute) { return view('pages.atribut-produk.edit', ['attribute' => $attribute->load('categories'), 'categories' => Category::orderBy('name')->get()]); }
    public function update(Request $request, ProductAttribute $attribute)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', Rule::unique('product_attributes', 'name')->ignore($attribute->id)],
            'category_ids' => 'required|array|min:1',
            'category_ids.*' => 'required|integer|distinct|exists:categories,id',
        ]);
        $this->service->update($attribute, ['name' => $data['name']]);
        $attribute->categories()->sync($data['category_ids']);
        return redirect()->route('atribut-produk.index')->with('success', 'Atribut diperbarui.');
    }
    public function destroy(ProductAttribute $attribute) { $this->service->delete($attribute); return redirect()->route('atribut-produk.index')->with('success', 'Atribut dihapus.'); }
}
