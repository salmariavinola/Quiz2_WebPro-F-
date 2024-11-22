@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Global Background */
        body {
            background: radial-gradient(circle, #e4e9f7, #f8c4ff); /* Gradasi biru pastel dan pink pastel */
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center; /* Memusatkan secara horizontal */
            align-items: center;   /* Memusatkan secara vertikal */
        }

        /* Main Container */
        .container {
            background: #fff; /* Background putih */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            border: 3px solid #f1a7d5; /* Border pink pastel */
            text-align: center;
        }

        /* Heading */
        h1 {
            font-size: 36px;
            color: #9c47b9; /* Ungu pastel */
            font-weight: bold;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-top: 40px;
        }

        /* Form Styling */
        form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #9c47b9;
            display: block;
            margin-bottom: 10px;
        }

        .form-group textarea {
            width: 100%;
            border: 2px solid #f1a7d5;
            border-radius: 10px;
            padding: 12px;
            resize: none;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-group textarea:focus {
            border-color: #9c47b9; /* Border ungu pastel saat fokus */
            box-shadow: 0 4px 10px rgba(156, 71, 185, 0.4);
        }

        .btn-primary {
            background: linear-gradient(45deg, #b8c5ff, #f1a7d5);
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #f1a7d5, #b8c5ff);
            transform: translateY(-3px);
        }

        /* Ulasan Styling */
        .review {
            background: #fff0f9; /* Background pink lembut */
            padding: 20px;
            border-radius: 12px;
            border: 2px solid #f1a7d5; /* Border pink pastel */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .review:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .review strong {
            color: #9c47b9; /* Ungu pastel untuk nama pengguna */
            font-size: 16px;
        }

        .review p {
            margin: 10px 0;
            font-size: 16px;
        }

        hr {
            border: 0;
            border-top: 1px solid #e0e0e0;
            margin: 15px 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 30px;
            }

            h2 {
                font-size: 24px;
            }

            .container {
                padding: 20px;
            }

            .form-group textarea {
                font-size: 14px;
            }

            .btn-primary {
                font-size: 14px;
            }

            .review {
                padding: 15px;
            }
        }
    </style>

    {{-- Header Halaman --}}
    <h1>Ulasan untuk Buku: {{ $buku->judul }}</h1>

    {{-- Form Tambah Ulasan --}}
    @auth
    <form action="{{ route('reviews.store', $buku->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Tulis Ulasan:</label>
            <textarea name="content" id="content" rows="4" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn-primary mt-2">Kirim Ulasan</button>
    </form>
    @endauth

    {{-- Daftar Ulasan --}}
    <h2>Daftar Ulasan:</h2>
    @foreach($buku->reviews as $review)
    <div class="review">
        <p><strong>{{ optional($review->user)->name ?? 'Anonim' }}</strong> menulis:</p>
        <p>{{ $review->content }}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection