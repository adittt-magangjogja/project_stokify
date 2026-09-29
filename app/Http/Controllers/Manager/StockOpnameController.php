<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockOpnameRequest;
use App\Models\Product;
use App\Services\StockOpnameService;

class StockOpnameController extends Controller
{
    public function __construct(private StockOpnameService $service) {}

    public function index() { return view('pages.stok-opname', ['opnames' => $this->service->list()]); }

    public function create() { return view('pages.stok-opname-create', ['products' => Product::orderBy('name')->get()]); }

    public function store(StockOpnameRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('stok.opname')->with('success', 'Stock opname tersimpan.');
    }
}
