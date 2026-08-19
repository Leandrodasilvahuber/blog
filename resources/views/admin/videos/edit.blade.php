@extends('admin.layout')

@section('title', 'Editar vídeo')

@section('content')
  <h1>Editar vídeo</h1>
  <div class="card">
    <form method="POST" action="{{ route('admin.videos.update', $video) }}">
      @csrf
      @method('PUT')
      @include('admin.videos._form')
      <div class="actions-bottom">
        <button type="submit" class="btn">Salvar</button>
        <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
