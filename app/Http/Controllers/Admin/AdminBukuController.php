<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\buku;
use Illuminate\Http\Request;

class AdminBukuController extends Controller
{
    public function index()
    {
        $bukus = buku::all();
        return view('admin.daftarbuku',['bukus' => $bukus] );
    }
    // validasi
    public function upload(Request $request){
        $coverbuku = $request->file('cover_buku') 
        ? $request->file('cover_buku')->store('covers', 'public') 
        : null;

        $request -> validate([
            'cover_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'stok' => 'required|integer|max:255',
        ]);

        // Simpan data ke database
        buku::create([
            'cover_buku' => $coverbuku,
            'judul_buku' => $request->judul_buku,
            'kategori' => $request->kategori,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'isbn' => $request->isbn,
            'stok' => $request->stok
        ]);
        
        return redirect()->route('admin.daftarbuku')->with('success', 'eBook berhasil ditambahkan!');


    }

    public function destroy($id){
        $buku = buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('admin.daftarbuku');
    }

    public function detail(Request $request, $id){

        $buku = buku::findOrFail($id);
        return view('admin.detail_buku', ['buku' => $buku] );
    }
}
