@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-dark">Edit Produk</h2>
    
    <form class="forms-sample" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Kategori -->
        <div class="mb-3">
            <label for="kategori" class="form-label text-dark">Kategori</label>
            <select class="form-select border text-dark" name="kategori" id="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="akun">Akun</option>
                <option value="joki">Joki</option>
            </select>
        </div>

        <!-- Nama Game -->
        <div class="mb-3">
            <label for="nama_game" class="form-label text-dark">Nama Game</label>
            <input type="text" class="form-control border text-dark" name="nama_game" value="{{ $edit->nama_game }}" id="nama_game" required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label text-dark">Deskripsi</label>
            <textarea class="form-control border text-dark" name="deskripsi" id="deskripsi" rows="4" required></textarea>
        </div>

        <!-- Gambar Game -->
        <div class="mb-3">
            <label for="gambar_game" class="form-label text-dark">Gambar Game</label>
            <input type="file" class="form-control border text-dark" name="path_gambar" value="{{ $edit->path_gambar }}" id="path_gambar" accept="image/*">
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label for="harga" class="form-label text-dark">Harga (Rp)</label>
            <input type="number" step="0.01" class="form-control border text-dark" name="harga" value="{{ $edit->harga }}" id="harga" required>
        </div>

      
       <!-- Status -->
       <div class="mb-3">
        <label for="status" class="form-label text-dark">Status</label>
        <select class="form-select border text-dark" name="status" id="status" required>
            <option value="tersedia" {{ $edit->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="terjual" {{ $edit->status == 'terjual' ? 'selected' : '' }}>Terjual</option>
        </select>
    </div>
        <button type="submit" class="btn btn-primary">Simpan Produk</button>
    </form>
</div>
@endsection
