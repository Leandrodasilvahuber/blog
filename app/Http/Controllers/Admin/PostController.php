<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    private const ILLUSTRATIONS = ['brain', 'cloud', 'terminal', 'graph', 'branch', 'shield'];

    public function index(): View
    {
        $posts = Post::orderByDesc('published_at')->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    public function create(): View
    {
        return view('admin.posts.create', ['illustrations' => self::ILLUSTRATIONS]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        Post::create($data);

        return redirect()->route('admin.posts.index')->with('status', 'Publicação criada.');
    }

    public function edit(Post $post): View
    {
        return view('admin.posts.edit', ['post' => $post, 'illustrations' => self::ILLUSTRATIONS]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $this->validated($request);
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('status', 'Publicação atualizada.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Publicação removida.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'role' => ['required', 'string', 'max:255'],
            'illustration' => ['required', 'string', 'in:'.implode(',', self::ILLUSTRATIONS)],
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
