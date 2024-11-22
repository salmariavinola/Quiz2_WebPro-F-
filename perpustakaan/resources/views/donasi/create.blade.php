@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Donasi Buku</h1>
    <form action="{{ route('donasi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul_buku">Judul Buku</label>
            <input type="text" name="judul_buku" id="judul_buku" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" name="pengarang" id="pengarang" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Kirim Donasi</button>
    </form>
</div>
@endsection