<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        
        if ($data['is_published']) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if ($request->hasFile('images')) {
            $gallery = [];
            foreach ($request->file('images') as $file) {
                $gallery[] = $file->store('news_gallery', 'public');
            }
            $data['images'] = $gallery;
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['is_published'] = $request->has('is_published');
        
        if ($data['is_published'] && !$news->published_at) {
            $data['published_at'] = now();
        } elseif (!$data['is_published']) {
            $data['published_at'] = null;
        }

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if ($request->has('delete_gallery') && $request->delete_gallery) {
            if ($news->images) {
                foreach ($news->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
            $data['images'] = null;
        } else {
            $data['images'] = $news->images;
        }

        if ($request->hasFile('images')) {
            $gallery = $data['images'] ?? [];
            foreach ($request->file('images') as $file) {
                $gallery[] = $file->store('news_gallery', 'public');
            }
            $data['images'] = $gallery;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        if ($news->images) {
            foreach ($news->images as $galImage) {
                Storage::disk('public')->delete($galImage);
            }
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus');
    }
}
