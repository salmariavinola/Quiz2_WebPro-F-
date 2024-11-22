<?php

namespace App\Http\Controllers;

use App\Models\DonasiBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonasiBukuController extends Controller
{
    public function index()
    {
        $donasi = DonasiBuku::where('user_id', Auth::id())->get();
        return view('donasi.index', compact('donasi'));
    }

    public function create()
    {
        return view('donasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer|min:1',
        ]);

        DonasiBuku::create([
            'user_id' => Auth::id(),
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('donasi.index')->with('success', 'Donasi buku berhasil ditambahkan.');
    }
}