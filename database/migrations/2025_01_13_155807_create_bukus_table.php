<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('bukus', function (Blueprint $table) {
                $table->id();
                $table->string('cover_buku');
                $table->string('judul_buku');
                $table->string('penerbit');
                $table->string('penulis');
                $table->string('isbn'); // ISBN sebagai string
                $table->string('kategori');
                $table->enum('status', ['pinjam', 'kembali'])->nullable(); // Enum untuk status
                $table->integer('stok')->default(0); // Default stok ke 0 jika kosong
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
