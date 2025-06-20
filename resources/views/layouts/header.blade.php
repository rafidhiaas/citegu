<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-end">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        {{-- Gunakan fungsi asset() untuk gambar, ini sudah benar --}}
        <img src="{{ asset('landing/assets/img/citegulogo.png') }}" alt="CITEGU Logo">
        <h1 class="sitename">CITEGU</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          {{-- Tautan Home: Aktif jika rute saat ini adalah 'home' --}}
          <li><a href="{{ route('home') }}" class="{{ Request::routeIs('home') ? 'active' : '' }}">Home</a></li>

          {{-- Tautan Services: Selalu mengarah ke section #services di halaman Home --}}
          {{-- Class 'active' untuk section ini biasanya ditangani oleh JavaScript scrollspy tema --}}
          <li><a href="{{ route('home') }}#services">Services</a></li>

          {{-- PASTIKAN LANJUTAN NAVIGASI BERADA DI SINI, SEPERTI INI: --}}
          {{-- Tautan Products: Aktif jika rute saat ini adalah 'products.index' --}}
          <li><a href="{{ route('products.index') }}" class="{{ Request::routeIs('products.index') ? 'active' : '' }}">Products</a></li>

          {{-- Tautan Contact: Selalu mengarah ke section #contact di halaman Home --}}
          <li><a href="{{ route('home') }}#contact">Contact</a></li>

          {{-- Tautan About: Selalu mengarah ke section #about di halaman Home --}}
          <li><a href="{{ route('home') }}#about">About</a></li>
        </ul> {{-- Pastikan tag penutup </ul> ada --}}
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav> {{-- Pastikan tag penutup </nav> ada --}}

      {{-- Tombol "Get Started": Selalu mengarah ke section #about di halaman Home --}}
      <a class="btn-getstarted" href="{{ route('home') }}#about">Get Started</a>

    </div>
</header>