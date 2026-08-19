<label for="youtube_url">Link ou ID do YouTube</label>
<input type="text" id="youtube_url" name="youtube_url" value="{{ old('youtube_url', $video->youtube_id ?? '') }}" placeholder="https://www.youtube.com/watch?v=..." required>
<p class="hint">Aceita a URL completa do vídeo, um link curto (youtu.be/...) ou apenas o ID de 11 caracteres. O título é obtido automaticamente do YouTube.</p>

@if (!empty($video?->youtube_id))
  <p>
    <img src="https://i.ytimg.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt="" style="max-width:240px;display:block;margin:8px 0;border-radius:8px;"
      onerror="this.onerror=null; this.src='https://i.ytimg.com/vi/{{ $video->youtube_id }}/mqdefault.jpg'; this.onerror=function(){this.onerror=null; this.src='https://i.ytimg.com/vi/{{ $video->youtube_id }}/default.jpg';};">
  </p>
@endif

<label for="published_at">Publicado em</label>
<input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', isset($video) ? $video->published_at?->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
