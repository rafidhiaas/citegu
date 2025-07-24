<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan Anda mengimpor model Product
use Illuminate\Http\Request;

class PublicProductController extends Controller
{
    /**
     * Menampilkan daftar produk dan solusi di halaman publik.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua produk yang aktif dari database
        $products = Product::where('is_active', true)->get();

        // Meneruskan data produk ke view products.products
        return view('products.products', compact('products'));
    }
}