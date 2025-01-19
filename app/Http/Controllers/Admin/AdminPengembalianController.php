<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use App\Models\buku;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPengembalianController extends Controller
{
    public function index(){
        $peminjaman = peminjaman::all();
        return view('admin.pengembalian', ['peminjaman'=> $peminjaman]);
    }

   public function accept($id){
        $peminjaman = peminjaman::findOrFail($id);
        return view('admin.accept_pengembalian', ['peminjaman'=> $peminjaman]);
    }

    public function accepted($id)
    {
        // Cari data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);
    

        $durasi_pinjam = Carbon::parse($peminjaman->durasi_pinjam);
        $tgl_kembali = Carbon::now($peminjaman->tgl_kembali);
        
        // Hitung keterlambatan dalam hari
        $selisih_hari = $durasi_pinjam->endOfDay()->diffInDays($tgl_kembali, false); // Periksa keterlambatan sampai akhir hari
        
        $denda = $selisih_hari > 0 ? $selisih_hari * 1 : 0;
        
        $peminjaman->update([
            'status' => 'kembali',
            'tgl_kembali' => $tgl_kembali, // Set tanggal kembali ke saat ini
            'denda' => $denda
        ]);
    
        // Redirect ke halaman pengembalian dengan pesan sukses
        return redirect('admin/pengembalian')->with('success', 'Status berhasil diperbarui menjadi kembali.');
    }
}

