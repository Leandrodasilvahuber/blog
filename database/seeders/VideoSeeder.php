<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'title' => 'Introdução ao desenvolvimento com IA',
                'youtube_id' => 'dQw4w9WgXcQ',
                'description' => 'Uma visão geral de como a inteligência artificial está mudando o desenvolvimento de software.',
                'published_at' => now()->subDay(),
            ],
            [
                'title' => 'Arquitetura de sistemas distribuídos na prática',
                'youtube_id' => 'jNQXAC9IVRw',
                'description' => 'Padrões e armadilhas comuns ao projetar sistemas distribuídos.',
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($videos as $video) {
            Video::create($video);
        }
    }
}
