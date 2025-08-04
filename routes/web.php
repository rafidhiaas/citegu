<?php

use Illuminate\Support\Facades\Route;

// Import Controller untuk Rute Publik
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialPublicController;
use App\Http\Controllers\PublicPartnerController;

// Import Controller untuk Rute Admin
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SettingsController as AdminSettingsController; // <--- TAMBAHKAN INI

use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute Aplikasi Kustom Anda (Publik) ---

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [PublicProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [PublicProductController::class, 'show'])->name('products.show');
Route::get('/partners', [PublicPartnerController::class, 'index'])->name('partners.public.index');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/testimonials/create', [TestimonialPublicController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials', [TestimonialPublicController::class, 'store'])->name('testimonials.store');


// --- Rute Admin (Dilindungi oleh Auth Middleware) ---
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Konten
    Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials/{testimonial}/approve', [AdminTestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::post('/testimonials/{testimonial}/reject', [AdminTestimonialController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');

    Route::resource('partners', AdminPartnerController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('services', AdminServiceController::class);

    // Pengaturan Situs (BARU)
    Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/homepage', [AdminSettingsController::class, 'index'])->name('homepage.index');
    Route::post('/homepage', [AdminSettingsController::class, 'update'])->name('homepage.update');
    });
});


// --- Rute Default Laravel Breeze (Otentikasi & Profil) ---

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';