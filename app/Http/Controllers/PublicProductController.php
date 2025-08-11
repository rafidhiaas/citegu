<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class PublicProductController extends Controller
{
    /**
     * Menampilkan daftar produk dan solusi di halaman publik.
     *
     * @param  \Illuminate\Http\Request  $request // Tambahkan Request jika Anda akan menggunakan query parameter untuk filter
     * @return \Illuminate\View\View
     */
    public function index(Request $request) // Menerima Request untuk filter kategori
    {
        // Mengambil semua produk yang aktif
        $query = Product::where('is_active', true);

        // Filter berdasarkan kategori jika ada parameter 'category' di URL
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        $products = $query->latest()->get(); // urutan berdasarkan tanggal pembuatan
        $categories = Product::select('category')->distinct()->get();
        return view('products.products', compact('products', 'categories')); // Kirimkan juga categories ke view index
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