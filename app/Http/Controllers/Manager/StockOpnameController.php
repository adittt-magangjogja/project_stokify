<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockOpnameRequest;
use App\Services\StockOpnameService;
use App\Services\ProductService;

class StockOpnameController extends Controller
{
    public function __construct(private StockOpnameService $service) {}

    public function index() { return view('pages.stok-opname', ['opnames' => $this->service->list()]); }

    public function create(ProductService $products) { return view('pages.stok-opname-create', ['products' => $products->all()]); }

    public function store(StockOpnameRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('stok.opname')->with('success', 'Stock opname tersimpan.');
    }
}
