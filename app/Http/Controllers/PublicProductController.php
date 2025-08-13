<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan ini diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB Facade untuk query kategori

class PublicProductController extends Controller
{
    /**
     * Menampilkan daftar produk dan solusi di halaman publik.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Mengambil semua produk yang aktif
        $query = Product::where('is_active', true);

        // Filter berdasarkan kategori jika ada parameter 'category' di URL
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Ambil produk dengan pengurutan terbaru
        $products = $query->latest()->get();

        // Mengambil semua kategori unik dari produk yang aktif untuk filter
        $categories = Product::select('category')->distinct()->get();

        // Kirimkan kedua variabel ke view
        return view('products.products', compact('products', 'categories'));
    }

    /**
     * Menampilkan detail produk tertentu.
     * Menggunakan Route Model Binding untuk mengambil instance Product.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        // Variabel $product sudah otomatis terisi oleh Laravel karena Route Model Binding
        // Ambil semua kategori unik dari database untuk ditampilkan di bagian "Kategori Serupa"
        $categories = Product::select('category')->distinct()->get();

        // Kirimkan $product DAN $categories ke view
        return view('products.product-details', compact('product', 'categories'));
    }
}