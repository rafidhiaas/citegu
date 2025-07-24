@extends('layouts.master') <!-- Sesuaikan dengan layout admin  -->

@section('content')
<main class="main">
    <section id="admin-products-management" class="section" style="padding-top: 100px;">
        <div class="container section-title" data-aos="fade-up">
            <h2>Manajemen Produk & Solusi</h2>
            <p>Kelola daftar produk dan solusi yang ditawarkan oleh perusahaan Anda.</p>
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

            <!-- Tombol untuk kembali ke Dashboard (tempat form tambah produk berada) -->
            <div class="mb-4 d-flex justify-content-end">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    Kembali ke Dashboard (Tambah Produk)
                </a>
            </div>

            {{-- Formulir Tambah Produk telah dipindahkan ke dashboard.blade.php --}}
            {{-- Bagian ini dikosongkan karena form sudah tidak ada di sini --}}

            <!-- Tabel Manajemen Produk -->
            <div>
                @if($products->isEmpty())
                    <p class="text-lg text-center text-neutral-700 dark:text-neutral-300">Belum ada produk yang ditambahkan.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered w-full">
                            <thead>
                                <tr class="text-neutral-700 dark:text-neutral-300">
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">ID</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Nama Produk</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Gambar</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Kategori</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Deskripsi</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Link Detail</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Status Aktif</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Tanggal Dibuat</th>
                                    <th class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-neutral-600 dark:text-neutral-400">
                                @foreach($products as $product)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $product->id }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $product->name }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }} Gambar" style="max-width: 70px; max-height: 50px; object-fit: contain;">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $product->category }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ Str::limit($product->description, 50) ?? '-' }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">
                                            @if($product->details_link)
                                                <a href="{{ $product->details_link }}" target="_blank" class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">{{ Str::limit($product->details_link, 30) }}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">
                                            <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $product->is_active ? 'Aktif' : 'Non-aktif' }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800">{{ $product->created_at->format('d M Y') }}</td>
                                        <td class="py-2 px-4 border-b border-neutral-200 dark:border-neutral-800 whitespace-nowrap">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm inline-block me-1">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
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
        // Skrip ini sekarang hanya untuk halaman admin/products/index, tidak ada form toggle lagi
        // Tombol "Kembali ke Dashboard" akan mengarahkan ke dashboard tempat form berada.
    });
</script>
@endsection