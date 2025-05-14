@extends('layouts.app')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Daftar Cekout</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kontak</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Produk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Cekout</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konfirmasi Admin</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pengiriman</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($order->isEmpty())
                      <tr>
                          <td colspan="9" class="text-center">Tidak Ada Data Costumer</td>
                      </tr>
                  @else
                      @foreach ($order as $orderan)
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <div class="avatar avatar-sm me-3 border-radius-lg bg-gradient-primary text-white d-flex align-items-center justify-content-center">
                                  {{ strtoupper(substr($orderan->user->name, 0, 1)) }}
                              </div>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $orderan->user->name }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs text-secondary mb-0">{{ $orderan->kontak_pembeli }}</p>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ $orderan->produk->nama_game }}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ ucfirst($orderan->produk->kategori) }}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">Rp {{ number_format($orderan->produk->harga, 0, ',', '.') }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">{{ $orderan->created_at->format('d/m/Y') }}</span>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ ucfirst($orderan->konfirmasi_admin) }}</p>
                        </td>
                        <td>
                          <!-- Kolom Aksi -->
                          <div class="d-flex gap-2">
                              @if ($orderan->konfirmasi_admin === 'diterima' && $orderan->status_pengiriman === 'belum_dikirim')
                                  <!-- Tombol Kirim -->
                                  <form action="{{ route('kirimAkun', $orderan->id) }}" method="POST" class="d-inline">
                                      @csrf
                                      <button type="submit" class="btn btn-success btn-sm">Kirim</button>
                                  </form>
                              @elseif ($orderan->status_pengiriman === 'proses')
                                  <!-- Tampilkan "-" jika pengiriman sedang diproses -->
                                  <p class="text-xs text-muted mb-0">-</p>
                              @elseif ($orderan->status_pengiriman === 'selesai')
                                  <!-- Tampilkan "-" jika pengiriman selesai -->
                                  <p class="text-xs text-muted mb-0">-</p>
                              @else
                                  <!-- Jika tidak memenuhi kondisi -->
                                  <p class="text-xs text-muted mb-0">-</p>
                              @endif
                          </div>
                        </td>
                        <td>
                          <!-- Kolom Status Pengiriman -->
                          <p class="text-xs font-weight-bold {{ $orderan->status_pengiriman === 'selesai' ? 'text-success' : ($orderan->status_pengiriman === 'proses' ? 'text-primary' : 'text-muted') }} mb-0">
                              {{ ucfirst($orderan->status_pengiriman) }}
                          </p>
                        </td>
                      </tr>
                      @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection