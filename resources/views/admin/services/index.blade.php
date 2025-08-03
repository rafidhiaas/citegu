@extends('layouts.admin')

@section('header', 'Manajemen Layanan')

@section('content')
    <div>
        <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
            <div class="text-gray-900 dark:text-gray-100"> {{-- Hapus p-6 dari sini --}}
                <div class="p-6 flex justify-between items-center mb-4"> {{-- Terapkan p-6 di sini --}}
                    <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight">
                        Daftar Layanan
                    </h3>
                    <a href="{{ route('admin.services.create') }}" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out">
                        Tambah Layanan Baru
                    </a>
                </div>
                <p class="px-6 text-gray-700 dark:text-gray-300 mb-4">Kelola daftar layanan yang ditawarkan.</p>

                @if($services->isEmpty())
                    <p class="px-6 text-gray-700 dark:text-gray-300 mb-6">Belum ada layanan yang ditambahkan.</p>
                @else
                    <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700 mb-8">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead class="bg-gray-200 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Nama Layanan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Ikon</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Deskripsi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Status Aktif</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($services as $service)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $service->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $service->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm"><i class="{{ $service->icon_class }}"></i></td>
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($service->description, 50) ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $service->is_active ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white' }}">
                                                {{ $service->is_active ? 'Aktif' : 'Non-aktif' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                            <a href="{{ route('admin.services.edit', $service) }}" class="px-3 py-1 text-sm font-medium leading-5 text-white bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Edit</a>
                                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
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
    </div>
@endsection