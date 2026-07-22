<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

use App\Models\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;


class DocumentController extends Controller
{
     public function index(): Response
    {
        $documents = Documents::where('is_active', true)
            ->orderBy('title')
            ->get(['slug', 'title', 'category']);
 
        return Inertia::render('Dokumen/Index', [
            'documents' => $documents,
        ]);
    }
 
    public function show(Documents $documents): Response
    {
        abort_unless($documents->is_active, 404);
 
        if (! $documents->fileExists()) {
            \Log::warning('Dokumen aktif tapi file fisik tidak ditemukan', [
                'document_id'   => $documents->id,
                'slug'          => $documents->slug,
                'filename'      => $documents->filename,
                'expected_path' => $documents->absolutePath(),
            ]);
 
            abort(404, 'Dokumen sedang tidak tersedia');
        }
 
        $pdfUrl = URL::temporarySignedRoute(
            'secure.pdf',
            now()->addHours(2),
            ['filename' => $documents->filename]
        );
 
        // Sesuai lokasi file: resources/js/Pages/FlipbookViewer.vue
        return Inertia::render('FlipbookViewer', [
            'title'  => $documents->title,
            'pdfUrl' => $pdfUrl,
        ]);
    }
}
