@extends('layouts.admin')

@section('header', 'Manajemen Testimonial')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
        <div class="p-6 text-gray-900 dark:text-gray-100">

            {{-- Perbaikan: Pindahkan pesan sukses ke layout utama --}}
            {{-- @if(session('success')) --}}

            <div class="flex justify-between items-center mb-4">
                <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight">
                    Manajemen Testimonial
                </h3>
            </div>

            @if($testimonials->isEmpty())
                <p class="text-gray-700 dark:text-gray-300 mb-6">Belum ada testimonial yang masuk.</p>
            @else
                <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700 mb-8">
                    <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Nama Penulis</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Perusahaan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Jabatan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Rating</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Konten</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-400 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($testimonials as $testimonial)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $testimonial->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $testimonial->author_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $testimonial->author_company ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $testimonial->author_role ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm border-r border-gray-200 dark:border-gray-800">
                                        <div class="flex items-center flex-nowrap space-x-0.5">
                                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                                <i class="bi bi-star-fill text-yellow-500"></i>
                                            @endfor
                                            @for ($i = $testimonial->rating; $i < 5; $i++)
                                                <i class="bi bi-star text-yellow-300 border border-yellow-500 rounded-sm"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($testimonial->content, 100) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                                            $testimonial->status == 'approved' ? 'bg-emerald-600 text-white-100' :
                                            ($testimonial->status == 'pending' ? 'bg-amber-400 text-gray-100' : 'bg-red-600 text-white')
                                        }}">
                                            {{ ucfirst($testimonial->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $testimonial->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                        {{-- Tombol aksi testimonial --}}
                                        @if($testimonial->status == 'pending')
                                            <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-dark bg-emerald-600 dark:bg-emerald-500 hover:bg-emerald-400 dark:hover:bg-emerald-600 focus:outline-none focus:shadow-outline-emerald active:bg-emerald-400 dark:active:bg-emerald-400 transition duration-150 ease-in-out">Setujui</button>
                                            </form>
                                            <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-dark dark:text-gray-400 bg-amber-400 dark:bg-amber-300 hover:bg-amber-500 dark:hover:bg-amber-400 focus:outline-none focus:shadow-outline-amber active:bg-amber-400 dark:active:bg-amber-500 transition duration-150 ease-in-out">Tolak</button>
                                            </form>
                                        @elseif($testimonial->status == 'approved')
                                            <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-100 dark:text-white bg-amber-400 rounded-md hover:bg-amber-400 focus:outline-none focus:shadow-outline-amber active:bg-amber-800 transition duration-150 ease-in-out">Tolak</button>
                                            </form>
                                        @elseif($testimonial->status == 'rejected')
                                            <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white-100 bg-emerald-600 hover:bg-emerald-400 active:bg-emerald-400 rounded-md shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition duration-150 ease-in-out">Setujui</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?');">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-100 dark:text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-800 transition duration-150 ease-in-out">Hapus</button>
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