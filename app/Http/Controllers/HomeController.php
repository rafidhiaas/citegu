<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial; // <<<--- BARIS INI PENTING! Impor Model Testimonial

class HomeController extends Controller
{
    public function index()
    {
        // Ambil testimonial yang berstatus 'approved' dari database
        // dan urutkan berdasarkan tanggal terbaru
        $testimonials = Testimonial::where('status', 'approved')
                                   ->latest() // Mengurutkan berdasarkan 'created_at' terbaru
                                   ->get();

        // Teruskan data testimonial ke view home.blade.php
        return view('home', compact('testimonials')); // <<<--- VARIABEL DIKIRIMKAN KE VIEW
    }
}