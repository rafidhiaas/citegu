@extends('layouts.master') {{-- Memastikan menggunakan layout master yang sudah disempurnakan --}}

@section('content')
<main class="main">
    <section id="create-partner" class="section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Tambah Partner Baru</h2>
            <p>Isi detail partner yang akan ditambahkan.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{-- Form ini tidak dibungkus dalam div card lagi sesuai permintaan --}}
                    {{-- HAPUS class="php-email-form" untuk menghindari konflik --}}
                    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- Penting untuk form Laravel --}}
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row gy-4">
                            <div class="col-md-12">
                                {{-- Label disempurnakan dengan kelas Tailwind yang responsif terhadap mode gelap --}}
                                <label for="name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Nama Partner <span class="text-red-500">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="organization" aria-describedby="name_error">
                                @error('name')<div id="name_error" class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="logo" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Logo Partner (Gambar)</label>
                                <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" autocomplete="off" aria-describedby="logo_error">
                                @error('logo')<div id="logo_error" class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="website" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Website Partner (URL Lengkap)</label>
                                <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" placeholder="https://example.com" autocomplete="url" aria-describedby="website_error">
                                @error('website')<div id="website_error" class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="description" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Deskripsi Singkat</label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" autocomplete="off" aria-describedby="description_error">{{ old('description') }}</textarea>
                                @error('description')<div id="description_error" class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12 form-check mb-3">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ old('is_active', true) ? 'checked' : '' }} value="1" autocomplete="off" aria-describedby="is_active_error">
                                <label for="is_active" class="form-check-label text-sm font-medium text-neutral-700 dark:text-neutral-300">Aktifkan Partner</label>
                                @error('is_active')<div id="is_active_error" class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary me-2">Simpan Partner</button>
                                <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection