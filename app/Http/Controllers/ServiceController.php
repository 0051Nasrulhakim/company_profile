<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.service', compact('services'));
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string'
        ]);

        Service::create($request->only('title', 'description', 'icon'));

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string'
        ]);

        $service->update($request->only('title', 'description', 'icon'));

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Layanan berhasil dihapus');
    }

    // Tidak digunakan, tapi tetap disertakan jika dibutuhkan di masa depan:
    public function create() {}
    public function show(Service $service) {}
    public function edit(Service $service) {}
}

