<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Str; // Tambahkan ini jika Anda menggunakan Str::limit di view admin.testimonials.index

class TestimonialController extends Controller
{
    /**
     * Menampilkan formulir untuk membuat testimonial baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Menyimpan testimonial baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_company' => 'nullable|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:10',
            // 'image' => 'nullable|image|max:2048', // Jika Anda ingin menambahkan upload gambar, aktifkan ini
        ]);

        // Logika untuk upload gambar (jika diaktifkan)
        // $imagePath = null;
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('testimonial_images', 'public');
        // }

        // Simpan data testimonial ke database
        Testimonial::create([
            'author_name' => $request->author_name,
            'author_company' => $request->author_company,
            'author_role' => $request->author_role,
            'rating' => $request->rating,
            'content' => $request->content,
            'status' => 'pending', // Default status: pending, agar perlu approval admin
            // 'image' => $imagePath, // Aktifkan jika upload gambar diaktifkan
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('testimonials.create')->with('success', 'Terima kasih! Testimonial Anda telah berhasil dikirim dan akan ditinjau.');
    }

    /**
     * Menampilkan daftar semua testimonial di halaman admin.
     * Termasuk yang 'pending', 'approved', 'rejected'.
     *
     * @return \Illuminate\View\View
     */
    public function adminIndex() // Ini adalah metode yang hilang sebelumnya!
    {
        $testimonials = Testimonial::latest()->get(); // Mengambil semua testimonial, terbaru di atas
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Mengubah status testimonial menjadi 'approved'.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve(Testimonial $testimonial)
    {
        $testimonial->update(['status' => 'approved']);
        return back()->with('success', 'Testimonial berhasil disetujui.');
    }

    /**
     * Mengubah status testimonial menjadi 'rejected'.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Testimonial $testimonial)
    {
        $testimonial->update(['status' => 'rejected']);
        return back()->with('success', 'Testimonial berhasil ditolak.');
    }

    /**
     * Menghapus testimonial.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Testimonial $testimonial)
    {
        // Jika ada gambar, tambahkan logika untuk menghapus file gambar dari storage
        // use Illuminate\Support\Facades\Storage; di bagian atas
        // if ($testimonial->image) {
        //     Storage::disk('public')->delete($testimonial->image);
        // }
        $testimonial->delete();
        return back()->with('success', 'Testimonial berhasil dihapus.');
    }
}