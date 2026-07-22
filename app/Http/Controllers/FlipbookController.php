<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class FlipbookController extends Controller
{
     public function show()
    {
        $filename = 'STANDARSPMI24-29FINAL.pdf';

        $pdfUrl = URL::temporarySignedRoute(
            'secure.pdf',                 // nama route dari langkah 1
            now()->addMinutes(30),        // link otomatis kadaluarsa 30 menit
            ['filename' => $filename]
        );

        return Inertia::render('Flipbook/Show', [
            'pdfUrl' => $pdfUrl,
        ]);
    }
}
