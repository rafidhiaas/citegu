<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pastikan ini ada untuk operasi file

class ServiceController extends Controller
{
    /**
     * Menampilkan daftar semua layanan di halaman admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Menampilkan formulir untuk membuat layanan baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Menyimpan layanan baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon_class' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
            'is_active' => 'boolean',
        ]);
        
        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($validatedData);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit layanan.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\View\View
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Memperbarui layanan yang sudah ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon_class' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean',
        ]);
        
        // Tangani pembaruan gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            // Simpan gambar baru
            $validatedData['image'] = $request->file('image')->store('services', 'public');
        } else {
            // Jika tidak ada gambar baru diunggah, pertahankan gambar lama
            // Ini penting agar gambar tidak terhapus jika admin tidak mengunggah ulang gambar saat update
            $validatedData['image'] = $service->image; 
        }

        $service->update($validatedData);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Menghapus layanan.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Service $service)
    {
        // Hapus gambar dari storage jika ada
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return back()->with('success', 'Layanan berhasil dihapus.');
    }
}