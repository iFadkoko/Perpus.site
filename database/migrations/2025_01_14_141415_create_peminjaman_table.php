<?php

use App\Models\buku;
use App\Models\User;
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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id')->on('bukus');
            $table->date('durasi_pinjam')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->enum('status', ['pinjam','kembali'])->default('pinjam');
            $table->integer('denda')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }


};
