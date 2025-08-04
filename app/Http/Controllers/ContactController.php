<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable; // Tambahkan ini jika Anda ingin menggunakan try...catch

class ContactController extends Controller
{
    /**
     * Menampilkan halaman kontak.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('contact.contact');
    }

    /**
     * Menangani pengiriman formulir kontak.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        try {
            // Logika untuk validasi dan pengiriman email di sini
            // Misalnya: Mail::to('admin@example.com')->send(new ContactMail($request->all()));

            // Setelah berhasil, kembali dengan pesan sukses
            return back()->with('success', 'Pesan Anda telah berhasil dikirim!');

        } catch (Throwable $e) {
            // Tangkap exception jika terjadi error dan log
            \Log::error('Gagal mengirim form kontak: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }
}