@extends('master.master')

@section('content')
<div class="container mt-5">
    <h2 class="text-dark"><strong>Checkout</strong></h2>

    <form action="{{ route('beli') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Produk ID -->
        <input type="hidden" name="produk_id" value="{{ $produk->id }}">

        <!-- User ID (dari auth, bisa dihandle di controller) -->

        <!-- Kontak Pembeli -->
        <div class="mb-3">
            <label for="kontak_pembeli" class="form-label text-dark">Kontak Pembeli (WA atau Email)</label>
            <input type="text" class="form-control border text-dark" name="kontak_pembeli" id="kontak_pembeli" required>
        </div>

        <!-- Total Harga -->
        <div class="mb-3">
            <label for="total_harga" class="form-label text-dark">Total Harga (Rp)</label>
            <input type="number" class="form-control border text-dark" name="total_harga" id="total_harga" value="{{ $produk->harga }}" readonly>
        </div>

        <!-- Metode Pembayaran -->

        <div class="mb-3">
            <label for="total_harga" class="form-label text-dark">Metode Pembayaran</label>
            <input type="text" class="form-control border text-dark" name="metode_pembayaran" id="metode_pembayaran">
        </div>
        {{-- <div class="mb-3">
            <label for="metode_pembayaran" class="form-label text-dark">Metode Pembayaran</label>
            <select class="form-select border text-dark" name="metode_pembayaran" required>
                <option value="">-- Pilih Metode --</option>
                <option value="transfer_bank">Transfer Bank</option>
                <option value="e-wallet">E-Wallet</option>
                <option value="qris">QRIS</option>
            </select>
        </div> --}}
         <!-- Form Tambahan Jika Kategori adalah Joki -->
         @if ($produk->kategori === 'joki')
         <div id="form-detail-joki">
           
             <div class="mb-3">
                 <label for="username_game" class="form-label text-dark">Username Game</label>
                 <input type="text" class="form-control border text-dark" name="username_game" id="username_game" placeholder="Masukkan username game" required>
             </div>
             <div class="mb-3">
                 <label for="password_game" class="form-label text-dark">Password Game</label>
                 <input type="password" class="form-control border text-dark" name="password_game" id="password_game" placeholder="Masukkan password game" required>
             </div>
             <div class="mb-3">
                 <label for="instruksi" class="form-label text-dark">Instruksi</label>
                 <textarea class="form-control border text-dark" name="instruksi" id="instruksi" placeholder="Masukkan instruksi untuk joki" required></textarea>
             </div>
         </div>
         @endif

        <!-- Jumlah Dibayar -->
        <div class="mb-3">
            <label for="jumlah_dibayar" class="form-label text-dark">Jumlah Dibayar (Rp)</label>
            <input type="number" class="form-control border text-dark" name="jumlah_dibayar" id="jumlah_dibayar" required>
        </div>

        <!-- Tanggal Pembayaran -->
        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label text-dark">Tanggal Pembayaran</label>
            <input type="date" class="form-control border text-dark" name="tanggal_pembayaran" required>
        </div>

        <!-- Upload Bukti Pembayaran -->
        <div class="mb-3">
            <label for="bukti_pembayaran" class="form-label text-dark">Bukti Pembayaran</label>
            <input type="file" class="form-control border text-dark" name="bukti_pembayaran" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
    </form>
</div>
@endsection
