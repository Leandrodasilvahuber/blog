@extends('admin.layout')

@section('title', 'Nova empresa')

@section('content')
  <h1>Nova empresa</h1>
  <div class="card">
    <form method="POST" action="{{ route('admin.companies.store') }}" enctype="multipart/form-data">
      @csrf
      @include('admin.companies._form')
      <div class="actions-bottom">
        <button type="submit" class="btn">Salvar</button>
        <a href="{{ route('admin.settings.edit') }}" class="btn btn-secondary">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
