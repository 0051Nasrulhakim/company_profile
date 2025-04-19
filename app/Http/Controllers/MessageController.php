<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     */
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.message', compact('messages'));
    }

    /**
     * Store a newly created message.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Message::create($request->only('name', 'email', 'message'));

        return redirect()->back()->with('success', 'Pesan berhasil dikirim.');
    }

    /**
     * Show the form for editing a specific message.
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Update a message (including replying to it).
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'reply' => 'nullable|string',
        ]);

        $message = Message::findOrFail($id);
        $message->reply = $request->reply;
        $message->save();

        return redirect()->route('messages.index')->with('success', 'Balasan berhasil disimpan.');
    }

    /**
     * Remove the specified message.
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
    }
}
