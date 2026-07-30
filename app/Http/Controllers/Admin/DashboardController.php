<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Umkm;
use App\Models\Category;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $umkmCount = Umkm::count();
        $categoryCount = Category::count();
        $messageCount = Message::count();

        return view('admin.dashboard', compact('umkmCount', 'categoryCount', 'messageCount'));
    }
}
