@extends('admin.layout')

@section('title', 'Login')

@section('content')
  <h1>Entrar no painel</h1>
  <div class="card" style="max-width:380px; margin:0 auto;">
    <form method="POST" action="{{ route('admin.login.attempt') }}">
      @csrf
      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

      <label for="password">Senha</label>
      <input type="password" id="password" name="password" required>

      <div class="actions-bottom">
        <button type="submit" class="btn">Entrar</button>
      </div>
    </form>
  </div>
@endsection
