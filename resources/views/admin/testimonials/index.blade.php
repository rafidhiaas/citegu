@extends('layouts.master')

@section('content')
<main class="main">
    <section id="submit-testimonial" class="section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kirim Testimonial Anda</h2>
            <p>Kami sangat menghargai ulasan Anda. Silakan isi formulir di bawah ini untuk membagikan pengalaman Anda dengan layanan kami.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="p-6 md:p-8 bg-white dark:bg-neutral-900 rounded-xl shadow-lg border border-neutral-200 dark:border-neutral-700">

                        <form action="{{ route('testimonials.store') }}" method="post">
                            @csrf {{-- Pesan Sukses --}}
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- Pesan Error Validasi --}}
                            @if($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label for="author_name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Nama Anda <span class="text-red-500">*</span></label>
                                    <input type="text" name="author_name" id="author_name" class="form-control @error('author_name') is-invalid @enderror" value="{{ old('author_name') }}" required aria-describedby="author_name_error">
                                    @error('author_name')
                                        <div id="author_name_error" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="author_company" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Nama Perusahaan (Opsional)</label>
                                    <input type="text" name="author_company" id="author_company" class="form-control @error('author_company') is-invalid @enderror" value="{{ old('author_company') }}" aria-describedby="author_company_error">
                                    @error('author_company')
                                        <div id="author_company_error" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="author_role" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Jabatan Anda (Opsional)</label>
                                    <input type="text" name="author_role" id="author_role" class="form-control @error('author_role') is-invalid @enderror" value="{{ old('author_role') }}" aria-describedby="author_role_error">
                                    @error('author_role')
                                        <div id="author_role_error" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="rating" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Rating (1-5) <span class="text-red-500">*</span></label>
                                    <select name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror" required aria-describedby="rating_error">
                                        <option value="">Pilih Rating</option>
                                        <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 Bintang</option>
                                        <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 Bintang</option>
                                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 Bintang</option>
                                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 Bintang</option>
                                        <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 Bintang</option>
                                    </select>
                                    @error('rating')
                                        <div id="rating_error" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="content" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Testimonial Anda <span class="text-red-500">*</span></label>
                                    <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="10" required aria-describedby="content_error">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div id="content_error" class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Kirim Testimonial</button>
                                </div>
                            </div>
                        </form>
                    {{-- DIV CARD YANG SEBELUMNYA MEMBUNGKUS FORM DIHAPUS --}}
                </div>
            </div>
        </div>
    </section>
</main>
@endsection