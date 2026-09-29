<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\StockTransactionService;

class ConfirmationController extends Controller
{
    public function __construct(private StockTransactionService $service) {}

    public function index() { return view('staff.confirmations.index', ['transactions' => $this->service->pending()]); }

    public function confirm(int $id)
    {
        $this->service->confirm($id);
        return back()->with('success', 'Transaksi berhasil dikonfirmasi, stok diperbarui.');
    }
}