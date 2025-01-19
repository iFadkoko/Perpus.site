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

}
