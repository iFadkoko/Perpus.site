<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminEbookController;
use App\Http\Controllers\Admin\AdminKelolaUserController;
use App\Http\Controllers\Admin\AdminPeminjamanController;
use App\Http\Controllers\Admin\AdminPengembalianController;
use App\Http\Controllers\AdminEbookController as ControllersAdminEbookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UsereBooksController;
use App\Http\Controllers\UserPeminjamanController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

//user route



Route::middleware(['auth', 'userMiddleware'])->group(function(){

    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('ebooks',[UsereBooksController::class,'index'])->name('ebooks');
    Route::get('peminjaman',[UserPeminjamanController::class,'index'])->name('peminjaman');
    Route::get('/ebooks', [UsereBooksController::class, 'index']);
    });
//admin route
Route::middleware(['auth', 'adminMiddleware'])->group(function(){

    //dashboard
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    
    //peminjaman
    Route::get('/admin/peminjaman',[AdminPeminjamanController::class,'index'])->name('admin.peminjaman');

    //pengembalian
    Route::get('/admin/pengembalian',[AdminPengembalianController::class,'index'])->name('admin.pengembalian');

    //ebook
    Route::get('/admin/ebooks',[AdminEbookController::class,'index'])->name('admin.ebooks');
    Route::resource('admin/ebooks', AdminEbookController::class);
    Route::post('/admin/ebooks', [AdminEbookController::class, 'Ebook'])->name('upload.ebook');

    //kelola user
    Route::get('/admin/kelolauser',[AdminKelolaUserController::class,'index'])->name('admin.kelolauser');
    Route::get('/admin/editkekolauser{id}',[AdminKelolaUserController::class, 'edit'])->name('edit.kelolauser');
    Route::post('/admin/editkelolauser/{id}',[AdminKelolaUserController::class, 'update'])->name('update.kelolauser');
    Route::delete('/admin/kelolauser/{id}', [AdminKelolaUserController::class, 'destroy'])->name('destroy.kelolauser');
    
});