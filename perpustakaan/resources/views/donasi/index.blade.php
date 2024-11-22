@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Background Global */
        body {
            background: radial-gradient(circle, #ffe6fa, #d9faff); /* Gradasi pink dan biru pastel */
            font-family: 'Tahoma', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Container Styling */
        .container {
            background: #fff; /* Background putih */
            padding: 30px;
            border-radius: 12px;
            margin: 30px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            border: 2px solid #f8c4ff; /* Border pink pastel */
        }

        /* Heading */
        h1 {
            font-size: 32px;
            color: #ff6ec7; /* Pink terang */
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Alert Styling */
        .alert-success {
            background-color: #e6fffa; /* Hijau pastel */
            border-left: 5px solid #4caf50;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        /* Tabel Styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #f8c4ff; /* Border pink pastel */
            text-align: left;
            padding: 10px;
        }

        .table th {
            background: #ffe6fa; /* Background pink lembut */
            color: #333;
            font-weight: bold;
        }

        .table tbody tr:hover {
            background: #f0f8ff; /* Highlight biru lembut */
        }

        .table td {
            font-size: 14px;
        }

        /* Responsive Styling */
        @media (max-width: 768px) {
            h1 {
                font-size: 28px;
            }

            .container {
                padding: 20px;
            }

            .table td, .table th {
                font-size: 12px;
                padding: 8px;
            }
        }
    </style>

    {{-- Header Halaman --}}
    <h1>Daftar Donasi Anda</h1>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Jika Tidak Ada Donasi --}}
    @if($donasi->isEmpty())
        <p>Belum ada donasi yang Anda buat.</p>
    @else
        {{-- Tabel Daftar Donasi --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($donasi as $item)
                    <tr>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->pengarang }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->jumlah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection