<?php

declare(strict_types=1);

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'cover_image' => ['nullable', 'image', 'max:10240'],
            'cover_image_base64' => ['nullable', 'string'],
            'source_url' => ['nullable', 'url', 'max:1000'],
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

        $coverImagePath = $this->armazenarImagemCapa($request, $data['cover_image_base64'] ?? null);
        unset($data['cover_image'], $data['cover_image_base64']);
        if ($coverImagePath !== null) {
            $data['cover_image_path'] = $coverImagePath;
        }

        $data['tags'] = collect(explode(',', (string) ($data['tags'] ?? '')))
            ->map(fn ($tag) => trim($tag))
            ->filter()
            ->map(fn ($tag) => str_starts_with($tag, '#') ? $tag : "#{$tag}")
            ->values()
            ->all();

        $data['published_at'] ??= now();
        $data['likes'] ??= 0;
        $data['comments'] ??= 0;
        $data['reposts'] ??= 0;

        return $data;
    }

    private function armazenarImagemCapa(Request $request, ?string $base64): ?string
    {
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('covers', 'public');

            return $path === false ? null : $path;
        }

        if ($base64) {
            $conteudo = preg_replace('/^data:image\/\w+;base64,/', '', $base64) ?? $base64;
            $bytes = base64_decode($conteudo, true);
            if ($bytes === false) {
                return null;
            }

            $nome = 'covers/'.Str::uuid()->toString().'.png';
            Storage::disk('public')->put($nome, $bytes);

            return $nome;
        }

        return null;
    }
}
