@extends('layouts.admin')
@section('header', 'Pengaturan Homepage')
@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <h4 class="font-semibold text-lg text-blue-600 dark:text-blue-300 leading-tight mb-4">Ubah Pengaturan Homepage</h4>
            <form action="{{ route('admin.settings.homepage.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-1 md:col-span-2">
                        <label for="homepage_slogan" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Slogan Homepage</label>
                        <input type="text" name="homepage_slogan" id="homepage_slogan" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('homepage_slogan') border-red-500 ring-red-500 @enderror" value="{{ old('homepage_slogan', $slogan->value ?? '') }}" autocomplete="off">
                        @error('homepage_slogan')<p id="homepage_slogan-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label for="homepage_background_image" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Gambar Latar Belakang Baru</label>
                        <input type="file" name="homepage_background_image" id="homepage_background_image" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('homepage_background_image') border-red-500 ring-red-500 @enderror" aria-describedby="homepage_background_image-error">
                        @error('homepage_background_image')<p id="homepage_background_image-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        @if($backgroundPath && $backgroundPath->value)
                            <div class="mt-2">
                                <p class="text-sm text-gray-700 dark:text-neutral-400">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $backgroundPath->value) }}" alt="Gambar Latar Belakang" class="h-24 w-auto object-contain">
                            </div>
                        @endif
                    </div>
                   <!-- <div class="col-span-1 md:col-span-2 mt-6 border-t pt-6">
                        <h5 class="font-semibold text-md text-blue-600 dark:text-blue-300 leading-tight mb-4">Statistik Homepage</h5>
                        <div class="grid grid-cols-2 gap-4">
                             <div>
                                <label for="total_clients" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Total Klien</label>
                                <input type="number" name="homepage_total_clients" id="total_clients" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ old('homepage_total_clients', $clients->value ?? '') }}">
                            </div>
                            <div>
                                <label for="total_projects" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Total Proyek</label>
                                <input type="number" name="homepage_total_projects" id="total_projects" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ old('homepage_total_projects', $projects->value ?? '') }}">
                            </div>
                            <div>
                                <label for="support_hours" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Jam Dukungan</label>
                                <input type="number" name="homepage_support_hours" id="support_hours" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ old('homepage_support_hours', $support_hours->value ?? '') }}">
                            </div>
                            <div>
                                <label for="total_workers" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Jumlah Pekerja</label>
                                <input type="number" name="homepage_total_workers" id="total_workers" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" value="{{ old('homepage_total_workers', $workers->value ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2">
                        Perbarui Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection