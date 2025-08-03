<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PublicPartnerController extends Controller
{
    /**
     * Menampilkan daftar partner yang aktif di halaman publik.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partners = Partner::where('is_active', true)->latest()->get();
        return view('partners.partners', compact('partners'));
    }
}