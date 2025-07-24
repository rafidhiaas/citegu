<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Throwable; // Import Throwable untuk penanganan error yang lebih luas

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
     * (Catatan: Jika Anda memindahkan semua manajemen ke dashboard, metode ini mungkin tidak lagi relevan)
     */
    public function adminIndex()
    {
        $partners = Partner::latest()->get(); // Ambil semua partner, terbaru dulu
        $testimonials = Testimonial::latest()->get(); // Ambil semua testimonial
        // Jika Anda ingin menggunakan halaman ini sebagai halaman manajemen partner penuh terpisah,
        // Anda mungkin hanya perlu meneruskan $partners.
        return view('admin.partners.index', compact('partners', 'testimonials'));
    }

    /**
     * Menyimpan partner baru ke database.
     */
    public function store(Request $request)
    {
        try {
            // --- KONVERSI is_active SECARA EKSPLISIT SEBELUM VALIDASI ---
            $request->merge([
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'author_role' => 'nullable|string|max:255', // Tambahkan validasi untuk jabatan
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
                'website' => 'nullable|url|max:255',
                'description' => 'nullable|string',
                'is_active' => 'boolean',
            ]);

            // Penanganan upload logo
            if ($request->hasFile('logo')) {
                $validatedData['logo'] = $request->file('logo')->store('partner_logos', 'public');
            } else {
                $validatedData['logo'] = null;
            }

            Partner::create($validatedData);

            // Redirect kembali ke dashboard dengan pesan sukses.
            // Tambahkan 'form_type' ke session untuk membantu Blade menampilkan form yang benar jika ada error.
            return redirect()->route('dashboard')->with('success', 'Partner berhasil ditambahkan.')->with('form_type', 'partner_add');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed for partner creation: ' . json_encode($e->errors()));
            // Redirect kembali dengan error dan input lama, serta 'form_type'
            return redirect()->back()->withErrors($e->errors())->withInput()->with('form_type', 'partner_add');

        } catch (Throwable $e) { // Menggunakan Throwable untuk menangkap Exception dan Error
            Log::error('Failed to create partner: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            // Redirect kembali dengan pesan error umum dan 'form_type'
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan partner. Silakan coba lagi. Error: ' . $e->getMessage())->with('form_type', 'partner_add');
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
        try {
            // --- KONVERSI is_active SECARA EKSPLISIT SEBELUM VALIDASI ---
            $request->merge([
                'is_active' => $request->has('is_active') ? true : false,
            ]);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'author_role' => 'nullable|string|max:255', // Tambahkan validasi untuk jabatan
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'website' => 'nullable|url|max:255',
                'description' => 'nullable|string',
                'is_active' => 'boolean',
            ]);

            // Penanganan upload logo baru
            if ($request->hasFile('logo')) {
                if ($partner->logo) {
                    Storage::disk('public')->delete($partner->logo);
                }
                $validatedData['logo'] = $request->file('logo')->store('partner_logos', 'public');
            } else {
                $validatedData['logo'] = $partner->logo;
            }

            $partner->update($validatedData);

            // Redirect kembali ke dashboard dengan pesan sukses.
            return redirect()->route('dashboard')->with('success', 'Partner berhasil diperbarui.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed for partner update: ' . json_encode($e->errors()));
            // Redirect kembali dengan error dan input lama
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (Throwable $e) { // Menggunakan Throwable untuk menangkap Exception dan Error
            Log::error('Failed to update partner: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui partner. Silakan coba lagi. Error: ' . $e->getMessage());
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
            // Redirect kembali ke dashboard dengan pesan sukses.
            return redirect()->route('dashboard')->with('success', 'Partner berhasil dihapus.');
        } catch (Throwable $e) { // Menggunakan Throwable untuk menangkap Exception dan Error
            Log::error('Failed to delete partner: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus partner. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }
}