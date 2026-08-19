@extends('admin.layout')

@section('title', 'Vídeos')

@section('content')
  <div class="toolbar">
    <h1 style="margin:0;">Vídeos</h1>
    <a href="{{ route('admin.videos.create') }}" class="btn">Novo vídeo</a>
  </div>

  <div class="card">
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Título</th>
          <th>Publicado</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($videos as $video)
          <tr>
            <td>
              <img class="thumb" src="https://i.ytimg.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt=""
                onerror="this.onerror=null; this.src='https://i.ytimg.com/vi/{{ $video->youtube_id }}/mqdefault.jpg'; this.onerror=function(){this.onerror=null; this.src='https://i.ytimg.com/vi/{{ $video->youtube_id }}/default.jpg';};">
            </td>
            <td>{{ $video->title }}</td>
            <td>{{ $video->published_at?->format('d/m/Y H:i') }}</td>
            <td>
              <div class="row-actions">
                <a href="{{ route('admin.videos.edit', $video) }}">Editar</a>
                <form method="POST" action="{{ route('admin.videos.destroy', $video) }}" onsubmit="return confirm('Remover este vídeo?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="empty">Nenhum vídeo ainda.</td></tr>
        @endforelse
      </tbody>
    </table>
    <div class="pagination">{{ $videos->links() }}</div>
  </div>
@endsection
