@extends('layouts.master') <!-- Sesuaikan jika Anda punya layout admin yang berbeda -->

@section('content')
<main class="main max-h-screen overflow-y-auto"> {{-- Tambahkan kelas ini untuk scroll --}}
    <section id="clients" class="clients section light-background">
        <div class="container" data-aos="fade-up">
            <h2 class="section-title">Our Partners</h2>
        </div>
        <div class="container" data-aos="fade-up">
            <div class="row gy-4 justify-content-center">
                @forelse($partners as $partner)
                    @if($partner->is_active) {{-- Hanya tampilkan partner yang aktif --}}
                        <div class="col-xl-2 col-md-3 col-6 client-logo">
                            <a href="{{ $partner->website }}" target="_blank">
                                @if($partner->logo)
                                    <!-- Pastikan folder 'partner_logos' di 'storage/app/public' bisa diakses publik -->
                                    <img src="{{ asset('storage/' . $partner->logo) }}" class="img-fluid" alt="{{ $partner->name }} Logo">
                                @else
                                    <!-- Placeholder jika tidak ada logo, pastikan default-partner-logo.png ada di public/landing/assets/img/clients/ -->
                                    <img src="{{ asset('landing/assets/img/clients/default-partner-logo.png') }}" class="img-fluid" alt="{{ $partner->name }} Logo">
                                @endif
                            </a>
                        </div>
                    @endif
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada partner yang aktif untuk ditampilkan saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>
@endsection