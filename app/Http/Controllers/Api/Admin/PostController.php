<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Concerns\ValidatesPostData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    use ValidatesPostData;

    public function store(Request $request): JsonResponse
    {
        $post = Post::create($this->validatedPostData($request));

        return response()->json($post, Response::HTTP_CREATED);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
