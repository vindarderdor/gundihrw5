<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::where('is_published', true)->latest('published_at')->paginate(9);
        return view('public.news.index', compact('news'));
    }

    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        $relatedNews = News::where('is_published', true)
                           ->where('id', '!=', $newsItem->id)
                           ->latest('published_at')
                           ->take(3)
                           ->get();

        return view('public.news.show', compact('newsItem', 'relatedNews'));
    }
}
