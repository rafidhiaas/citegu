@extends('layouts.master')

@section('content')
<main class="main">

    <div class="page-title light-background">
        <div class="container">
            <h1>Service: {{ $service->name }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('services.index') }}">Services</a></li>
                    <li class="current">{{ $service->name }}</li>
                </ol>
            </nav>
        </div>
    </div><section id="service-details" class="service-details section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }} Gambar" class="img-fluid service-img">
                    @else
                        <img src="https://placehold.co/800x600/E0E0E0/333333?text=No+Image" alt="No Image" class="img-fluid service-img">
                    @endif

                    <h3 class="mt-4">{{ $service->name }}</h3>
                    <p style="text-align: justify;">
                        {{ $service->description ?? 'There is no complete description for this service yet.' }}
                    </p>

                    @if($service->details_link)
                        <div class="mt-4">
                            <a href="{{ $service->details_link }}" target="_blank" class="btn btn-primary">See More Details</a>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-info-box p-4 bg-light rounded shadow-sm">
                        <h4 class="mb-3">Service Information</h4>
                        <ul class="list-unstyled">
                            <li><strong>Category:</strong> {{ $service->category ?? 'Umum' }}</li>
                            <li><strong>Status:</strong> {{ $service->is_active ? 'Aktif' : 'Non-aktif' }}</li>
                            <li><strong>Date Added:</strong> {{ $service->created_at->format('d M Y') }}</li>
                        </ul>
                    </div>

                    @if(isset($relatedServices) && $relatedServices->isNotEmpty())
                        <div class="services-list mt-4">
                            <h4>Similar Services</h4>
                            @foreach ($relatedServices as $related)
                                <a href="{{ route('services.show', $related->id) }}">{{ $related->name }}</a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section></main>
@endsection