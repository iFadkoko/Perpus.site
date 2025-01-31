<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class UserBukuController extends Controller
{
    public function index(){
        $buku = buku::all();
        return view('daftarbuku', ['buku' => $buku]);
    }

    public function detail(Request $request, $id){

        $buku = buku::findOrFail($id);
        return view('buku', ['buku' => $buku] );
    }

    public function filter(Request $request){

        $request->validate([
            'kategori' => 'required|string',
        ]);
    
        $buku = buku::where('kategori', $request->kategori)->get();
    
        return view('daftarbuku', ['buku' => $buku]);
}
}
