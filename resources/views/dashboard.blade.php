<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-white leading-tight">
    {{ __('Dashboard Admin') }}
</h2>

    </x-slot>

    <div class="py-12 max-h-screen overflow-y-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Perbaikan: Latar belakang utama untuk mode terang dan gelap --}}
            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg border border-blue-600">
                {{-- Perbaikan: Warna teks utama untuk mode terang dan gelap --}}
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Pesan sukses/error Laravel (kembali ke tampilan inline) --}}
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

                    {{-- Bagian Metrik Ringkasan --}}
                    <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight mb-4 border-b pb-2 border-blue-500 dark:border-blue-700">
                        Ringkasan Admin
                    </h3>
                    <div class="flex flex-wrap justify-center gap-3 mb-8">
                    {{-- Kartu Total Testimonial --}}
                    <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-blue-500 dark:border-blue-400">
                        <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Total Testimonial</p>
                        <p class="text-3xl font-bold mt-1 text-blue-600 dark:text-blue-400">{{ $totalTestimonials }}</p>
                    </div>

                    {{-- Kartu Testimonial Pending --}}
                    <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-amber-500 dark:border-amber-400">
                        <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Testimonial Pending</p>
                        <p class="text-3xl font-bold mt-1 text-amber-600 dark:text-amber-400">{{ $pendingTestimonials }}</p>
                    </div>

                    {{-- Kartu Total Partner --}}
                    <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-emerald-500 dark:border-emerald-400">
                        <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Total Partner</p>
                        <p class="text-3xl font-bold mt-1 text-emerald-600 dark:text-emerald-400">{{ $totalPartners }}</p>
                    </div>

                    {{-- Kartu Partner Aktif --}}
                    <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-emerald-500 dark:border-emerald-400">
                        <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Partner Aktif</p>
                        <p class="text-3xl font-bold mt-1 text-emerald-600 dark:text-emerald-400">{{ $activePartners }}</p>
                    </div>

                    {{-- Kartu Total Produk --}}
                    <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-md text-gray-800 dark:text-gray-100 flex flex-col items-center justify-center min-w-[150px] flex-grow border-l-4 border-emerald-500 dark:border-emerald-400">
                        <p class="text-xs uppercase opacity-75 text-center text-gray-600 dark:text-gray-400">Total Produk</p>
                        <p class="text-3xl font-bold mt-1 text-emerald-600 dark:text-emerarld-400">{{ $totalProducts }}</p>
                    </div>
                </div>


                    {{-- Manajemen Testimonial --}}
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
                                <thead class="bg-gray-200 dark:bg-gray-700"> {{-- Perbaikan: Header tabel --}}
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Nama Penulis</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Perusahaan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Jabatan</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Rating</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Konten</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700"> {{-- Perbaikan: Body tabel --}}
                                    @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $testimonial->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $testimonial->author_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $testimonial->author_company ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $testimonial->author_role ?? '-' }}</td>
                                            <td class="px-6 py-4 text-sm border-r border-gray-200 dark:border-gray-800">
                                                <div class="flex items-center flex-nowrap space-x-0.5">
                                                    @for ($i = 0; $i < $testimonial->rating; $i++)
                                                        <i class="bi bi-star-fill text-yellow-500"></i> {{-- Warna bintang sedikit diubah untuk kontras --}}
                                                    @endfor
                                                    @for ($i = $testimonial->rating; $i < 5; $i++)
                                                        <i class="bi bi-star text-yellow-300 border border-yellow-500 rounded-sm"></i> {{-- Warna bintang sedikit diubah untuk kontras --}}
                                                    @endfor
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($testimonial->content, 100) }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                                                    $testimonial->status == 'approved' ? 'bg-emerald-600 text-white' :
                                                    ($testimonial->status == 'pending' ? 'bg-amber-400 text-gray-800' : 'bg-red-600 text-white')
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
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-emerald-600 rounded-md hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald active:bg-emerald-800 transition duration-150 ease-in-out">Setujui</button> {{-- Perbaikan: text-gray-900 for light mode --}}
                                                    </form>
                                                    <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Tolak</button> {{-- Perbaikan: text-gray-800 for light mode --}}
                                                    </form>
                                                @elseif($testimonial->status == 'approved')
                                                    <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Tolak</button> {{-- Perbaikan: text-gray-800 for light mode --}}
                                                    </form>
                                                @elseif($testimonial->status == 'rejected')
                                                    <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-emerald-600 rounded-md hover:bg-emerald-700 focus:outline-none focus:shadow-outline-emerald active:bg-emerald-800 transition duration-150 ease-in-out">Setujui</button> {{-- Perbaikan: text-gray-900 for light mode --}}
                                                    </form>
                                                @endif
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-800 transition duration-150 ease-in-out">Hapus</button> {{-- Perbaikan: text-gray-900 for light mode --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <hr class="my-8 border-blue-700 dark:border-blue-700">

                    {{-- === Bagian Manajemen Partner === --}}
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight">
                            Manajemen Partner
                        </h3>
                        {{-- Tombol "Tambah Partner Baru" akan mengaktifkan form di bawah --}}
                        <button type="button" id="toggleAddPartnerForm" class="px-4 py-2 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out"> {{-- Perbaikan: text-gray-900 for light mode --}}
                            Tambah Partner Baru
                        </button>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Kelola daftar partner atau klien Anda.</p>

                    <!-- Formulir Tambah Partner (disembunyikan secara default) -->
                    <div id="add-partner-form-section" class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-inner border border-gray-300 dark:border-blue-700 @if($errors->any() && old('_token') && (session('form_type') == 'partner_add')) @else hidden @endif">
                        <h4 class="font-semibold text-lg text-blue-600 dark:text-blue-300 leading-tight mb-4">Formulir Tambah Partner Baru</h4>
                        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Hidden input untuk menandai jenis form saat redirect --}}
                            <input type="hidden" name="form_type" value="partner_add">

                            @if(session('success_partner')) {{-- Pesan sukses khusus partner --}}
                                <div class="p-3 mb-4 text-sm text-emerald-100 bg-emerald-600 rounded-lg dark:bg-emerald-700 dark:text-emerald-100" role="alert">
                                    {{ session('success_partner') }}
                                </div>
                            @endif
                            @if($errors->any() && (session('form_type') == 'partner_add'))
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
                                    <label for="partner_name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Partner <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="partner_name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name') }}" required autocomplete="organization" aria-describedby="partner_name-error">
                                    @error('name')<p id="partner_name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="partner_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Logo Partner</label>
                                    <input type="file" name="logo" id="partner_logo" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('logo') border-red-500 ring-red-500 @enderror" aria-describedby="partner_logo-error">
                                    @error('logo')<p id="partner_logo-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="partner_website" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Website Partner (URL)</label>
                                    <input type="url" name="website" id="partner_website" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('website') border-red-500 ring-red-500 @enderror" value="{{ old('website') }}" placeholder="https://example.com" autocomplete="url" aria-describedby="partner_website-error">
                                    @error('website')<p id="partner_website-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="partner_description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Singkat</label>
                                    <textarea name="description" id="partner_description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="partner_description-error">{{ old('description') }}</textarea>
                                    @error('description')<p id="partner_description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2 flex items-center">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" id="partner_is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('is_active', true) ? 'checked' : '' }} value="1" aria-describedby="partner_is_active-error">
                                    <label for="partner_is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Partner</label>
                                    @error('is_active')<p id="partner_is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2"> {{-- Perbaikan: text-gray-900 for light mode --}}
                                    Simpan Partner
                                </button>
                                <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray active:bg-gray-600 transition duration-150 ease-in-out" onclick="document.getElementById('add-partner-form-section').classList.add('hidden');"> {{-- Perbaikan: text-gray-800 for light mode --}}
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                    {{-- Akhir Formulir Tambah Partner --}}

                    {{-- Tabel Manajemen Partner --}}
                    @if($partners->isEmpty())
                        <p class="text-gray-700 dark:text-gray-300 mb-6">Belum ada partner yang ditambahkan.</p>
                    @else
                        <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700 mb-8">
                            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                                <thead class="bg-gray-200 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Nama Partner</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Logo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Website</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Deskripsi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Status Aktif</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($partners as $partner)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $partner->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $partner->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                @if($partner->logo)
                                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }} Logo" class="h-10 w-auto object-contain">
                                                @else
                                                    <span class="text-gray-500">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                                @if($partner->website)
                                                    <a href="{{ $partner->website }}" target="_blank" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500">
                                                        {{ Str::limit($partner->website, 30) }}
                                                    </a>
                                                @else
                                                    <span class="text-gray-500">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ Str::limit($partner->description, 50) ?? '-' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                                                    $partner->is_active ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white'
                                                }}">
                                                    {{ $partner->is_active ? 'Aktif' : 'Non-aktif' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $partner->created_at->format('d M Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                                <a href="javascript:void(0)" onclick="showEditPartnerForm({{ $partner->id }})" class="px-3 py-1 text-sm font-medium leading-5 text-gray-800 bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Edit</a>
                                                <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-800 transition duration-150 ease-in-out">Hapus</button> {{-- Perbaikan: text-gray-900 for light mode --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <hr class="my-8 border-blue-700 dark:border-blue-700">

                    {{-- === Bagian Manajemen Produk === --}}
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight">
                            Manajemen Produk & Solusi
                        </h3>
                        {{-- Tombol "Tambah Produk Baru" akan mengaktifkan form di bawah --}}
                        <button type="button" id="toggleAddProductForm" class="px-4 py-2 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out"> {{-- Perbaikan: text-gray-900 for light mode --}}
                            Tambah Produk Baru
                        </button>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Kelola daftar produk dan solusi yang ditawarkan oleh perusahaan Anda.</p>

                    <!-- Formulir Tambah Produk (disembunyikan secara default) -->
                    <div id="add-product-form-section" class="mb-8 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-inner border border-gray-300 dark:border-blue-700 @if($errors->any() && old('_token') && (session('form_type') == 'product_add')) @else hidden @endif">
                        <h4 class="font-semibold text-lg text-blue-600 dark:text-blue-300 leading-tight mb-4">Formulir Tambah Produk Baru</h4>
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Hidden input untuk menandai jenis form saat redirect --}}
                            <input type="hidden" name="form_type" value="product_add">

                            @if(session('success_product')) {{-- Pesan sukses khusus produk --}}
                                <div class="p-3 mb-4 text-sm text-emerald-100 bg-emerald-600 rounded-lg dark:bg-emerald-700 dark:text-emerald-100" role="alert">
                                    {{ session('success_product') }}
                                </div>
                            @endif
                            @if($errors->any() && (session('form_type') == 'product_add'))
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
                                    <label for="product_name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Produk <span class="text-red-500">*</span></label>
                                    <input type="text" name="name" id="product_name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name') }}" required autocomplete="off" aria-describedby="product_name-error">
                                    @error('name')<p id="product_name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="product_description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Produk</label>
                                    <textarea name="description" id="product_description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="product_description-error">{{ old('description') }}</textarea>
                                    @error('description')<p id="product_description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="product_image" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Gambar Produk</label>
                                    <input type="file" name="image" id="product_image" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('image') border-red-500 ring-red-500 @enderror" aria-describedby="product_image-error">
                                    @error('image')<p id="product_image-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="product_category" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Kategori Produk <span class="text-red-500">*</span></label>
                                    <select name="category" id="product_category" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('category') border-red-500 ring-red-500 @enderror" required aria-describedby="product_category-error">
                                        <option value="">Pilih Kategori</option>
                                        <option value="filter-hardware" {{ old('category') == 'filter-hardware' ? 'selected' : '' }}>Data Center Hardware Facility</option>
                                        <option value="filter-software" {{ old('category') == 'filter-software' ? 'selected' : '' }}>Data Center Software Facility</option>
                                        <option value="filter-design" {{ old('category') == 'filter-design' ? 'selected' : '' }}>Design Data Center</option>
                                        <option value="filter-apps" {{ old('category') == 'filter-apps' ? 'selected' : '' }}>Apps</option>
                                        <option value="filter-solutions" {{ old('category') == 'filter-solutions' ? 'selected' : '' }}>Solutions</option>
                                    </select>
                                    @error('category')<p id="product_category-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="product_details_link" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Link Detail Produk (URL)</label>
                                    <input type="url" name="details_link" id="product_details_link" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('details_link') border-red-500 ring-red-500 @enderror" value="{{ old('details_link') }}" placeholder="https://example.com/product-detail" autocomplete="off" aria-describedby="product_details_link-error">
                                    @error('details_link')<p id="product_details_link-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>

                                <div class="col-span-1 md:col-span-2 flex items-center">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" id="product_is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" {{ old('is_active', true) ? 'checked' : '' }} value="1" aria-describedby="product_is_active-error">
                                    <label for="product_is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Produk</label>
                                    @error('is_active')<p id="product_is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition duration-150 ease-in-out me-2"> {{-- Perbaikan: text-gray-900 for light mode --}}
                                    Simpan Produk
                                </button>
                                <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-gray-400 rounded-md hover:bg-gray-500 focus:outline-none focus:shadow-outline-gray active:bg-gray-600 transition duration-150 ease-in-out" onclick="document.getElementById('add-product-form-section').classList.add('hidden');"> {{-- Perbaikan: text-gray-800 for light mode --}}
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Tabel Manajemen Produk --}}
                    @if($products->isEmpty())
                        <p class="text-gray-700 dark:text-gray-300 mb-6">Belum ada produk yang ditambahkan.</p>
                    @else
                        <div class="overflow-x-auto shadow-md sm:rounded-lg border border-gray-300 dark:border-gray-700 mb-8">
                            <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                                <thead class="bg-gray-200 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Nama Produk</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Gambar</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Kategori</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Deskripsi</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Link Detail</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Status Aktif</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Tanggal Dibuat</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 dark:text-blue-300 uppercase tracking-wider">Aksi</th>
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
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{
                                                    $product->is_active ? 'bg-emerald-600 text-white' : 'bg-red-600 text-white'
                                                }}">
                                                    {{ $product->is_active ? 'Aktif' : 'Non-aktif' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">{{ $product->created_at->format('d M Y') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex items-center space-x-2">
                                                <a href="javascript:void(0)" onclick="showEditProductForm({{ $product->id }})" class="px-3 py-1 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-amber-400 rounded-md hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber active:bg-amber-600 transition duration-150 ease-in-out">Edit</a> {{-- Perbaikan: text-gray-800 for light mode --}}
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-3 py-1 text-sm font-medium leading-5 text-gray-900 dark:text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:shadow-outline-red active:bg-red-800 transition duration-150 ease-in-out">Hapus</button> {{-- Perbaikan: text-gray-900 for light mode --}}
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

    {{-- Formulir Edit Produk (BARU - Awalnya tersembunyi) --}}
    <div id="edit-product-form-section" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl border border-blue-600 w-full md:w-3/4 lg:w-1/2 xl:w-1/3 overflow-y-auto max-h-[90vh]"> {{-- Perbaikan: Latar belakang dan border form edit --}}
            <div class="p-6 text-gray-900 dark:text-gray-100"> {{-- Perbaikan: Warna teks form edit --}}
                <h3 class="font-semibold text-xl text-blue-600 dark:text-blue-400 leading-tight mb-4 border-b pb-2 border-blue-500 dark:border-blue-700">
                    Edit Produk & Solusi
                </h3>
                <form id="edit-product-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Gunakan metode PUT untuk update --}}

                    {{-- Hidden input untuk menandai jenis form saat redirect --}}
                    <input type="hidden" name="form_type" value="product_edit">

                    @if($errors->any() && old('_token') && (session('form_type') == 'product_edit'))
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
                            <label for="edit_product_name" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Nama Produk <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="edit_product_name" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('name') border-red-500 ring-red-500 @enderror" value="{{ old('name') }}" required autocomplete="off" aria-describedby="edit_product_name-error">
                            @error('name')<p id="edit_product_name-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_description" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Deskripsi Produk</label>
                            <textarea name="description" id="edit_product_description" rows="3" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('description') border-red-500 ring-red-500 @enderror" aria-describedby="edit_product_description-error">{{ old('description') }}</textarea>
                            @error('description')<p id="edit_product_description-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_image" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Gambar Produk</label>
                            <input type="file" name="image" id="edit_product_image" class="mt-1 block w-full text-gray-900 bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('image') border-red-500 ring-red-500 @enderror" aria-describedby="edit_product_image-error">
                            @error('image')<p id="edit_product_image-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                            <div id="current_product_image_preview" class="mt-2 hidden">
                                <p class="text-sm text-gray-700 dark:text-neutral-400">Gambar saat ini:</p> {{-- Perbaikan: Warna teks preview --}}
                                <img src="" alt="Gambar Produk Saat Ini" class="img-fluid" style="max-width: 150px; height: auto;">
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_category" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Kategori Produk <span class="text-red-500">*</span></label>
                            <select name="category" id="edit_product_category" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('category') border-red-500 ring-red-500 @enderror" required aria-describedby="edit_product_category-error">
                                <option value="">Pilih Kategori</option>
                                <option value="filter-hardware">Data Center Hardware Facility</option>
                                <option value="filter-software">Data Center Software Facility</option>
                                <option value="filter-design">Design Data Center</option>
                                <option value="filter-apps">Apps</option>
                                <option value="filter-solutions">Solutions</option>
                            </select>
                            @error('category')<p id="edit_product_category-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2">
                            <label for="edit_product_details_link" class="block text-sm font-medium text-gray-700 dark:text-gray-100">Link Detail Produk (URL)</label>
                            <input type="url" name="details_link" id="edit_product_details_link" class="mt-1 block w-full rounded-md shadow-sm bg-white border-gray-300 text-gray-900 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100 @error('details_link') border-red-500 ring-red-500 @enderror" value="{{ old('details_link') }}" placeholder="https://example.com/product-detail" autocomplete="off" aria-describedby="edit_product_details_link-error">
                            @error('details_link')<p id="edit_product_details_link-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>

                        <div class="col-span-1 md:col-span-2 flex items-center">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" id="edit_product_is_active" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" value="1" aria-describedby="edit_product_is_active-error">
                            <label for="edit_product_is_active" class="ml-2 text-gray-700 dark:text-gray-100">Aktifkan Produk</label>
                            @error('is_active')<p id="edit_product_is_active-error" class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-gray-200 dark:bg-gray-200 rounded-md hover:bg-gray-800 dark:hover:bg-gray-600 focus:outline-none focus:shadow-outline-blue active:bg-gray-800 dark:active:bg-gray-400 transition duration-150 ease-in-out me-2"> {{-- Perbaikan: text-gray-900 for light mode --}}
                            Perbarui Produk
                        </button>
                        <button type="button" class="px-4 py-2 text-sm font-medium leading-5 text-gray-800 dark:text-white bg-gray-200 dark:bg-gray-700 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-400 dark:active:bg-gray-800 transition duration-150 ease-in-out me-2" onclick="document.getElementById('edit-product-form-section').classList.add('hidden');">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Akhir Formulir Edit Produk --}}

</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Product form toggle (Tambah Produk)
        const toggleAddProductButton = document.getElementById('toggleAddProductForm');
        const addProductFormSection = document.getElementById('add-product-form-section');

        if (toggleAddProductButton) {
            toggleAddProductButton.addEventListener('click', function() {
                addProductFormSection.classList.toggle('hidden');
                // Sembunyikan form edit jika form tambah dibuka
                document.getElementById('edit-product-form-section').classList.add('hidden');
                if (!addProductFormSection.classList.contains('hidden')) {
                    addProductFormSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        }

        // Partner form toggle (Tambah Partner)
        const toggleAddPartnerButton = document.getElementById('toggleAddPartnerForm');
        const addPartnerFormSection = document.getElementById('add-partner-form-section');

        if (toggleAddPartnerButton) {
            toggleAddPartnerButton.addEventListener('click', function() {
                addPartnerFormSection.classList.toggle('hidden');
                // Sembunyikan form edit dan tambah produk jika form partner dibuka
                document.getElementById('edit-product-form-section').classList.add('hidden');
                addProductFormSection.classList.add('hidden');
                if (!addPartnerFormSection.classList.contains('hidden')) {
                    addPartnerFormSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        }

        // Edit Product form elements
        const editProductFormSection = document.getElementById('edit-product-form-section');
        const editProductForm = document.getElementById('edit-product-form');
        const editProductName = document.getElementById('edit_product_name');
        const editProductDescription = document.getElementById('edit_product_description');
        const editProductCategory = document.getElementById('edit_product_category');
        const editProductDetailsLink = document.getElementById('edit_product_details_link');
        const editProductIsActive = document.getElementById('edit_product_is_active');
        const currentProductImagePreview = document.getElementById('current_product_image_preview');
        const currentProductImage = currentProductImagePreview.querySelector('img');


        // Fungsi untuk menampilkan form edit produk dan mengisi datanya
        window.showEditProductForm = function(productId) {
            // Sembunyikan form tambah produk/partner jika form edit dibuka
            addProductFormSection.classList.add('hidden');
            addPartnerFormSection.classList.add('hidden');

            // Ambil data produk berdasarkan ID (Anda perlu melakukan AJAX request ke endpoint API)
            // Untuk sementara, kita akan menggunakan data dummy atau data yang sudah ada di halaman
            // Idealnya, ini harus menjadi AJAX request ke route show() atau API endpoint.
            let productData = null;
            // Cari produk di data yang sudah ada di halaman (jika tersedia)
            // Ini adalah pendekatan sederhana. Untuk data besar, AJAX lebih baik.
            @json($products).forEach(product => {
                if (product.id === productId) {
                    productData = product;
                }
            });

            if (productData) {
                // Isi form dengan data produk
                editProductForm.action = `/admin/products/${productId}`; // Atur action form
                editProductName.value = productData.name;
                editProductDescription.value = productData.description;
                editProductCategory.value = productData.category;
                editProductDetailsLink.value = productData.details_link;
                editProductIsActive.checked = productData.is_active;

                // Tampilkan gambar saat ini jika ada
                if (productData.image) {
                    currentProductImage.src = `/storage/${productData.image}`;
                    currentProductImagePreview.classList.remove('hidden');
                } else {
                    currentProductImagePreview.classList.add('hidden');
                }

                // Tampilkan form edit
                editProductFormSection.classList.remove('hidden');
                editProductFormSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                console.error('Produk dengan ID ' + productId + ' tidak ditemukan.');
                // Tampilkan pesan error jika produk tidak ditemukan
                // showPopup('error', 'Error!', 'Produk tidak ditemukan.');
            }
        };

        // Tampilkan form produk jika ada error validasi saat halaman dimuat
        // atau jika ada data old('_token') yang menandakan redirect dari POST request
        @if ($errors->any() && old('_token') && (session('form_type') == 'product_add'))
            if (addProductFormSection) {
                addProductFormSection.classList.remove('hidden');
                addProductFormSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        @endif

        // Tampilkan form partner jika ada error validasi saat halaman dimuat
        @if ($errors->any() && old('_token') && (session('form_type') == 'partner_add'))
            if (addPartnerFormSection) {
                addPartnerFormSection.classList.remove('hidden');
                addPartnerFormSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        @endif

        // Tampilkan form edit produk jika ada error validasi saat halaman dimuat
        @if ($errors->any() && old('_token') && (session('form_type') == 'product_edit'))
            if (editProductFormSection) {
                editProductFormSection.classList.remove('hidden');
                editProductFormSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                // Jika ada error validasi pada form edit, kita perlu mengisi ulang data
                // dari old() dan juga memastikan action formnya benar
                const productIdFromOld = "{{ old('product_id_for_edit') }}"; // Anda perlu menambahkan ini di controller
                if (productIdFromOld) {
                    editProductForm.action = `/admin/products/${productIdFromOld}`;
                    // Anda mungkin juga perlu mengisi ulang preview gambar lama jika ada
                    const oldImage = "{{ old('old_image_path') }}"; // Anda perlu menambahkan ini di controller
                    if (oldImage) {
                        currentProductImage.src = `/storage/${oldImage}`;
                        currentProductImagePreview.classList.remove('hidden');
                    }
                }
            }
        @endif
    });
</script>
