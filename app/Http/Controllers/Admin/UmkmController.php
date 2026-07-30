<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with('categories')->get();
        return view('admin.umkms.index', compact('umkms'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.umkms.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'deskripsi' => 'nullable|string',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'jam_operasional' => 'nullable|string|max:255',
            'link_sosmed' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:aktif,nonaktif',
            'peta_embed' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('umkms', 'public');
        }

        $umkm = Umkm::create($validated);
        $umkm->categories()->sync($request->categories);

        return redirect()->route('admin.umkms.index')->with('success', 'UMKM berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $umkm = Umkm::with('categories')->findOrFail($id);
        return view('admin.umkms.show', compact('umkm'));
    }

    public function edit(string $id)
    {
        $umkm = Umkm::with('categories')->findOrFail($id);
        $categories = Category::all();
        return view('admin.umkms.edit', compact('umkm', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $umkm = Umkm::findOrFail($id);
        
        $validated = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'deskripsi' => 'nullable|string',
            'alamat' => 'required|string',
            'no_telepon' => 'nullable|string|max:20',
            'jam_operasional' => 'nullable|string|max:255',
            'link_sosmed' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:aktif,nonaktif',
            'peta_embed' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($umkm->foto && Storage::disk('public')->exists($umkm->foto)) {
                Storage::disk('public')->delete($umkm->foto);
            }
            $validated['foto'] = $request->file('foto')->store('umkms', 'public');
        }

        $umkm->update($validated);
        $umkm->categories()->sync($request->categories);

        return redirect()->route('admin.umkms.index')->with('success', 'UMKM berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $umkm = Umkm::findOrFail($id);
        if ($umkm->foto && Storage::disk('public')->exists($umkm->foto)) {
            Storage::disk('public')->delete($umkm->foto);
        }
        $umkm->delete();
        return redirect()->route('admin.umkms.index')->with('success', 'UMKM berhasil dihapus.');
    }
}
