<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $fillable = ['slug', 'title', 'filename', 'category', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Pakai kolom 'slug' untuk route model binding, bukan 'id'.
     * Jadi URL-nya /dokumen/standar-spmi-24-29, bukan /dokumen/1
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Path absolut ke file PDF fisik di storage.
     */
    public function absolutePath(): string
    {
        return storage_path('app/private/private/dokumen_rahasia/' . $this->filename);
    }

    public function fileExists(): bool
    {
        return file_exists($this->absolutePath());
    }
}
