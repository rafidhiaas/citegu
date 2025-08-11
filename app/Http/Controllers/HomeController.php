<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial; 
use App\Models\Setting;    

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil testimonial yang berstatus 'approved' dari database
        // dan urutkan berdasarkan tanggal terbaru
        $testimonials = Testimonial::where('status', 'approved')
                                   ->latest()
                                   ->get();

        // Mengambil pengaturan homepage dari tabel 'settings'
        $backgroundPath = Setting::where('key', 'homepage_background_image')->value('value');
        $slogan = Setting::where('key', 'homepage_slogan')->value('value');
        $clients = Setting::where('key', 'homepage_total_clients')->value('value');
        $projects = Setting::where('key', 'homepage_total_projects')->value('value');
        $support_hours = Setting::where('key', 'homepage_support_hours')->value('value');
        $workers = Setting::where('key', 'homepage_total_workers')->value('value');

        // Teruskan semua data yang diperlukan ke view home.blade.php
        return view('home', compact(
            'testimonials',
            'backgroundPath',
            'slogan',
            'clients',
            'projects',
            'support_hours',
            'workers'
        ));
    }
}