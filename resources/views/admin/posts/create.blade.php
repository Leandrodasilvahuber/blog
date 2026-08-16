@extends('admin.layout')

@section('title', 'Nova publicação')

@section('content')
  <h1>Nova publicação</h1>
  <div class="card">
    <form method="POST" action="{{ route('admin.posts.store') }}">
      @csrf
      @include('admin.posts._form')
      <div class="actions-bottom">
        <button type="submit" class="btn">Publicar</button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
