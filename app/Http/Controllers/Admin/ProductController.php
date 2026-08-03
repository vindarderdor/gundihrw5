<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Umkm;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function store(Request $request, Umkm $umkm)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['umkm_id'] = $umkm->id;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($product->foto) {
                Storage::disk('public')->delete($product->foto);
            }
            $data['foto'] = $request->file('foto')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->back()->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }
        $product->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }
}
