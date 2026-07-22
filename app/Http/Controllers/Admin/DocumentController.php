<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Documents;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
   // 1. Menampilkan halaman form UI upload
    public function create()
    {
        $documents = Documents::orderBy('created_at', 'desc')->get();

        return Inertia::render('Admin/Dokumen/Create', [
            'documents' => $documents
        ]);
    }

    // 2. Menyimpan data dokumen dan file fisik
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'category'  => 'nullable|string|max:100',
            'file'      => 'required|file|mimes:pdf|max:20480', // Wajib PDF, maks 20MB
            'is_active' => 'boolean',
        ]);

        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        
        // Membersihkan nama file dari spasi agar aman di URL/server
        $filename = time() . '_' . str_replace(' ', '_', $originalName);

        // Simpan file ke direktori privat yang aman (sesuai absolutePath model)
        $file->storeAs('private/dokumen_rahasia', $filename, 'local');

        // Buat slug otomatis yang unik dari judul dokumen
        $slug = Str::slug($request->title) . '-' . time();

        // Simpan ke database PostgreSQL menggunakan Model Documents
        Documents::create([
            'slug'      => $slug,
            'title'     => $request->title,
            'filename'  => $filename,
            'category'  => $request->category,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.dokumen.create')
            ->with('success', 'Dokumen berhasil diunggah dan diamankan ke server!');
    }
}
