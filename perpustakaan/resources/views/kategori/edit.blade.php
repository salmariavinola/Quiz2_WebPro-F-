@extends('layouts.app')

@section('content')
    <div style="max-width: 500px; margin: auto; padding: 20px; background-color: #ffe6f0; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
        <h1 style="text-align: center; color: #d14781;">Edit Kategori</h1>
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            @csrf
            @method('PUT')
            <label for="nama" style="color: #a64d79; font-weight: bold;">Nama Kategori:</label>
            <input 
                type="text" 
                id="nama" 
                name="nama" 
                value="{{ $kategori->nama }}" 
                style="padding: 10px; border: 1px solid #d9a5c4; border-radius: 5px; background-color: #fff; color: #a64d79;">

            <button 
                type="submit" 
                style="background-color: #d14781; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; transition: 0.3s;">
                Simpan
            </button>
        </form>
    </div>
@endsection