@extends('layouts.master') <!-- Sesuaikan dengan layout master Anda -->

@section('content')
<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>Detail Produk: {{ $product->name }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('products.index') }}">Products</a></li>
                    <li class="current">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Product Details Section -->
    <section id="product-details" class="product-details section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }} Gambar" class="img-fluid product-img">
                    @else
                        <img src="https://placehold.co/800x600/E0E0E0/333333?text=No+Image" alt="No Image" class="img-fluid product-img">
                    @endif

                    <h3 class="mt-4">{{ $product->name }}</h3>
                    {{-- Perbaikan: Tambahkan inline style text-align: justify; untuk memastikan rata kanan kiri --}}
                    <p style="text-align: justify;">
                        {{ $product->description ?? 'Belum ada deskripsi lengkap untuk produk ini.' }}
                    </p>

                    @if($product->details_link)
                        <div class="mt-4">
                            <a href="{{ $product->details_link }}" target="_blank" class="btn btn-primary">Lihat Detail Lebih Lanjut</a>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="product-info-box p-4 bg-light rounded shadow-sm">
                        <h4 class="mb-3">Informasi Produk</h4>
                        <ul class="list-unstyled">
                            <li><strong>Kategori:</strong> {{ $product->category }}</li>
                            <li><strong>Status:</strong> {{ $product->is_active ? 'Aktif' : 'Non-aktif' }}</li>
                            <li><strong>Tanggal Ditambahkan:</strong> {{ $product->created_at->format('d M Y') }}</li>
                            @if($product->website)
                                <li><strong>Link Website:</strong> <a href="{{ $product->website }}" target="_blank">{{ Str::limit($product->website, 30) }}</a></li>
                            @endif
                        </ul>
                    </div>
                    {{-- Anda bisa menambahkan daftar fitur atau spesifikasi lainnya di sini --}}
                    <div class="services-list mt-4">
                        <h4>Kategori Serupa</h4>
                        <a href="#" class="active">{{ $product->category }}</a>
                        {{-- Anda bisa menambahkan link kategori lain secara dinamis di sini --}}
                        <a href="{{ route('products.index', ['category' => 'filter-hardware']) }}">Data Center Hardware</a>
                        <a href="{{ route('products.index', ['category' => 'filter-software']) }}">Data Center Software</a>
                        {{-- ... dan seterusnya ... --}}
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Product Details Section -->

</main>
@endsection
