<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Concerns\ValidatesPostData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use ValidatesPostData;

    public function store(Request $request): JsonResponse
    {
        $post = Post::create($this->validatedPostData($request));

        return response()->json($post, Response::HTTP_CREATED);
    }

    /**
     * Substitui só a capa de um post já publicado (usado pelo orquestrador pra atualizar posts
     * antigos pro padrão visual atual, sem duplicar o post nem mexer no resto do conteúdo).
     */
    public function updateCover(Request $request, Post $post): JsonResponse
    {
        $data = $this->validatedCoverImageData($request);
        $capaAnterior = $post->cover_image_path;

        $post->update($data);

        if ($capaAnterior && $capaAnterior !== $post->cover_image_path) {
            Storage::disk('public')->delete($capaAnterior);
        }

        return response()->json($post);
    }

    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
