<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct(private ProductService $service) {}

    public function index(Request $request)
    {
        return view('pages.produk', [
            'products' => $this->service->list($request->only('search', 'category_id', 'stok')),
            'categories' => $this->service->formOptions()['categories'],
        ]);
    }

    public function create()
    {
        return view('pages.produk-create', $this->service->formOptions());
    }

    public function export()
    {
        return Excel::download(new ProductsExport(), 'produk.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate(['file' => 'required|file|mimes:xlsx,xls,csv|max:10240']);
        $import = new ProductsImport();
        Excel::import($import, $request->file('file'));
        return redirect()->route('produk.index')->with('success', $import->importedCount().' baris produk berhasil diimpor. Stok produk yang sudah terdaftar tidak ditimpa.');
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
        return view('pages.produk-edit', array_merge([
            'product' => $this->service->find($id),
            'filters' => request()->only('search', 'category_id', 'stok'),
        ], $this->service->formOptions()));
    }

    public function update(ProductRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), $request->file('image'));
        return redirect()->route('produk.index', $request->only('search', 'category_id', 'stok'))
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        if (! $this->service->delete($id)) {
            return redirect()->route('produk.index')->with('error', 'Produk memiliki riwayat stok dan tidak dapat dihapus.');
        }

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
