<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Supplier;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $service) {}

    public function index(Request $request)
    {
        return view('pages.produk', [
            'products' => $this->service->list($request->only('search', 'category_id')),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('pages.produk-create', [
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'attributes' => ProductAttribute::all(),
        ]);
    }

    public function store(ProductRequest $request)
    {
        $this->service->store($request->validated(), $request->file('image'));
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(int $id)
    {
        return view('pages.produk-detail', ['product' => $this->service->find($id)]);
    }

    public function edit(int $id)
    {
        return view('pages.produk-edit', [
            'product' => $this->service->find($id),
            'categories' => Category::all(),
            'suppliers' => Supplier::all(),
            'attributes' => ProductAttribute::all(),
        ]);
    }

    public function update(ProductRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), $request->file('image'));
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $this->service->delete($id);
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}