<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Menampilkan daftar semua partner di halaman admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Menampilkan formulir untuk membuat partner baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Menyimpan partner baru ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($validatedData);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir untuk mengedit partner.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\View\View
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Memperbarui partner yang sudah ada di database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Partner $partner)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'nullable|url',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        // Tangani upload logo baru jika ada
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            // Simpan logo baru
            $validatedData['logo'] = $request->file('logo')->store('partners', 'public');
        }

        // Perbarui data partner di database
        $partner->update($validatedData);

        return redirect()->route('admin.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    /**
     * Menghapus partner.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Partner $partner)
    {
        // Hapus logo partner dari storage
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return back()->with('success', 'Partner berhasil dihapus.');
    }
}