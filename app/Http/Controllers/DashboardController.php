<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Product; // Pastikan Anda mengimpor model Product

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data ringkasan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- Mengambil Data untuk Dashboard ---

        // Mengambil SEMUA testimonial untuk ditampilkan di dashboard
        $testimonials = Testimonial::latest()->get();

        // Mengambil SEMUA partner untuk ditampilkan di dashboard
        $partners = Partner::latest()->get();

        // Mengambil SEMUA produk untuk ditampilkan di dashboard
        $products = Product::latest()->get(); // BARIS INI DITAMBAHKAN/DIPERBAIKI

        // --- Menghitung Metrik Ringkasan ---

        // Menghitung total jumlah testimonial yang ada
        $totalTestimonials = Testimonial::count();

        // Menghitung jumlah testimonial yang berstatus 'pending' (perlu persetujuan)
        $pendingTestimonials = Testimonial::where('status', 'pending')->count();

        // Menghitung total jumlah partner yang ada
        $totalPartners = Partner::count();

        // Menghitung jumlah partner yang berstatus 'aktif'
        $activePartners = Partner::where('is_active', true)->count();

        // Menghitung total jumlah produk yang ada
        $totalProducts = Product::count(); // BARIS INI DITAMBAHKAN


        // Meneruskan semua data yang telah diambil dan dihitung ke view dashboard
        return view('dashboard', compact(
            'testimonials',
            'partners',
            'products', // PASTIKAN VARIABEL INI ADA DI SINI
            'totalTestimonials',
            'pendingTestimonials',
            'totalPartners',
            'activePartners',
            'totalProducts' // PASTIKAN VARIABEL INI ADA DI SINI
        ));
    }
}