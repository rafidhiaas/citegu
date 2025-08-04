<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;

class SettingsController extends Controller
{
    /**
     * Menampilkan halaman formulir pengaturan homepage.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $backgroundPath = Setting::where('key', 'homepage_background_image')->first();
        $slogan = Setting::where('key', 'homepage_slogan')->first();
        $clients = Setting::where('key', 'homepage_total_clients')->first();
        $projects = Setting::where('key', 'homepage_total_projects')->first();
        $support_hours = Setting::where('key', 'homepage_support_hours')->first();
        $workers = Setting::where('key', 'homepage_total_workers')->first();

        return view('admin.settings.homepage', compact('backgroundPath', 'slogan', 'clients', 'projects', 'support_hours', 'workers'));
    }

    /**
     * Memperbarui pengaturan homepage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'homepage_background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'homepage_slogan' => 'nullable|string|max:255',
                'homepage_total_clients' => 'nullable|integer',
                'homepage_total_projects' => 'nullable|integer',
                'homepage_support_hours' => 'nullable|integer',
                'homepage_total_workers' => 'nullable|integer',
            ]);

            // Tangani gambar latar belakang
            if ($request->hasFile('homepage_background_image')) {
                $path = $request->file('homepage_background_image')->store('settings', 'public');
                $oldImage = Setting::where('key', 'homepage_background_image')->first();
                if ($oldImage && $oldImage->value) {
                    Storage::disk('public')->delete($oldImage->value);
                }
                $setting = Setting::firstOrCreate(['key' => 'homepage_background_image']);
                $setting->value = $path;
                $setting->save();
            }

            // Tangani slogan dan statistik secara eksplisit
            $slogan = Setting::firstOrCreate(['key' => 'homepage_slogan']);
            $slogan->value = $request->homepage_slogan;
            $slogan->save();

            $clients = Setting::firstOrCreate(['key' => 'homepage_total_clients']);
            $clients->value = $request->homepage_total_clients;
            $clients->save();

            $projects = Setting::firstOrCreate(['key' => 'homepage_total_projects']);
            $projects->value = $request->homepage_total_projects;
            $projects->save();

            $support_hours = Setting::firstOrCreate(['key' => 'homepage_support_hours']);
            $support_hours->value = $request->homepage_support_hours;
            $support_hours->save();

            $workers = Setting::firstOrCreate(['key' => 'homepage_total_workers']);
            $workers->value = $request->homepage_total_workers;
            $workers->save();

            return back()->with('success', 'Pengaturan homepage berhasil diperbarui!');
            
        } catch (Throwable $e) {
            \Log::error('Gagal memperbarui pengaturan homepage: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal memperbarui pengaturan. Silakan coba lagi. Error: ' . $e->getMessage());
        }
    }
}