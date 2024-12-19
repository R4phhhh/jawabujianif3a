<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    // Relasi satu ke banyak (one-to-many) dengan DetailPinjam
    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'id_buku');
    }

    protected $fillable = [
        'judul_buku',
        'penerbit',
        'pengarang',
        'jumlah',
    ];
}