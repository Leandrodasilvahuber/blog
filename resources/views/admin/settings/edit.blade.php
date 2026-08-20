@extends('admin.layout')

@section('title', 'Configurações')

@section('content')
  <h1>Configurações</h1>

  <div class="card" style="margin-bottom:20px;">
    <h2 style="font-size:15px;margin:0 0 14px;">Currículo (PDF)</h2>
    @if ($resumeUrl)
      <p class="hint" style="margin-bottom:10px;">
        Arquivo atual: <a href="{{ $resumeUrl }}" target="_blank" rel="noopener">ver PDF</a>
      </p>
    @else
      <p class="hint" style="margin-bottom:10px;">Nenhum currículo cadastrado ainda.</p>
    @endif
    <form method="POST" action="{{ route('admin.settings.resume') }}" enctype="multipart/form-data">
      @csrf
      <label for="resume_pdf">Enviar novo PDF</label>
      <input type="file" id="resume_pdf" name="resume_pdf" accept="application/pdf" required>
      <div class="actions-bottom">
        <button type="submit" class="btn">Salvar</button>
      </div>
    </form>
  </div>

  <div class="card">
    <div class="toolbar">
      <h2 style="font-size:15px;margin:0;">Empresas</h2>
      <a href="{{ route('admin.companies.create') }}" class="btn">Nova empresa</a>
    </div>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Nome</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse ($companies as $company)
          <tr>
            <td><img class="thumb" src="{{ $company->logo_url }}" alt=""></td>
            <td>{{ $company->name }}</td>
            <td>
              <div class="row-actions">
                <a href="{{ route('admin.companies.edit', $company) }}">Editar</a>
                <form method="POST" action="{{ route('admin.companies.destroy', $company) }}" onsubmit="return confirm('Remover esta empresa?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Excluir</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr><td colspan="3" class="empty">Nenhuma empresa cadastrada ainda.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
