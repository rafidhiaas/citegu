<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial; // Pastikan ini ada
use App\Models\Partner;     // <<<--- TAMBAHKAN INI

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua testimonial, terbaru di atas
        $testimonials = Testimonial::latest()->get();

        // Mengambil semua partner, terbaru di atas
        $partners = Partner::latest()->get(); // <<<--- TAMBAHKAN INI

        // Meneruskan kedua data ke view dashboard
        return view('dashboard', compact('testimonials', 'partners')); // <<<--- PASTIKAN KEDUA VARIABEL ADA
    }
}