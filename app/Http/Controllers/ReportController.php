<?php

namespace App\Http\Controllers;

use App\Exports\StockReportExport;
use App\Exports\TransactionReportExport;
use App\Services\CategoryService;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function __construct(private ReportService $service, private CategoryService $categories) {}

    public function stock(Request $request)
    {
        $filters = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
        ]);
        $data = $this->service->stock($filters);
        if ($request->query('export')) {
            return Excel::download(new StockReportExport($data), 'laporan-stok.xlsx');
        }

        return view('pages.laporan-stok', [
            'products' => $data,
            'categories' => $this->categories->getAll(),
        ]);
    }

    public function transactions(Request $request)
    {
        $data = $this->service->transactions($request->only('type', 'from', 'to'));
        if ($request->query('export')) {
            return Excel::download(new TransactionReportExport($data), 'laporan-transaksi.xlsx');
        }

        return view('pages.laporan-transaksi', ['transactions' => $data]);
    }

    public function activities(Request $request)
    {
        return view('pages.laporan-aktivitas', [
            'logs' => $this->service->activities($request->only('from', 'to')),
        ]);
    }
}
