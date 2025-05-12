<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/dashboardcustomer" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">AkunMarket</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li><a href="/statusPesanan">Status Pesanan</a></li>
          </li>
          {{-- @if (Route::has('login'))
          @auth --}}
          {{-- <li><a href="{{ url('/dashboard') }}">Dashboard</a></li> --}}
          {{-- @else
          <li><a href="{{ route('login') }}">Log in</a></li>
          @if (Route::has('register'))
          <li><a href="{{ route('register') }}">Register</a></li>
          @endif
          @endauth
          @endif --}}

          @guest
            @if (Route::has('login'))
                <li><a href="{{ route('login') }}">Log in</a></li>
            @endif
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
           @endguest

          @auth
          <li>
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn-logout">Logout</button>
              </form>
          </li>
          @endauth


          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="index.html#about">Get Started</a>

    </div>
  </header>