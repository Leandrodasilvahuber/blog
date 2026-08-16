<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Leandro Hüber — feed</title>
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

  /* ---------- top bar ---------- */
  .topbar{
    position:sticky; top:0; z-index:30;
    background: rgba(7,7,12,0.82);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--line);
  }
  .topbar-inner{
    max-width: 620px; margin:0 auto; padding:14px 18px;
    display:flex; align-items:center; justify-content:space-between;
  }
  .brand{ display:flex; align-items:center; gap:9px; }
  .brand-mark{
    width:27px; height:27px; border-radius:7px;
    background: linear-gradient(135deg, var(--cyan), var(--purple));
    display:flex; align-items:center; justify-content:center;
    color:#07070C; font-family:'Chakra Petch',sans-serif; font-weight:700; font-size:14px;
    box-shadow: var(--glow-cyan);
  }
  .brand-name{ font-family:'Chakra Petch',sans-serif; font-size:14.5px; font-weight:700; letter-spacing:.02em; }
  .brand-sub{ font-size:11px; color: var(--cyan-dim); font-family:'JetBrains Mono',monospace; }
  .brand-sub .caret{ display:inline-block; width:6px; height:11px; background:var(--cyan); margin-left:3px; vertical-align:-1px; animation: blink 1.1s steps(1) infinite; }
  @keyframes blink{ 50%{ opacity:0; } }
  .topbar-status{
    display:flex; align-items:center; gap:6px;
    font-size:11px; color:var(--ink-faint); font-weight:600; font-family:'JetBrains Mono',monospace;
  }
  .topbar-status .dot{ width:6px; height:6px; border-radius:50%; background:var(--cyan); box-shadow:0 0 0 3px var(--cyan-soft), 0 0 10px var(--cyan); animation: pulse 1.8s ease-in-out infinite; }
  @keyframes pulse{ 0%,100%{ opacity:1; } 50%{ opacity:.45; } }

  /* ---------- cover / profile ---------- */
  .cover-wrap{ max-width:620px; margin: 18px auto 0; padding: 0 18px; }
  .cover{
    position:relative;
    height:128px;
    border-radius: var(--radius) var(--radius) 0 0;
    overflow:hidden;
    background: linear-gradient(155deg,#0A0A16 0%,#160B26 45%,#0B1420 100%);
    border: 1px solid var(--line);
    border-bottom:none;
  }
  .cover svg{ position:absolute; inset:0; width:100%; height:100%; }
  .cover-edit{
    position:absolute; top:10px; right:10px;
    width:30px; height:30px; border-radius:50%;
    background:rgba(7,7,12,0.55); backdrop-filter:blur(2px);
    border:1px solid var(--line-bright);
    display:flex; align-items:center; justify-content:center;
    color:var(--cyan); cursor:pointer;
  }
  .cover-edit svg{ position:static; width:14px; height:14px; }

  .profile-card{
    background: var(--card);
    border: 1px solid var(--line);
    border-top:none;
    border-radius: 0 0 var(--radius) var(--radius);
    padding: 0 22px 20px;
  }
  .avatar-row{
    display:flex; align-items:flex-end; justify-content:space-between;
    margin-top:-42px; margin-bottom:10px;
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
  .af-84{ width:84px; height:84px; border-radius:18px; }
  .af-84 .avatar-fallback{ font-size:26px; }
  .af-42{ width:42px; height:42px; border-radius:12px; }
  .af-42 .avatar-fallback{ font-size:15px; }
  .af-32{ width:32px; height:32px; border-radius:9px; }
  .af-32 .avatar-fallback{ font-size:12px; }
  .avatar-ring{
    background: var(--card);
    box-shadow: 0 0 0 3px var(--card), 0 0 0 5px var(--cyan), var(--glow-cyan);
  }
  .avatar-edit{
    position:absolute; bottom:-2px; right:-2px;
    width:24px; height:24px; border-radius:50%;
    background:var(--card-2); border:1px solid var(--line-bright);
    display:flex; align-items:center; justify-content:center;
    cursor:pointer; color:var(--cyan);
  }
  .avatar-edit svg{ width:12px; height:12px; }
  .btn-follow{
    margin-bottom:6px;
    background: var(--cyan); color:#07070C; border:none;
    padding:8px 18px; border-radius:8px;
    font-size:13px; font-weight:700; cursor:pointer;
    display:flex; align-items:center; gap:6px;
    box-shadow: var(--glow-cyan);
    transition: filter .12s ease, transform .08s ease;
  }
  .btn-follow svg{ width:14px; height:14px; }
  .btn-follow:hover{ filter:brightness(1.12); }
  .btn-follow:active{ transform: scale(.96); }
  .btn-follow.is-following{ background:transparent; color:var(--cyan); box-shadow:none; border:1px solid var(--cyan); }

  .profile-name-row{ display:flex; align-items:center; gap:6px; }
  .profile-name{ font-family:'Chakra Petch',sans-serif; font-size:20px; font-weight:700; letter-spacing:0.01em; margin:0; }
  .badge-verified{ width:16px; height:16px; flex-shrink:0; color:var(--cyan); filter: drop-shadow(0 0 4px rgba(0,240,255,.7)); }
  .profile-degree{
    font-size:11.5px; color:var(--ink-faint); font-weight:600; font-family:'JetBrains Mono',monospace;
    border:1px solid var(--line-bright); border-radius:4px; padding:0 4px; line-height:15px;
  }
  .profile-headline{ font-size:13.5px; color:var(--ink-muted); margin:5px 0 10px; line-height:1.5; max-width:48ch; }
  .profile-meta{
    display:flex; flex-wrap:wrap; gap:14px;
    font-size:12px; color:var(--ink-faint); font-family:'JetBrains Mono',monospace;
  }
  .profile-meta span{ display:flex; align-items:center; gap:5px; }
  .profile-meta svg{ width:13px; height:13px; }
  .profile-meta a{ color:var(--ink-faint); text-decoration:none; border-bottom:1px dotted var(--ink-faint); }
  .profile-meta a:hover{ color:var(--cyan); border-color:var(--cyan); }
  .profile-stats{
    display:flex; gap:18px; margin-top:14px; padding-top:14px;
    border-top:1px solid var(--line);
  }
  .profile-stats b{ font-size:14px; color:var(--cyan); font-family:'JetBrains Mono',monospace; }
  .profile-stats span{ display:block; font-size:11px; color:var(--ink-faint); }

  /* ---------- composer ---------- */
  .composer{
    max-width:620px; margin: 16px auto 0; padding: 0 18px;
  }
  .composer-card{
    background:var(--card); border:1px solid var(--line);
    border-radius: var(--radius); padding:14px 16px;
  }
  .composer-top{ display:flex; align-items:center; gap:10px; }

  .composer-input{
    flex:1; text-align:left;
    background:var(--card-2); border:1px solid var(--line);
    border-radius:999px; padding:11px 16px;
    color:var(--ink-faint); font-size:14px; cursor:pointer;
    transition: border-color .12s ease;
  }
  .composer-input:hover{ border-color:var(--cyan-dim); }
  .composer-actions{
    display:flex; gap:4px; margin-top:12px; padding-top:10px;
    border-top:1px solid var(--line);
  }
  .composer-actions button{
    flex:1; display:flex; align-items:center; justify-content:center; gap:7px;
    background:none; border:none; cursor:pointer; border-radius:8px;
    padding:9px 6px; font-size:12.5px; font-weight:600; color:var(--ink-muted);
    transition: background .12s ease, color .12s ease;
  }
  .composer-actions button:hover{ background:var(--card-2); }
  .composer-actions svg{ width:17px; height:17px; }
  .c-media:hover{ color:var(--cyan); } .c-event:hover{ color:var(--purple); } .c-article:hover{ color:var(--magenta); }

  .feed-heading{
    max-width:620px; margin: 22px auto 4px; padding:0 18px;
    display:flex; align-items:baseline; gap:8px;
    font-size:11.5px; color:var(--ink-faint); text-transform:uppercase; letter-spacing:.12em; font-family:'JetBrains Mono',monospace;
  }
  .feed-heading::after{ content:""; flex:1; height:1px; background:linear-gradient(90deg, var(--line), transparent); }

  /* ---------- feed ---------- */
  .feed{ max-width:620px; margin:0 auto; padding: 10px 18px 70px; display:flex; flex-direction:column; gap:16px; }

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
    max-width:620px; margin:0 auto; padding: 6px 18px 60px;
    text-align:center; font-size:12px; color:var(--ink-faint); font-family:'JetBrains Mono',monospace;
  }

  @media (max-width:480px){
    .actions button span{ display:none; }
    .composer-actions button span{ display:none; }
  }
</style>
</head>
<body>

  <header class="topbar">
    <div class="topbar-inner">
      <div class="brand">
        <div class="brand-mark">L</div>
        <div>
          <div class="brand-name">index.log</div>
          <div class="brand-sub">tecnologia &amp; código<span class="caret"></span></div>
        </div>
      </div>
      <div class="topbar-status"><span class="dot"></span> disponível para novas oportunidades</div>
    </div>
  </header>

  <div class="cover-wrap">
    <div class="cover">
      <svg viewBox="0 0 600 128" preserveAspectRatio="xMidYMid slice">
        <defs>
          <radialGradient id="glowA" cx="18%" cy="20%" r="65%">
            <stop offset="0%" stop-color="#9D4EFF" stop-opacity="0.55"/>
            <stop offset="100%" stop-color="#9D4EFF" stop-opacity="0"/>
          </radialGradient>
          <radialGradient id="glowB" cx="88%" cy="85%" r="70%">
            <stop offset="0%" stop-color="#00F0FF" stop-opacity="0.45"/>
            <stop offset="100%" stop-color="#00F0FF" stop-opacity="0"/>
          </radialGradient>
          <radialGradient id="glowC" cx="60%" cy="0%" r="55%">
            <stop offset="0%" stop-color="#FF2E9A" stop-opacity="0.30"/>
            <stop offset="100%" stop-color="#FF2E9A" stop-opacity="0"/>
          </radialGradient>
          <linearGradient id="lineGrad" x1="0" y1="0" x2="1" y2="0">
            <stop offset="0%" stop-color="#00F0FF"/>
            <stop offset="55%" stop-color="#9D4EFF"/>
            <stop offset="100%" stop-color="#FF2E9A"/>
          </linearGradient>
        </defs>

        <rect width="600" height="128" fill="#0A0A16"/>
        <rect width="600" height="128" fill="url(#glowA)"/>
        <rect width="600" height="128" fill="url(#glowB)"/>
        <rect width="600" height="128" fill="url(#glowC)"/>

        <g stroke="rgba(255,255,255,0.05)" stroke-width="1">
          <line x1="0" y1="32" x2="600" y2="32"/><line x1="0" y1="64" x2="600" y2="64"/>
          <line x1="0" y1="96" x2="600" y2="96"/>
          <line x1="100" y1="0" x2="100" y2="128"/><line x1="200" y1="0" x2="200" y2="128"/>
          <line x1="300" y1="0" x2="300" y2="128"/><line x1="400" y1="0" x2="400" y2="128"/>
          <line x1="500" y1="0" x2="500" y2="128"/>
        </g>

        <g stroke="rgba(0,240,255,0.35)" stroke-width="1" fill="none">
          <path d="M40 100 L40 70 L110 70 L110 45"/>
          <path d="M160 20 L160 55 L230 55 L230 90 L280 90"/>
          <path d="M330 108 L330 60 L400 60"/>
          <path d="M450 25 L450 50 L520 50 L520 15 L570 15"/>
        </g>
        <g fill="#00F0FF">
          <circle cx="40" cy="100" r="2.2"/><circle cx="110" cy="45" r="2.2"/>
          <circle cx="160" cy="20" r="2.2"/><circle cx="230" cy="90" r="2.2"/>
          <circle cx="280" cy="90" r="2.2"/><circle cx="330" cy="108" r="2.2"/>
          <circle cx="400" cy="60" r="2.2"/><circle cx="450" cy="25" r="2.2"/>
          <circle cx="520" cy="15" r="2.2"/><circle cx="570" cy="15" r="2.2"/>
        </g>

        <path d="M0 92 L60 64 L120 98 L180 42 L240 82 L300 32 L360 72 L420 22 L480 58 L540 12 L600 46"
          fill="none" stroke="url(#lineGrad)" stroke-width="2" opacity="0.9"/>
        <circle cx="180" cy="42" r="3" fill="#9D4EFF"/>
        <circle cx="300" cy="32" r="3" fill="#9D4EFF"/>
        <circle cx="420" cy="22" r="3" fill="#FF2E9A"/>
        <circle cx="540" cy="12" r="3" fill="#FF2E9A"/>
      </svg>
      <button class="cover-edit" aria-label="Editar capa">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
      </button>
    </div>
    <div class="profile-card">
      <div class="avatar-row">
        <div class="avatar-wrap">
          <span class="avatar-frame af-84 avatar-ring">
            <img src="https://avatars.githubusercontent.com/u/45015902?v=4" alt="Foto de Leandro Hüber" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <span class="avatar-fallback" style="background:linear-gradient(135deg,#00F0FF,#9D4EFF); color:#07070C;">LH</span>
          </span>
          <button class="avatar-edit" aria-label="Editar foto">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4z"/></svg>
          </button>
        </div>
        <button class="btn-follow" id="btnFollow">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          <span>Seguir</span>
        </button>
      </div>
      <div class="profile-name-row">
        <p class="profile-name">Leandro Hüber</p>
        <svg class="badge-verified" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 14.6 4.2 18 4l1 3.3 3 1.7-1 3.4 1 3.4-3 1.7-1 3.3-3.4-.2L12 22l-2.6-2.4-3.4.2-1-3.3-3-1.7 1-3.4-1-3.4 3-1.7 1-3.3 3.4.2z"/><path d="M9 12.4l2 2 4-4.4" stroke="#07070C" stroke-width="1.6" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span class="profile-degree">1º</span>
      </div>
      <p class="profile-headline">Redação jornalística orquestrada por IA · notícias redigidas por automação inteligente, com curadoria e revisão humana no processo.</p>
      <div class="profile-meta">
        <span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 22V12h6v10M3 10l9-7 9 7v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
          <a href="https://leandrohuber.com.br" target="_blank" rel="noopener">leandrohuber.com.br</a>
        </span>
        <span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 1.5 5 1.5 5 1.5c-.3 1.15-.3 2.35 0 3.5A5.4 5.4 0 0 0 4 8.5c0 3.5 3 5.5 6 5.5a4.8 4.8 0 0 0-1 3.5v4"/></svg>
          github.com/Leandrodasilvahuber
        </span>
      </div>
      <div class="profile-stats">
        <div><b id="followerCount">1</b><span>seguidor</span></div>
        <div><b>0</b><span>seguindo</span></div>
        <div><b>1</b><span>repositório público</span></div>
      </div>
    </div>
  </div>

  <div class="composer">
    <div class="composer-card">
      <div class="composer-top">
        <span class="avatar-frame af-42">
          <img src="https://avatars.githubusercontent.com/u/45015902?v=4" alt="" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
          <span class="avatar-fallback" style="background:linear-gradient(135deg,#00F0FF,#9D4EFF); color:#07070C;">LH</span>
        </span>
        <div class="composer-input" id="composerInput">Comece uma publicação, Leandro</div>
      </div>
      <div class="composer-actions">
        <button><svg class="c-media" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg><span>Foto</span></button>
        <button><svg class="c-media" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></svg><span>Vídeo</span></button>
        <button><svg class="c-event" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>Evento</span></button>
        <button><svg class="c-article" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg><span>Artigo</span></button>
      </div>
    </div>
  </div>

  <p class="feed-heading">últimas publicações</p>

  <main class="feed" id="feed"></main>

  <p class="end">você chegou ao fim do feed — volte em breve para novas publicações.</p>

<script src="{{ asset('js/feed.js') }}"></script>
</body>
</html>
