@extends('layouts.admin')

@section('header', 'Manajemen Produk & Solusi')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight">
                    Manajemen Produk & Solusi
                </h3>
                <a href="{{ route('admin.products.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">
                    Tambah Produk Baru
                </a>
            </div>
            <p class="text-gray-700 dark:text-gray-300 mb-4">Kelola daftar produk dan solusi yang ditawarkan oleh perusahaan Anda.</p>

            @if($products->isEmpty())
                <p class="text-gray-700 dark:text-gray-300 mb-6">Belum ada produk yang ditambahkan.</p>
            @else
                <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700 mb-8">
                    <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Nama Produk</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Gambar</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Kategori</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Deskripsi</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Link Detail</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Status Aktif</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $product->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }} Gambar" class="h-10 w-auto object-contain">
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->category }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($product->description, 50) ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                        @if($product->details_link)
                                            <a href="{{ $product->details_link }}" target="_blank" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500">
                                                {{ Str::limit($product->details_link, 30) }}
                                            </a>
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->is_active ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white' }}">
                                            {{ $product->is_active ? 'Aktif' : 'Non-aktif' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="px-3 py-1 text-sm font-medium leading-5 text-white bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Edit</a>
                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-800 transition duration-150 ease-in-out">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection