<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController; // Pastikan ini diimpor dengan benar

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// --- Rute Aplikasi Kustom Anda ---

// Rute untuk halaman utama (landing page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk halaman produk
Route::get('/products', function () {
    return view('products.products');
})->name('products.index');

// Rute untuk halaman partners (publik)
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');

// Rute untuk halaman services
Route::get('/services', function () {
    return view('services.services');
})->name('services.index');

// Rute khusus untuk service worker
Route::get('/service-worker.js', function () {
    return response()->file(public_path('service-worker.js'));
});

// Rute untuk menampilkan halaman kontak
Route::get('/contact', function () {
    return view('contact.contact');
})->name('contact.index');

// Rute POST untuk menghandle pengiriman form kontak
Route::post('/contact', function () {
    // Logika pengiriman form kontak di sini
    return back()->with('success', 'Pesan Anda telah terkirim!');
})->name('contact.submit');

// Rute untuk TESTIMONIALS (Form Pengisian oleh Pengguna)
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');


// --- Rute Admin (Dilindungi oleh Auth Middleware) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Rute untuk Testimonial (Admin)
    Route::get('/testimonials', [TestimonialController::class, 'adminIndex'])->name('testimonials.index');
    Route::post('/testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::post('/testimonials/{testimonial}/reject', [TestimonialController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // <<<--- PERBAIKAN RUTE UNTUK MANAJEMEN PARTNERS (ADMIN) ---
    // HAPUS Route::resource() yang konflik di sini.
    // Kita akan mendefinisikan setiap rute secara manual untuk kontrol penuh.

    // Menampilkan daftar partner di admin (URL: /admin/partners)
    // Ini adalah rute utama untuk manajemen partner di admin
    Route::get('/partners', [PartnerController::class, 'adminIndex'])->name('partners.index');

    // **PENTING:** Hapus rute create ini jika Anda tidak lagi menggunakan view admin.partners.create terpisah
    // dan form tambah partner sudah digabungkan ke admin.partners.index.
    // Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');

    // Menyimpan partner baru (ini adalah rute POST dari form tambah partner)
    Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store');

    // Menampilkan formulir edit partner
    Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit');

    // Memperbarui partner (menggunakan PUT/PATCH)
    Route::put('/partners/{partner}', [PartnerController::class, 'update'])->name('partners.update');
    Route::patch('/partners/{partner}', [PartnerController::class, 'update']); // Tambahan untuk PATCH

    // Menghapus partner
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
    // <<<--- AKHIR PERBAIKAN RUTE PARTNERS (ADMIN) ---
});


// --- Rute Default Laravel Breeze (Otentikasi & Profil) ---

// Rute Dashboard setelah login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mengimpor rute otentikasi Breeze lainnya (login, register, forgot password, dll.)
require __DIR__.'/auth.php';