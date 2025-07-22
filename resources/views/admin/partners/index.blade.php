@extends('layouts.master') <!-- Sesuaikan jika Anda punya layout admin yang berbeda -->

@section('content')
<main class="main">
    <section id="admin-dashboard-content" class="section" style="padding-top: 100px;"> <!-- Sesuaikan nilai ini -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Manajemen Partner</h2>
        <p>Kelola daftar partner atau klien Anda.</p>
    </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Pesan Sukses/Error Global (menggunakan kelas alert yang sudah diperbaiki di main.css) -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Tombol Tambah Partner Baru (Toggle Form) -->
            <div class="mb-4 d-flex justify-content-end">
                <button type="button" id="toggleAddPartnerForm" class="btn btn-primary">
                    Tambah Partner Baru
                </button>
            </div>

            <!-- Formulir Tambah Partner (disembunyikan secara default) -->
            <!-- Kelas 'hidden' akan dihapus oleh JS jika ada error validasi atau tombol diklik -->
            <div id="add-partner-form-section" class="mb-8 @if(!$errors->any() && !old('_token')) hidden @endif"> 
                <h4 class="font-semibold text-lg text-neutral-700 dark:text-neutral-300 leading-tight mb-4">Formulir Tambah Partner Baru</h4>
                <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Pesan sukses/error khusus form ini -->
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul class="list-unstyled mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row gy-4">
                        <div class="col-md-12">
                            <label for="name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Nama Partner <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="organization" aria-describedby="name_error">
                            @error('name')<div id="name_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label for="logo" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Logo Partner (Gambar)</label>
                            <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" autocomplete="off" aria-describedby="logo_error">
                            @error('logo')<div id="logo_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label for="website" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Website Partner (URL Lengkap)</label>
                            <input type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" placeholder="https://example.com" autocomplete="url" aria-describedby="website_error">
                            @error('website')<div id="website_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-1">Deskripsi Singkat</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" autocomplete="off" aria-describedby="description_error">{{ old('description') }}</textarea>
                            @error('description')<div id="description_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12 form-check mb-3">
                            <input type="hidden" name="is_active" value="0"> {{-- Hidden input untuk memastikan nilai 'false' terkirim --}}
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" {{ old('is_active', true) ? 'checked' : '' }} value="1" autocomplete="off" aria-describedby="is_active_error">
                            <label for="is_active" class="form-check-label text-sm font-medium text-neutral-700 dark:text-neutral-300">Aktifkan Partner</label>
                            @error('is_active')<div id="is_active_error" class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary me-2">Simpan Partner</button>
                            <button type="button" class="btn btn-secondary" onclick="document.getElementById('add-partner-form-section').classList.add('hidden');">Batal</button>
                        </div>
                    </div>
                </form>
            </div> <!-- Akhir dari div form (tanpa card) -->

            <!-- Tabel Manajemen Partner -->
            <div> 
                @if($partners->isEmpty())
                    <p class="text-lg text-center text-neutral-700 dark:text-neutral-300">Belum ada partner yang ditambahkan.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-full">
                            <thead>
                                <tr class="text-neutral-700 dark:text-neutral-300">
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">ID</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Nama Partner</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Logo</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Website</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Deskripsi</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Status Aktif</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Tanggal Dibuat</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-neutral-600 dark:text-neutral-400">
                                @foreach($partners as $partner)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $partner->id }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $partner->name }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">
                                            @if($partner->logo)
                                                <!-- PERBAIKAN UKURAN LOGO DI SINI -->
                                               <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }} Logo" style="max-width: 50px !important; max-height: 30px !important; object-fit: contain;">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">
                                            @if($partner->website)
                                                <a href="{{ $partner->website }}" target="_blank" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">{{ Str::limit($partner->website, 30) }}</a>
                                            @else
                                                <span class="text-gray-500">-</span>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ Str::limit($partner->description, 50) ?? '-' }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">
                                            <span class="badge {{ $partner->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $partner->is_active ? 'Aktif' : 'Non-aktif' }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $partner->created_at->format('d M Y') }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800 whitespace-nowrap">
                                            <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-warning btn-sm inline-block me-1">Edit</a>
                                            <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
    </section>
</main>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggleAddPartnerForm');
        const formSection = document.getElementById('add-partner-form-section');

        toggleButton.addEventListener('click', function() {
            formSection.classList.toggle('hidden');
            // Opsional: Gulir ke form saat dibuka
            if (!formSection.classList.contains('hidden')) {
                formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });

        // Tampilkan form jika ada error validasi saat halaman dimuat
        // Menambahkan old('_token') untuk memastikan form ditampilkan kembali setelah redirect post
        @if ($errors->any() || old('_token'))
            formSection.classList.remove('hidden');
            formSection.scrollIntoView({ behavior: 'smooth', block: 'center' }); // Gulir ke tengah form error
        @endif
    });
</script>
@endsection