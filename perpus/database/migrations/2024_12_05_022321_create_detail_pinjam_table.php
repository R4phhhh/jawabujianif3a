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
        Schema::create('detail_pinjam', function (Blueprint $table) {
            $table->id('no_pinjam');
            $table->foreignId('id_anggota')->constrained()->onDelete('cascade');
            $table->foreignId('id_buku')->constrained()->onDelete('cascade');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->timestamps();
        
            // Menambahkan foreign key
            $table->foreign('id_anggota')->references('id')->on('anggota')->onDelete('cascade');
            $table->foreign('id_buku')->references('id_buku')->on('buku')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pinjam');
    }
};