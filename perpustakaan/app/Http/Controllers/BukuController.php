<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        return view('buku.index', compact('buku'));
    }

    // Menampilkan form tambah buku
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        return view('buku.create', compact('kategori'));
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'kategori_id' => 'required|exists:kategori,id'
        ]);

        Buku::create($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan form edit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    // Memperbarui data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'kategori_id' => 'required|exists:kategori,id'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    // Mencari buku
    public function search(Request $request)
    {
        $query = $request->input('query');
        $buku = Buku::where('judul', 'LIKE', '%' . $query . '%')->get();
        return view('buku.search', compact('buku'));
    }

    // Menampilkan buku yang dipinjam dan belum dikembalikan
    public function return()
    {
        $peminjaman = Peminjaman::with(['buku', 'anggota'])->whereNull('tanggal_kembali')->get();
        return view('buku.return', compact('peminjaman'));
    }

    // Memproses pengembalian buku
    public function submitReturn(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|integer|exists:buku,id',
            'anggota_id' => 'required|integer|exists:anggota,id',
        ]);

        $peminjaman = Peminjaman::where('buku_id', $request->buku_id)
                                  ->where('anggota_id', $request->anggota_id)
                                  ->whereNull('tanggal_kembali')
                                  ->first();

        if ($peminjaman) {
            $peminjaman->update(['tanggal_kembali' => now()]);
            return redirect()->route('buku.return')->with('success', 'Buku berhasil dikembalikan.');
        }

        return redirect()->route('buku.return')->with('error', 'Buku tidak ditemukan dalam peminjaman.');
    }

    // Menampilkan buku populer
    public function popular()
    {
        $buku = Buku::with('kategori')
            ->withCount('peminjaman') // Menghitung jumlah peminjaman
            ->orderByDesc('peminjaman_count')
            ->take(10)
            ->get();
        return view('buku.popular', compact('buku'));
    }

    // Menampilkan buku populer
    public function populer()
    {
        $buku = Buku::with('kategori')
            ->withCount('peminjaman') // Menghitung jumlah peminjaman
            ->orderByDesc('peminjaman_count')
            ->take(10)
            ->get();
        return view('buku.popular', compact('buku'));
    }

    // Menampilkan ulasan buku
    public function reviews($id = null)
{
    if (!$id) {
        return redirect()->route('buku.index')->with('error', 'ID buku tidak valid atau tidak ditemukan.');
    }

    $buku = Buku::with('reviews.user')->findOrFail($id);

    return view('reviews.index', compact('buku'));
}

    // Menambahkan buku ke wishlist pengguna
    public function addToWishlist($id)
    {
        $buku = Buku::findOrFail($id);
        Auth::user()->wishlist()->syncWithoutDetaching($buku);

        return redirect()->back()->with('success', 'Buku ditambahkan ke Wishlist!');
    }

    // Menampilkan wishlist pengguna
    public function viewWishlist()
    {
        $wishlist = Auth::user()->wishlist()->get();
        return view('anggota.wishlist', compact('wishlist'));
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