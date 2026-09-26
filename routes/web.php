<?php

use Illuminate\Support\Facades\Route;

// 1. Route halaman utama (index)
Route::get('/', function () {
    return view('pages.practice.index');
})->name('index-practice');

// 2. Route group untuk practice
Route::name('practice.')->prefix('practice')->group(function () {
    Route::get('/1', function () {
        return view('pages.practice.1');
    })->name('first');

    Route::get('/2', function () {
        return view('pages.practice.2');
    })->name('second');
});

// 3. Route login (lengkap dengan nama 'login')
Route::get('/login', function () {
    return view('login');
})->name('login');