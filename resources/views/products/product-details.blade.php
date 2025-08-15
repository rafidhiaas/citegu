@extends('layouts.master') 

@section('content')
<main class="main">

    <div class="page-title light-background">
        <div class="container">
            <h1>Products: {{ $product->name }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="current">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div><section id="product-details" class="product-details section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }} Gambar" class="img-fluid product-img">
                    @else
                        <img src="https://placehold.co/800x600/E0E0E0/333333?text=No+Image" alt="No Image" class="img-fluid product-img">
                    @endif

                    <h3 class="mt-4">{{ $product->name }}</h3>
                    <p style="text-align: justify;">
                        {!! nl2br($product->description ?? 'There is no complete description for this product yet.') !!}
                    </p>
                    
                    <!-- BARU: Tombol Unduh File Spesifikasi -->
                    @if($product->file_spesifikasi)
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $product->file_spesifikasi) }}" target="_blank" class="btn btn-primary">Review File Specification</a>
                        </div>
                    @else
                        <!-- Tautan ini hanya akan ditampilkan jika tidak ada file spesifikasi -->
                        @if($product->details_link)
                            <div class="mt-4">
                                <a href="{{ $product->details_link }}" target="_blank" class="btn btn-secondary">See More Details</a>
                            </div>
                        @endif
                    @endif
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-info-box p-4 bg-light rounded shadow-sm">
                        <h4 class="mb-3">Informasi Produk</h4>
                        <ul class="list-unstyled">
                            <li><strong>Category:</strong> {{ str_replace('filter-', '', ucwords(str_replace('-', ' ', $product->category))) }}</li>
                            <li><strong>Status:</strong> {{ $product->is_active ? 'Aktif' : 'Non-aktif' }}</li>
                            <li><strong>Date added:</strong> {{ $product->created_at->format('d M Y') }}</li>   
                            @if($product->details_link)
                                <li><strong>Link Detail:</strong> <a href="{{ $product->details_link }}" target="_blank">{{ Str::limit($product->details_link, 30) }}</a></li>
                            @endif
                        </ul>
                    </div>
                    
                    <div class="services-list mt-4">
                        <h4>Similar Categories</h4>
                        @if(!empty($categories))
                            @foreach ($categories as $category)
                                <a href="{{ route('products.index', ['category' => $category->category]) }}"
                                   class="{{ $product->category === $category->category ? 'active' : '' }}">
                                   {{ str_replace('filter-', '', ucwords(str_replace('-', ' ', $category->category))) }}
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection