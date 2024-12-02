<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/daftar_buku', function () {
    return view('daftar_buku');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});
