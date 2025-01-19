<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ebook extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'cover_ebook',
        'judul_ebook',
        'kategori',
        'jumlah_halaman',
        'link_ebook'
    ];
}