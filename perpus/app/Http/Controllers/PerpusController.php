<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPinjam;
use Illuminate\Http\Request;

class PerpusController extends Controller
{
    // Menampilkan halaman utama dengan data anggota, buku, dan peminjaman
    public function index()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $detailPinjam = DetailPinjam::with(['anggota', 'buku'])->get();

        return view('daftar', compact('anggota', 'buku', 'detailPinjam'));
    }

    // Menyimpan data anggota
    public function storeAnggota(Request $request)
    {
        $validated = $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tgl_daftar' => 'required|date',
        ]);

        Anggota::create($validated);

        return redirect('/daftar')->with('success', 'Anggota berhasil ditambahkan!');
    }

    // Menyimpan data buku
    public function storeBuku(Request $request)
    {
        $validated = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        Buku::create($validated);

        return redirect('/daftar')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function storePinjam(Request $request)
    {
        $validated = $request->validate([
            'id_anggota' => 'required|exists:anggota,id',
            'id_buku' => 'required|exists:buku,id',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
        ]);
    
        \Log::info('Incoming Peminjaman Data:', $validated);
        $anggota = Anggota::find($validated['id_anggota']);
        $buku = Buku::find($validated['id_buku']);

        if (!$anggota || !$buku) {
            \Log::error('Anggota or Buku not found.', ['anggota' => $anggota, 'buku' => $buku]);
            return redirect('/daftar')->with('error', 'Anggota atau Buku tidak ditemukan.');
        }
    
        $pinjam = DetailPinjam::create([
            'id_anggota' => $validated['id_anggota'],
            'id_buku' => $validated['id_buku'],
            'tgl_pinjam' => $validated['tgl_pinjam'],
            'tgl_kembali' => $validated['tgl_kembali'],
        ]);
    
        \Log::info('Data Peminjaman Saved:', ['data' => $pinjam]);
    
        return redirect('/daftar')->with('success', 'Peminjaman berhasil ditambahkan!');
    }
}