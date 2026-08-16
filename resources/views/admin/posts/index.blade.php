@extends('admin.layout')

@section('title', 'Publicações')

@section('content')
  <div class="toolbar">
    <h1 style="margin:0;">Publicações</h1>
    <a href="{{ route('admin.posts.create') }}" class="btn">Nova publicação</a>
  </div>

  <div class="card">
    <table>
      <thead>
        <tr>
          <th>Título</th>
          <th>Categoria</th>
          <th>Publicado</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($posts as $post)
          <tr>
            <td>{{ $post->lead }}</td>
            <td>{{ $post->role }}</td>
            <td>{{ $post->published_at?->format('d/m/Y H:i') }}</td>
            <td>
              <div class="row-actions">
                <a href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Remover esta publicação?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="4">Nenhuma publicação ainda.</td></tr>
        @endforelse
      </tbody>
    </table>
    <div class="pagination">{{ $posts->links() }}</div>
  </div>
@endsection
