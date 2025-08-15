@extends('layouts.admin')

@section('header', 'Edit Produk & Solusi')

@section('content')
    <div>
        <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h4 class="font-semibold text-lg text-blue-600 dark:text-blue-300 leading-tight mb-4">Formulir Edit Produk</h4>

                <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Produk <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="edit_product_name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name', $product->name) }}" required autocomplete="off" aria-describedby="edit_product_name-error">
                            @error('name')<p id="edit_product_name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Produk</label>
                            <textarea name="description" id="edit_product_description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="edit_product_description-error">{{ old('description', $product->description) }}</textarea>
                            @error('description')<p id="edit_product_description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_image" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Gambar Produk</label>
                            <input type="file" name="image" id="edit_product_image" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('image') border-red-500 ring-red-500 @enderror" aria-describedby="edit_product_image-error">
                            @error('image')<p id="edit_product_image-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                            @if($product->image)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700 dark:text-neutral-400">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Gambar Produk Saat Ini" class="h-16 w-auto object-contain">
                                </div>
                            @endif
                        </div>

                        <!-- BARU: Field untuk File Spesifikasi -->
                        <div class="col-span-1 md:col-span-2">
                            <label for="file_spesifikasi" class="block text-sm font-medium text-gray-700 dark:text-gray-100">File Spesifikasi (PDF/DOCX)</label>
                            <input type="file" name="file_spesifikasi" id="file_spesifikasi" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('file_spesifikasi') border-red-500 ring-red-500 @enderror" aria-describedby="file_spesifikasi_error">
                            @error('file_spesifikasi')<p id="file_spesifikasi_error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                            @if($product->file_spesifikasi)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-700 dark:text-neutral-400">File saat ini:
                                        <a href="{{ asset('storage/' . $product->file_spesifikasi) }}" target="_blank" class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                            Lihat File
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_category" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Kategori Produk <span class="text-red-500">*</span></label>
                            <select name="category" id="product_category" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('category') border-red-500 ring-red-500 @enderror" required aria-describedby="product_category-error">
                            <option value="">Pilih Kategori</option>
                            <option value="filter-hardware" {{ old('category') == 'filter-hardware' ? 'selected' : '' }}>Data Center Hardware ICT</option>
                            <option value="filter-software" {{ old('category') == 'filter-software' ? 'selected' : '' }}>Data Center Software </option>
                            <option value="filter-design" {{ old('category') == 'filter-design' ? 'selected' : '' }}>Design Data Center</option>
                            <option value="filter-apps" {{ old('category') == 'filter-apps' ? 'selected' : '' }}>Apps / Software</option>
                            <option value="filter-solutions" {{ old('category') == 'filter-solutions' ? 'selected' : '' }}>Solutions</option>
                        </select>
                            @error('category')<p id="edit_product_category-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_details_link" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Link Detail Produk (URL)</label>
                            <input type="url" name="details_link" id="edit_product_details_link" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('details_link') border-red-500 ring-red-500 @enderror" value="{{ old('details_link', $product->details_link) }}" placeholder="https://example.com/product-detail" autocomplete="off" aria-describedby="edit_product_details_link-error">
                            @error('details_link')<p id="edit_product_details_link-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2 flex items-center">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" id="edit_product_is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }} aria-describedby="edit_product_is_active-error">
                            <label for="edit_product_is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Produk</label>
                            @error('is_active')<p id="edit_product_is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2">
                            Perbarui Produk
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-400 dark:text-white bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray active:bg-gray-600 transition duration-150 ease-in-out">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
