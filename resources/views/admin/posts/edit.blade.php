@extends('admin.layout')

@section('title', 'Editar publicação')

@section('content')
  <h1>Editar publicação</h1>
  <div class="card">
    <form method="POST" action="{{ route('admin.posts.update', $post) }}">
      @csrf
      @method('PUT')
      @include('admin.posts._form')
      <div class="actions-bottom">
        <button type="submit" class="btn">Salvar</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
