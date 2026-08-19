<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    public function index(): JsonResponse
    {
        $videos = Video::orderByDesc('published_at')->paginate(20)->through(fn (Video $video) => [
            'id' => $video->id,
            'title' => $video->title,
            'description' => $video->description,
            'time' => $video->time_label,
            'youtubeId' => $video->youtube_id,
            'thumbnailUrl' => $video->thumbnail_url,
            'embedUrl' => $video->embed_url,
            'watchUrl' => $video->watch_url,
        ]);

        return response()->json($videos);
    }
}
