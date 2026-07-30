<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome()
    {
        $totalUmkm = \App\Models\Umkm::where('status', 'aktif')->count();
        $totalKategori = \App\Models\Category::count();
        $featuredUmkms = \App\Models\Umkm::with('categories')->where('status', 'aktif')->inRandomOrder()->take(3)->get();
        
        return view('welcome', compact('totalUmkm', 'totalKategori', 'featuredUmkms'));
    }

    public function index(Request $request)
    {
        $query = \App\Models\Umkm::with('categories')->where('status', 'aktif');
        
        if ($request->has('category') && !empty($request->category)) {
            $categories = (array) $request->category;
            $query->whereHas('categories', function($q) use ($categories) {
                $q->whereIn('categories.id', $categories);
            });
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_usaha', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }

        $umkms = $query->latest()->paginate(9);
        $categories = \App\Models\Category::all();

        return view('public.umkms.index', compact('umkms', 'categories'));
    }

    public function show($id)
    {
        $umkm = \App\Models\Umkm::with('categories')->where('status', 'aktif')->findOrFail($id);
        return view('public.umkms.show', compact('umkm'));
    }

    public function about()
    {
        $profile = \App\Models\KelurahanProfile::first();
        $umkms = \App\Models\Umkm::with('categories')->where('status', 'aktif')->get();
        $categories = \App\Models\Category::all();
        
        return view('public.about', compact('profile', 'umkms', 'categories'));
    }

    public function kknProfile()
    {
        return view('public.kkn');
    }

    public function contact()
    {
        $profile = \App\Models\KelurahanProfile::first();
        return view('public.contact', compact('profile'));
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'isi_pesan' => 'required|string',
        ]);

        \App\Models\Message::create([
            'nama_pengirim' => $request->nama_pengirim,
            'email' => $request->email,
            'isi_pesan' => $request->isi_pesan,
            'status_dibaca' => false,
        ]);

        return back()->with('success', 'Pesan Anda berhasil dikirim. Terima kasih!');
    }
}
