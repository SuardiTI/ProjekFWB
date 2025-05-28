@extends('layouts.app')

@section('content')

<div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Daftar Akun Seller</h6> {{-- Changed title to Daftar Penjual --}}
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th> {{-- Changed header --}}
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th> {{-- Added Email header --}}
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th> {{-- Changed header --}}
                    {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th> --}} {{-- Removed Status header as it's not in schema --}}
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bergabung Sejak</th> {{-- Changed header --}}
                    <th class="text-secondary opacity-7"></th> {{-- Header for actions --}}
                  </tr>
                </thead>
                <tbody>
            
                  @if ($pengguna->isEmpty())
                      <tr>
                          <td colspan="5" class="text-center">Tidak ada data penjual.</td>
                      </tr>
                  @else

                      @foreach ($pengguna as $user)
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                             
                              <div class="avatar avatar-sm me-3 border-radius-lg bg-gradient-primary text-white d-flex align-items-center justify-content-center">
                                  {{ strtoupper(substr($user->name, 0, 1)) }}
                              </div>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                              {{-- Email is now in its own column --}}
                            </div>
                          </div>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ $user->email }}</p> {{-- Display Email --}}
                        </td>
                        <td>
                          {{-- Display Role --}}
                          <p class="text-xs font-weight-bold mb-0">{{ ucfirst($user->role) }}</p>
                        </td>
                        {{-- Removed Status column --}}
                        {{-- <td class="align-middle text-center text-sm">
                          @if ($user->is_online ?? false)
                              <span class="badge badge-sm bg-gradient-success">Online</span>
                          @else
                              <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                          @endif
                        </td> --}}
                        <td class="align-middle text-center">
                          {{-- Display created_at and format it --}}
                          <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at->format('d/m/Y') }}</span> {{-- Format date as needed, using Y for full year --}}
                        </td>
                        <td class="align-middle">
                          <div class="d-flex gap-2">
                              <!-- Tombol Lihat Produk -->
                              <a href="/lihatprodukperseller/{{ $user->id }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-original-title="Lihat Produk">
                                  Lihat Produk
                              </a>
                              <!-- Tombol Hapus Akun -->
                              <form action="{{ route('hapusAkunSeller',$user->id) }}" method="POST" class="d-inline">
                                  @csrf
                                  <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Hapus Akun" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                      Hapus Akun
                                  </button>
                              </form>
                          </div>
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
