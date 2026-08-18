<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::orderByDesc('published_at')->get()->map(fn (Post $post) => [
            'id' => $post->id,
            'role' => $post->role,
            'time' => $post->time_label,
            'illustration' => $post->illustration,
            'coverImageUrl' => $post->cover_image_url,
            'lead' => $post->lead,
            'body' => $post->body,
            'tags' => $post->tags ?? [],
            'likes' => $post->likes,
            'comments' => $post->comments,
            'reposts' => $post->reposts,
            'topReactor' => $post->top_reactor,
            'comment' => [
                'name' => $post->comment_name,
                'role' => $post->comment_role,
                'time' => $post->created_at?->diffForHumans(),
                'text' => $post->comment_text,
            ],
        ]);

        return response()->json($posts);
    }
}
