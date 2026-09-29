<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockTransactionRequest;
use App\Models\{Product, Supplier};
use App\Services\StockTransactionService;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    public function __construct(private StockTransactionService $service) {}

    public function index(Request $request)
    {
        return view('manager.transactions.index', [
            'transactions' => $this->service->list($request->only('type', 'from', 'to')),
        ]);
    }

    public function create()
    {
        return view('manager.transactions.create', [
            'products' => Product::orderBy('name')->get(),
            'suppliers' => Supplier::orderBy('name')->get(),
        ]);
    }

    public function store(StockTransactionRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('manager.transactions.index')
            ->with('success', 'Transaksi dicatat, menunggu konfirmasi staff gudang.');
    }
}