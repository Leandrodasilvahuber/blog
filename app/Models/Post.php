<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read string $time_label
 */
class Post extends Model
{
    protected $fillable = [
        'role',
        'illustration',
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

    /**
     * @return Attribute<string, never>
     */
    protected function timeLabel(): Attribute
    {
        return Attribute::get(fn () => $this->published_at->diffForHumans());
    }
}
