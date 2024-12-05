<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/daftar_buku', function () {
    return view('daftar_buku');
});

Route::get('/peminjaman', function () {
    return view('peminjaman');
});

Route::get('/pengembalian', function () {
    return view('pengembalian');
});
