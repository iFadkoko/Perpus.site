<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class buku extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'cover_buku',
        'judul_buku',
        'kategori',
        'penerbit',
        'penulis',
        'isbn',
        'stok',
    ];

    public function peminjaman(){
        return $this->hasMany(peminjaman::class, 'buku_id', 'id');
    }
}
