    @extends('layouts.app')

    @section('content')
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
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $produk->id }}">
                                Lihat Detail
                            </button>
                             <!-- Tombol Edit -->
                             <a type="button" href="/editproduk/{{ $produk->id }}" class="btn btn-success btn-sm">
                                Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <a type="button" href="/sellerhapus/{{ $produk->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                Hapus
                            </a>
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
                    </div>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
