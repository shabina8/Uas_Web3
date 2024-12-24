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
            $table->id(); // Primary key
            $table->string('title'); // Kolom judul buku
            $table->foreignId('kategori_id')->constrained(); // Pastikan ini benar
            $table->foreignId('penulis_id')->constrained(); // Pastikan ini benar
            $table->integer('stock')->default(0); // Kolom stok dengan default 0
            $table->timestamps(); // Kolom created_at dan updated_at

            // $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            // $table->foreign('penulis_id')->references('id')->on('penulis')->onDelete('cascade');
            
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
