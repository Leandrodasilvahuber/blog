<label for="name">Nome da empresa</label>
<input type="text" id="name" name="name" value="{{ old('name', $company->name ?? '') }}" required>

<label for="logo">Logo</label>
@if (!empty($company?->logo_url))
  <p><img src="{{ $company->logo_url }}" alt="" style="max-width:160px;display:block;margin-bottom:8px;border-radius:8px;"></p>
@endif
<input type="file" id="logo" name="logo" accept="image/*" @if (!isset($company)) required @endif>
