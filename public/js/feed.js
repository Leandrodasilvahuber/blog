/* ===== ilustrações originais (SVG, traço único + acento neon) ===== */
const illustrations = {
  brain: `<svg viewBox="0 0 200 130" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke="#8CF7FF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M75 30c-14 0-22 11-20 22-9 4-11 18-2 24-3 11 6 21 18 20 4 8 20 9 25 0 12 2 20-9 17-19 9-6 8-20-2-24 2-11-8-22-20-21-3-6-10-4-16 0z"/>
      <path d="M75 30v70M60 45c6 3 10 8 10 15M95 40c-4 3-8 8-9 14M55 68c6 -2 12 0 15 5M105 60c-5 1-9 5-10 10M65 90c4 -3 9 -3 12 0" />
    </g>
    <circle cx="150" cy="45" r="4" fill="#FF2E9A"/>
    <circle cx="165" cy="70" r="3" fill="#9D4EFF"/>
    <circle cx="140" cy="85" r="3" fill="#00F0FF"/>
    <path d="M96 46 L146 45M100 60 L163 69M92 82 L138 84" stroke="#9D4EFF" stroke-width="1.4" stroke-dasharray="3 4" fill="none"/>
  </svg>`,

  cloud: `<svg viewBox="0 0 200 130" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke="#8CF7FF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M55 70a20 20 0 0 1 -2-40 27 27 0 0 1 52-10 22 22 0 0 1 30 21 18 18 0 0 1 -4 29z"/>
      <rect x="60" y="90" width="20" height="26" rx="2"/>
      <rect x="90" y="90" width="20" height="26" rx="2"/>
      <rect x="120" y="90" width="20" height="26" rx="2"/>
      <line x1="66" y1="98" x2="74" y2="98"/>
      <line x1="96" y1="98" x2="104" y2="98"/>
      <line x1="126" y1="98" x2="134" y2="98"/>
      <line x1="66" y1="106" x2="74" y2="106"/>
      <line x1="96" y1="106" x2="104" y2="106"/>
      <line x1="126" y1="106" x2="134" y2="106"/>
      <line x1="70" y1="70" x2="70" y2="90"/>
      <line x1="100" y1="70" x2="100" y2="90"/>
      <line x1="130" y1="70" x2="130" y2="90"/>
    </g>
    <circle cx="70" cy="80" r="2.4" fill="#00F0FF"/>
    <circle cx="100" cy="80" r="2.4" fill="#FF2E9A"/>
    <circle cx="130" cy="80" r="2.4" fill="#00F0FF"/>
  </svg>`,

  terminal: `<svg viewBox="0 0 200 130" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke="#8CF7FF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
      <rect x="30" y="25" width="140" height="90" rx="8"/>
      <line x1="30" y1="45" x2="170" y2="45"/>
      <circle cx="42" cy="35" r="2.6" fill="#8CF7FF"/>
      <circle cx="52" cy="35" r="2.6" fill="#8CF7FF"/>
      <circle cx="62" cy="35" r="2.6" fill="#8CF7FF"/>
      <path d="M46 60 L62 72 L46 84"/>
      <line x1="70" y1="84" x2="100" y2="84"/>
      <line x1="46" y1="96" x2="90" y2="96"/>
    </g>
    <path d="M46 60 L62 72 L46 84" fill="none" stroke="#00F0FF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
    <rect x="104" y="76" width="8" height="12" fill="#FF2E9A"/>
  </svg>`,

  graph: `<svg viewBox="0 0 200 130" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke="#8CF7FF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="35" y1="20" x2="35" y2="105"/>
      <line x1="35" y1="105" x2="175" y2="105"/>
      <path d="M45 90 L75 65 L105 78 L135 40 L165 55"/>
    </g>
    <circle cx="45" cy="90" r="3.5" fill="#00F0FF"/>
    <circle cx="75" cy="65" r="3.5" fill="#00F0FF"/>
    <circle cx="105" cy="78" r="3.5" fill="#FF2E9A"/>
    <circle cx="135" cy="40" r="3.5" fill="#00F0FF"/>
    <circle cx="165" cy="55" r="3.5" fill="#00F0FF"/>
    <path d="M135 40 l6 -10 m-6 10 l10 3" stroke="#FF2E9A" stroke-width="2" fill="none" stroke-linecap="round"/>
  </svg>`,

  branch: `<svg viewBox="0 0 200 130" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke="#8CF7FF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="55" y1="20" x2="55" y2="110"/>
      <path d="M55 45c0 20 60 10 60 35"/>
      <line x1="115" y1="80" x2="115" y2="110"/>
    </g>
    <circle cx="55" cy="30" r="6" fill="#12121C" stroke="#00F0FF" stroke-width="2.2"/>
    <circle cx="55" cy="60" r="6" fill="#12121C" stroke="#00F0FF" stroke-width="2.2"/>
    <circle cx="55" cy="100" r="6" fill="#12121C" stroke="#00F0FF" stroke-width="2.2"/>
    <circle cx="115" cy="90" r="6" fill="#12121C" stroke="#FF2E9A" stroke-width="2.2"/>
    <circle cx="115" cy="105" r="6" fill="#12121C" stroke="#FF2E9A" stroke-width="2.2"/>
  </svg>`,

  shield: `<svg viewBox="0 0 200 130" xmlns="http://www.w3.org/2000/svg">
    <g fill="none" stroke="#8CF7FF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M100 20 L145 35 L145 68c0 30 -22 44 -45 52 -23 -8 -45 -22 -45 -52 V35z"/>
      <path d="M85 65 l10 10 22 -24" stroke="#00F0FF"/>
    </g>
    <circle cx="145" cy="30" r="3" fill="#FF2E9A"/>
    <circle cx="155" cy="45" r="2" fill="#9D4EFF"/>
    <circle cx="50" cy="50" r="2" fill="#FF2E9A"/>
  </svg>`
};

/* ===== avatar do autor: logo do site, não foto pessoal ===== */
const logoSvg = `<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <defs><linearGradient id="feedLogoGrad" x1="0" y1="0" x2="1" y2="1">
    <stop offset="0%" stop-color="#00F0FF"/><stop offset="100%" stop-color="#9D4EFF"/>
  </linearGradient></defs>
  <rect width="100" height="100" fill="url(#feedLogoGrad)"/>
  <path d="M16 32 L6 50 L16 68" stroke="#07070C" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".55"/>
  <path d="M84 32 L94 50 L84 68" stroke="#07070C" stroke-width="6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity=".55"/>
  <text x="50" y="64" font-family="Chakra Petch, sans-serif" font-size="38" font-weight="700" fill="#07070C" text-anchor="middle">LH</text>
</svg>`;
const avatarUrl = "data:image/svg+xml," + encodeURIComponent(logoSvg);

function initialsOf(name){
  return name.trim().split(/\s+/).map(w => w[0]).slice(0, 2).join("").toUpperCase();
}
function hueOf(name){
  let h = 0;
  for (let i = 0; i < name.length; i++) h = (h * 31 + name.charCodeAt(i)) % 360;
  return Math.abs(h);
}
function avatarBlock(name, url, sizeClass, extraClass){
  const hue = hueOf(name);
  const grad = `linear-gradient(135deg, hsl(${hue},85%,58%), hsl(${(hue + 70) % 360},85%,45%))`;
  const img = url
    ? `<img src="${url}" alt="" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">`
    : "";
  const fallbackDisplay = url ? "display:none;" : "display:flex;";
  return `<span class="avatar-frame ${sizeClass}${extraClass ? " " + extraClass : ""}">${img}<span class="avatar-fallback" style="background:${grad}; color:#07070C; ${fallbackDisplay}">${initialsOf(name)}</span></span>`;
}

const REACTIONS = [
  { key:"like",    emoji:"👍", label:"Gostei",       cls:"active" },
  { key:"celebrate",emoji:"👏", label:"Apoio",        cls:"active reacted-amber" },
  { key:"support", emoji:"💡", label:"Interessante", cls:"active reacted-amber" },
  { key:"love",    emoji:"❤️", label:"Amei",         cls:"active reacted-love" },
  { key:"insightful",emoji:"💡",label:"Perspicaz",   cls:"active reacted-amber" },
  { key:"funny",   emoji:"😄", label:"Engraçado",     cls:"active reacted-amber" }
];

function icon(name){
  const icons = {
    like: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"/></svg>',
    comment: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
    repost: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 1l4 4-4 4"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><path d="M7 23l-4-4 4-4"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>',
    send: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>',
    globe: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg>',
    dots: '<svg viewBox="0 0 24 24" fill="currentColor"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/></svg>',
    save: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>',
    hide: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.94 10.94 0 0 1 12 19c-7 0-11-7-11-7a18.6 18.6 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 7 11 7a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>',
    flag: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><line x1="4" y1="22" x2="4" y2="15"/></svg>',
    emoji: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/></svg>'
  };
  return icons[name] || "";
}

function withHashtags(body, tags){
  const inline = tags.map(t => `<span class="hashtag">${t}</span>`).join(" ");
  return `${body} ${inline}`;
}

function renderPost(p, idx){
  const el = document.createElement("article");
  el.className = "post";
  el.innerHTML = `
    <div class="post-head">
      ${avatarBlock("Leandro Hüber", avatarUrl, "af-42")}
      <div class="post-who">
        <div class="post-name-line">
          <span class="post-name">Leandro Hüber</span>
          <span class="post-degree">· 1º</span>
        </div>
        <div class="post-role">${p.role}</div>
        <div class="post-time">${p.time} · ${icon("globe")}</div>
      </div>
      <button class="post-more" aria-label="Mais opções" data-more>${icon("dots")}</button>
      <div class="more-menu" data-more-menu>
        <button>${icon("save")} Salvar</button>
        <button>${icon("hide")} Não tenho interesse</button>
        <button>${icon("flag")} Denunciar publicação</button>
      </div>
    </div>
    <div class="post-text">
      <span class="lead">${p.lead}</span>
      <div class="post-body" data-body>${withHashtags(p.body, p.tags)}</div>
      <button class="see-more" data-see-more hidden>...ver mais</button>
    </div>
    <div class="illustration">${p.coverImageUrl ? `<img src="${p.coverImageUrl}" alt="" loading="lazy">` : illustrations[p.illustration]}</div>
    ${p.sourceUrl ? `<div class="post-source"><a href="${p.sourceUrl}" target="_blank" rel="noopener noreferrer">Ver notícia original ↗</a></div>` : ""}
    <div class="engagement">
      <div class="engagement-left">
        <div class="reaction-icons">
          <span style="background:#00F0FF">👍</span><span style="background:#FF2E9A">❤️</span><span style="background:#9D4EFF">👏</span>
        </div>
        <span class="count-text"><b data-like-count>${p.likes}</b>${p.topReactor ? ` · ${p.topReactor} e outras pessoas` : ""}</span>
      </div>
      <div class="engagement-right">
        <span data-open-comments>${p.comments} comentários</span>
        <span>${p.reposts} reposts</span>
      </div>
    </div>
    <div class="actions">
      <div class="action-wrap">
        <div class="reaction-picker" data-picker>
          ${REACTIONS.map(r => `<button data-react="${r.key}" title="${r.label}">${r.emoji}</button>`).join("")}
        </div>
        <button data-like-btn>${icon("like")}<span data-like-label>Gostei</span></button>
      </div>
      <div class="action-wrap"><button data-comment-btn>${icon("comment")}<span>Comentar</span></button></div>
      <div class="action-wrap"><button data-repost-btn>${icon("repost")}<span data-repost-label>Repostar</span></button></div>
      <div class="action-wrap"><button>${icon("send")}<span>Enviar</span></button></div>
    </div>
    <div class="comments" data-comments>
      ${p.comment && p.comment.name ? `
      <div class="comment">
        ${avatarBlock(p.comment.name, null, "af-32")}
        <div>
          <div class="comment-bubble">
            <span class="comment-name">${p.comment.name}</span><span class="comment-role"> · ${p.comment.role}</span>
            <div class="comment-text">${p.comment.text}</div>
          </div>
          <div class="comment-meta"><span>Gostei</span><span>Responder</span><span>${p.comment.time}</span></div>
        </div>
      </div>` : ""}
      <div class="comment-compose">
        ${avatarBlock("Leandro Hüber", avatarUrl, "af-32")}
        <div class="comment-field">
          <input type="text" placeholder="Adicione um comentário...">
          ${icon("emoji")}
        </div>
      </div>
    </div>
  `;

  /* --- estado --- */
  let liked = false, likeCount = p.likes, currentReaction = null;
  let reposted = false, repostCount = p.reposts;

  const likeBtn = el.querySelector("[data-like-btn]");
  const likeCountEl = el.querySelector("[data-like-count]");
  const picker = el.querySelector("[data-picker]");
  let pickerTimer;

  function setReaction(r){
    currentReaction = r;
    liked = true;
    likeCount = p.likes + 1;
    likeCountEl.textContent = likeCount;
    likeBtn.className = r.cls;
    likeBtn.classList.add("pop");
    setTimeout(() => likeBtn.classList.remove("pop"), 220);
    likeBtn.innerHTML = `<span style="font-size:15px;line-height:1">${r.emoji}</span><span data-like-label>${r.label}</span>`;
    hidePicker();
  }
  function clearReaction(){
    currentReaction = null; liked = false;
    likeCount = p.likes;
    likeCountEl.textContent = likeCount;
    likeBtn.className = "";
    likeBtn.innerHTML = `${icon("like")}<span data-like-label>Gostei</span>`;
  }
  function showPicker(){ clearTimeout(pickerTimer); picker.classList.add("show"); }
  function hidePicker(){ pickerTimer = setTimeout(() => picker.classList.remove("show"), 160); }

  likeBtn.addEventListener("click", () => { liked && currentReaction ? clearReaction() : setReaction(REACTIONS[0]); });
  likeBtn.addEventListener("mouseenter", showPicker);
  likeBtn.addEventListener("mouseleave", hidePicker);
  picker.addEventListener("mouseenter", showPicker);
  picker.addEventListener("mouseleave", hidePicker);
  picker.querySelectorAll("[data-react]").forEach(btn => {
    btn.addEventListener("click", (e) => {
      e.stopPropagation();
      const r = REACTIONS.find(x => x.key === btn.dataset.react);
      setReaction(r);
    });
  });

  /* --- repost --- */
  const repostBtn = el.querySelector("[data-repost-btn]");
  const repostLabel = el.querySelector("[data-repost-label]");
  repostBtn.addEventListener("click", () => {
    reposted = !reposted;
    repostBtn.classList.toggle("reposted", reposted);
    repostLabel.textContent = reposted ? "Repostado" : "Repostar";
  });

  /* --- comentários --- */
  const commentsBox = el.querySelector("[data-comments]");
  const openComments = () => commentsBox.classList.toggle("open");
  el.querySelector("[data-comment-btn]").addEventListener("click", openComments);
  el.querySelector("[data-open-comments]").addEventListener("click", openComments);

  /* --- menu "..." --- */
  const moreBtn = el.querySelector("[data-more]");
  const moreMenu = el.querySelector("[data-more-menu]");
  moreBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    document.querySelectorAll(".more-menu.open").forEach(m => { if (m !== moreMenu) m.classList.remove("open"); });
    moreMenu.classList.toggle("open");
  });

  /* --- ver mais --- */
  const bodyEl = el.querySelector("[data-body]");
  const seeMoreBtn = el.querySelector("[data-see-more]");
  requestAnimationFrame(() => {
    if (bodyEl.scrollHeight > bodyEl.clientHeight + 2) {
      seeMoreBtn.hidden = false;
      seeMoreBtn.addEventListener("click", () => {
        bodyEl.classList.add("expanded");
        seeMoreBtn.hidden = true;
      });
    }
  });

  return el;
}

document.addEventListener("click", () => {
  document.querySelectorAll(".more-menu.open").forEach(m => m.classList.remove("open"));
});

const feed = document.getElementById("feed");
fetch("/api/posts")
  .then(res => res.json())
  .then(posts => posts.forEach((p, i) => feed.appendChild(renderPost(p, i))))
  .catch(() => {
    feed.innerHTML = '<p style="color:var(--ink-faint); text-align:center; padding:24px;">Não foi possível carregar as publicações.</p>';
  });

/* --- follow button do perfil --- */
const btnFollow = document.getElementById("btnFollow");
const followerCount = document.getElementById("followerCount");
btnFollow.addEventListener("click", () => {
  const following = btnFollow.classList.toggle("is-following");
  followerCount.textContent = following ? 2 : 1;
  btnFollow.innerHTML = following
    ? `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><polyline points="20 6 9 17 4 12"/></svg><span>Seguindo</span>`
    : `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg><span>Seguir</span>`;
});
