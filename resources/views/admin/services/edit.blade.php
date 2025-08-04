@extends('layouts.admin')

@section('header', 'Edit Layanan')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h4 class="font-semibold text-lg text-blue-600 dark:text-blue-300 leading-tight mb-4">Formulir Edit Layanan</h4>

            <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data"> {{-- PENTING: Tambahkan enctype --}}
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-1 md:col-span-2">
                        <label for="service_name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Layanan <span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="service_name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name', $service->name) }}" required autocomplete="off" aria-describedby="service_name-error">
                        @error('name')<p id="service_name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label for="service_icon" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Pilih Ikon Layanan <span class="text-red-500">*</span></label>
                        <select name="icon_class" id="service_icon" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('icon_class') border-red-500 ring-red-500 @enderror" required aria-describedby="service_icon-error">
                            <option value="">Pilih Ikon</option>
                            <option value="bi bi-activity" {{ old('icon_class', $service->icon_class) == 'bi bi-activity' ? 'selected' : '' }}>Activity</option>
                            <option value="bi bi-map" {{ old('icon_class', $service->icon_class) == 'bi bi-map' ? 'selected' : '' }}>Map</option>
                            <option value="bi bi-clouds-fill" {{ old('icon_class', $service->icon_class) == 'bi bi-clouds-fill' ? 'selected' : '' }}>Clouds</option>
                            <option value="bi bi-code-square" {{ old('icon_class', $service->icon_class) == 'bi bi-code-square' ? 'selected' : '' }}>Code Square</option>
                            <option value="bi bi-file-earmark-person-fill" {{ old('icon_class', $service->icon_class) == 'bi bi-file-earmark-person-fill' ? 'selected' : '' }}>Person File</option>
                            <option value="bi bi-arrow-up-square-fill" {{ old('icon_class', $service->icon_class) == 'bi bi-arrow-up-square-fill' ? 'selected' : '' }}>Arrow Up</option>
                            <option value="bi bi-server" {{ old('icon_class', $service->icon_class) == 'bi bi-server' ? 'selected' : '' }}>Server</option>
                            <option value="bi bi-shield-lock" {{ old('icon_class', $service->icon_class) == 'bi bi-shield-lock' ? 'selected' : '' }}>Shield Lock</option>
                            <option value="bi bi-speedometer2" {{ old('icon_class', $service->icon_class) == 'bi bi-speedometer2' ? 'selected' : '' }}>Speedometer</option>
                            <option value="bi bi-terminal" {{ old('icon_class', $service->icon_class) == 'bi bi-terminal' ? 'selected' : '' }}>Terminal</option>
                            <option value="bi bi-gear" {{ old('icon_class', $service->icon_class) == 'bi bi-gear' ? 'selected' : '' }}>Gear</option>
                            <option value="bi bi-laptop" {{ old('icon_class', $service->icon_class) == 'bi bi-laptop' ? 'selected' : '' }}>Laptop</option>
                            <option value="bi bi-phone" {{ old('icon_class', $service->icon_class) == 'bi bi-phone' ? 'selected' : '' }}>Phone</option>
                            <option value="bi bi-envelope" {{ old('icon_class', $service->icon_class) == 'bi bi-envelope' ? 'selected' : '' }}>Envelope</option>
                            <option value="bi bi-database" {{ old('icon_class', $service->icon_class) == 'bi bi-database' ? 'selected' : '' }}>Database</option>
                            <option value="bi bi-cloud-arrow-up" {{ old('icon_class', $service->icon_class) == 'bi bi-cloud-arrow-up' ? 'selected' : '' }}>Cloud Upload</option>
                            <option value="bi bi-cpu" {{ old('icon_class', $service->icon_class) == 'bi bi-cpu' ? 'selected' : '' }}>CPU</option>
                            <option value="bi bi-hdd-stack" {{ old('icon_class', $service->icon_class) == 'bi bi-hdd-stack' ? 'selected' : '' }}>HDD Stack</option>
                            <option value="bi bi-router" {{ old('icon_class', $service->icon_class) == 'bi bi-router' ? 'selected' : '' }}>Router</option>
                            <option value="bi bi-file-earmark-code" {{ old('icon_class', $service->icon_class) == 'bi bi-file-earmark-code' ? 'selected' : '' }}>File Code</option>
                            <option value="bi bi-tools" {{ old('icon_class', $service->icon_class) == 'bi bi-tools' ? 'selected' : '' }}>Tools</option>
                            <option value="bi bi-truck" {{ old('icon_class', $service->icon_class) == 'bi bi-truck' ? 'selected' : '' }}>Truck</option>
                            <option value="bi bi-wifi" {{ old('icon_class', $service->icon_class) == 'bi bi-wifi' ? 'selected' : '' }}>Wifi</option>
                            <option value="bi bi-clipboard-data" {{ old('icon_class', $service->icon_class) == 'bi bi-clipboard-data' ? 'selected' : '' }}>Clipboard Data</option>
                        </select>
                        @error('icon_class')<p id="service_icon-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                    {{-- Input untuk gambar layanan --}}
                    <div class="col-span-1 md:col-span-2">
                        <label for="service_image" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Gambar Layanan</label>
                        <input type="file" name="image" id="service_image" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('image') border-red-500 ring-red-500 @enderror" aria-describedby="service_image-error">
                        @error('image')<p id="service_image-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        @if($service->image)
                            <div class="mt-2">
                                <p class="text-sm text-gray-700 dark:text-neutral-400">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $service->image) }}" alt="Gambar {{ $service->name }}" class="h-16 w-auto object-contain">
                            </div>
                        @endif
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label for="service_description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Layanan</label>
                        <textarea name="description" id="service_description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="service_description-error">{{ old('description', $service->description) }}</textarea>
                        @error('description')<p id="service_description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-span-1 md:col-span-2 flex items-center">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" id="service_is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} aria-describedby="service_is_active-error">
                        <label for="service_is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Layanan</label>
                        @error('is_active')<p id="service_is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2">
                        Perbarui Layanan
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray active:bg-gray-600 transition duration-150 ease-in-out">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection