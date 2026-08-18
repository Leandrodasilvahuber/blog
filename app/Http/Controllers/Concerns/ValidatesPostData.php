<?php

declare(strict_types=1);

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;

trait ValidatesPostData
{
    /**
     * @return array<string, mixed>
     */
    private function validatedPostData(Request $request): array
    {
        $illustrations = ['brain', 'cloud', 'terminal', 'graph', 'branch', 'shield'];

        $data = $request->validate([
            'role' => ['required', 'string', 'max:255'],
            'illustration' => ['required', 'string', 'in:'.implode(',', $illustrations)],
            'lead' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
            'likes' => ['nullable', 'integer', 'min:0'],
            'comments' => ['nullable', 'integer', 'min:0'],
            'reposts' => ['nullable', 'integer', 'min:0'],
            'top_reactor' => ['nullable', 'string', 'max:255'],
            'comment_name' => ['nullable', 'string', 'max:255'],
            'comment_role' => ['nullable', 'string', 'max:255'],
            'comment_text' => ['nullable', 'string'],
            'published_at' => ['nullable', 'date'],
        ]);

        $data['tags'] = collect(explode(',', (string) ($data['tags'] ?? '')))
            ->map(fn ($tag) => trim($tag))
            ->filter()
            ->map(fn ($tag) => str_starts_with($tag, '#') ? $tag : "#{$tag}")
            ->values()
            ->all();

        $data['published_at'] = $data['published_at'] ?? now();
        $data['likes'] ??= 0;
        $data['comments'] ??= 0;
        $data['reposts'] ??= 0;

        return $data;
    }
}
