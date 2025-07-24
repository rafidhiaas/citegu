@extends('layouts.master') <!-- Sesuaikan dengan layout admin Anda -->

@section('content')
<main class="main">
    <section id="edit-product-management" class="section" style="padding-top: 100px;">
        <div class="container section-title" data-aos="fade-up">
            <h2>Edit Produk & Solusi</h2>
            <p>Perbarui informasi produk dan solusi.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="p-6 md:p-8 bg-white dark:bg-neutral-900 rounded-xl shadow-lg border border-neutral-200 dark:border-neutral-700">

                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Gunakan metode PUT untuk update --}}

                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
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
                        <div class="col-md-12">
                            <label for="name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Nama Produk <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required autocomplete="off" aria-describedby="name_error">
                            @error('name')<div id="name_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Deskripsi Produk</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" autocomplete="off" aria-describedby="description_error">{{ old('description', $product->description) }}</textarea>
                            @error('description')<div id="description_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Gambar Produk</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" autocomplete="off" aria-describedby="image_error">
                            @error('image')<div id="image_error" class="invalid-feedback">{{ $message }}</div>@enderror
                            @if($product->image)
                                <div class="mt-2">
                                    <p class="text-sm text-neutral-600 dark:text-neutral-400">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk Saat Ini" class="img-fluid" style="max-width: 150px; height: auto;">
                                </div>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label for="category" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Kategori Produk <span class="text-red-500">*</span></label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required aria-describedby="category_error">
                                <option value="">Pilih Kategori</option>
                                <option value="filter-hardware" {{ old('category', $product->category) == 'filter-hardware' ? 'selected' : '' }}>Data Center Hardware Facility</option>
                                <option value="filter-software" {{ old('category', $product->category) == 'filter-software' ? 'selected' : '' }}>Data Center Software Facility</option>
                                <option value="filter-design" {{ old('category', $product->category) == 'filter-design' ? 'selected' : '' }}>Design Data Center</option>
                                <option value="filter-apps" {{ old('category', $product->category) == 'filter-apps' ? 'selected' : '' }}>Apps</option>
                                <option value="filter-solutions" {{ old('category', $product->category) == 'filter-solutions' ? 'selected' : '' }}>Solutions</option>
                            </select>
                            @error('category')<div id="category_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label for="details_link" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Link Detail Produk (URL)</label>
                            <input type="url" name="details_link" id="details_link" class="form-control @error('details_link') is-invalid @enderror" value="{{ old('details_link', $product->details_link) }}" placeholder="https://example.com/product-detail" autocomplete="off" aria-describedby="details_link_error">
                            @error('details_link')<div id="details_link_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12 form-check mb-3">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ old('is_active', $product->is_active) ? 'checked' : '' }} value="1" autocomplete="off" aria-describedby="is_active_error">
                            <label for="is_active" class="form-check-label text-sm font-medium text-neutral-700 dark:text-neutral-300">Aktifkan Produk</label>
                            @error('is_active')<div id="is_active_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary me-2">Perbarui Produk</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection