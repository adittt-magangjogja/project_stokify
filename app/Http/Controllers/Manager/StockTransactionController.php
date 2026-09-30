<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockTransactionRequest;
use App\Models\{Product, Supplier};
use App\Models\StockTransaction;
use App\Services\StockTransactionService;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    public function __construct(private StockTransactionService $service) {}

    public function index(Request $request)
    {
        $type = $request->routeIs('stok.masuk*') ? 'in' : 'out';
        $from = now()->startOfDay()->subDays(13);
        $to = now()->endOfDay();
        $totals = StockTransaction::query()
            ->where('status', 'confirmed')
            ->whereBetween('transaction_date', [$from, $to])
            ->selectRaw('DATE(transaction_date) as day, type, SUM(quantity) as total')
            ->groupBy('day', 'type')
            ->get()
            ->mapWithKeys(fn ($row) => [$row->day.'_'.$row->type => (int) $row->total]);

        $chartLabels = [];
        $incomingValues = [];
        $outgoingValues = [];
        foreach (CarbonPeriod::create($from->toDateString(), $to->toDateString()) as $date) {
            $day = $date->toDateString();
            $chartLabels[] = $date->format('d/m');
            $incomingValues[] = $totals->get($day.'_in', 0);
            $outgoingValues[] = $totals->get($day.'_out', 0);
        }

        return view($type === 'in' ? 'pages.stok-masuk' : 'pages.stok-keluar', [
            'transactions' => $this->service->list(['type' => $type]),
            'chartLabels' => $chartLabels,
            'incomingValues' => $incomingValues,
            'outgoingValues' => $outgoingValues,
        ]);
    }

    public function create(string $type = 'in')
    {
        return view($type === 'in' ? 'pages.stok-masuk-create' : 'pages.stok-keluar-create', [
            'products' => Product::orderBy('name')->get(),
            'suppliers' => Supplier::orderBy('name')->get(),
            'type' => $type,
        ]);
    }

    public function indexMasuk(Request $request) { return $this->index($request); }
    public function indexKeluar(Request $request) { return $this->index($request); }
    public function createMasuk() { return $this->create('in'); }
    public function createKeluar() { return $this->create('out'); }
    public function storeMasuk(StockTransactionRequest $request) { return $this->store($request, 'in'); }
    public function storeKeluar(StockTransactionRequest $request) { return $this->store($request, 'out'); }

    public function store(StockTransactionRequest $request, ?string $type = null)
    {
        $data = $request->validated();
        if ($type) $data['type'] = $type;
        $this->service->create($data);
        return redirect()->route(($type ?? $data['type']) === 'in' ? 'stok.masuk' : 'stok.keluar')
            ->with('success', 'Transaksi dicatat, menunggu konfirmasi staff gudang.');
    }
}
