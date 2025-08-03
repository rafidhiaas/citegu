<?php

namespace App\Http\Controllers\Admin; // Pastikan namespace ini sudah benar!

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->update(['status' => 'approved']);
        return back()->with('success', 'Testimonial berhasil disetujui.');
    }

    public function reject(Testimonial $testimonial)
    {
        $testimonial->update(['status' => 'rejected']);
        return back()->with('success', 'Testimonial berhasil ditolak.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimonial berhasil dihapus.');
    }
}