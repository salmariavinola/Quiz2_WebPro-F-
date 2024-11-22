@extends('layouts.app')

@section('content')
<style>
    /* Global styles */
    body {
        background: linear-gradient(135deg, #ff9fbc 0%, #d8b4fe 100%);
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        overflow: hidden;
    }

    /* Sidebar styles */
    .sidebar {
        position: absolute;
        top: 20px;
        left: 20px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .sidebar-box {
        background: rgba(255, 255, 255, 0.8);
        color: #4B0082;
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }

    /* Stars animation */
    .star {
        position: absolute;
        background: white;
        border-radius: 50%;
        animation: twinkle 2s infinite ease-in-out;
    }

    @keyframes twinkle {
        0%, 100% {
            opacity: 0.6;
        }
        50% {
            opacity: 1;
        }
    }

    .star:nth-child(1) { top: 20%; left: 10%; width: 8px; height: 8px; }
    .star:nth-child(2) { top: 5%; left: 30%; width: 10px; height: 10px; }
    .star:nth-child(3) { top: 15%; left: 50%; width: 12px; height: 12px; }
    .star:nth-child(4) { top: 25%; left: 80%; width: 7px; height: 7px; }
    .star:nth-child(5) { top: 35%; left: 60%; width: 9px; height: 9px; }

    /* Dashboard container */
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 20px auto;
        text-align: center;
    }

    h1 {
        font-size: 36px;
        margin-bottom: 40px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
    }

    /* Cards layout */
    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .card {
        background: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 250px;
        height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: #333;
        overflow: hidden;
        text-align: center;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
    }

    .card i {
        font-size: 50px;
        margin-bottom: 15px;
        color: #d8b4fe;
    }

    .card h5 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card a {
        text-decoration: none;
        background: #d8b4fe;
        color: white;
        padding: 10px 15px;
        border-radius: 8px;
        margin: 5px 0;
        display: inline-block;
        transition: background-color 0.3s ease;
    }

    .card a:hover {
        background: #ff9fbc;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .card {
            width: 100%;
            max-width: 350px;
        }
    }

    /* Footer */
    footer {
        margin-top: 30px;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
    }
</style>

<!-- Sidebar for Laravel and username -->
<div class="sidebar">
    <div class="sidebar-box">Laravel</div>
    <div class="sidebar-box">Username: {{ Auth::user()->name }}</div>
</div>

<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pendaftaran Anggota</h5>
                    <div class="options">
                        <a href="{{ route('anggota.create') }}" class="option-button">Tambah</a>
                        <a href="{{ route('anggota.index') }}" class="option-button">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Buku</h5>
                    <div class="options">
                        <a href="{{ route('buku.create') }}" class="option-button">Tambah</a>
                        <a href="{{ route('buku.index') }}" class="option-button">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Kategori</h5>
                    <div class="options">
                        <a href="{{ route('kategori.create') }}" class="option-button">Tambah</a>
                        <a href="{{ route('kategori.index') }}" class="option-button">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statistik Peminjaman</h5>
                    <div class="options">
                        <a href="{{ route('buku.populer') }}" class="option-button">Populer</a>
                        <a href="{{ route('peminjaman.statistik') }}" class="option-button">Statistik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menambahkan elemen gelembung -->
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

@endsection