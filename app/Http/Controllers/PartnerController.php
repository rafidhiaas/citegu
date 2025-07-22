<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Testimonial; // Pastikan ini diimpor untuk adminIndex
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PartnerController extends Controller
{
    /**
     * Menampilkan daftar semua partner yang aktif di halaman publik.
     */
    public function index()
    {
        $partners = Partner::where('is_active', true)->orderBy('name')->get();
        return view('partners.partners', compact('partners'));
    }

    /**
     * Menampilkan daftar semua partner dan testimonial di halaman admin.
     * Metode ini akan digunakan untuk rute 'admin.partners.index'.
     */
    public function adminIndex()
    {
        $partners = Partner::latest()->get(); // Ambil semua partner, terbaru dulu
        $testimonials = Testimonial::latest()->get(); // Ambil semua testimonial

        // Teruskan kedua variabel ke view admin dashboard
        return view('admin.partners.index', compact('partners', 'testimonials'));
    }

    /*
     * Metode create() sudah tidak diperlukan jika formulir "Tambah Partner"
     * sudah digabung ke halaman admin.partners.index.
     * Pastikan rute 'admin.partners.create' juga dihapus dari routes/web.php
     * untuk menghindari error "Call to undefined method".
     */
    // public function create()
    // {
    //     return view('admin.partners.create');
    // }


    /**
     * Menyimpan partner baru ke database.
     */
    public function store(Request $request)
    {
        // --- LANGKAH DIAGNOSTIK: UNCOMMENT UNTUK MELIHAT DATA FORM ---
        // dd($request->all());

        try {
            // --- KONVERSI is_active SECARA EKSPLISIT SEBELUM VALIDASI ---
            // Ini memastikan 'is_active' selalu berupa boolean (true/false) saat masuk validator.
            $request->merge([
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
                'website' => 'nullable|url|max:255',
                'description' => 'nullable|string',
                'is_active' => 'boolean', // Aturan validasi menjadi 'boolean' karena sudah dikonversi
            ]);

            // Penanganan upload logo
            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $request->file('logo')->store('partner_logos', 'public');
            } else {
                $validatedData['logo'] = null; // Set null jika tidak ada file logo yang diunggah
            }

            // Data untuk 'is_active' sudah diatur oleh $request->merge() dan divalidasi.

            Partner::create($validatedData);

            return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap validasi yang gagal, log, dan redirect kembali dengan error
            Log::warning('Validation failed for partner creation: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception | \Throwable $e) { // Tangkap kesalahan umum (Exception atau Throwable)
            // Tangkap error lainnya (misalnya, masalah database, izin penyimpanan), log, dan tampilkan pesan error umum
            Log::error('Failed to create partner: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.partners.index')->with('error', 'Terjadi kesalahan saat menambahkan partner. Silakan coba lagi.');
        }
    }

    /**
     * Menampilkan formulir untuk mengedit partner yang sudah ada.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Memperbarui partner di database.
     */
    public function update(Request $request, Partner $partner)
    {
        // --- LANGKAH DIAGNOSTIK: UNCOMMENT UNTUK MELIHAT DATA FORM ---
        // dd($request->all());

        try {
            // --- KONVERSI is_active SECARA EKSPLISIT SEBELUM VALIDASI ---
            // Ini memastikan 'is_active' selalu berupa boolean (true/false) saat masuk validator.
            $request->merge([
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'website' => 'nullable|url|max:255',
                'description' => 'nullable|string',
                'is_active' => 'boolean', // Aturan validasi menjadi 'boolean' karena sudah dikonversi
            ]);

            // Penanganan upload logo baru
            if ($request->hasFile('logo')) {
                // Hapus logo lama jika ada
                if ($partner->logo) {
                    Storage::disk('public')->delete($partner->logo);
                }
                $validatedData['logo'] = $request->file('logo')->store('partner_logos', 'public');
            } else {
                // Jika tidak ada file baru diunggah, pertahankan logo lama dari model
                $validatedData['logo'] = $partner->logo;
            }

            // Data untuk 'is_active' sudah diatur oleh $request->merge() dan divalidasi.

            $partner->update($validatedData);

            return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed for partner update: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception | \Throwable $e) { // Tangkap kesalahan umum
            Log::error('Failed to update partner: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.partners.index')->with('error', 'Terjadi kesalahan saat memperbarui partner. Silakan coba lagi.');
        }
    }

    /**
     * Menghapus partner dari database dan logo terkait jika ada.
     */
    public function destroy(Partner $partner)
    {
        try {
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $partner->delete();
            return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil dihapus.');
        } catch (\Exception | \Throwable $e) { // Tangkap kesalahan umum
            Log::error('Failed to delete partner: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.partners.index')->with('error', 'Terjadi kesalahan saat menghapus partner. Silakan coba lagi.');
        }
    }
}