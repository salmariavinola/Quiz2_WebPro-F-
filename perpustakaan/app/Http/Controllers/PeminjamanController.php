<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota; // Pastikan model Anggota diimpor
use App\Models\Peminjaman; // Impor model Peminjaman
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function create()
    {
        $buku = Buku::all(); // Ambil semua buku
        $anggota = Anggota::all(); // Ambil semua anggota
        return view('pinjam.create', compact('buku', 'anggota')); // Tampilkan form peminjaman
    }

    public function store(Request $request)
    {
        // Validasi input
        $tanggalPinjam = now();

        $request->validate([
            'buku_id' => 'required|exists:buku,id',
            'anggota_id' => 'required|exists:anggota,id',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Simpan data peminjaman
        Peminjaman::create([
            'buku_id' => $request->buku_id,
            'anggota_id' => $request->anggota_id,
            'tanggal_pinjam' => $tanggalPinjam, // Pastikan kolom ini diisi
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('peminjaman.index');
    }

    public function history()
    {
        // Ambil riwayat peminjaman untuk pengguna yang sedang login
        $riwayatPeminjaman = Peminjaman::where('anggota_id', auth()->id())->get();
        
        // Kembalikan tampilan dengan data riwayat peminjaman
        return view('peminjaman.history', compact('riwayatPeminjaman'));
    }

    public function index()
{
    // Ambil semua data peminjaman atau sesuai dengan yang diinginkan
    $peminjaman = Peminjaman::all();
    return view('peminjaman.index', compact('peminjaman'));
}

public function statistik()
{
    // Ambil data statistik peminjaman dari database
    $statistikPeminjaman = Peminjaman::select('buku_id', \DB::raw('count(*) as total_peminjaman'))
        ->groupBy('buku_id')
        ->get();

    return view('peminjaman.statistik', compact('statistikPeminjaman'));
}
}