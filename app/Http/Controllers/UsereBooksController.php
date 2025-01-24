<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;

class UsereBooksController extends Controller
{
    public function index(){
        $ebooks = Ebook::all();
        return view('ebooks',['ebooks' => $ebooks] );

    }

    public function filter(Request $request){

        $request->validate([
            'kategori' => 'required|string',
        ]);
    
        $ebooks = Ebook::where('kategori', $request->kategori)->get();
    
        return view('ebooks', ['ebooks' => $ebooks]);
    }

}
