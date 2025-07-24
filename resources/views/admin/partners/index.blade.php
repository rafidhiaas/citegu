@extends('layouts.master') <!-- Sesuaikan jika Anda punya layout admin yang berbeda -->

@section('content')
<main class="main">
    <section id="admin-partners-management" class="section" style="padding-top: 100px;">
        <div class="container section-title" data-aos="fade-up">
            <h2>Manajemen Partner</h2>
            <p>Kelola daftar partner atau klien Anda.</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Pesan Sukses/Error Global -->
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

            <!-- Tombol untuk kembali ke Dashboard (tempat form tambah partner berada) -->
            <div class="mb-4 d-flex justify-content-end">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    Kembali ke Dashboard (Tambah Partner)
                </a>
            </div>

            {{-- Formulir Tambah Partner telah dipindahkan ke dashboard.blade.php --}}
            {{-- Bagian ini dikosongkan karena form sudah tidak ada di sini --}}

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
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Jabatan</th>
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
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $partner->author_role ?? '-' }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">
                                            @if($partner->logo)
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
        // Skrip ini sekarang hanya untuk halaman admin/partners/index, tidak ada form toggle lagi
        // Tombol "Kembali ke Dashboard" akan mengarahkan ke dashboard tempat form berada.
    });
</script>
@endsection