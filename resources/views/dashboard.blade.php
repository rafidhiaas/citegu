@extends('layouts.admin')

@section('header', 'Dashboard Admin')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">

            <!-- Bagian Metrik Ringkasan -->
            <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight mb-4 border-b pb-2 border-blue-500 dark:border-blue-700">
                Ringkasan Admin
            </h3>
            <div class="flex flex-wrap justify-center gap-3 mb-8">
                <!-- Kartu Total Testimonial -->
                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-blue-500 dark:border-blue-400">
                    <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Total Testimonial</p>
                    <p class="text-3xl font-bold mt-1 text-blue-600 dark:text-blue-400">{{ $totalTestimonials }}</p>
                </div>

                <!-- Kartu Testimonial Pending -->
                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-amber-500 dark:border-amber-400">
                    <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Testimonial Pending</p>
                    <p class="text-3xl font-bold mt-1 text-amber-600 dark:text-amber-400">{{ $pendingTestimonials }}</p>
                </div>

                <!-- Kartu Total Partner -->
                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-emerald-500 dark:border-emerald-400">
                    <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Total Partner</p>
                    <p class="text-3xl font-bold mt-1 text-emerald-600 dark:text-emerald-400">{{ $totalPartners }}</p>
                </div>

                <!-- Kartu Partner Aktif -->
                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-emerald-500 dark:border-emerald-400">
                    <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Partner Aktif</p>
                    <p class="text-3xl font-bold mt-1 text-emerald-600 dark:text-emerald-400">{{ $activePartners }}</p>
                </div>

                <!-- Kartu Total Produk -->
                <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-emerald-500 dark:border-emerald-400">
                    <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Total Produk</p>
                    <p class="text-3xl font-bold mt-1 text-emerald-600 dark:text-emerald-400">{{ $totalProducts }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection