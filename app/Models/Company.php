<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property-read string $logo_url
 */
class Company extends Model
{
    protected $fillable = [
        'name',
        'logo_path',
    ];

    protected static function booted(): void
    {
        static::deleting(function (Company $company): void {
            if ($company->logo_path) {
                Storage::disk('public')->delete($company->logo_path);
            }
        });
    }

    /**
     * @return Attribute<string, never>
     */
    protected function logoUrl(): Attribute
    {
        return Attribute::get(fn () => Storage::disk('public')->url($this->logo_path));
    }
}
