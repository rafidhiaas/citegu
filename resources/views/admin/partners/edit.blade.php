@extends('layouts.admin')

@section('header', 'Edit Partner')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h4 class="font-semibold text-lg text-blue-600 dark:text-blue-300 leading-tight mb-4">Formulir Edit Partner</h4>

            <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-1 md:col-span-2">
                        <label for="partner_name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Partner <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="partner_name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name', $partner->name) }}" required autocomplete="organization" aria-describedby="partner_name-error">
                        @error('name')<p id="partner_name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="partner_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Logo Partner</label>
                        <input type="file" name="logo" id="partner_logo" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('logo') border-red-500 ring-red-500 @enderror" aria-describedby="partner_logo-error">
                        @error('logo')<p id="partner_logo-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        @if($partner->logo)
                            <div class="mt-2">
                                <p class="text-sm text-gray-700 dark:text-neutral-400">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="h-16 w-auto object-contain">
                            </div>
                        @endif
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="partner_website" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Website Partner (URL)</label>
                        <input type="url" name="website" id="partner_website" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('website') border-red-500 ring-red-500 @enderror" value="{{ old('website', $partner->website) }}" placeholder="https://example.com" autocomplete="url" aria-describedby="partner_website-error">
                        @error('website')<p id="partner_website-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label for="partner_description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Singkat</label>
                        <textarea name="description" id="partner_description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="partner_description-error">{{ old('description', $partner->description) }}</textarea>
                        @error('description')<p id="partner_description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>

                    <div class="col-span-1 md:col-span-2 flex items-center">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" id="partner_is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="1" {{ old('is_active', $partner->is_active) ? 'checked' : '' }} aria-describedby="partner_is_active-error">
                        <label for="partner_is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Partner</label>
                        @error('is_active')<p id="partner_is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2">
                        Perbarui Partner
                    </button>
                    <a href="{{ route('admin.partners.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray active:bg-gray-600 transition duration-150 ease-in-out">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection