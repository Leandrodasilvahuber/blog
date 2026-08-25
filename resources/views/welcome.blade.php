<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Leandro Hüber — index.log</title>
<meta name="description" content="Redação jornalística orquestrada por IA — notícias sobre tecnologia com curadoria e revisão humana.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@500;600;700&family=JetBrains+Mono:wght@400;500;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  :root{
    --bg: #07070C;
    --card: #12121C;
    --card-2: #171725;
    --ink: #ECECF6;
    --ink-muted: #9B9BB6;
    --ink-faint: #55556F;
    --line: #22222E;
    --line-bright: #33334A;
    --cyan: #00F0FF;
    --cyan-soft: rgba(0,240,255,0.10);
    --cyan-dim: #0A8E99;
    --magenta: #FF2E9A;
    --magenta-soft: rgba(255,46,154,0.10);
    --purple: #9D4EFF;
    --purple-soft: rgba(157,78,255,0.12);
    --yellow: #F4FF52;
    --radius: 12px;
    --glow-cyan: 0 0 22px -4px rgba(0,240,255,.55);
    --glow-magenta: 0 0 22px -4px rgba(255,46,154,.55);
    --shadow-rest: 0 1px 0 rgba(0,240,255,0.03), 0 0 0 1px var(--line);
    --shadow-hover: 0 0 0 1px var(--cyan-dim), 0 14px 34px -14px rgba(0,240,255,0.28);
  }
  *{ box-sizing:border-box; }
  html{ scroll-behavior:smooth; }
  body{
    margin:0;
    overflow-x:hidden;
    background:
      repeating-linear-gradient(180deg, rgba(255,255,255,0.012) 0px, rgba(255,255,255,0.012) 1px, transparent 1px, transparent 3px),
      radial-gradient(1100px 520px at 15% -10%, rgba(157,78,255,0.16), transparent 60%),
      radial-gradient(900px 500px at 100% 0%, rgba(0,240,255,0.10), transparent 55%),
      var(--bg);
    color: var(--ink);
    font-family:'Inter', sans-serif;
    -webkit-font-smoothing:antialiased;
  }
  ::selection{ background: var(--magenta-soft); color: var(--magenta); }
  .display{ font-family:'Chakra Petch', sans-serif; }
  .mono{ font-family:'JetBrains Mono', monospace; }
  button{ font-family:'Inter', sans-serif; }
  a{ color:inherit; }

  /* ---------- logo mark ---------- */
  .logo-mark{ display:block; flex-shrink:0; filter: drop-shadow(0 0 10px rgba(0,240,255,.35)); }
  .logo-mark rect{ fill:url(#logoGrad); }

  /* ---------- top bar ---------- */
  .topbar{
    position:sticky; top:0; z-index:30;
    background: rgba(7,7,12,0.82);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--line);
  }
  .topbar-inner{
    max-width: 1360px; margin:0 auto; padding:13px 24px;
    display:flex; align-items:center; justify-content:space-between; gap:12px;
  }
  .brand{ display:flex; align-items:center; gap:10px; min-width:0; overflow:hidden; }
  .brand-name{ font-family:'Chakra Petch',sans-serif; font-size:15px; font-weight:700; letter-spacing:.02em; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
  .brand-sub{ font-size:11px; color: var(--cyan-dim); font-family:'JetBrains Mono',monospace; white-space:nowrap; }
  .brand-sub .caret{ display:inline-block; width:6px; height:11px; background:var(--cyan); margin-left:3px; vertical-align:-1px; animation: blink 1.1s steps(1) infinite; }
  @keyframes blink{ 50%{ opacity:0; } }
  .topbar-status{
    display:flex; align-items:center; gap:6px; flex-shrink:0;
    font-size:11px; color:var(--ink-faint); font-weight:600; font-family:'JetBrains Mono',monospace;
  }
  .topbar-status .dot{ width:6px; height:6px; border-radius:50%; background:var(--cyan); box-shadow:0 0 0 3px var(--cyan-soft), 0 0 10px var(--cyan); animation: pulse 1.8s ease-in-out infinite; flex-shrink:0; }
  @keyframes pulse{ 0%,100%{ opacity:1; } 50%{ opacity:.45; } }
  .topbar-status .status-text{ white-space:nowrap; }

  /* ---------- page grid (usa a largura toda) ---------- */
  .page{
    max-width:1360px; margin:0 auto;
    padding: 22px 24px 70px;
    display:grid;
    grid-template-columns: 272px minmax(0,1fr) 300px;
    gap:24px;
    align-items:start;
  }
  .sidebar-left, .sidebar-right{ position:sticky; top:78px; display:flex; flex-direction:column; gap:16px; }
  .main-col{ min-width:0; }

  /* ---------- cover / profile ---------- */
  .cover{
    position:relative;
    height:96px;
    border-radius: var(--radius) var(--radius) 0 0;
    overflow:hidden;
    background: linear-gradient(155deg,#0A0A16 0%,#160B26 45%,#0B1420 100%);
    border: 1px solid var(--line);
    border-bottom:none;
  }
  .cover svg{ position:absolute; inset:0; width:100%; height:100%; }

  .profile-card{
    background: var(--card);
    border: 1px solid var(--line);
    border-top:none;
    border-radius: 0 0 var(--radius) var(--radius);
    padding: 0 18px 18px;
  }
  .avatar-row{
    display:flex; align-items:flex-end; justify-content:space-between;
    margin-top:-38px; margin-bottom:10px;
  }
  .avatar-wrap{ position:relative; }

  /* ---------- avatar component (com fallback de iniciais) ---------- */
  .avatar-frame{
    position:relative; display:block; overflow:hidden; flex-shrink:0;
    background: var(--card-2);
    box-shadow: 0 0 0 1px var(--line-bright);
  }
  .avatar-frame img{ width:100%; height:100%; object-fit:cover; display:block; }
  .avatar-frame .avatar-fallback{
    position:absolute; inset:0; display:none; align-items:center; justify-content:center;
    font-family:'Chakra Petch',sans-serif; font-weight:700; letter-spacing:.02em;
  }
  .af-72{ width:72px; height:72px; border-radius:16px; }
  .af-72 .avatar-fallback{ font-size:22px; }
  .af-42{ width:42px; height:42px; border-radius:12px; }
  .af-42 .avatar-fallback{ font-size:15px; }
  .af-32{ width:32px; height:32px; border-radius:9px; }
  .af-32 .avatar-fallback{ font-size:12px; }
  .avatar-ring{
    background: var(--card);
    box-shadow: 0 0 0 3px var(--card), 0 0 0 5px var(--cyan), var(--glow-cyan);
  }

  .btn-follow{
    margin-bottom:6px;
    background: var(--cyan); color:#07070C; border:none;
    padding:8px 16px; border-radius:8px;
    font-size:13px; font-weight:700; cursor:pointer;
    display:flex; align-items:center; gap:6px;
    box-shadow: var(--glow-cyan);
    transition: filter .12s ease, transform .08s ease;
  }
  .btn-follow svg{ width:14px; height:14px; }
  .btn-follow:hover{ filter:brightness(1.12); }
  .btn-follow:active{ transform: scale(.96); }
  .btn-follow.is-following{ background:transparent; color:var(--cyan); box-shadow:none; border:1px solid var(--cyan); }

  .profile-name-row{ display:flex; align-items:center; gap:6px; flex-wrap:wrap; }
  .profile-name{ font-family:'Chakra Petch',sans-serif; font-size:19px; font-weight:700; letter-spacing:0.01em; margin:0; }
  .badge-verified{ width:16px; height:16px; flex-shrink:0; color:var(--cyan); filter: drop-shadow(0 0 4px rgba(0,240,255,.7)); }
  .profile-headline{ font-size:13px; color:var(--ink-muted); margin:6px 0 12px; line-height:1.55; }
  .profile-meta{ display:flex; flex-direction:column; gap:9px; font-size:12px; color:var(--ink-faint); font-family:'JetBrains Mono',monospace; min-width:0; }
  .profile-meta span{ display:flex; align-items:center; gap:6px; min-width:0; }
  .profile-meta svg{ width:13px; height:13px; flex-shrink:0; }
  .profile-meta a{ display:block; min-width:0; color:var(--ink-faint); text-decoration:none; border-bottom:1px dotted var(--ink-faint); overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
  .profile-meta a:hover{ color:var(--cyan); border-color:var(--cyan); }
  .profile-stats{
    display:flex; gap:14px; margin-top:14px; padding-top:14px;
    border-top:1px solid var(--line);
  }
  .profile-stats b{ font-size:14px; color:var(--cyan); font-family:'JetBrains Mono',monospace; }
  .profile-stats span{ display:block; font-size:10.5px; color:var(--ink-faint); }

  /* ---------- sidebar widgets ---------- */
  .widget{
    background:var(--card); border:1px solid var(--line); border-radius:var(--radius);
    padding:16px 18px;
  }
  .widget-title{
    font-family:'JetBrains Mono',monospace; font-size:11px; text-transform:uppercase;
    letter-spacing:.1em; color:var(--ink-faint); margin:0 0 12px;
    display:flex; align-items:center; gap:8px;
  }
  .widget-title::after{ content:""; flex:1; height:1px; background:linear-gradient(90deg, var(--line), transparent); }
  .widget p{ font-size:13px; line-height:1.6; color:var(--ink-muted); margin:0; }
  .tag-list{ display:flex; flex-wrap:wrap; gap:7px; }
  .tag-list span{
    font-family:'JetBrains Mono',monospace; font-size:11px; font-weight:600;
    color:var(--cyan); background:var(--cyan-soft); border:1px solid var(--line-bright);
    border-radius:999px; padding:5px 11px;
  }
  .company-logos{ display:flex; flex-wrap:wrap; gap:10px; }
  .company-logos img{
    width:40px; height:40px; object-fit:contain; border-radius:8px;
    border:1px solid var(--line-bright); background:var(--card-2); padding:4px;
  }
  .nav-links{ display:flex; flex-direction:column; }
  .nav-links a{
    display:flex; align-items:center; gap:10px; text-decoration:none; color:var(--ink-muted);
    font-size:13px; font-weight:600; padding:9px 8px; border-radius:8px; transition: background .12s ease, color .12s ease;
  }
  .nav-links a:hover{ background:var(--cyan-soft); color:var(--cyan); }
  .nav-links svg{ width:16px; height:16px; flex-shrink:0; }
  .link-card{
    display:flex; align-items:center; gap:10px; text-decoration:none;
    color:var(--ink); font-size:13px; font-weight:600;
    border:1px solid var(--line-bright); border-radius:10px; padding:10px 12px;
    transition: border-color .12s ease, background .12s ease;
  }
  .link-card:hover{ border-color:var(--cyan-dim); background:var(--cyan-soft); }
  .link-card svg{ width:17px; height:17px; flex-shrink:0; color:var(--cyan); }

  .feed-heading{
    max-width:700px; margin: 0 auto 12px;
    display:flex; align-items:baseline; gap:8px;
    font-size:11.5px; color:var(--ink-faint); text-transform:uppercase; letter-spacing:.12em; font-family:'JetBrains Mono',monospace;
  }
  .feed-heading::after{ content:""; flex:1; height:1px; background:linear-gradient(90deg, var(--line), transparent); }

  /* ---------- feed ---------- */
  .feed{ max-width:700px; margin:0 auto; display:flex; flex-direction:column; gap:16px; }

  .post{
    background:var(--card);
    border:1px solid var(--line);
    border-radius: var(--radius);
    overflow:hidden;
    box-shadow: var(--shadow-rest);
    transition: box-shadow .18s ease, transform .18s ease, border-color .18s ease;
  }
  .post:hover{ box-shadow: var(--shadow-hover); transform: translateY(-1px); border-color: var(--cyan-dim); }

  .post-head{
    display:flex; align-items:flex-start; gap:10px;
    padding:14px 10px 10px 16px;
  }

  .post-who{ min-width:0; flex:1; }
  .post-name-line{ display:flex; align-items:center; gap:5px; }
  .post-name{ font-size:14px; font-weight:700; line-height:1.3; }
  .post-degree{ font-size:11.5px; color:var(--ink-faint); font-family:'JetBrains Mono',monospace; }
  .post-role{ font-size:12px; color:var(--ink-muted); line-height:1.35; }
  .post-time{
    font-size:11px; color:var(--ink-faint); font-family:'JetBrains Mono',monospace;
    display:flex; align-items:center; gap:4px; margin-top:2px;
  }
  .post-time svg{ width:11px; height:11px; }

  .post-more{
    width:32px; height:32px; border-radius:50%; flex-shrink:0;
    background:none; border:none; cursor:pointer; color:var(--ink-faint);
    display:flex; align-items:center; justify-content:center;
    position:relative;
  }
  .post-more:hover{ background:var(--card-2); color:var(--cyan); }
  .post-more svg{ width:18px; height:18px; }
  .more-menu{
    position:absolute; top:36px; right:0; z-index:20;
    background:var(--card-2); border:1px solid var(--line-bright); border-radius:10px;
    box-shadow: var(--shadow-hover);
    width:190px; padding:6px; display:none; text-align:left;
  }
  .more-menu.open{ display:block; }
  .more-menu button{
    width:100%; text-align:left; background:none; border:none; cursor:pointer;
    padding:8px 10px; border-radius:7px; font-size:12.5px; font-weight:600; color:var(--ink);
    display:flex; align-items:center; gap:8px;
  }
  .more-menu button:hover{ background:var(--cyan-soft); color:var(--cyan); }
  .more-menu svg{ width:14px; height:14px; }

  .post-text{
    padding: 2px 16px 4px;
    font-size:14px; line-height:1.6; color:var(--ink);
  }
  .post-text .lead{ font-weight:600; display:block; margin-bottom:4px; font-family:'Chakra Petch',sans-serif; letter-spacing:.01em; }
  .post-body{
    display:-webkit-box; -webkit-box-orient:vertical; -webkit-line-clamp:3; overflow:hidden;
    color:var(--ink-muted);
  }
  .post-body.expanded{ display:block; -webkit-line-clamp:unset; }
  .hashtag{ color:var(--cyan); font-weight:600; font-family:'JetBrains Mono',monospace; font-size:13px; }
  .see-more{
    background:none; border:none; padding:4px 0 10px; margin-top:-2px;
    color:var(--ink-faint); font-weight:700; font-size:13px; cursor:pointer; display:block;
  }
  .see-more:hover{ color:var(--cyan); }

  .illustration{
    background:
      linear-gradient(rgba(0,240,255,0.05) 1px, transparent 1px) 0 0/100% 20px,
      linear-gradient(90deg, rgba(0,240,255,0.05) 1px, transparent 1px) 0 0/20px 100%,
      var(--card-2);
    border-top:1px solid var(--line);
    border-bottom:1px solid var(--line);
    aspect-ratio: 16/9;
    display:flex; align-items:center; justify-content:center;
    overflow:hidden;
  }
  .illustration svg{ width:78%; height:78%; filter: drop-shadow(0 0 8px rgba(0,240,255,0.25)); }
  .illustration img{ width:100%; height:100%; object-fit:cover; }

  .post-source{
    padding:14px 16px; border-bottom:1px solid var(--line);
    display:flex; justify-content:center;
  }
  .post-source a{
    display:inline-flex; align-items:center; gap:8px;
    background: var(--cyan); color:#07070C; text-decoration:none;
    padding:10px 22px; border-radius:8px;
    font-size:15px; font-weight:700;
    box-shadow: var(--glow-cyan);
    transition: filter .12s ease, transform .08s ease;
  }
  .post-source a:hover{ filter:brightness(1.12); }
  .post-source a:active{ transform: scale(.96); }

  .engagement{
    display:flex; align-items:center; justify-content:space-between; gap:6px;
    padding: 10px 16px 8px;
    font-size:12.5px; color:var(--ink-faint);
  }
  .engagement-left{ display:flex; align-items:center; gap:6px; min-width:0; }
  .reaction-icons{ display:flex; flex-shrink:0; }
  .reaction-icons span{
    width:18px; height:18px; border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    border:2px solid var(--card);
    margin-left:-5px;
    font-size:10px; background:var(--card);
  }
  .reaction-icons span:first-child{ margin-left:0; }
  .engagement-left .count-text{ white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
  .engagement-left .count-text b{ color:var(--ink-muted); font-weight:600; font-family:'JetBrains Mono',monospace; }
  .engagement-right{ display:flex; gap:8px; flex-shrink:0; white-space:nowrap; font-family:'JetBrains Mono',monospace; }
  .engagement-right span{ cursor:pointer; }
  .engagement-right span:hover{ text-decoration:underline; color:var(--cyan); }

  .actions{
    display:flex; border-top:1px solid var(--line); position:relative;
  }
  .actions .action-wrap{ flex:1; position:relative; }
  .actions button{
    width:100%; display:flex; align-items:center; justify-content:center; gap:7px;
    background:none; border:none; cursor:pointer;
    padding:10px 6px; font-size:12.5px; font-weight:600; color:var(--ink-muted);
    transition: background .12s ease, color .12s ease;
  }
  .actions button svg{ width:16px; height:16px; transition: transform .18s cubic-bezier(.34,1.56,.64,1); }
  .actions button:hover{ background:var(--cyan-soft); color:var(--cyan); }
  .actions button.active{ color:var(--cyan); }
  .actions button.active.reacted-love{ color:var(--magenta); }
  .actions button.active.reacted-amber{ color:var(--purple); }
  .actions button.pop svg{ transform: scale(1.35); }
  .actions button.reposted{ color:var(--purple); }

  /* reaction picker */
  .reaction-picker{
    position:absolute; bottom:44px; left:0; z-index:25;
    background:var(--card-2); border:1px solid var(--line-bright); border-radius:999px;
    box-shadow: var(--shadow-hover);
    padding:6px; display:flex; gap:2px;
    opacity:0; pointer-events:none; transform: translateY(6px) scale(.92);
    transition: opacity .14s ease, transform .14s ease;
  }
  .reaction-picker.show{ opacity:1; pointer-events:auto; transform: translateY(0) scale(1); }
  .reaction-picker button{
    width:36px; height:36px; padding:0; border-radius:50%; font-size:19px;
    display:flex; align-items:center; justify-content:center;
    transition: transform .1s ease;
  }
  .reaction-picker button:hover{ transform: translateY(-5px) scale(1.2); background:none; }

  /* comments */
  .comments{
    border-top:1px solid var(--line);
    padding: 12px 16px 14px;
    display:none;
  }
  .comments.open{ display:block; }
  .comment{ display:flex; gap:9px; margin-bottom:10px; }

  .comment-bubble{
    background:var(--card-2); border:1px solid var(--line); border-radius:12px; padding:8px 12px;
  }
  .comment-name{ font-size:12.5px; font-weight:700; }
  .comment-role{ font-size:10.5px; color:var(--ink-faint); font-weight:500; margin-left:2px; }
  .comment-text{ font-size:13px; color:var(--ink-muted); line-height:1.45; margin-top:1px; }
  .comment-meta{ display:flex; gap:12px; font-size:11px; color:var(--ink-faint); font-weight:600; margin:4px 0 0 12px; font-family:'JetBrains Mono',monospace; }
  .comment-meta span{ cursor:pointer; }
  .comment-meta span:hover{ color:var(--cyan); }
  .comment-compose{ display:flex; align-items:center; gap:9px; margin-top:4px; }
  .comment-field{
    flex:1; display:flex; align-items:center; gap:8px;
    background:var(--card-2); border:1px solid var(--line); border-radius:999px;
    padding:8px 8px 8px 14px;
  }
  .comment-field:focus-within{ border-color: var(--cyan-dim); }
  .comment-field input{
    flex:1; border:none; background:none; outline:none; font-size:13px; color:var(--ink); font-family:'Inter',sans-serif;
  }
  .comment-field input::placeholder{ color:var(--ink-faint); }
  .comment-field svg{ width:16px; height:16px; color:var(--ink-faint); cursor:pointer; flex-shrink:0; }

  .end{
    max-width:700px; margin:0 auto; padding: 6px 0 10px;
    text-align:center; font-size:12px; color:var(--ink-faint); font-family:'JetBrains Mono',monospace;
  }

  /* ---------- vídeos (renderizados como posts, com player embutido) ---------- */
  .videos-section{ scroll-margin-top:90px; }
  .illustration iframe{ width:100%; height:100%; display:block; border:0; }
  .video-empty{ color:var(--ink-faint); font-size:13px; text-align:center; padding:24px; }

  /* ---------- responsive breakpoints ---------- */
  @media (max-width:1120px){
    .page{ grid-template-columns: 248px minmax(0,1fr); }
    .sidebar-right{ display:none; }
  }
  @media (max-width:780px){
    .page{ grid-template-columns: 1fr; padding:16px 14px 60px; gap:16px; }
    .sidebar-left{ position:static; }
    .topbar-inner{ padding:12px 16px; }
  }
  @media (max-width:480px){
    .topbar-status .status-text{ display:none; }
    .actions button span{ display:none; }
  }
</style>
</head>
<body>

  <svg width="0" height="0" style="position:absolute">
    <defs>
      <linearGradient id="logoGrad" x1="0" y1="0" x2="1" y2="1">
        <stop offset="0%" stop-color="#00F0FF"/>
        <stop offset="100%" stop-color="#9D4EFF"/>
      </linearGradient>
    </defs>
  </svg>

  <header class="topbar">
    <div class="topbar-inner">
      <div class="brand">
        <svg class="logo-mark" width="30" height="30" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <rect width="100" height="100" rx="24"/>
          <path d="M16 32 L6 50 L16 68" stroke="#07070C" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".55"/>
          <path d="M84 32 L94 50 L84 68" stroke="#07070C" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".55"/>
          <text x="50" y="64" font-family="Chakra Petch, sans-serif" font-size="38" font-weight="700" fill="#07070C" text-anchor="middle">LH</text>
        </svg>
        <div>
          <div class="brand-name">Leandro Hüber</div>
          <div class="brand-sub">index.log<span class="caret"></span></div>
        </div>
      </div>
      <div class="topbar-status"><span class="dot"></span> <span class="status-text">disponível para novas oportunidades</span></div>
    </div>
  </header>

  <div class="page">

    <aside class="sidebar-left">
      <div>
        <div class="cover">
          <svg viewBox="0 0 600 96" preserveAspectRatio="xMidYMid slice">
            <defs>
              <radialGradient id="glowA" cx="18%" cy="20%" r="65%">
                <stop offset="0%" stop-color="#9D4EFF" stop-opacity="0.55"/>
                <stop offset="100%" stop-color="#9D4EFF" stop-opacity="0"/>
              </radialGradient>
              <radialGradient id="glowB" cx="88%" cy="85%" r="70%">
                <stop offset="0%" stop-color="#00F0FF" stop-opacity="0.45"/>
                <stop offset="100%" stop-color="#00F0FF" stop-opacity="0"/>
              </radialGradient>
              <linearGradient id="lineGrad" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="#00F0FF"/>
                <stop offset="55%" stop-color="#9D4EFF"/>
                <stop offset="100%" stop-color="#FF2E9A"/>
              </linearGradient>
            </defs>
            <rect width="600" height="96" fill="#0A0A16"/>
            <rect width="600" height="96" fill="url(#glowA)"/>
            <rect width="600" height="96" fill="url(#glowB)"/>
            <g stroke="rgba(255,255,255,0.05)" stroke-width="1">
              <line x1="0" y1="32" x2="600" y2="32"/><line x1="0" y1="64" x2="600" y2="64"/>
              <line x1="100" y1="0" x2="100" y2="96"/><line x1="200" y1="0" x2="200" y2="96"/>
              <line x1="300" y1="0" x2="300" y2="96"/><line x1="400" y1="0" x2="400" y2="96"/>
              <line x1="500" y1="0" x2="500" y2="96"/>
            </g>
            <path d="M0 70 L60 48 L120 74 L180 32 L240 62 L300 24 L360 54 L420 16 L480 44 L540 8 L600 34"
              fill="none" stroke="url(#lineGrad)" stroke-width="2" opacity="0.9"/>
          </svg>
        </div>
        <div class="profile-card">
          <div class="avatar-row">
            <div class="avatar-wrap">
              <span class="avatar-frame af-72 avatar-ring">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                  <rect width="100" height="100" fill="url(#logoGrad)"/>
                  <path d="M16 32 L6 50 L16 68" stroke="#07070C" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".55"/>
                  <path d="M84 32 L94 50 L84 68" stroke="#07070C" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".55"/>
                  <text x="50" y="64" font-family="Chakra Petch, sans-serif" font-size="38" font-weight="700" fill="#07070C" text-anchor="middle">LH</text>
                </svg>
              </span>
            </div>
            <button class="btn-follow" id="btnFollow">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
              <span>Seguir</span>
            </button>
          </div>
          <div class="profile-name-row">
            <p class="profile-name">Leandro Hüber</p>
            <svg class="badge-verified" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 14.6 4.2 18 4l1 3.3 3 1.7-1 3.4 1 3.4-3 1.7-1 3.3-3.4-.2L12 22l-2.6-2.4-3.4.2-1-3.3-3-1.7 1-3.4-1-3.4 3-1.7 1-3.3 3.4.2z"/><path d="M9 12.4l2 2 4-4.4" stroke="#07070C" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <p class="profile-headline">Redação jornalística orquestrada por IA — notícias redigidas por automação inteligente, com curadoria e revisão humana no processo.</p>
          <div class="profile-meta">
            <span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 1.5 5 1.5 5 1.5c-.3 1.15-.3 2.35 0 3.5A5.4 5.4 0 0 0 4 8.5c0 3.5 3 5.5 6 5.5a4.8 4.8 0 0 0-1 3.5v4"/></svg>
              <a href="https://github.com/Leandrodasilvahuber" target="_blank" rel="noopener">github.com/Leandrodasilvahuber</a>
            </span>
          </div>
          <div class="profile-stats">
            <div><b id="followerCount">1</b><span>seguidor</span></div>
            <div><b>0</b><span>seguindo</span></div>
            <div><b>1</b><span>repositório</span></div>
          </div>
        </div>
      </div>

      <nav class="widget nav-links">
        <a href="#feed">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
          Feed
        </a>
        <a href="#videos">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
          Vídeos
        </a>
        <a href="/adm">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
          Painel
        </a>
      </nav>
    </aside>

    <main class="main-col">
      <p class="feed-heading">últimas publicações</p>
      <div class="feed" id="feed"></div>
      <p class="end">você chegou ao fim do feed — volte em breve para novas publicações.</p>
    </main>

    <aside class="sidebar-right">
      <div class="widget">
        <p class="widget-title">sobre este espaço</p>
        <p>Um laboratório de redação orquestrada por IA: notícias de tecnologia processadas por automação, sempre com curadoria e revisão humana antes da publicação.</p>
      </div>
      <div class="widget">
        <p class="widget-title">stack &amp; tecnologias</p>
        <div class="tag-list">
          <span>PHP</span><span>Laravel</span><span>Vue.js</span><span>React</span><span>Node.js</span><span>TypeScript</span><span>Go</span><span>AWS</span><span>Docker</span><span>Kafka</span><span>Redis</span><span>IA</span><span>Automação</span>
        </div>
      </div>
      @if ($companies->isNotEmpty())
        <div class="widget">
          <p class="widget-title">empresas</p>
          <div class="company-logos">
            @foreach ($companies as $company)
              <img src="{{ $company->logo_url }}" alt="{{ $company->name }}" title="{{ $company->name }}">
            @endforeach
          </div>
        </div>
      @endif
      <a class="link-card" href="https://github.com/Leandrodasilvahuber" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 1.5 5 1.5 5 1.5c-.3 1.15-.3 2.35 0 3.5A5.4 5.4 0 0 0 4 8.5c0 3.5 3 5.5 6 5.5a4.8 4.8 0 0 0-1 3.5v4"/></svg>
        Ver repositórios no GitHub
      </a>
      @if ($resumeUrl)
        <a class="link-card" href="{{ $resumeUrl }}" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
          Ver currículo (PDF)
        </a>
      @endif
      <a class="link-card" href="https://www.youtube.com/@leandrohubernews" target="_blank" rel="noopener">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
        Meu canal no youtube
      </a>
      <section class="videos-section" id="videos">
        <p class="feed-heading">vídeos</p>
        <div class="feed" id="videoGrid"></div>
      </section>
    </aside>

  </div>

<script src="{{ asset('js/feed.js') }}?v={{ filemtime(public_path('js/feed.js')) }}"></script>
<script src="{{ asset('js/videos.js') }}?v={{ filemtime(public_path('js/videos.js')) }}"></script>
</body>
</html>
