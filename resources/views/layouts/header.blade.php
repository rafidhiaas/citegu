<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-end">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('landing/assets/img/citegulogo.png') }}" alt="CITEGU Logo">
        <h1 class="sitename">CITEGU</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('services.index') }}" class="{{ Request::routeIs('services.index') ? 'active' : '' }}">Services</a></li>
          <li><a href="{{ route('products.index') }}" class="{{ Request::routeIs('products.index') ? 'active' : '' }}">Products</a></li>
          <li><a href="{{ route('partners.index') }}" class="{{ Request::routeIs('partners.index') ? 'active' : '' }}">Our Partners</a></li>
          <li><a href="{{ route('contact.index') }}" class="{{ Request::routeIs('contact.index') ? 'active' : '' }}">Contact</a></li>
          {{-- Untuk tautan anchor in-page, active state biasanya ditangani oleh JavaScript tema --}}
          {{-- Saya menyederhanakan kondisi active untuk 'About' agar aktif saat di halaman Home --}}
          <li><a href="{{ route('home') }}#about" class="{{ Request::routeIs('home') ? 'active' : '' }}">About</a></li>
        </ul>
        {{-- Ikon mobile nav toggle dipindahkan ke sini, di luar <ul> namun masih dalam <nav> --}}
        {{-- Ini adalah penempatan umum agar skrip main.js tema dapat berfungsi dengan benar --}}
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

<a class="btn-getstarted" href="{{ route('contact.index') }}">Get Started</a>

    </div>
</header>