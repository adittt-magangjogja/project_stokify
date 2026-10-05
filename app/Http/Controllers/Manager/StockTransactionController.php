<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockTransactionRequest;
use App\Services\StockTransactionService;
use App\Services\ProductService;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    public function __construct(private StockTransactionService $service, private ProductService $catalog) {}

    public function index(Request $request)
    {
        $type = $request->routeIs('stok.masuk*') ? 'in' : 'out';
        $from = now()->startOfDay()->subDays(13);
        $to = now()->endOfDay();
        $totals = $this->service->dailyConfirmedTotals($from, $to);

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
        $options = $this->catalog->formOptions();
        $products = $this->catalog->all();
        foreach ($products as $product) {
            $product->available_stock = $this->service->availableStock($product->id);
        }
        return view($type === 'in' ? 'pages.stok-masuk-create' : 'pages.stok-keluar-create', [
            'products' => $products,
            'suppliers' => $options['suppliers'],
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
