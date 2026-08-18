<label for="lead">Título</label>
<input type="text" id="lead" name="lead" value="{{ old('lead', $post->lead ?? '') }}" required>

<label for="role">Categoria</label>
<input type="text" id="role" name="role" value="{{ old('role', $post->role ?? '') }}" placeholder="Ex: Backend · IA" required>

<label for="illustration">Ilustração</label>
<select id="illustration" name="illustration" required>
  @foreach ($illustrations as $illustration)
    <option value="{{ $illustration }}" @selected(old('illustration', $post->illustration ?? '') === $illustration)>{{ $illustration }}</option>
  @endforeach
</select>

<label for="cover_image">Imagem de capa (opcional, sobrepõe a ilustração acima)</label>
@if (!empty($post?->cover_image_url))
  <p><img src="{{ $post->cover_image_url }}" alt="" style="max-width:240px;display:block;margin-bottom:8px;border-radius:8px;"></p>
@endif
<input type="file" id="cover_image" name="cover_image" accept="image/*">

<label for="source_url">Link da notícia original (opcional)</label>
<input type="url" id="source_url" name="source_url" value="{{ old('source_url', $post->source_url ?? '') }}" placeholder="https://...">

<label for="body">Conteúdo</label>
<textarea id="body" name="body" required>{{ old('body', $post->body ?? '') }}</textarea>

<label for="tags">Tags (separadas por vírgula)</label>
<input type="text" id="tags" name="tags" value="{{ old('tags', isset($post) ? implode(', ', $post->tags ?? []) : '') }}" placeholder="#IA, #Arquitetura">

<div class="grid-2">
  <div>
    <label for="likes">Curtidas</label>
    <input type="number" id="likes" name="likes" min="0" value="{{ old('likes', $post->likes ?? 0) }}">
  </div>
  <div>
    <label for="comments">Comentários</label>
    <input type="number" id="comments" name="comments" min="0" value="{{ old('comments', $post->comments ?? 0) }}">
  </div>
</div>

<label for="reposts">Reposts</label>
<input type="number" id="reposts" name="reposts" min="0" value="{{ old('reposts', $post->reposts ?? 0) }}">

<label for="top_reactor">Principal reagente</label>
<input type="text" id="top_reactor" name="top_reactor" value="{{ old('top_reactor', $post->top_reactor ?? '') }}">

<div class="grid-2">
  <div>
    <label for="comment_name">Nome do comentarista</label>
    <input type="text" id="comment_name" name="comment_name" value="{{ old('comment_name', $post->comment_name ?? '') }}">
  </div>
  <div>
    <label for="comment_role">Cargo do comentarista</label>
    <input type="text" id="comment_role" name="comment_role" value="{{ old('comment_role', $post->comment_role ?? '') }}">
  </div>
</div>

<label for="comment_text">Comentário em destaque</label>
<textarea id="comment_text" name="comment_text">{{ old('comment_text', $post->comment_text ?? '') }}</textarea>

<label for="published_at">Publicado em</label>
<input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', isset($post) ? $post->published_at?->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
