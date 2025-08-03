@extends('layouts.admin')

@section('header', 'Tambah Produk Baru')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h4 class="font-semibold text-lg text-blue-600 dark:text-blue-300 leading-tight mb-4">Formulir Tambah Produk Baru</h4>

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-1 md:col-span-2">
                        <label for="product_name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Produk <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="product_name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name') }}" required autocomplete="off" aria-describedby="product_name-error">
                        @error('name')<p id="product_name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="product_description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Produk</label>
                        <textarea name="description" id="product_description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="product_description-error">{{ old('description') }}</textarea>
                        @error('description')<p id="product_description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="product_image" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Gambar Produk</label>
                        <input type="file" name="image" id="product_image" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('image') border-red-500 ring-red-500 @enderror" aria-describedby="product_image-error">
                        @error('image')<p id="product_image-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="product_category" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Kategori Produk <span class="text-red-500">*</span></label>
                        <select name="category" id="product_category" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('category') border-red-500 ring-red-500 @enderror" required aria-describedby="product_category-error">
                            <option value="">Pilih Kategori</option>
                            <option value="filter-hardware" {{ old('category') == 'filter-hardware' ? 'selected' : '' }}>Data Center Hardware Facility</option>
                            <option value="filter-software" {{ old('category') == 'filter-software' ? 'selected' : '' }}>Data Center Software Facility</option>
                            <option value="filter-design" {{ old('category') == 'filter-design' ? 'selected' : '' }}>Design Data Center</option>
                            <option value="filter-apps" {{ old('category') == 'filter-apps' ? 'selected' : '' }}>Apps</option>
                            <option value="filter-solutions" {{ old('category') == 'filter-solutions' ? 'selected' : '' }}>Solutions</option>
                        </select>
                        @error('category')<p id="product_category-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="product_details_link" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Link Detail Produk (URL)</label>
                        <input type="url" name="details_link" id="product_details_link" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('details_link') border-red-500 ring-red-500 @enderror" value="{{ old('details_link') }}" placeholder="https://example.com/product-detail" autocomplete="off" aria-describedby="product_details_link-error">
                        @error('details_link')<p id="product_details_link-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2 flex items-center">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" id="product_is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('is_active', true) ? 'checked' : '' }} value="1" aria-describedby="product_is_active-error">
                        <label for="product_is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Produk</label>
                        @error('is_active')<p id="product_is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2">
                        Simpan Produk
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray active:bg-gray-600 transition duration-150 ease-in-out">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection