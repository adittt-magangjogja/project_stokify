<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Manager\StockOpnameController;
use App\Http\Controllers\Manager\StockTransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Staff\ConfirmationController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));
Route::get('/home', fn () => redirect()->route('dashboard'));
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::middleware('role:Admin,Manajer Gudang')->group(function () {
        Route::get('/produk', [ProductController::class, 'index'])->name('produk.index');
        Route::get('/produk/tambah', [ProductController::class, 'create'])->name('produk.create');
        Route::post('/produk', [ProductController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}', [ProductController::class, 'show'])->whereNumber('id')->name('produk.detail');
        Route::get('/laporan', fn () => view('pages.laporan'))->name('laporan');
        Route::get('/laporan/stok', [ReportController::class, 'stock'])->name('laporan.stok');
        Route::get('/laporan/transaksi', [ReportController::class, 'transactions'])->name('laporan.transaksi');
    });
        Route::middleware('role:Admin')->group(function () {
        Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->whereNumber('id')->name('produk.edit');
        Route::put('/produk/{id}', [ProductController::class, 'update'])->whereNumber('id')->name('produk.update');
        Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->whereNumber('id')->name('produk.destroy');

        Route::resource('kategori', CategoryController::class)->parameters(['kategori' => 'category'])->except(['show']);
        Route::resource('atribut-produk', ProductAttributeController::class)->parameters(['atribut-produk' => 'attribute'])->except(['show']);
        Route::resource('pengguna', UserController::class)->parameters(['pengguna' => 'user'])->except(['show']);
        Route::get('/laporan/aktivitas', [ReportController::class, 'activities'])->name('laporan.aktivitas');
        Route::get('/pengaturan', [SettingsController::class, 'edit'])->name('pengaturan');
        Route::put('/pengaturan', [SettingsController::class, 'update'])->name('pengaturan.update');
    });

    Route::middleware('role:Manajer Gudang')->group(function () {
        Route::get('/stok/masuk', [StockTransactionController::class, 'indexMasuk'])->name('stok.masuk');
        Route::get('/stok/masuk/tambah', [StockTransactionController::class, 'createMasuk'])->name('stok.masuk.create');
        Route::post('/stok/masuk', [StockTransactionController::class, 'storeMasuk'])->name('stok.masuk.store');
        Route::get('/stok/keluar', [StockTransactionController::class, 'indexKeluar'])->name('stok.keluar');
        Route::get('/stok/keluar/tambah', [StockTransactionController::class, 'createKeluar'])->name('stok.keluar.create');
        Route::post('/stok/keluar', [StockTransactionController::class, 'storeKeluar'])->name('stok.keluar.store');
    });
    Route::middleware('role:Admin,Manajer Gudang,Staff Gudang')->group(function () {
        Route::get('/stok/opname', [StockOpnameController::class, 'index'])->name('stok.opname');
    });
    Route::middleware('role:Manajer Gudang,Staff Gudang')->group(function () {
        Route::get('/stok/opname/tambah', [StockOpnameController::class, 'create'])->name('stok.opname.create');
        Route::post('/stok/opname', [StockOpnameController::class, 'store'])->name('stok.opname.store');
    });
    Route::get('/supplier', [SupplierController::class, 'index'])->middleware('role:Admin,Manajer Gudang')->name('supplier.index');
    Route::middleware('role:Admin')->group(function () {
        Route::get('/produk/export', [ProductController::class, 'export'])->name('produk.export');
        Route::post('/produk/import', [ProductController::class, 'import'])->name('produk.import');
        Route::resource('supplier', SupplierController::class)->parameters(['supplier' => 'supplier'])->except(['show', 'index']);
    });
    Route::middleware('role:Staff Gudang')->group(function () {
        Route::get('/konfirmasi-barang', [ConfirmationController::class, 'index'])->name('konfirmasi-barang');
        Route::get('/konfirmasi-pengeluaran', [ConfirmationController::class, 'index'])->name('konfirmasi-pengeluaran');
        Route::post('/konfirmasi-barang/{id}', [ConfirmationController::class, 'confirm'])->name('konfirmasi-barang.confirm');
    });
});

Route::view('/403', 'pages.403')->name('403');
