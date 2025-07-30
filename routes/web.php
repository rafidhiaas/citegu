<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PublicProductController; // Import untuk halaman produk publik
use App\Http\Controllers\Admin\ProductController; // Import untuk manajemen produk admin
use App\Http\Controllers\ServiceController; // BARU: Import ServiceController

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

// Rute untuk halaman produk (daftar produk)
Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');
// BARU: Rute untuk halaman detail produk
Route::get('/products/{product}', [PublicProductController::class, 'show'])->name('products.show');


// Rute untuk halaman partners (publik)
// Menggunakan nama rute yang berbeda untuk menghindari konflik dengan rute admin.partners.index
Route::get('/partners', [PartnerController::class, 'index'])->name('partners.public.index');

// Rute untuk halaman services (daftar layanan)
Route::get('/services', function () {
    return view('services.services');
})->name('services.index');
// BARU: Rute untuk halaman detail layanan
// Asumsi: Anda akan memiliki ID atau slug untuk setiap layanan
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');


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
    // Logika pengiriman form kontak di sini (Anda bisa memindahkan ini ke ContactController)
    return back()->with('success', 'Pesan Anda telah terkirim!');
})->name('contact.submit');

// Rute untuk TESTIMONIALS (Form Pengisian oleh Pengguna)
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');


// --- Rute Admin (Dilindungi oleh Auth Middleware) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Rute untuk Dashboard Admin (saat mengakses /admin)
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Rute untuk Testimonial (Admin)
    Route::get('/testimonials', [TestimonialController::class, 'adminIndex'])->name('testimonials.index');
    Route::post('/testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::post('/testimonials/{testimonial}/reject', [TestimonialController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Rute untuk Manajemen Partners (Admin)
    // Didefinisikan secara manual sesuai kebutuhan Anda (form create ada di dashboard)
    Route::get('/partners', [PartnerController::class, 'adminIndex'])->name('partners.index'); // Menampilkan daftar & form tambah
    Route::post('/partners', [PartnerController::class, 'store'])->name('partners.store'); // Menyimpan partner baru
    Route::get('/partners/{partner}/edit', [PartnerController::class, 'edit'])->name('partners.edit'); // Menampilkan form edit
    Route::put('/partners/{partner}', [PartnerController::class, 'update'])->name('partners.update'); // Memperbarui partner
    Route::delete('/partners/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy'); // Menghapus partner

    // Rute untuk Manajemen Products (Admin)
    // Menggunakan Route::resource untuk CRUD standar
    Route::resource('products', ProductController::class);
    // Jika Anda juga membuat manajemen kategori produk di admin:
    // Route::resource('product-categories', Admin\ProductCategoryController::class);
});


// --- Rute Default Laravel Breeze (Otentikasi & Profil) ---

// Rute Dashboard setelah login (ini adalah dashboard default Breeze, bisa diarahkan ke /admin jika diinginkan)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Rute Profil Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mengimpor rute otentikasi Breeze lainnya (login, register, forgot password, dll.)
require __DIR__.'/auth.php';