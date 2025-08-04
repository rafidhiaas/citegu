@extends('layouts.admin')

@section('header', 'Dashboard Admin Pengelolaan Website')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">

            <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight mb-8 border-b pb-2 border-blue-500 dark:border-blue-700">
                Ringkasan Website Admin
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">

                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 p-4 bg-blue-100 dark:bg-blue-900 rounded-full text-blue-600 dark:text-blue-200">
                            <i class="bi bi-chat-dots text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-base uppercase font-semibold text-gray-500 dark:text-gray-400">Total Testimonial</p>
                            <p class="text-4xl font-bold mt-1 text-blue-600 dark:text-blue-400">{{ $totalTestimonials }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 p-4 bg-amber-100 dark:bg-amber-900 rounded-full text-amber-600 dark:text-amber-200">
                            <i class="bi bi-hourglass-split text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-base uppercase font-semibold text-gray-500 dark:text-gray-400">Testimonial Pending</p>
                            <p class="text-4xl font-bold mt-1 text-amber-600 dark:text-amber-400">{{ $pendingTestimonials }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 p-4 bg-emerald-100 dark:bg-emerald-900 rounded-full text-emerald-600 dark:text-emerald-200">
                            <i class="bi bi-people text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-base uppercase font-semibold text-gray-500 dark:text-gray-400">Total Partner</p>
                            <p class="text-4xl font-bold mt-1 text-emerald-600 dark:text-emerald-400">{{ $totalPartners }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 p-4 bg-emerald-100 dark:bg-emerald-900 rounded-full text-emerald-600 dark:text-emerald-200">
                            <i class="bi bi-person-check text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-base uppercase font-semibold text-gray-500 dark:text-gray-400">Partner Aktif</p>
                            <p class="text-4xl font-bold mt-1 text-emerald-600 dark:text-emerald-400">{{ $activePartners }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 p-4 bg-purple-100 dark:bg-purple-900 rounded-full text-purple-600 dark:text-purple-200">
                            <i class="bi bi-box-seam text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-base uppercase font-semibold text-gray-500 dark:text-gray-400">Total Produk</p>
                            <p class="text-4xl font-bold mt-1 text-purple-600 dark:text-purple-400">{{ $totalProducts }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-2xl transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0 p-4 bg-teal-100 dark:bg-teal-900 rounded-full text-teal-600 dark:text-teal-200">
                            <i class="bi bi-list-task text-3xl"></i>
                        </div>
                        <div>
                            <p class="text-base uppercase font-semibold text-gray-500 dark:text-gray-400">Total Layanan</p>
                            <p class="text-4xl font-bold mt-1 text-teal-600 dark:text-teal-400">{{ $totalServices }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection