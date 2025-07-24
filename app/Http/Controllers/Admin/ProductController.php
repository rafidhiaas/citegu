<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product; // Pastikan Anda mengimpor model Product
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk mengelola penyimpanan file
use Throwable; // Untuk menangkap semua jenis exception

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk di halaman admin.
     * Metode ini mungkin tidak lagi dipanggil langsung jika semua manajemen ada di dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua produk, diurutkan berdasarkan tanggal pembuatan terbaru
        $products = Product::latest()->get();

        // Meneruskan data produk ke view admin.products.index
        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan formulir untuk membuat produk baru.
     * Metode ini mungkin tidak lagi dipanggil langsung jika form create ada di dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Jika Anda memiliki halaman 'create' terpisah, Anda bisa menggunakannya di sini.
        // Karena form create sudah ada di dashboard.blade.php, metode ini mungkin tidak langsung dipanggil
        // melalui route resource standar, tetapi bisa digunakan jika Anda memisahkannya.
        return view('admin.products.create');
    }

    /**
     * Menyimpan produk baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            // Validasi data yang masuk dari form
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
                'category' => 'required|string|max:255', // Pastikan kategori sesuai dengan yang Anda harapkan
                'details_link' => 'nullable|url|max:255',
                'is_active' => 'nullable|boolean', // 'nullable' karena checkbox tidak mengirim nilai jika tidak dicentang
            ]);

            $imagePath = null;
            // Jika ada file gambar yang diunggah
            if ($request->hasFile('image')) {
                // Simpan gambar ke folder 'products' di disk 'public'
                // Pastikan Anda sudah menjalankan 'php artisan storage:link'
                $imagePath = $request->file('image')->store('products', 'public');
            }

            // Buat produk baru di database
            Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'image' => $imagePath, // Simpan path gambar
                'category' => $validatedData['category'],
                'details_link' => $validatedData['details_link'],
                // Pastikan nilai boolean: jika checkbox dicentang, akan 'true', jika tidak, 'false'
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            // Redirect kembali ke halaman dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Produk berhasil ditambahkan!');

        } catch (Throwable $e) {
            // Tangkap exception dan log untuk debugging
            \Log::error('Gagal menambahkan produk: ' . $e->getMessage());
            // Redirect kembali dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan produk. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }

    /**
     * Menampilkan detail produk tertentu.
     * (Biasanya tidak digunakan secara langsung di admin panel untuk CRUD sederhana,
     * lebih ke arah halaman detail produk publik)
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        // Anda bisa mengimplementasikan ini jika ada halaman detail produk di admin
        return view('admin.products.show', compact('product'));
    }

    /**
     * Menampilkan formulir untuk mengedit produk yang sudah ada.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\View\View
     */
    public function edit(Product $product)
    {
        // Meneruskan data produk yang akan diedit ke view admin.products.edit
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Memperbarui produk yang sudah ada di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        try {
            // Validasi data yang masuk
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi file gambar
                'category' => 'required|string|max:255',
                'details_link' => 'nullable|url|max:255',
                'is_active' => 'nullable|boolean',
            ]);

            // Tangani pembaruan gambar jika ada yang baru diunggah
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                // Simpan gambar baru
                $validatedData['image'] = $request->file('image')->store('products', 'public');
            } else {
                // Jika tidak ada gambar baru, pertahankan gambar lama
                $validatedData['image'] = $product->image;
            }

            // Perbarui status is_active secara eksplisit
            $validatedData['is_active'] = $request->has('is_active') ? true : false;

            // Perbarui data produk di database
            $product->update($validatedData);

            // Redirect kembali ke halaman dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Produk berhasil diperbarui!');

        } catch (Throwable $e) {
            // Tangkap exception dan log untuk debugging
            \Log::error('Gagal memperbarui produk: ' . $e->getMessage());
            // Redirect kembali dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui produk. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus produk dari database.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        try {
            // Hapus gambar terkait jika ada
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            // Hapus produk dari database
            $product->delete();

            // Redirect kembali ke halaman dashboard dengan pesan sukses
            return redirect()->route('dashboard')->with('success', 'Produk berhasil dihapus!');

        } catch (Throwable $e) {
            // Tangkap exception dan log untuk debugging
            \Log::error('Gagal menghapus produk: ' . $e->getMessage());
            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Gagal menghapus produk. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }
}