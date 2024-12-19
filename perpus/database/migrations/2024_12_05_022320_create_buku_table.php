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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku'); // Menambahkan id_buku sebagai primary key
            $table->string('judul_buku'); // Menambahkan kolom judul_buku
            $table->string('penerbit'); // Menambahkan kolom penerbit
            $table->string('pengarang'); // Menambahkan kolom pengarang
            $table->integer('jumlah'); // Menambahkan kolom jumlah
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};