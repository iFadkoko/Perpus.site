<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\Ebook;
use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
        // Hitung jumlah total

    public function index(){
        $totalebook = Ebook::count();
        $totalBuku = buku::count();
        $totalUser = User::count();
        $totalPeminjaman = peminjaman::count();
    
        // Hitung jumlah berdasarkan status peminjaman
        $peminjamanRequest = peminjaman::where('status', 'request')->count();
        $peminjamanPinjam = peminjaman::where('status', 'pinjam')->count();
        $peminjamanKembali = peminjaman::where('status', 'kembali')->count();
        return view ('admin.dashboard' , [
            'totalebook' => $totalebook,
            'totalBuku' => $totalBuku,
            'totalUser' => $totalUser,
            'totalPeminjaman' => $totalPeminjaman,
            'peminjamanRequest' => $peminjamanRequest,
            'peminjamanPinjam' => $peminjamanPinjam,
            'peminjamanKembali' => $peminjamanKembali,
        ]);
    }
}
