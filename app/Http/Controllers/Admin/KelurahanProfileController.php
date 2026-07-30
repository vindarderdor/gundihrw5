<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelurahanProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelurahanProfileController extends Controller
{
    public function edit()
    {
        $profile = KelurahanProfile::first();
        
        if (!$profile) {
            $profile = new KelurahanProfile();
        }

        return view('admin.profile_kelurahan.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'alamat_kantor' => 'nullable|string',
            'kontak' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'peta_embed' => 'nullable|string',
        ]);

        $profile = KelurahanProfile::first();

        if (!$profile) {
            $profile = new KelurahanProfile();
        }

        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            if ($profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('kelurahan', 'public');
        }

        $profile->fill($data);
        $profile->save();

        return redirect()->route('admin.profile-kelurahan.edit')->with('success', 'Profil Kelurahan berhasil diperbarui.');
    }
}
