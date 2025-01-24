<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('cover_ebook')->nullable(); // Menyimpan path gambar
            $table->string('judul_ebook'); // Judul eBook
            $table->string('kategori'); // Kategori eBook
            $table->integer('jumlah_halaman');
            $table->string('link_ebook');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebooks');
    }
};