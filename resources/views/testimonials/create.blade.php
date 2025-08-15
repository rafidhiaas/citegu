@csrf <!-- Penting untuk Laravel Forms -->

@extends('layouts.master')

@section('content')
<main class="main">
    <section id="submit-testimonial" class="section">
        <div class="container section-title" data-aos="fade-up">
            <br><h2>Submit Your Testimonial</h2>
            <p>We really appreciate your review. Please fill out the form below to share your experience with our service.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('testimonials.store') }}" method="post">
                        @csrf <!-- Penting untuk Laravel Forms -->

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Your name</label>
                                <input type="text" name="author_name" id="name-field" class="form-control @error('author_name') is-invalid @enderror" value="{{ old('author_name') }}" required>
                                @error('author_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="company-field" class="pb-2">Company Name</label>
                                <input type="text" name="author_company" id="company-field" class="form-control @error('author_company') is-invalid @enderror" value="{{ old('author_company') }}">
                                @error('author_company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="role-field" class="pb-2">Your position</label>
                                <input type="text" name="author_role" id="role-field" class="form-control @error('author_role') is-invalid @enderror" value="{{ old('author_role') }}">
                                @error('author_role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="rating-field" class="pb-2">Rating (1-5)</label>
                                <select name="rating" id="rating-field" class="form-control @error('rating') is-invalid @enderror" required>
                                    <option value="">Select Rating</option>
                                    <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Star</option>
                                    <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Star</option>
                                    <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Star</option>
                                    <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Star</option>
                                    <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Star</option>
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="testimonial-text-field" class="pb-2">Testimonial Anda</label>
                                <textarea name="content" id="testimonial-text-field" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

<style>
    /* Styling dasar untuk pesan error/success */
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }
    .alert-danger {
        color: #a94442;
        background-color: #f2dede;
        border-color: #ebccd1;
    }
    .is-invalid {
        border-color: #dc3545 !important;
    }
    .invalid-feedback {
        display: block; /* Agar pesan error terlihat */
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }
    .btn-primary { /* Contoh styling tombol, sesuaikan dengan tema Anda */
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>