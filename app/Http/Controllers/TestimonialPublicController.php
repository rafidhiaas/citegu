<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialPublicController extends Controller
{
    /**
     * Menampilkan formulir untuk membuat testimonial baru (untuk pengguna publik).
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Menyimpan testimonial baru ke database (dari pengguna publik).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_company' => 'nullable|string|max:255',
            'author_role' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:10',
        ]);

        Testimonial::create([
            'author_name' => $request->author_name,
            'author_company' => $request->author_company,
            'author_role' => $request->author_role,
            'rating' => $request->rating,
            'content' => $request->content,
            'status' => 'pending', // Default status: pending, agar perlu approval admin
        ]);

        return redirect()->route('testimonials.create')->with('success', 'Terima kasih! Testimonial Anda telah berhasil dikirim dan akan ditinjau.');
    }
}