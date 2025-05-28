@extends('master.master')

{{-- @extends('master.navbar') --}}
@section('content')
{{-- <section id="hero" class="hero section">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
          <img src="{{ asset('appland')}}/assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
        <div class="col-lg-6  d-flex flex-column justify-content-center text-center text-md-start" data-aos="fade-in">
          <h2>App landing page template</h2>
          <p>We are team of talented designers making websites with Bootstrap</p>
          <div class="d-flex mt-4 justify-content-center justify-content-md-start">
            <a href="#" class="download-btn"><i class="bi bi-google-play"></i> <span>Google Play</span></a>
            <a href="#" class="download-btn"><i class="bi bi-apple"></i> <span>App Store</span></a>
          </div>
        </div>
      </div>
    </div>

</section> --}}
<div class="container section-title" data-aos="fade-up">
    <h2>TELUSURI PRODUK</h2>
    <p>Temukan Skin Game Impian Dan Boost Akunmu Ke Level Tertinggi Dengan Jasa Kami</p>
</div><!-- End Section Title -->

<div class="container py-4">
    <div class="row">
        @foreach ($produk as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="img-card-16x9-wrapper">
                        <img src="{{ asset(Storage::url($produk->path_gambar) ?? 'default.jpg') }}"
                             class="img-card-16x9"
                             alt="{{ $produk->nama_game }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_game }}</h5>
                        <p class="card-text">Kategori: {{ ucfirst($produk->kategori) }}</p>
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
                                <a href="{{ route('beliProduk',$produk->id) }}" class="btn btn-success w-100">
                                    Beli
                                </a>
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

                        {{-- <hr>
                        <h4 align="center">Review untuk Penjual</h4>
                        @if ($produk->reviews->isEmpty())
                            <p class="text-muted">Belum ada review untuk produk ini.</p>
                        @else
                            <div class="row">
                                @foreach ($produk->reviews as $review)
                                    <div class="col-12 mb-3">
                                        <div class="border p-3 rounded">
                                            <div class="d-flex justify-content-between">
                                                <p><strong>Nama:</strong> {{ ucfirst($review->user->name) }}</p>
                                                <p><strong>Produk:</strong> {{ ucfirst($produk->nama_game) }}</p>
                                                <p><strong>Kategori:</strong> {{ ucfirst($produk->kategori) }}</p>
                                                <p><strong>Rating:</strong> {{ $review->rating }} / 5</p>
                                            </div>
                                            <div>
                                                <p><strong>Ulasan:</strong></p>
                                                <p>{{ $review->ulasan }}</p>
                                            </div>
                                        </div>
                                    </div>  
                                @endforeach
                            </div>
                        @endif --}}
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <form action="{{ route('buatWishlist', $produk->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                <i class="fa fa-heart"></i>
                            </button>
                            </form>
                            <a href="{{ route('beliProduk',$produk->id) }}" class="btn btn-success">Beli</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
