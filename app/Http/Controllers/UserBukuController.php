<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;

class UserBukuController extends Controller
{
    public function index(){
        $buku = buku::all();
        return view('daftarbuku', ['bukus' => $buku]);
    }

    public function detail(Request $request, $id){

        $buku = buku::findOrFail($id);
        return view('buku', ['buku' => $buku] );
    }
}
