<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * @property-read string $time_label
 * @property-read string|null $cover_image_url
 */
class Post extends Model
{
    protected $fillable = [
        'role',
        'illustration',
        'cover_image_path',
        'lead',
        'body',
        'tags',
        'likes',
        'comments',
        'reposts',
        'top_reactor',
        'comment_name',
        'comment_role',
        'comment_text',
        'published_at',
    ];

    protected $casts = [
        'tags' => 'array',
        'likes' => 'integer',
        'comments' => 'integer',
        'reposts' => 'integer',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::deleting(function (Post $post): void {
            if ($post->cover_image_path) {
                Storage::disk('public')->delete($post->cover_image_path);
            }
        });
    }

    /**
     * @return Attribute<string, never>
     */
    protected function timeLabel(): Attribute
    {
        return Attribute::get(fn () => $this->published_at->diffForHumans());
    }

    /**
     * @return Attribute<string|null, never>
     */
    protected function coverImageUrl(): Attribute
    {
        return Attribute::get(fn () => $this->cover_image_path
            ? Storage::disk('public')->url($this->cover_image_path)
            : null);
    }
}
