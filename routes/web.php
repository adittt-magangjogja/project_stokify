<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Manager\StockTransactionController;
use App\Http\Controllers\Manager\StockOpnameController;

use App\Http\Controllers\Staff\ConfirmationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// ===============================
// ROOT
// ===============================

Route::get('/', fn () => redirect()->route('login'));


// ===============================
// AUTH
// ===============================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');
});


// ===============================
// AUTHENTICATED USER
// ===============================

Route::middleware('auth')->group(function () {

    // ===============================
    // LOGOUT
    // ===============================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    // ===============================
    // DASHBOARD
    // ===============================

    // Dashboard otomatis memilih
    // admin / manager / staff berdasarkan role
    Route::get('/dashboard', DashboardController::class)
        ->name('dashboard');


    // ===============================
    // DASHBOARD VIEW LAMA
    // ===============================

    Route::view('/admin/dashboard', 'pages.dashboard-admin')
        ->name('dashboard.admin');

    Route::view('/manager/dashboard', 'pages.dashboard-manager')
        ->name('dashboard.manager');

    Route::view('/staff/dashboard', 'pages.dashboard-staff')
        ->name('dashboard.staff');


    // ===============================
    // MASTER DATA — PRODUK
    // ===============================

    Route::middleware('role:admin,manager')->group(function () {

        Route::get('/produk', [ProductController::class, 'index'])
            ->name('produk.index');

        Route::get('/produk/tambah', [ProductController::class, 'create'])
            ->name('produk.create');

        Route::post('/produk', [ProductController::class, 'store'])
            ->name('produk.store');

        Route::get('/produk/{id}', [ProductController::class, 'show'])
            ->name('produk.detail');
    });

    Route::middleware('role:admin')->group(function () {

        Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])
            ->name('produk.edit');

        Route::put('/produk/{id}', [ProductController::class, 'update'])
            ->name('produk.update');

        Route::delete('/produk/{id}', [ProductController::class, 'destroy'])
            ->name('produk.destroy');
    });


    // ===============================
    // KATEGORI
    // ===============================

    Route::middleware('role:admin')->group(function () {

        Route::get('/kategori', [CategoryController::class, 'index'])
            ->name('kategori.index');

        Route::get('/kategori/tambah', [CategoryController::class, 'create'])
            ->name('kategori.create');

        Route::post('/kategori', [CategoryController::class, 'store'])
            ->name('kategori.store');

        Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit'])
            ->name('kategori.edit');

        Route::put('/kategori/{id}', [CategoryController::class, 'update'])
            ->name('kategori.update');

        Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])
            ->name('kategori.destroy');
    });


    // ===============================
    // SUPPLIER
    // Controller belum dibuat
    // ===============================

    Route::view('/supplier', 'pages.supplier')
        ->name('supplier.index');

    Route::view('/supplier/tambah', 'pages.supplier-create')
        ->name('supplier.create');

    Route::view('/supplier/{id}/edit', 'pages.supplier-edit')
        ->name('supplier.edit');


    // ===============================
    // STOK
    // Manajer input
    // ===============================

    Route::middleware('role:manager')->group(function () {

        // Stok masuk
        Route::get('/stok/masuk', [StockTransactionController::class, 'indexMasuk'])
            ->name('stok.masuk');

        Route::get('/stok/masuk/tambah', [StockTransactionController::class, 'createMasuk'])
            ->name('stok.masuk.create');

        Route::post('/stok/masuk', [StockTransactionController::class, 'storeMasuk'])
            ->name('stok.masuk.store');


        // Stok keluar
        Route::get('/stok/keluar', [StockTransactionController::class, 'indexKeluar'])
            ->name('stok.keluar');

        Route::get('/stok/keluar/tambah', [StockTransactionController::class, 'createKeluar'])
            ->name('stok.keluar.create');

        Route::post('/stok/keluar', [StockTransactionController::class, 'storeKeluar'])
            ->name('stok.keluar.store');


        // Stock opname
        Route::get('/stok/opname', [StockOpnameController::class, 'index'])
            ->name('stok.opname');

        Route::get('/stok/opname/tambah', [StockOpnameController::class, 'create'])
            ->name('stok.opname.create');

        Route::post('/stok/opname', [StockOpnameController::class, 'store'])
            ->name('stok.opname.store');
    });


    // ===============================
    // KONFIRMASI
    // ===============================

    Route::view('/konfirmasi-pengeluaran', 'pages.konfirmasi-pengeluaran')
        ->name('konfirmasi-pengeluaran');


    // ===============================
    // LAPORAN
    // Admin + Manajer
    // ===============================

    Route::middleware('role:admin,manager')->group(function () {

        Route::get('/laporan', fn () => view('pages.laporan'))
            ->name('laporan');

        Route::get('/laporan/stok', [ReportController::class, 'stock'])
            ->name('laporan.stok');

        Route::get('/laporan/transaksi', [ReportController::class, 'transactions'])
            ->name('laporan.transaksi');
    });

    Route::middleware('role:admin')->group(function () {

        Route::get('/laporan/aktivitas', [ReportController::class, 'activities'])
            ->name('laporan.aktivitas');
    });


    // ===============================
    // PENGGUNA
    // Admin
    // ===============================

    Route::middleware('role:admin')->group(function () {

        Route::get('/pengguna', [UserController::class, 'index'])
            ->name('pengguna.index');

        Route::get('/pengguna/tambah', [UserController::class, 'create'])
            ->name('pengguna.create');

        Route::post('/pengguna', [UserController::class, 'store'])
            ->name('pengguna.store');

        Route::get('/pengguna/{user}/edit', [UserController::class, 'edit'])
            ->name('pengguna.edit');

        Route::put('/pengguna/{user}', [UserController::class, 'update'])
            ->name('pengguna.update');

        Route::delete('/pengguna/{user}', [UserController::class, 'destroy'])
            ->name('pengguna.destroy');
    });


    // ===============================
    // ATRIBUT PRODUK
    // Controller belum dibuat
    // ===============================

    Route::view('/atribut-produk', 'pages.atribut-produk.index')
        ->name('atribut-produk.index');

    Route::view('/atribut-produk/tambah', 'pages.atribut-produk.create')
        ->name('atribut-produk.create');

    Route::view('/atribut-produk/{id}/edit', 'pages.atribut-produk.edit')
        ->name('atribut-produk.edit');


    // ===============================
    // STAFF
    // Konfirmasi barang
    // ===============================

    Route::middleware('role:staff')->group(function () {

        Route::get('/konfirmasi-barang', [ConfirmationController::class, 'index'])
            ->name('konfirmasi-barang');

        Route::post('/konfirmasi-barang/{id}', [ConfirmationController::class, 'confirm'])
            ->name('konfirmasi-barang.confirm');
    });


    // ===============================
    // PENGATURAN
    // Controller belum dibuat
    // ===============================

    Route::view('/pengaturan', 'pages.pengaturan')
        ->name('pengaturan');
});


// ===============================
// ERROR
// ===============================

Route::view('/403', 'pages.403')
    ->name('403');