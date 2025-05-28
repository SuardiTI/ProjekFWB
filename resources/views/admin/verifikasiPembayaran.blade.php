@extends('layouts.app')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Verifikasi Pembayaran</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pembeli</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak Pembeli</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Harga</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metode Pembayaran</th>
                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Pembayaran</th> --}}
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bukti Pembayaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($order as $order)
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              {{-- Avatar dengan inisial nama --}}
                              <div class="avatar avatar-sm me-3 border-radius-lg bg-gradient-primary text-white d-flex align-items-center justify-content-center">
                                  {{ strtoupper(substr($order->user->name, 0, 1)) }}
                              </div>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $order->user->name ?? '-' }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>{{ $order->kontak_pembeli}}</td>
                        <td>{{ $order->produk->nama_game ?? '-' }}</td>
                        <td>{{ ucfirst($order->produk->kategori) }}</td>
                        <td>Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $order->transaksi->metode_pembayaran ?? '-' }}</td>
                        {{-- <td>{{ ucfirst($order->transaksi->status_pembayaran ?? 'pending') }}</td> --}}
                        <td>
                          @if ($order->transaksi->bukti_pembayaran)
                              <!-- Tombol untuk membuka modal -->
                              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalBukti{{ $order->id }}">
                                Lihat Bukti
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="modalBukti{{ $order->id }}" tabindex="-1" aria-labelledby="modalBuktiLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="modalBuktiLabel{{ $order->id }}">Bukti Pembayaran</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                      <img src="{{ asset('storage/' . $order->transaksi->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid">
                                    </div>
                                  </div>
                                </div>
                              </div>
                          @else
                              <span class="text-muted">Tidak Ada</span>
                          @endif
                        </td>

                        <td>
                          <!-- Kolom Aksi -->
                          <div class="d-flex gap-2">
                              <!-- Tombol Terima -->
                              <form action="{{ route('terimaPembayaran', $order->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin terima pembayaran ini?')">Terima</button>
                              </form>
                              <!-- Tombol Tolak -->
                              <form action="{{ route('tolakPembayaran', $order->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin tolak pembayaran ini?')">Tolak</button>
                              </form>
                          </div>
                      </td>
                      <td>
                        <!-- Kolom Status -->
                        <p class="text-xs font-weight-bold {{ $order->konfirmasi_admin === 'diterima' ? 'text-success' : ($order->konfirmasi_admin === 'ditolak' ? 'text-danger' : 'text-muted') }} mb-0">
                            {{ ucfirst($order->konfirmasi_admin) }}
                        </p>
                    </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="7" class="text-center">Tidak ada pembayaran yang perlu diverifikasi.</td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection