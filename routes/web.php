<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===============================
// PRACTICE
// ===============================

Route::get('/', function () {
    return view('login');
});

Route::name('practice.')->group(function () {

    Route::name('first')->get('practice/1', function () {
        return view('pages.practice.1');
    });

    Route::name('second')->get('practice/2', function () {
        return view('pages.practice.2');
    });

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});


// ===============================
// AUTH
// ===============================

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});


// ===============================
// DASHBOARD
// ===============================

Route::view('/dashboard', 'pages.dashboard')
    ->name('dashboard');

Route::view('/admin/dashboard', 'pages.dashboard-admin')
    ->name('dashboard.admin');

Route::view('/manager/dashboard', 'pages.dashboard-manager')
    ->name('dashboard.manager');

Route::view('/staff/dashboard', 'pages.dashboard-staff')
    ->name('dashboard.staff');


// ===============================
// MASTER DATA
// ===============================
Route::get('/produk', function () {
    return view('pages.produk', [
        'categories' => [],
        'products' => new LengthAwarePaginator([], 0, 10),
    ]);
})->name('produk.index');

Route::view('/produk/tambah', 'pages.produk-create')
    ->name('produk.create');

 Route::view('/produk/{id}', 'pages.produk-detail')
    ->name('produk.detail');

Route::view('/produk/{id}/edit', 'pages.produk-edit')
    ->name('produk.edit');


Route::view('/kategori', 'pages.kategori')
    ->name('kategori.index');

Route::view('/kategori/tambah', 'pages.kategori-create')
    ->name('kategori.create');

    Route::view('/kategori/{id}/edit', 'pages.kategori-edit')
    ->name('kategori.edit');


Route::view('/supplier', 'pages.supplier')
    ->name('supplier.index');

Route::view('/supplier/tambah', 'pages.supplier-create')
    ->name('supplier.create');

Route::view('/supplier/{id}/edit', 'pages.supplier-edit')
    ->name('supplier.edit');

// ===============================
// STOK
// ===============================

Route::view('/stok/masuk', 'pages.stok-masuk')
    ->name('stok.masuk');

Route::view('/stok/keluar', 'pages.stok-keluar')
    ->name('stok.keluar');

Route::view('/stok/opname', 'pages.stok-opname')
    ->name('stok.opname');

Route::view('/stok/masuk/tambah', 'pages.stok-masuk-create')
    ->name('stok.masuk.create');

Route::view('/stok/keluar/tambah', 'pages.stok-keluar-create')
    ->name('stok.keluar.create');

Route::view('/stok/opname/tambah', 'pages.stok-opname-create')
    ->name('stok.opname.create');


// ===============================
// LAPORAN
// ===============================

Route::view('/laporan', 'pages.laporan')
    ->name('laporan');

Route::view('/laporan/stok', 'pages.laporan-stok')
    ->name('laporan.stok');

Route::view('/laporan/transaksi', 'pages.laporan-transaksi')
    ->name('laporan.transaksi');

Route::view('/laporan/aktivitas', 'pages.laporan-aktivitas')
    ->name('laporan.aktivitas');


// ===============================
// PENGGUNA
// ===============================

Route::view('/pengguna', 'pages.pengguna.index')
    ->name('pengguna.index');

Route::view('/pengguna/tambah', 'pages.pengguna.create')
    ->name('pengguna.create');

Route::view('/pengguna/{id}/edit', 'pages.pengguna.edit')
    ->name('pengguna.edit');

// ===============================
// ATRIBUT PRODUK
// ===============================

Route::view('/atribut-produk', 'pages.atribut-produk.index')
    ->name('atribut-produk.index');

Route::view('/atribut-produk/tambah', 'pages.atribut-produk.create')
    ->name('atribut-produk.create');

Route::view('/atribut-produk/{id}/edit', 'pages.atribut-produk.edit')
    ->name('atribut-produk.edit');

// ===============================
// STAFF
// ===============================

Route::view('/konfirmasi-barang', 'pages.konfirmasi-barang')
    ->name('konfirmasi-barang');

// ===============================
// PENGATURAN
// ===============================

Route::view('/pengaturan', 'pages.pengaturan')
    ->name('pengaturan');

// ===============================
// ERROR
// ===============================

Route::view('/403', 'pages.403')
    ->name('403');