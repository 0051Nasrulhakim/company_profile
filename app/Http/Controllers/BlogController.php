<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Menampilkan semua artikel blog
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog', compact('blogs'));
    }

    // Menambahkan artikel blog baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Blog::create($request->only('title', 'content'));

        return redirect()->back()->with('success', 'Artikel blog berhasil ditambahkan');
    }

    // Mengupdate artikel blog
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog->update($request->only('title', 'content'));

        return redirect()->back()->with('success', 'Artikel blog berhasil diperbarui');
    }

    // Menghapus artikel blog
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('success', 'Artikel blog berhasil dihapus');
    }
}
