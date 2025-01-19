<?php

use App\Http\Controllers\Admin\AdminBukuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminEbookController;
use App\Http\Controllers\Admin\AdminKelolaUserController;
use App\Http\Controllers\Admin\AdminPeminjamanController;
use App\Http\Controllers\Admin\AdminPengembalianController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserPeminjamanController as UserUserPeminjamanController;
use App\Http\Controllers\UserBukuController;
use App\Http\Controllers\UsereBooksController;
use App\Http\Controllers\UserPeminjamanController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Profil untuk user biasa
    Route::middleware(['userMiddleware'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Profil untuk admin
    Route::middleware(['adminMiddleware'])->group(function () {
        Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        Route::delete('/admin/profile', [AdminController::class, 'destroy'])->name('admin.profile.destroy');
    });
});

require __DIR__.'/auth.php';

//user route



Route::middleware(['auth', 'userMiddleware'])->group(function(){

    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('ebooks',[UsereBooksController::class,'index'])->name('ebooks');
    Route::post('/peminjaman', [UserUserPeminjamanController::class, 'requestPeminjaman'])->name('user.peminjaman.request');
    Route::get('/ebooks', [UsereBooksController::class, 'index']);
    Route::get('/daftarbuku', [UserBukuController::class, 'index'])->name('daftarbuku');
    Route::get('/daftarbuku{id}', [UserBukuController::class, 'detail'])->name('user.buku');
    });
//admin route
Route::middleware(['auth', 'adminMiddleware'])->group(function(){

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //dashboard
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    
    //peminjaman
    Route::get('admin/peminjaman/pinjam', [AdminPeminjamanController::class, 'formulir'])->name('admin.peminjaman.form');
    Route::get('/admin/peminjaman', [AdminPeminjamanController::class, 'index'])->name('admin.peminjaman');
    Route::get('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'detail'])->name('admin.peminjaman.detail');
    Route::post('/admin/peminjaman/pinjam', [AdminPeminjamanController::class, 'pinjam'])->name('admin.peminjaman.pinjam');
    Route::delete('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'destroy'])->name('admin.peminjaman.destroy');

    //pengembalian
    Route::get('/admin/pengembalian',[AdminPengembalianController::class,'index'])->name('admin.pengembalian');
    Route::get('/admin/pengembalian/{id}',[AdminPengembalianController::class, 'accept'])->name('admin.pengembalian.accept');
    Route::post('admin/pengembalian/{id}/accepted', [adminPengembalianController::class, 'accepted'])->name('admin.peminjaman.accepted');

    //ebook
    Route::get('/admin/ebooks', [AdminEbookController::class, 'index'])->name('admin.ebooks');
    Route::post('/admin/ebooks', [AdminEbookController::class, 'store'])->name('upload.ebook');
    Route::delete('/admin/ebooks/{id}',[AdminEbookController::class, 'destroy'])->name('destroy.ebook');


    //kelola user
    Route::get('/admin/kelolauser',[AdminKelolaUserController::class,'index'])->name('admin.kelolauser');
    Route::get('/admin/editkekolauser{id}',[AdminKelolaUserController::class, 'edit'])->name('edit.kelolauser');
    Route::post('/admin/editkelolauser/{id}',[AdminKelolaUserController::class, 'update'])->name('update.kelolauser');
    Route::delete('/admin/kelolauser/{id}', [AdminKelolaUserController::class, 'destroy'])->name('destroy.kelolauser');
    
    //daftarbuku
    Route::get('/admin/daftarbuku', [AdminBukuController::class, 'index'])->name('admin.daftarbuku');
    Route::get('/admin/daftarbuku/{id}', [AdminBukuController::class, 'detail'])->name('detail.buku');
    Route::post('/admin/daftarbuku', [AdminBukuController::class, 'upload'])->name('upload.buku');
    Route::delete('/admin/dafatarbuku/{id}', [AdminBukuController::class, 'destroy'])->name('destroy.buku');
});