<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\ValidatesPostData;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    use ValidatesPostData;

    public function index(): View
    {
        $posts = Post::orderByDesc('published_at')->paginate(15);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create(): View
    {
        return view('admin.posts.create', ['illustrations' => self::ILLUSTRATIONS]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedPostData($request);
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('status', 'Publicação criada.');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', ['post' => $post, 'illustrations' => self::ILLUSTRATIONS]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $this->validatedPostData($request);
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('status', 'Publicação atualizada.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Publicação removida.');
    }
}
