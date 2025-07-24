@extends('layouts.master') <!-- Sesuaikan jika Anda punya layout master yang berbeda -->

@section('content')
    <section id="portfolio" class="portfolio section">

        <div class="container section-title" data-aos="fade-up" style="padding-top: 100px;">
            <h2>Products and Solutions</h2>
            <p>Jelajahi berbagai produk dan solusi inovatif yang kami tawarkan untuk memenuhi kebutuhan Anda.</p>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <!-- Perbaikan : Kategori filter ini harus sesuai dengan nilai 'category' di database -->
                    <li data-filter=".filter-hardware">Data Center Hardware Facility</li>
                    <li data-filter=".filter-software">Data Center Software Facility</li>
                    <li data-filter=".filter-design">Design Data Center</li>
                    <li data-filter=".filter-apps">Apps</li>
                    <li data-filter=".filter-solutions">Solutions</li>
                </ul>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $product->category }}">
                            <div class="portfolio-content h-100">
                                {{-- Link gambar untuk GLightbox --}}
                                <a href="{{ asset('storage/' . $product->image) }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                    {{-- Gambar produk --}}
                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                </a>
                                <div class="portfolio-info">
                                    {{-- Link ke halaman detail produk (jika ada) --}}
                                    <h4><a href="{{ $product->details_link ?? 'javascript:void(0)' }}" title="More Details">{{ $product->name }}</a></h4>
                                    <p style="text-align: align;">
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>Belum ada produk atau solusi yang tersedia saat ini.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
