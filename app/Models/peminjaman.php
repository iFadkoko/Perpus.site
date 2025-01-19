<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function buku(){
        return $this->belongsTo(buku::class, 'buku_id', 'id');
    }
    
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'buku_id',
        'durasi_pinjam',
        'tgl_kembali',
        'status',
        'denda'
    ];
}
