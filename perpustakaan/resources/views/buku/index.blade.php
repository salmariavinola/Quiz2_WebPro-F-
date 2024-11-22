@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Global Background */
        body {
            background: radial-gradient(circle, #f0e6ff, #e0c7f0); /* Gradasi ungu pastel dan pink lembut */
            font-family: 'Arial', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            height: 100vh; /* Tinggi penuh layar */
            display: flex; /* Flexbox untuk memusatkan */
            justify-content: center; /* Memusatkan secara horizontal */
            align-items: center; /* Memusatkan secara vertikal */
        }

        /* Main Container */
        .container {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 1200px; /* Lebar container lebih besar */
            width: 90%; /* Lebar responsif */
            border: 3px solid #f0a9d1; /* Border pink pastel */
        }

        /* Heading */
        h1 {
            font-size: 36px;
            color: #9a56b1; /* Ungu pastel */
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        /* Button Styles */
        .btn-success {
            background: linear-gradient(45deg, #92a1ff, #d4a9ff);
            color: white;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-success:hover {
            background: linear-gradient(45deg, #d4a9ff, #92a1ff);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Table Styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            padding: 20px; /* Padding diperbesar */
            text-align: center;
            border: 1px solid #e1c1f3; /* Border tabel ungu pastel */
        }

        .table th {
            background-color: #f1e1ff; /* Background header tabel */
            color: #9a56b1;
        }

        .table tbody tr {
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .table tbody tr:hover {
            transform: scale(1.02);
            background-color: #f8d9f5;
        }

        /* Lebar Kolom */
        .table th, .table td {
            width: 20%; /* Lebar kolom utama ditingkatkan */
        }

        .table th:nth-child(6), .table td:nth-child(6) {
            width: 25%; /* Lebar kolom Aksi */
        }

        /* Aksi Buttons */
        .action-buttons {
            display: flex;
            gap: 10px; /* Jarak antar tombol */
            justify-content: center; /* Rata tengah tombol */
        }

        .btn-sm {
            font-size: 14px;
            padding: 8px 12px;
            border-radius: 6px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-info {
            background-color: #a1c6f1;
            color: white;
        }

        .btn-info:hover {
            background-color: #7daef1;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #f3c47f;
            color: white;
        }

        .btn-warning:hover {
            background-color: #e1a63c;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #f77f7f;
            color: white;
        }

        .btn-danger:hover {
            background-color: #f15b5b;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 30px;
            }

            .table {
                font-size: 14px;
            }

            .btn-success {
                padding: 10px 18px;
                font-size: 14px;
            }

            .btn-sm {
                padding: 6px 10px;
            }

            .action-buttons {
                flex-direction: column; /* Tombol bertumpuk di layar kecil */
                gap: 5px;
            }
        }
    </style>

    <h1>Daftar Buku</h1>
    <a href="{{ route('buku.create') }}" class="btn btn-success mb-3">Tambah Buku</a> <!-- Tombol tambah buku -->
    
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buku as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->pengarang }}</td>
                <td>{{ $item->penerbit }}</td>
                <td>{{ $item->tahun_terbit }}</td>
                <td>{{ $item->kategori ? $item->kategori->nama : 'Tidak ada kategori' }}</td>
                <td>
                    <div class="action-buttons">
                        <!-- Link untuk melihat review -->
                        <a href="{{ route('buku.reviews', $item->id) }}" class="btn btn-info btn-sm">Lihat Review</a>

                        <!-- Link untuk mengedit buku -->
                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Form untuk menghapus buku -->
                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection