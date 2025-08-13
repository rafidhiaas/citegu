@extends('layouts.master')

@section('content')
<main class="main">
    <section id="portfolio" class="portfolio section">

        <div class="container section-title" data-aos="fade-up" style="padding-top: 100px;">
            <h2>Products and Solutions</h2>
            <p>Jelajahi berbagai produk dan solusi inovatif yang kami tawarkan untuk memenuhi kebutuhan Anda.</p>
        </div>

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    @forelse($categories as $category)
                        @php
                            $categoryName = str_replace('filter-', '', Str::title(str_replace('-', ' ', $category->category)));
                        @endphp
                        <li data-filter=".{{ $category->category }}">{{ $categoryName }}</li>
                    @empty
                        <!-- Jika tidak ada kategori yang tersedia -->
                    @endforelse
                </ul>

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item {{ $product->category }}">
                            <div class="portfolio-content h-100">
                                <a href="{{ asset('storage/' . $product->image) }}" data-gallery="portfolio-gallery-app" class="glightbox">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                </a>
                                <div class="portfolio-info">
                                    <h4><a href="{{ route('products.show', $product->id) }}" title="More Details">{{ $product->name }}</a></h4>
                                    <p style="text-align: justify;">
                                        {{ Str::limit($product->description, 100) }}
                                        @if(strlen($product->description) > 100)
                                            <a href="{{ route('products.show', $product->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold">More Details</a>
                                        @endif
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