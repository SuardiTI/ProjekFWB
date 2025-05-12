@extends('master.master')

{{-- @extends('master.navbar') --}}
@section('content')

<div class="container section-title" data-aos="fade-up">
    <h2>TELUSURI PRODUK</h2>
    <p>Temukan Skin Game Impian Dan Boost Akunmu Ke Level Tertinggi Dengan Jasa Kami</p>
</div><!-- End Section Title -->

<div class="container py-4">
    <div class="row">
        @foreach ($produk as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset(Storage::url($produk->path_gambar) ?? 'default.jpg') }}" class="card-img-top" alt="{{ $produk->nama_game }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_game }}</h5>
                        <p class="card-text">Kategori: {{ $produk->kategori }}</p>
                        <p class="card-text text-success">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <p class="card-text">
                            <span class="badge {{ $produk->status == 'tersedia' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($produk->status) }}
                            </span>
                        </p>
                        <!-- Tombol Aksi -->
                        <div class="row">
                            <div class="col-6 pe-1">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#detailModal{{ $produk->id }}">
                                    Lihat Detail
                                </button>
                            </div>
                            <div class="col-6 ps-1">
                                <button type="button" class="btn btn-success w-100">
                                    Beli
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="detailModal{{ $produk->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $produk->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $produk->id }}">{{ $produk->nama_game }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                            <img src="{{ asset(Storage::url($produk->path_gambar) ?? 'default.jpg') }}" class="img-fluid mb-3 d-block mx-auto" alt="{{ $produk->nama_game }}">
                            <p><strong>Kategori:</strong> {{ $produk->kategori }}</p>
                            <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <p><strong>Status:</strong>
                                <span class="badge {{ $produk->status == 'tersedia' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($produk->status) }}
                                </span>
                            </p>
                            <p><strong>Deskripsi:</strong></p>
                            <p>{{ $produk->deskripsi }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <a href="/beliProduk/{{ $produk->id }}" class="btn btn-success">Beli</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
