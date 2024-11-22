@extends('layouts.app') {{-- Menggunakan layout utama --}}

@section('content')
<div class="container">
    <style>
        /* Pastel Background untuk Page */
        body {
            background: radial-gradient(circle, #c6f8ff, #f0bbff);
            font-family: 'Verdana', sans-serif;
        }

        /* Styling Container */
        .container {
            background-color: #fff;
            border-radius: 12px;
            padding: 30px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #6a67ce; /* Warna ungu pastel */
        }

        /* Form Tambah Ulasan */
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d9d7f1;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #6a67ce;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
        }

        /* Daftar Ulasan */
        .review {
            margin-top: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .review strong {
            color: #6a67ce;
        }

        hr {
            border: 1px solid #d9d7f1;
        }
    </style>

    {{-- Header Ulasan --}}
    <h1>Ulasan untuk Buku: {{ $buku->judul }}</h1>

    {{-- Form Tambah Ulasan --}}
    @auth
    <form action="{{ route('reviews.store', $buku->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Tulis Ulasan:</label>
            <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn-primary">Kirim Ulasan</button>
    </form>
    @endauth

    {{-- Daftar Ulasan --}}
    <h2>Daftar Ulasan:</h2>
    @if($buku->reviews->isEmpty())
        <p>Belum ada ulasan untuk buku ini.</p>
    @else
        @foreach($buku->reviews as $review)
            <div class="review">
                <p><strong>{{ optional($review->user)->name ?? 'Anonim' }}</strong> menulis:</p>
                <p>{{ $review->content }}</p>
                <hr>
            </div>
        @endforeach
    @endif
</div>
@endsection