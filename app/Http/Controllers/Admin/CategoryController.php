<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        Category::create($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }



    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        $category = Category::findOrFail($id);
        $category->update($validated);
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
