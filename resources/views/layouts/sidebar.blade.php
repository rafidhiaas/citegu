<aside class="w-64 bg-white dark:bg-gray-800 shadow-xl border-r border-blue-600 flex-shrink-0">
    <div class="p-6 text-center">
        <!-- <img src="{{ asset('public/landing/assets/img/citegulogo.png') }}" alt="CITEGU Logo" class="h-10 w-auto mb-4 mx-auto"> -->
        <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-600 dark:text-blue-400">PT CITEGU</a>
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
        
        <a href="{{ route('admin.services.index') }}" class="flex items-center mt-4 py-2 px-6 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-blue-100 dark:bg-blue-700 text-blue-600 dark:text-blue-200' : '' }}">
            <i class="bi bi-list-check"></i>
            <span class="mx-3">Services</span>
        </a>

        <a href="{{ route('admin.settings.homepage.index') }}" class="flex items-center mt-4 py-2 px-6 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-blue-100 dark:bg-blue-700 text-blue-600 dark:text-blue-200' : '' }}">
            <i class="bi bi-gear"></i>
            <span class="mx-3">Homepage</span>
        </a>
    </nav>
</aside>