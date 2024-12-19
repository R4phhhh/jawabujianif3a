<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'id_anggota');
    }

    protected $fillable = [
        'nama_anggota',
        'alamat',
        'jurusan',
        'tgl_daftar',
    ];
}