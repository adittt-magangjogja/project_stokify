<?php

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

Route::name('index-practice')->get('/', function () {
    return view('pages.practice.index');
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


// ===============================
// MASTER DATA
// ===============================
Route::view('/produk', 'pages.produk')
    ->name('produk.index');

Route::view('/produk/tambah', 'pages.produk-create')
    ->name('produk.create');


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

// ===============================
// STOK
// ===============================

Route::view('/stok/masuk', 'pages.stok-masuk')
    ->name('stok.masuk');

Route::view('/stok/keluar', 'pages.stok-keluar')
    ->name('stok.keluar');

Route::view('/stok/opname', 'pages.stok-opname')
    ->name('stok.opname');


// ===============================
// LAPORAN
// ===============================

Route::view('/laporan', 'pages.laporan')
    ->name('laporan');