<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockOpnameRequest;
use App\Models\Product;
use App\Services\StockOpnameService;

class StockOpnameController extends Controller
{
    public function __construct(private StockOpnameService $service) {}

    public function index() { return view('manager.opname.index', ['opnames' => $this->service->list()]); }

    public function create() { return view('manager.opname.create', ['products' => Product::orderBy('name')->get()]); }

    public function store(StockOpnameRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('manager.opname.index')->with('success', 'Stock opname tersimpan.');
    }
}