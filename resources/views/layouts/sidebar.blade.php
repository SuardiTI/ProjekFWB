<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="/dashboard" >
        <img src="{{ asset('material') }}/assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">AkunMarket</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active bg-gradient-dark text-white" href="/dashboard">
            <i class="material-symbols-roun ed opacity-5">{{ ucfirst(Auth::user()->role) }}</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        {{-- ROLE ADMIN --}}
        @if (Auth::user()->role === 'admin')
        <a class="nav-link text-dark" href="{{ route('lihatProduk') }}">
          <i class="material-symbols-rounded opacity-5">view_list</i>
          <span class="nav-link-text ms-1">Cek Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('lihatPenjual') }}">
          <i class="material-symbols-rounded opacity-5">manage_accounts</i>
          <span class="nav-link-text ms-1">Seller</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('lihatPembeli') }}">
          <i class="material-symbols-rounded opacity-5">manage_accounts</i>
          <span class="nav-link-text ms-1">Costumer</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('verifikasiPembayaran') }}"> 
          <i class="material-symbols-rounded opacity-5">pending_actions</i>
          <span class="nav-link-text ms-1">Verifikasi Pembayaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('adminlihatProdukTerjual') }}">
          <i class="material-symbols-rounded opacity-5">inventory</i>
          <span class="nav-link-text ms-1">Produk Terjual</span>
        </a>
      </li>
        @endif

        @if (Auth::user()->role === 'penjual')
        <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('lihat') }}">
          <i class="material-symbols-rounded opacity-5">view_list</i>
          <span class="nav-link-text ms-1">Lihat Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('lihattmbh') }}">
          <i class="material-symbols-rounded opacity-5">add_circle</i>
          <span class="nav-link-text ms-1">Upload Produk</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('listcekout') }}">
          <i class="material-symbols-rounded opacity-5">format_list_bulleted</i>
          <span class="nav-link-text ms-1">List Cekout</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('listJoki') }}">
          <i class="material-symbols-rounded opacity-5">format_list_bulleted</i>
          <span class="nav-link-text ms-1">List Joki</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('lihatProdukTerjual') }}">
          <i class="material-symbols-rounded opacity-5">inventory</i>
          <span class="nav-link-text ms-1">Produk Terjual</span>
        </a>
      </li>
        @endif
        <style>
            .btn-logout {
                background: none; /* Hilangkan background */
                border: none; /* Hilangkan border */
                color: inherit; /* Warna teks mengikuti elemen induk */
                padding: 0; /* Hilangkan padding default */
                cursor: pointer; /* Ubah kursor menjadi pointer */
                display: flex; /* Untuk menyelaraskan ikon dan teks */
                align-items: center; /* Selaraskan secara vertikal */
                 font-size: inherit; /* Gunakan ukuran font yang sesuai */
            }
            
            .btn-logout:hover {
                color: #ff0000; /* Warna teks saat hover (opsional) */
            }
        </style>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout nav-link text-dark">
                    <i class="material-symbols-rounded opacity-5">logout</i>
                    <span class="nav-link-text ms-1">Logout</span>
                </button>
            </form>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-dark" href="../pages/sign-up.html">
            <i class="material-symbols-rounded opacity-5">assignment</i>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li> --}}
      </ul>
    </div>
    {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-dark mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
      </div>
    </div> --}}
  </aside>