@extends('layouts.master')

@section('content')
<main class="main">
    <section id="services" class="services section">

        <div class="container section-title" data-aos="fade-up" style="padding-top: 100px;">
            <h2>Services</h2>
            <p>Jelajahi berbagai layanan inovatif yang kami tawarkan untuk memenuhi kebutuhan Anda.</p>
        </div>
        <div class="container">

            <div class="row gy-4">

                @forelse($services as $service)
                    @if($service->is_active) {{-- Hanya tampilkan layanan yang aktif --}}
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100"> {{-- Sesuaikan delay jika perlu --}}
                            <div class="service-item position-relative">
                                <div class="icon">
                                    {{-- Asumsi kolom 'icon_class' di tabel services --}}
                                    <i class="{{ $service->icon_class }}"></i>
                                </div>
                                {{-- Link ke halaman detail layanan menggunakan named route --}}
                                <a href="{{ route('services.show', $service->id) }}" class="stretched-link">
                                    <h3>{{ $service->name }}</h3>
                                </a>
                                <p>{{ $service->description }}</p>
                                {{-- Hapus stretched-link duplikat jika ada --}}
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada layanan yang tersedia saat ini.</p>
                    </div>
                @endforelse

            </div>

        </div>

    </section>
</main>
@endsection