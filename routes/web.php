<?php

use Illuminate\Support\Facades\Route;

// Import Controller untuk Rute Publik
use App\Http\Controllers\HomeController;
// Hapus: use App\Http\Controllers\TestimonialController; // Ini tidak lagi digunakan karena ada TestimonialPublicController
// Hapus: use App\Http\Controllers\PartnerController; // Ini tidak lagi digunakan karena ada PublicPartnerController
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialPublicController; // Ini yang digunakan untuk publik testimonial
use App\Http\Controllers\PublicPartnerController;     // Ini yang digunakan untuk publik partner

// Import Controller untuk Rute Admin
use App\Http\Controllers\DashboardController; // Untuk dashboard admin utama
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController; // Alias untuk TestimonialController admin
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;         // Alias untuk PartnerController admin
use App\Http\Controllers\Admin\ProductController as AdminProductController;         // Alias untuk ProductController admin
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

use App\Http\Controllers\ProfileController; // Untuk rute profil Breeze


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

// --- Rute Aplikasi Kustom Anda (Publik) ---

// Rute untuk halaman utama (landing page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk halaman produk (daftar produk publik)
Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');
// Rute untuk halaman detail produk publik
Route::get('/products/{product}', [PublicProductController::class, 'show'])->name('products.show');


// Rute untuk halaman partners (publik)
Route::get('/partners', [PublicPartnerController::class, 'index'])->name('partners.public.index');

// Rute untuk halaman services (daftar layanan)
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
// Rute untuk halaman detail layanan
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Rute untuk halaman kontak
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
// Rute POST untuk menghandle pengiriman form kontak
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Rute untuk TESTIMONIALS (Form Pengisian oleh Pengguna Publik)
Route::get('/testimonials/create', [TestimonialPublicController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialPublicController::class, 'store'])->name('testimonials.store');


// --- Rute Admin (Dilindungi oleh Auth Middleware) ---
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Rute untuk Dashboard Admin (saat mengakses /admin)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk Manajemen Testimonial (Admin)
    Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials/{testimonial}/approve', [AdminTestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::post('/testimonials/{testimonial}/reject', [AdminTestimonialController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Rute untuk Manajemen Partners (Admin)
    Route::resource('partners', AdminPartnerController::class);

    // Rute untuk Manajemen Products (Admin)
    Route::resource('products', AdminProductController::class);

    // Rute untuk Manajemen Layanan (Admin)
    Route::resource('services', AdminServiceController::class);
});


// --- Rute Default Laravel Breeze (Otentikasi & Profil) ---

// Rute Dashboard setelah login (ini adalah dashboard default Breeze)
// Jika Anda ingin pengguna langsung ke /admin setelah login, bisa gunakan:
// Route::redirect('/dashboard', '/admin')->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mengimpor rute otentikasi Breeze lainnya (login, register, forgot password, dll.)
require __DIR__.'/auth.php';