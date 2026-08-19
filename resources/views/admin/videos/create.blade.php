@extends('admin.layout')

@section('title', 'Novo vídeo')

@section('content')
  <h1>Novo vídeo</h1>
  <div class="card">
    <form method="POST" action="{{ route('admin.videos.store') }}">
      @csrf
      @include('admin.videos._form')
      <div class="actions-bottom">
        <button type="submit" class="btn">Publicar</button>
        <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
