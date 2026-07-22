<?php

use Inertia\Inertia;
use App\Models\Documents;
// use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;


// Landing page dengan components baru
Route::get('/', function () {
    return Inertia::render('Home');
});


// Demo page untuk lihat semua components
Route::get('/components-demo', function () {
    return Inertia::render('ComponentsDemo');
})->name('components.demo');

// Existing routes
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dokumen/standar-pendidikan', function () {
    return Inertia::render('DocumentViewer');
});

Route::get('/dokumen/standar-spmi', function () {
    return Inertia::render('FlipbookViewer');
});

Route::get('/dokumen', [DocumentController::class, 'index'])->name('dokumen.index');

// Ubah {document:slug} menjadi {documents:slug} (mengikuti huruf 's' pada model Documents)
Route::get('/dokumen/{documents:slug}', [DocumentController::class, 'show'])->name('dokumen.show');

Route::get('/api/secure-pdf/{filename}', function (string $filename) {
    $decoded = urldecode($filename);

    $document = \App\Models\Documents::where('filename', basename($decoded))
        ->where('is_active', true)
        ->first();

    if (!$document || !$document->fileExists()) {
        abort(404, 'File tidak ditemukan');
    }

    return response()->file($document->absolutePath());
})
    ->where('filename', '.*')
    ->name('secure.pdf')
    ->middleware(['signed', 'throttle:30,1']);
    

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =================================================================
// RUTE ADMIN CMS
// =================================================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Halaman UI Form Tambah Dokumen (URL: /admin/dokumen/create)
    Route::get('/dokumen/create', [AdminDocumentController::class, 'create'])->name('dokumen.create');
    
    // Proses simpan data dokumen ke database (URL: /admin/dokumen)
    Route::post('/dokumen', [AdminDocumentController::class, 'store'])->name('dokumen.store');

    // Nanti rute admin lainnya (edit, delete, daftar tabel) bisa ditaruh di dalam blok ini
});

require __DIR__ . '/auth.php';

