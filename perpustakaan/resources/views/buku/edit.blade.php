<!-- resources/views/buku/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- Menandakan bahwa ini adalah permintaan PUT untuk update -->
        
        <label for="judul">Judul:</label>
        <input type="text" name="judul" value="{{ $buku->judul }}" required><br>
        
        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" value="{{ $buku->pengarang }}" required><br>
        
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" value="{{ $buku->penerbit }}" required><br>
        
        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required><br>
        
        <label for="kategori_id">Kategori:</label>
        <select name="kategori_id">
            @foreach($kategori as $k)
                <option value="{{ $k->id }}" {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
            @endforeach
        </select><br>
        
        <button type="submit">Update Buku</button>
    </form>
</body>
</html>