<?php

namespace App\Http\Controllers;

use App\Models\Service; // <--- PASTIKAN BARIS INI ADA!
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar semua layanan (index).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::where('is_active', true)->latest()->get();
        return view('services.services', compact('services'));
    }

    /**
     * Menampilkan halaman detail layanan.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\View\View
     */
    public function show(Service $service)
    {
        return view('services.service-details', compact('service'));
    }
}