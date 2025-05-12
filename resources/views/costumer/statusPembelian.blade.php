@extends('master.master')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card my-4" style="background-color: #f8f9fa; color: #000;">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-black text-capitalize ps-3">Daftar Transaksi Saya</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metode Pembayaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Pembayaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Pengiriman</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Pembayaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                      <tr>
                        <td>{{ $item->produk->nama_game }}</td>
                        <td>{{ $item->kontak_pembeli }}</td>
                        <td>Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
                        <td>
                          <span class="btext-dark-{{ $item->status == 'selesai' ? 'success' : ($item->status == 'gagal' ? 'danger' : 'warning') }}">
                            {{ ucfirst($item->status) }}
                          </span>
                        </td>
                        <td>
                          <span class="text-dark-{{ $item->konfirmasi_admin == 'diterima' ? 'success' : ($item->konfirmasi_admin == 'ditolak' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($item->konfirmasi_admin) }}
                          </span>
                        </td>
                        <td>{{ $item->transaksi->tanggal_pembayaran ?? '-' }}</td>
                        <td>
                            @if ($item->status_pengiriman == 'dikirim') <!-- Tampilkan tombol hanya jika status pengiriman adalah "dikirim" -->
                                <form action="{{ route('', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Pesanan Diterima</button>
                                </form>
                            @else
                                <span class="text-muted">Tidak Tersedia</span>
                            @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection