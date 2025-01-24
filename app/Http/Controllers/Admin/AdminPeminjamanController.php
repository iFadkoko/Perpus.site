<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminPeminjamanController extends Controller
{
   public function index(){
      $peminjaman = peminjaman::where('status', 'request')->get();
    return view('admin.peminjaman', ['peminjaman' => $peminjaman]);
   } 

   public function formulir(){
      $user = User::where('usertype', '!=', 'admin')->get();
      $buku = buku::all();
      $peminjaman = peminjaman::with(['user', 'buku'])->get();
      return view('admin.pinjam', ['peminjaman' => $peminjaman, 'user' => $user, 'buku' => $buku]);
     } 

   public function pinjam(Request $request){
      $request -> validate([
      'user_id' => 'required',
      'buku_id' => 'required',
      'durasi_pinjam' => 'required|date',
     ]);

     $buku = buku::find($request->buku_id);
     if ($buku->stok < 1) {
      return redirect()->back()->withErrors(['error' => 'Stok buku tidak mencukupi.']);
      }

     peminjaman::create([
      'user_id' => $request->user_id,
      'buku_id' => $request->buku_id,
      'durasi_pinjam' => $request->durasi_pinjam,
      'status' => 'pinjam',
     ]);

     $buku->decrement('stok');

     return redirect()->route('admin.peminjaman');
   }
   public function destroy($id){
      $peminjaman = peminjaman::findOrFail($id);
      $peminjaman->delete();
      return redirect()->route('admin.peminjaman');
}

   public function detail($id){
      $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);
      return view('admin.detail_peminjaman', ['peminjaman' => $peminjaman]);
   }

   public function komfirmasi($id){
      $peminjaman = peminjaman::findOrfail($id);
      return view('admin.komfirmasi_pengembalian', ['peminjaman' => $peminjaman]);
   }

   public function accept($id){
      $peminjaman = peminjaman::findOrFail($id);

      $peminjaman->update([
         'status' => 'pinjam'
      ]);

      $buku = buku::find($peminjaman->buku_id);
      if ($buku->stok < 1) {
       return redirect()->back()->withErrors(['error' => 'Stok buku tidak mencukupi.']);
       } 
      
       $buku->decrement('stok');

      return redirect('admin/peminjaman'); 
   }

}