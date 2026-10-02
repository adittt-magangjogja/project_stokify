<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Services\SupplierService;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct(private SupplierService $service) {}
    public function index() { return view('pages.supplier', ['suppliers' => $this->service->getAll()]); }
    public function create() { return view('pages.supplier-create'); }
    public function store(Request $request)
    {
        $request->merge(['name' => $request->input('name', $request->input('nama')), 'address' => $request->input('address', $request->input('alamat')), 'phone' => $request->input('phone', $request->input('telepon'))]);
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'address' => 'nullable|string',
            'phone' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]+$/'],
            'email' => ['nullable', 'string', 'email:rfc', 'max:150'],
        ], [
            'phone.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'email.email' => 'Masukkan alamat email yang valid, contohnya nama@gmail.com.',
        ]);
        $this->service->create($data);
        return redirect()->route('supplier.index')->with('success', 'Supplier ditambahkan.');
    }
    public function edit(Supplier $supplier) { return view('pages.supplier-edit', compact('supplier')); }
    public function update(Request $request, Supplier $supplier)
    {
        $request->merge(['name' => $request->input('name', $request->input('nama')), 'address' => $request->input('address', $request->input('alamat')), 'phone' => $request->input('phone', $request->input('telepon'))]);
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'address' => 'nullable|string',
            'phone' => ['nullable', 'string', 'max:15', 'regex:/^[0-9]+$/'],
            'email' => ['nullable', 'string', 'email:rfc', 'max:150'],
        ], [
            'phone.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'email.email' => 'Masukkan alamat email yang valid, contohnya nama@gmail.com.',
        ]);
        $this->service->update($supplier, $data);
        return redirect()->route('supplier.index')->with('success', 'Supplier diperbarui.');
    }
    public function destroy(Supplier $supplier) { $this->service->delete($supplier); return redirect()->route('supplier.index')->with('success', 'Supplier dihapus.'); }
}
