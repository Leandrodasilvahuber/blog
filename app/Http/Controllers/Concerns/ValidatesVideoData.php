<?php

declare(strict_types=1);

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

trait ValidatesVideoData
{
    /**
     * @return array<string, mixed>
     */
    private function validatedVideoData(Request $request): array
    {
        $data = $request->validate([
            'youtube_url' => ['required', 'string', 'max:500'],
            'published_at' => ['nullable', 'date'],
        ]);

        $youtubeId = $this->extrairIdDoYoutube($data['youtube_url']);
        if ($youtubeId === null) {
            throw ValidationException::withMessages([
                'youtube_url' => 'Informe um link ou ID válido de um vídeo do YouTube.',
            ]);
        }

        unset($data['youtube_url']);
        $data['youtube_id'] = $youtubeId;
        $data['title'] = $this->buscarTituloDoYoutube($youtubeId);
        $data['published_at'] ??= now();

        return $data;
    }

    private function buscarTituloDoYoutube(string $youtubeId): string
    {
        try {
            $response = Http::timeout(4)->get('https://www.youtube.com/oembed', [
                'url' => "https://www.youtube.com/watch?v={$youtubeId}",
                'format' => 'json',
            ]);

            $title = $response->successful() ? $response->json('title') : null;
        } catch (\Throwable) {
            $title = null;
        }

        return is_string($title) && $title !== '' ? $title : "Vídeo {$youtubeId}";
    }

    private function extrairIdDoYoutube(string $value): ?string
    {
        $value = trim($value);

        if (preg_match('/^[\w-]{11}$/', $value) === 1) {
            return $value;
        }

        if (preg_match('#(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([\w-]{11})#', $value, $matches) === 1) {
            return $matches[1];
        }

        return null;
    }
}
