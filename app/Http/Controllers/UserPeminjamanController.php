<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPeminjamanController extends Controller
{
    public function index(){
        $buku = buku::all();
        $user = Auth::User();
        return view('peminjaman', ['buku' => $buku]);
    }   

    public function upload(Request $request){
        $request -> validate([
            'buku_id' => 'required',
            'durasi_pinjam' => 'required|date'
        ]);

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'durasi_pinjam' => $request->durasi_pinjam,
            'status' => 'request'
        ]);
        
        return redirect()->route('peminjaman');
    }
}


