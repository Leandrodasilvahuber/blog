<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\VideoFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $time_label
 * @property-read string $thumbnail_url
 * @property-read string $embed_url
 * @property-read string $watch_url
 */
class Video extends Model
{
    /** @use HasFactory<VideoFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'youtube_id',
        'description',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * @return Attribute<string, never>
     */
    protected function timeLabel(): Attribute
    {
        return Attribute::get(fn () => $this->published_at->diffForHumans());
    }

    /**
     * @return Attribute<non-falsy-string, never>
     */
    protected function thumbnailUrl(): Attribute
    {
        return Attribute::get(fn () => "https://i.ytimg.com/vi/{$this->youtube_id}/hqdefault.jpg");
    }

    /**
     * @return Attribute<non-falsy-string, never>
     */
    protected function embedUrl(): Attribute
    {
        return Attribute::get(fn () => "https://www.youtube.com/embed/{$this->youtube_id}");
    }

    /**
     * @return Attribute<non-falsy-string, never>
     */
    protected function watchUrl(): Attribute
    {
        return Attribute::get(fn () => "https://www.youtube.com/watch?v={$this->youtube_id}");
    }
}
