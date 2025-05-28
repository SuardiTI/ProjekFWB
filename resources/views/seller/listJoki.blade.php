@extends('layouts.app')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Daftar Joki</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Produk</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Cekout</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Konfirmasi Admin</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pengerjaan</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($order->isEmpty())
                      <tr>
                          <td colspan="8" class="text-center">Tidak Ada Data Joki</td>
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
                            <p class="text-xs font-weight-bold text-secondary mb-0">{{ $orderan->produk->nama_game }}</p>
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
                        <!-- Kolom Aksi -->
                        @if ($orderan->konfirmasi_admin === 'diterima')
                        <td>
                          <div class="d-flex gap-2">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal{{ $orderan->id }}">
                              Lihat Detail
                                </button>
                            @if ($orderan->detailJoki && $orderan->detailJoki->status_pekerjaan === 'belum_mulai')
                              
                                <!-- Tombol Mulai Pengerjaan -->
                                <form action="{{ route('mulaipengerjaan', $orderan->detailJoki->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Mulai</button>
                                </form>
                            @elseif ($orderan->detailJoki && $orderan->detailJoki->status_pekerjaan === 'proses')
                            <!-- Tombol Selesaikan Pengerjaan -->
                                <form action="{{ route('selesaiPengerjaan', $orderan->detailJoki->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">Selesai</button>
                                </form>
                           
                            @endif
                        </div>
                          @else
                              -
                          @endif
                        </td>
                        <td>
                          <!-- Kolom Status Pengerjaan -->
                          <p class="text-xs font-weight-bold {{ $orderan->detailJoki->status_pekerjaan === 'selesai' ? 'text-success' : ($orderan->detailJoki->status_pekerjaan === 'proses' ? 'text-primary' : 'text-muted') }} mb-0">
                            {{ Str::title(str_replace('_', ' ', $orderan->detailJoki->status_pekerjaan)) }}
                          </p>
                        </td>
                      </tr>
                      <!-- Modal Detail Joki -->
                      <div class="modal fade" id="detailModal{{ $orderan->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $orderan->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="detailModalLabel{{ $orderan->id }}">Detail Akun Game</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                            </div>
                            <div class="modal-body">
                              <ul class="list-group">
                                <li class="list-group-item"><strong>Username:</strong> {{ $orderan->detailJoki->username_game }}</li>
                                <li class="list-group-item"><strong>Password:</strong> {{ Crypt::decrypt($orderan->detailJoki->password_game) }}</li>
                                <li class="list-group-item"><strong>Instruksi:</strong> {{ $orderan->detailJoki->instruksi }}</li>
                              </ul>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
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