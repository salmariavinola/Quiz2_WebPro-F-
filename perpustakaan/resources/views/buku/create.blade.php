{{-- resources/views/buku/create.blade.php --}}
@extends('layouts.app')

@section('content')
<style>
    /* Global styles */
    body {
        background: linear-gradient(135deg, #c4f3ff 0%, #d4a5ff 100%); /* Variasi gradasi pastel */
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        color: #333; /* Teks lebih gelap untuk kontras */
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    /* Form container */
    .form-container {
        background: rgba(255, 255, 255, 0.9); /* Warna putih dengan transparansi */
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Bayangan lembut */
        width: 100%;
        max-width: 500px;
        text-align: center;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #4B0082; /* Warna ungu pastel */
        text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.1); /* Bayangan pada teks */
    }

    /* Input styles */
    input, select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s ease;
    }

    input:focus, select:focus {
        border-color: #d4a5ff; /* Warna fokus */
        box-shadow: 0 0 5px rgba(212, 165, 255, 0.7); /* Efek fokus */
    }

    button {
        background: linear-gradient(135deg, #ff9fbc 0%, #d8b4fe 100%); /* Variasi tombol */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
        background: linear-gradient(135deg, #d8b4fe 0%, #ff9fbc 100%);
        transform: translateY(-3px); /* Efek hover */
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }

        h1 {
            font-size: 24px;
        }
    }
</style>

<div class="form-container">
    {{-- Judul Form --}}
    <h1>Tambah Buku</h1>

    {{-- Form untuk input data buku --}}
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf {{-- Token CSRF untuk keamanan --}}
        
        {{-- Input judul buku --}}
        <input type="text" name="judul" placeholder="Judul" required>

        {{-- Input pengarang --}}
        <input type="text" name="pengarang" placeholder="Pengarang" required>

        {{-- Input penerbit --}}
        <input type="text" name="penerbit" placeholder="Penerbit" required>

        {{-- Input tahun terbit --}}
        <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required>

        {{-- Dropdown kategori --}}
        <select name="kategori_id" required>
            <option value="" disabled selected>Pilih Kategori</option>
            @foreach($kategori as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option> {{-- Loop kategori --}}
            @endforeach
        </select>

        {{-- Tombol submit --}}
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection