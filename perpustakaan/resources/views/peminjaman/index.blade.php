<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <style>
        /* Latar belakang */
        body {
            background: linear-gradient(135deg, #f0e6ff, #fde0f0); /* Gradasi pastel ungu dan pink */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Kontainer utama */
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border: 3px solid #f0a9d1; /* Border pink pastel */
        }

        /* Judul halaman */
        h1 {
            text-align: center;
            font-size: 36px;
            color: #9a56b1; /* Ungu pastel */
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table thead th {
            background-color: #f3e0ff; /* Header tabel dengan warna ungu muda */
            color: #7b4ea2; /* Ungu gelap */
            padding: 12px;
            text-align: center;
            font-size: 16px;
            border-bottom: 2px solid #e1c1f3; /* Border ungu pastel */
        }

        table tbody tr {
            background-color: #ffffff;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        table tbody tr:hover {
            background-color: #fde7f7; /* Highlight baris dengan warna pink pastel */
            transform: scale(1.01);
        }

        table tbody td {
            padding: 10px;
            text-align: center;
            font-size: 14px;
            border-bottom: 1px solid #e1c1f3; /* Border ungu pastel */
        }

        /* Responsif */
        @media (max-width: 768px) {
            h1 {
                font-size: 28px;
            }

            table thead th, table tbody td {
                font-size: 13px;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Peminjaman Buku</h1>

        <table>
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Nama Anggota</th>
                    <th>Tanggal Pinjam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $pinjam)
                <tr>
                    <td>{{ $pinjam->buku->judul }}</td>
                    <td>{{ $pinjam->anggota->nama }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>