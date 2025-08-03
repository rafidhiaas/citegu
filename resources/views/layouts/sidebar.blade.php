<aside class="w-64 bg-white dark:bg-gray-800 shadow-xl border-r border-blue-600 flex-shrink-0">
    <div class="p-6 text-center">
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-blue-600 dark:text-blue-400">CITEGU</a>
    </div>

    <nav class="mt-10">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center mt-4 py-2 px-6 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 dark:bg-blue-700 text-blue-600 dark:text-blue-200' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span class="mx-3">Dashboard</span>
        </a>
        <a href="{{ route('admin.testimonials.index') }}" class="flex items-center mt-4 py-2 px-6 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-100 dark:bg-blue-700 text-blue-600 dark:text-blue-200' : '' }}">
            <i class="bi bi-chat-dots"></i>
            <span class="mx-3">Testimonial</span>
        </a>
        <a href="{{ route('admin.partners.index') }}" class="flex items-center mt-4 py-2 px-6 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('admin.partners.*') ? 'bg-blue-100 dark:bg-blue-700 text-blue-600 dark:text-blue-200' : '' }}">
            <i class="bi bi-people"></i>
            <span class="mx-3">Partner</span>
        </a>
        <a href="{{ route('admin.products.index') }}" class="flex items-center mt-4 py-2 px-6 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-blue-100 dark:bg-blue-700 text-blue-600 dark:text-blue-200' : '' }}">
            <i class="bi bi-box"></i>
            <span class="mx-3">Produk & Solusi</span>
        </a>
        
        {{-- Tautan untuk Layanan --}}
        <div class="mt-4">
            <a href="{{ route('admin.services.index') }}" class="flex items-center py-2 px-6 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-blue-100 dark:bg-blue-700 text-blue-600 dark:text-blue-200' : '' }}">
                <i class="bi bi-list-check"></i> {{-- Ikon Layanan --}}
                <span class="mx-3">Services</span>
            </a>
        </div>
    </nav>
</aside>