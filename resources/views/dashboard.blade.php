<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-400 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg border border-blue-600"> <!-- Tambah border biru pada kartu utama -->
                <div class="p-6 text-gray-100 dark:text-gray-100">
                    {{-- Pesan sukses/error Laravel --}}
                    @if(session('success'))
                        <div class="p-3 mb-4 text-sm text-emerald-100 bg-emerald-600 rounded-lg dark:bg-emerald-700 dark:text-emerald-100" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="p-3 mb-4 text-sm text-red-100 bg-red-600 rounded-lg dark:bg-red-700 dark:text-red-100" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <h3 class="font-semibold text-xl text-blue-400 leading-tight mb-4 border-b pb-2 border-blue-500"> <!-- Judul bagian lebih berwarna + garis bawah -->
                        Manajemen Testimonial
                    </h3>
                    <p class="text-gray-300 dark:text-gray-300 mb-4">Kelola testimonial yang masuk dari pengguna.</p>

                    @if($testimonials->isEmpty())
                        <p class="text-gray-300 dark:text-gray-300 mb-6">Belum ada testimonial yang masuk.</p>
                    @else
                        <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-700 mb-8">
                            <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-700">
                                <thead class="bg-gray-700 dark:bg-gray-700">
                                    <tr>
                                        <!-- Teks header tabel bisa sedikit lebih terang atau menggunakan aksen -->
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Nama Penulis</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Perusahaan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Jabatan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Rating</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Konten</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-900 dark:bg-gray-900 divide-y divide-gray-700 dark:divide-gray-700">
                                    @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-100 dark:text-gray-100">{{ $testimonial->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 dark:text-gray-300">{{ $testimonial->author_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 dark:text-gray-300">{{ $testimonial->author_company ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 dark:text-gray-300">{{ $testimonial->author_role ?? '-' }}</td>
                                            <td class="px-6 py-4 text-sm border-r border-gray-800">
                                        <div class="flex items-center flex-nowrap space-x-0.5">
                                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                                <i class="bi bi-star-fill text-yellow-400"></i> {{-- Bintang terisi tetap kuning kuat --}}
                                            @endfor
                                            @for ($i = $testimonial->rating; $i < 5; $i++)
                                                <i class="bi bi-star text-yellow-200 border border-yellow-400 rounded-sm"></i> {{-- Bintang kosong jadi kuning cerah dengan border --}}
                                            @endfor
                                        </div>
                                    </td>
                                            <td class="px-6 py-4 text-sm text-gray-300 dark:text-gray-300">{{ Str::limit($testimonial->content, 100) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                                                    $testimonial->status == 'approved' ? 'bg-emerald-600 text-white' :
                                                    ($testimonial->status == 'pending' ? 'bg-amber-400 text-gray-800' : 'bg-red-600 text-white')
                                                }}">
                                                    {{ ucfirst($testimonial->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 dark:text-gray-300">{{ $testimonial->created_at->format('d M Y H:i') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                                @if($testimonial->status == 'pending')
                                                    <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white bg-emerald-600 rounded-md hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald active:bg-emerald-800 transition duration-150 ease-in-out">Setujui</button>
                                                    </form>
                                                    <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-800 bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Tolak</button>
                                                    </form>
                                                @elseif($testimonial->status == 'approved')
                                                    <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-800 bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Tolak</button>
                                                    </form>
                                                @elseif($testimonial->status == 'rejected')
                                                    <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-white bg-emerald-600 rounded-md hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald active:bg-emerald-800 transition duration-150 ease-in-out">Setujui</button>
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?');">
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

                    <hr class="my-8 border-blue-700"> {{-- Garis pemisah lebih berwarna --}}

                    <!-- === Bagian Manajemen Partner === -->
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-xl text-blue-400 leading-tight"> <!-- Judul bagian lebih berwarna -->
                            Manajemen Partner
                        </h3>
                        <button type="button" onclick="document.getElementById('add-partner-form-section').classList.toggle('hidden');" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:b-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out"> {{-- Tombol lebih berwarna --}}
                            Tambah Partner Baru
                        </button>
                    </div>
                    <p class="text-gray-300 dark:text-gray-300 mb-4">Kelola daftar partner atau klien Anda.</p>

                     <!-- Border pada form -->
                    <div id="add-partner-form-section" class="mb-8 p-6 bg-gray-900 dark:bg-gray-800 rounded-lg shadow-inner border border-blue-700 @if(!$errors->any()) hidden @endif">
                        <h4 class="font-semibold text-lg text-blue-300 dark:text-blue-300 leading-tight mb-4">Formulir Tambah Partner</h4> {{-- Judul form lebih berwarna --}}
                        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Pesan sukses khusus partner -->
                            @if(session('success_partner'))
                                <div class="p-3 mb-4 text-sm text-emerald-100 bg-emerald-600 rounded-lg dark:bg-emerald-700 dark:text-emerald-100" role="alert">
                                    {{ session('success_partner') }}
                                </div>
                            @endif
                            {{-- Pesan error validasi --}}
                            @if($errors->any())
                                <div class="p-3 mb-4 text-sm text-red-100 bg-red-600 rounded-lg dark:bg-red-700 dark:text-red-100" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="col-span-1 md:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Partner <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name') }}" required autocomplete="organization" aria-describedby="name-error">
                            @error('name')<p id="name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="logo" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Logo Partner</label>
                            <input type="file" name="logo" id="logo" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('logo') border-red-500 ring-red-500 @enderror" aria-describedby="logo-error">
                            @error('logo')<p id="logo-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="website" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Website Partner (URL)</label>
                            <input type="url" name="website" id="website" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('website') border-red-500 ring-red-500 @enderror" value="{{ old('website') }}" placeholder="https://example.com" autocomplete="url" aria-describedby="website-error">
                            @error('website')<p id="website-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Singkat</label>
                            <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="description-error">{{ old('description') }}</textarea>
                            @error('description')<p id="description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2 flex items-center">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" id="is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('is_active', true) ? 'checked' : '' }} aria-describedby="is_active-error">
                            <label for="is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Partner</label>
                            @error('is_active')<p id="is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                    </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2">
                                    Simpan Partner
                                </button>
                                <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray active:bg-gray-600 transition duration-150 ease-in-out" onclick="document.getElementById('add-partner-form-section').classList.add('hidden');">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Tabel Manajemen Partner --}}
                    @if($partners->isEmpty())
                        <p class="text-gray-300 dark:text-gray-300 mb-6">Belum ada partner yang ditambahkan.</p>
                    @else
                        <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-700 mb-8">
                            <table class="min-w-full divide-y divide-gray-700 dark:divide-gray-700">
                                <thead class="bg-gray-700 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">ID</th> {{-- Teks header tabel lebih berwarna --}}
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Nama Partner</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Logo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Website</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Deskripsi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Status Aktif</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-300 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-900 dark:bg-gray-900 divide-y divide-gray-700 dark:divide-gray-700">
                                    @foreach($partners as $partner)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-100 dark:text-gray-100">{{ $partner->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 dark:text-gray-300">{{ $partner->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if($partner->logo)
                                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }} Logo" class="h-10 w-auto object-contain">
                                                @else
                                                    <span class="text-gray-500">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 dark:text-gray-300">
                                                @if($partner->website)
                                                    <a href="{{ $partner->website }}" target="_blank" class="text-blue-400 hover:text-blue-500"> {{-- Link lebih berwarna --}}
                                                        {{ Str::limit($partner->website, 30) }}
                                                    </a>
                                                @else
                                                    <span class="text-gray-500">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-300 dark:text-gray-300">{{ Str::limit($partner->description, 50) ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                                                    $partner->is_active ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white'
                                                }}">
                                                    {{ $partner->is_active ? 'Aktif' : 'Non-aktif' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300 dark:text-gray-300">{{ $partner->created_at->format('d M Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                                <a href="{{ route('admin.partners.edit', $partner) }}" class="px-3 py-1 text-sm font-medium leading-5 text-gray-800 bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Edit</a>
                                                <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?');">
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
    </div>
</x-app-layout>