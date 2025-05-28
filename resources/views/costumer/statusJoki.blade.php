@extends('master.master')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="container section-title" data-aos="fade-up">
          <h2>TRANSAKSI SAYA</h2>
          <p>Temukan Skin Game Impian Dan Boost Akunmu Ke Level Tertinggi Dengan Jasa Kami</p>
      </div><!-- End Section Title -->
      
        <div class="card my-4" style="background-color: #f8f9fa; color: #000;">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-black text-capitalize ps-3">Pembelian Jasa Joki Akun</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori  </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metode Pembayaran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Konformasi Admin</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Pengerjaan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Konfirmasi</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order as $item)
                      <tr>
                          <td>{{ $item->produk->nama_game }}</td>
                          <td>{{ ucfirst($item->produk->kategori) }}</td>
                          <td>{{ $item->produk->harga }}</td>
                          <td>{{ $item->transaksi->metode_pembayaran }}</td>
                          <td>{{ $item->transaksi->tanggal_pembayaran ?? '-' }}</td>
                      
                          <td>
                              <span class="text-dark-{{ $item->konfirmasi_admin == 'diterima' ? 'success' : ($item->konfirmasi_admin == 'ditolak' ? 'danger' : 'secondary') }}">
                                  {{ ucfirst($item->konfirmasi_admin) }}
                              </span>
                          </td>
                          <td>{{ ucfirst($item->detailJoki->status_pekerjaan) }}</td>
                          <td>
                              <div class="d-flex gap-2">
                                @if ($item->detailJoki->status_pekerjaan == 'selesai') <!-- Tampilkan tombol hanya jika status pengiriman adalah "dikirim" -->
                                  <form action="{{ route('selesaikanTransaksi',  $item->id) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-success btn-sm">Selesaikan</button>
                                  </form>
                              @else
                                  <span class="text-muted">Tidak Tersedia</span>
                              @endif
                              </div>
                          </td>
                          <td>{{ ucfirst($item->konfirmasi_customer) }}</td>
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