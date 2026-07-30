<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
