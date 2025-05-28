@extends('master.master')

@section('content')
<div class="container mt-5">
    <div class="col-12">
        <div class="container section-title" data-aos="fade-up">
          <h2>BERIKAN PENILAIAN</h2>
          <p>Temukan Skin Game Impian Dan Boost Akunmu Ke Level Tertinggi Dengan Jasa Kami</p>
        </div>
    <form action="{{ route('simpanReview', $order->id) }}" method="POST">
        @csrf

        <!-- Produk -->
        <div class="mb-3">
            <label for="produk" class="form-label text-dark">Produk</label>
            <input type="text" class="form-control border text-dark" value="{{ $order->produk->nama_game }}" readonly>
            <input type="hidden" name="produk_id" value="{{ $order->produk->id }}">
        </div>

        <!-- Rating -->
        <div class="mb-3">
            <label for="rating" class="form-label text-dark">Rating (1-5)</label>
            <input type="number" class="form-control border text-dark" name="rating" id="rating" min="1" max="5" required>
        </div>

        <!-- Ulasan -->
        <div class="mb-3">
            <label for="ulasan" class="form-label text-dark">Ulasan</label>
            <textarea class="form-control border text-dark" name="ulasan" id="ulasan" rows="4" placeholder="Berikan Ulasan Ke Penjual (opsional)"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Penilaian</button>
    </form>
</div><br>
@endsection