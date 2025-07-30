<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan ini diimpor
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
        // Mengambil semua produk yang aktif, diurutkan berdasarkan tanggal pembuatan terbaru
        $products = Product::where('is_active', true)->latest()->get();
        return view('products.products', compact('products'));
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
        return view('products.product-details', compact('product'));
    }
}