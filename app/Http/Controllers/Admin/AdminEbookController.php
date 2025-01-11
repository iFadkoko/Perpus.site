<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;

class AdminEbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::all();
        return view('admin.ebooks',['ebooks' => $ebooks] );
    }
    // validasi
    public function ebook(Request $request){
        $request -> validate([
            'cover_ebook' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul_ebook' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'jumlah_halaman' => 'required|integer|min:1',
        ]);
        

        // Proses upload cover ebook
        $coverPath = $request->file('cover_ebook') 
            ? $request->file('cover_ebook')->store('covers', 'public') 
            : null;

        // Simpan data ke database
        Ebook::create([
            'cover_ebook' => $coverPath,
            'judul_ebook' => $request->judul_ebook,
            'kategori' => $request->kategori,
            'jumlah_halaman' => $request->jumlah_halaman,
        ]);

        return redirect()->route('ebooks.index')->with('success', 'eBook berhasil ditambahkan!');
    }
}
