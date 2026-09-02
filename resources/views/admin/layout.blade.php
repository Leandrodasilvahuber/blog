<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Painel') · Admin</title>
  <style>
    :root{
      --bg:#07070C; --card:#12121C; --card-2:#181826; --line:#242438; --line-bright:#33334A;
      --ink:#F2F2F7; --ink-muted:#A0A0B8; --ink-faint:#6C6C86;
      --cyan:#00F0FF; --cyan-soft:rgba(0,240,255,0.10); --purple:#9D4EFF; --magenta:#FF2E9A; --red:#FF4D4D;
      --radius:12px;
      --glow-cyan: 0 0 22px -4px rgba(0,240,255,.5);
    }
    *{ box-sizing:border-box; }
    body{
      margin:0;
      background:
        radial-gradient(900px 420px at 12% -10%, rgba(157,78,255,0.13), transparent 60%),
        radial-gradient(700px 380px at 100% 0%, rgba(0,240,255,0.08), transparent 55%),
        var(--bg);
      color:var(--ink);
      font-family:'Inter',system-ui,sans-serif; min-height:100vh;
    }
    a{ color:var(--cyan); text-decoration:none; }
    .topbar{
      display:flex; align-items:center; justify-content:space-between;
      padding:14px 24px; border-bottom:1px solid var(--line);
      background:rgba(18,18,28,0.82); backdrop-filter:blur(10px);
      position:sticky; top:0; z-index:10;
    }
    .topbar .brand{ font-weight:700; letter-spacing:.02em; font-family:inherit; }
    .topbar .brand a{ color:var(--ink); }
    .topbar nav{ display:flex; gap:6px; align-items:center; font-size:13.5px; }
    .topbar nav a{
      color:var(--ink-muted); padding:7px 12px; border-radius:8px; font-weight:600;
      transition: background .12s ease, color .12s ease;
    }
    .topbar nav a:hover{ background:var(--cyan-soft); color:var(--cyan); }
    .topbar nav a.is-active{ color:var(--cyan); background:var(--cyan-soft); }
    .topbar form{ margin:0; }
    .topbar button{
      background:none; border:1px solid var(--line); color:var(--ink-muted);
      padding:7px 12px; border-radius:8px; cursor:pointer; font-size:13px; font-family:inherit;
      transition: border-color .12s ease, color .12s ease;
    }
    .topbar button:hover{ border-color:var(--red); color:var(--red); }
    .wrap{ max-width:900px; margin:0 auto; padding:28px 24px 60px; }
    h1{ font-size:20px; margin:0 0 18px; font-weight:700; letter-spacing:.01em; }
    .card{ background:var(--card); border:1px solid var(--line); border-radius:var(--radius); padding:18px 20px; box-shadow: 0 1px 0 rgba(0,240,255,0.03), 0 0 0 1px var(--line); }
    .status{
      background:rgba(0,240,255,.08); border:1px solid var(--cyan); color:var(--cyan);
      padding:10px 14px; border-radius:8px; font-size:13.5px; margin-bottom:16px;
    }
    .errors{
      background:rgba(255,77,77,.08); border:1px solid var(--red); color:var(--red);
      padding:10px 14px; border-radius:8px; font-size:13.5px; margin-bottom:16px;
    }
    .errors ul{ margin:0; padding-left:18px; }
    table{ width:100%; border-collapse:collapse; font-size:13.5px; }
    th, td{ text-align:left; padding:10px 8px; border-bottom:1px solid var(--line); vertical-align:top; }
    th{ color:var(--ink-faint); font-weight:600; text-transform:uppercase; font-size:11px; letter-spacing:.06em; }
    tbody tr{ transition: background .12s ease; }
    tbody tr:hover{ background:var(--card-2); }
    .thumb{ width:64px; height:36px; object-fit:cover; border-radius:6px; border:1px solid var(--line-bright); display:block; }
    .row-actions{ display:flex; gap:10px; }
    .row-actions button{
      background:none; border:none; color:var(--red); cursor:pointer; font-size:13px; padding:0; font-family:inherit;
    }
    .row-actions a:hover, .row-actions button:hover{ text-decoration:underline; }
    .btn{
      display:inline-block; background:var(--cyan); color:#07070C; font-weight:700;
      padding:9px 16px; border-radius:8px; border:none; cursor:pointer; font-size:13.5px;
      box-shadow: var(--glow-cyan); transition: filter .12s ease, transform .08s ease;
    }
    .btn:hover{ filter:brightness(1.12); }
    .btn:active{ transform: scale(.97); }
    .btn-secondary{ background:none; border:1px solid var(--line); color:var(--ink-muted); box-shadow:none; }
    .btn-secondary:hover{ filter:none; border-color:var(--line-bright); color:var(--ink); }
    .toolbar{ display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
    label{ display:block; font-size:12.5px; color:var(--ink-muted); margin:14px 0 5px; font-weight:600; }
    label:first-child{ margin-top:0; }
    input, textarea, select{
      width:100%; background:var(--card-2); border:1px solid var(--line); border-radius:8px;
      padding:10px 12px; color:var(--ink); font-size:13.5px; font-family:inherit;
      transition: border-color .12s ease, box-shadow .12s ease;
    }
    input:focus, textarea:focus, select:focus{
      outline:none; border-color:var(--cyan); box-shadow:0 0 0 3px var(--cyan-soft);
    }
    textarea{ resize:vertical; min-height:90px; }
    .hint{ font-size:12px; color:var(--ink-faint); margin:4px 0 0; }
    .grid-2{ display:grid; grid-template-columns:1fr 1fr; gap:0 16px; }
    .actions-bottom{ display:flex; gap:10px; margin-top:20px; }
    .pagination{ margin-top:16px; }
    .empty{ color:var(--ink-faint); }
  </style>
</head>
<body>
  @auth
  <div class="topbar">
    <span class="brand"><a href="{{ route('admin.posts.index') }}">Painel · Leandro Hüber</a></span>
    <nav>
      <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'is-active' : '' }}">Publicações</a>
      <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*', 'admin.companies.*') ? 'is-active' : '' }}">Configurações</a>
      <a href="/" target="_blank">Ver site</a>
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Sair</button>
      </form>
    </nav>
  </div>
  @endauth
  <div class="wrap">
    @if (session('status'))
      <div class="status">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
      <div class="errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @yield('content')
  </div>
</body>
</html>
