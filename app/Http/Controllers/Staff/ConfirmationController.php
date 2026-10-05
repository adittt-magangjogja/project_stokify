<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Enums\Role;
use App\Models\StockTransaction;
use App\Services\StockTransactionService;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function __construct(private StockTransactionService $service) {}

    public function index() { return view('pages.konfirmasi-barang', ['transactions' => $this->service->pending()]); }

    public function history(Request $request)
    {
        $filters = $request->validate([
            'type' => 'nullable|in:in,out',
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
        ]);

        $transactions = StockTransaction::with(['product', 'supplier', 'user', 'confirmer'])
            ->where('status', 'confirmed')
            ->whereNotNull('confirmed_by')
            ->whereHas('user', fn ($query) => $query->where('role', Role::MANAGER->value))
            ->whereHas('confirmer', fn ($query) => $query->where('role', Role::STAFF->value))
            ->when($filters['type'] ?? null, fn ($query, $type) => $query->where('type', $type))
            ->when($filters['from'] ?? null, fn ($query, $date) => $query->whereDate('confirmed_at', '>=', $date))
            ->when($filters['to'] ?? null, fn ($query, $date) => $query->whereDate('confirmed_at', '<=', $date))
            ->latest('confirmed_at')
            ->paginate(15)
            ->withQueryString();

        return view('pages.riwayat-transaksi', compact('transactions'));
    }

    public function confirm(int $id)
    {
        $this->service->confirm($id);
        return back()->with('success', 'Transaksi berhasil dikonfirmasi, stok diperbarui.');
    }
}
