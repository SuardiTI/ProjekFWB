@extends('layouts.app')

@section('content')
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
            <!-- Banner Hitam -->
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Upload Produk</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <!-- Form Tambah Produk -->
                    <div class="container mt-3">
                        <form action="{{ route('tambah') }}" method="POST" enctype="multipart/form-data" class="text-dark">
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
                                <input type="text" class="form-control border text-dark" name="nama_game" id="nama_game" required>
                            </div>

                            <!-- Deskripsi -->
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label text-dark">Deskripsi</label>
                                <textarea class="form-control border text-dark" name="deskripsi" id="deskripsi" rows="4" required></textarea>
                            </div>

                            <!-- Gambar Game -->
                            <div class="mb-3">
                                <label for="gambar_game" class="form-label text-dark">Gambar Game</label>
                                <input type="file" class="form-control border text-dark" name="path_gambar" id="path_gambar" accept="image/*">
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="harga" class="form-label text-dark">Harga (Rp)</label>
                                <input type="number" step="0.01" class="form-control border text-dark" name="harga" id="harga" required>
                            </div>

                            <!-- Status (disembunyikan karena default 'tersedia') -->
                            <input type="hidden" name="status" value="tersedia">

                            <button type="submit" class="btn btn-primary">Simpan Produk</button>
                        </form>
                    </div>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection