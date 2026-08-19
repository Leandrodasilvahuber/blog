<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Concerns\ValidatesVideoData;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VideoController extends Controller
{
    use ValidatesVideoData;

    public function index(): View
    {
        $videos = Video::orderByDesc('published_at')->paginate(15);

        return view('admin.videos.index', ['videos' => $videos]);
    }

    public function create(): View
    {
        return view('admin.videos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Video::create($this->validatedVideoData($request));

        return redirect()->route('admin.videos.index')->with('status', 'Vídeo adicionado.');
    }

    public function edit(Video $video): View
    {
        return view('admin.videos.edit', ['video' => $video]);
    }

    public function update(Request $request, Video $video): RedirectResponse
    {
        $video->update($this->validatedVideoData($request));

        return redirect()->route('admin.videos.index')->with('status', 'Vídeo atualizado.');
    }

    public function destroy(Video $video): RedirectResponse
    {
        $video->delete();

        return redirect()->route('admin.videos.index')->with('status', 'Vídeo removido.');
    }
}
