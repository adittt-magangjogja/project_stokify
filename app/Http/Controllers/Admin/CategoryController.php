<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();

        return view('pages.kategori', compact('categories'));
    }

    public function create()
    {
        return view('pages.kategori-create');
    }

    public function store(Request $request)
    {
        $request->merge(['name' => $request->input('name', $request->input('nama')), 'description' => $request->input('description', $request->input('deskripsi'))]);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:categories,name'],
            'description' => ['nullable', 'string'],
        ]);

        $this->categoryService->create($data);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('pages.kategori-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->merge(['name' => $request->input('name', $request->input('nama')), 'description' => $request->input('description', $request->input('deskripsi'))]);
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:categories,name,' . $category->id,
            ],
            'description' => ['nullable', 'string'],
        ]);

        $this->categoryService->update($category, $data);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        if ($this->categoryService->hasProducts($category)) {
            return back()->with('error', 'Kategori masih digunakan produk. Pindahkan produk sebelum menghapus kategori.');
        }

        $this->categoryService->delete($category);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
