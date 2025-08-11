<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial; 
use App\Models\Partner;     
use App\Models\Product;     
use App\Models\Service;     

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan data ringkasan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        // Menghitung total jumlah testimonial yang ada
        $totalTestimonials = Testimonial::count();

        // Menghitung jumlah testimonial yang berstatus 'pending' (perlu persetujuan)
        $pendingTestimonials = Testimonial::where('status', 'pending')->count();

        // Menghitung total jumlah partner yang ada
        $totalPartners = Partner::count();

        // Menghitung jumlah partner yang berstatus 'aktif'
        $activePartners = Partner::where('is_active', true)->count();

        // Menghitung total jumlah produk yang ada
        $totalProducts = Product::count();

        // Menghitung total jumlah layanan yang ada (BARU: Ditambahkan untuk metrik layanan)
        $totalServices = Service::count();


        // Meneruskan semua data metrik yang telah dihitung ke view dashboard.
        // Pastikan view yang dituju adalah 'admin.dashboard' sesuai struktur kita.
        return view('admin.dashboard', compact(
            'totalTestimonials',
            'pendingTestimonials',
            'totalPartners',
            'activePartners',
            'totalProducts',
            'totalServices' // PENTING: Sertakan variabel ini agar bisa ditampilkan di view
        ));
    }
}