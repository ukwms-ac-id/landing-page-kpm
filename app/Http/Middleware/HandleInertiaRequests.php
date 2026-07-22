<?php

namespace App\Http\Middleware;


use Throwable;
use Inertia\Middleware;

use App\Models\Documents;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'navDocuments' => $this->getNavDocuments(),
        ]);
    }

      private function getNavDocuments(): array
    {
        try {
            return Cache::remember('nav-documents', now()->addMinutes(5), function () {
                return Documents::where('is_active', true)
                    ->orderBy('title')
                    ->get(['slug', 'title', 'category'])
                    ->toArray();
            });
        } catch (Throwable $e) {
            Log::error('Gagal memuat navDocuments untuk dropdown navbar', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
            ]);
 
            return [];
        }
    }
}
