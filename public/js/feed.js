/* ===== ilustrações originais (SVG, traço único + acento neon) — fallback quando o post não tem capa ===== */
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

const GLOBE_SVG = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15 15 0 0 1 0 20 15 15 0 0 1 0-20z"/></svg>';
const PLAY_SVG = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>';

/* ===== posts cujo link original é um vídeo do YouTube: viram cards de vídeo ===== */
function extractYoutubeId(url){
  if (!url) return null;
  try {
    const u = new URL(url);
    if (u.hostname.includes("youtu.be")) return u.pathname.slice(1) || null;
    if (u.hostname.includes("youtube.com")) {
      if (u.pathname === "/watch") return u.searchParams.get("v");
      if (u.pathname.startsWith("/embed/")) return u.pathname.split("/embed/")[1] || null;
    }
  } catch (e) {}
  return null;
}
function isYoutubePost(p){
  return !!extractYoutubeId(p.sourceUrl);
}
function postToVideo(p){
  const ytId = extractYoutubeId(p.sourceUrl);
  return {
    title: p.lead,
    time: p.time,
    thumbnailUrl: `https://i.ytimg.com/vi/${ytId}/hqdefault.jpg`,
    embedUrl: `https://www.youtube.com/embed/${ytId}`,
    watchUrl: p.sourceUrl
  };
}

/* ===== grid principal de vídeos: clique na miniatura reproduz inline ===== */
function renderVideoTile(v, delayIdx){
  const el = document.createElement("article");
  el.className = "video-tile";
  if (typeof delayIdx === "number") el.style.animationDelay = `${Math.min(delayIdx, 8) * 55}ms`;
  el.innerHTML = `
    <button type="button" class="video-tile-thumb" aria-label="Reproduzir vídeo: ${v.title}">
      <img src="${v.thumbnailUrl}" alt="" loading="lazy">
      <span class="video-tile-play"><span>${PLAY_SVG}</span></span>
    </button>
    <div class="video-tile-body">
      <p class="video-tile-title">${v.title}</p>
      <p class="video-tile-time">${GLOBE_SVG} ${v.time}</p>
    </div>
  `;

  const thumbBtn = el.querySelector(".video-tile-thumb");
  thumbBtn.addEventListener("click", () => {
    thumbBtn.classList.add("is-playing");
    thumbBtn.innerHTML = `<iframe src="${v.embedUrl}?autoplay=1&rel=0" title="${v.title}" loading="lazy"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
  }, { once: true });

  return el;
}
window.renderVideoTile = renderVideoTile;

/* ===== lista compacta de publicações (coluna lateral) ===== */
function renderMiniPost(p){
  const hasLink = !!p.sourceUrl;
  const el = document.createElement(hasLink ? "a" : "div");
  el.className = "mini-card";
  if (hasLink) {
    el.href = p.sourceUrl;
    el.target = "_blank";
    el.rel = "noopener noreferrer";
  }
  el.innerHTML = `
    <span class="mini-thumb">${p.coverImageUrl ? `<img src="${p.coverImageUrl}" alt="" loading="lazy">` : (illustrations[p.illustration] || "")}</span>
    <span class="mini-meta">
      <span class="mini-title">${p.lead}</span>
      <span class="mini-time">${p.time}</span>
    </span>
  `;
  return el;
}

function skeletonTile(){
  const el = document.createElement("div");
  el.className = "skeleton-tile video-skeleton-posts";
  el.innerHTML = `<div class="skeleton-block"></div><div class="skeleton-lines"><span style="width:85%"></span><span style="width:45%"></span></div>`;
  return el;
}
function skeletonMiniRow(){
  const el = document.createElement("div");
  el.className = "skeleton-row";
  el.style.padding = "9px 8px";
  el.innerHTML = `<div class="skeleton-block" style="width:56px;height:56px;border-radius:9px;flex-shrink:0;"></div><div class="skeleton-lines"><span style="width:90%"></span><span style="width:50%"></span></div>`;
  return el;
}

/* ===== coordena o estado "vazio" entre feed.js (posts-vídeo) e videos.js (vídeos cadastrados) ===== */
let pendingVideoSources = 2;
function maybeShowVideoEmpty(){
  pendingVideoSources--;
  if (pendingVideoSources <= 0 && !videoGrid.querySelector(".video-tile")) {
    videoGrid.innerHTML = '<p class="video-empty">Nenhum vídeo publicado ainda.</p>';
  }
}
window.maybeShowVideoEmpty = maybeShowVideoEmpty;

const videoGrid = document.getElementById("videoGrid");
const feedList = document.getElementById("feedList");

for (let i = 0; i < 6; i++) videoGrid.appendChild(skeletonTile());
for (let i = 0; i < 5; i++) feedList.appendChild(skeletonMiniRow());

fetch("/api/posts")
  .then(res => res.json())
  .then(payload => {
    videoGrid.querySelectorAll(".video-skeleton-posts").forEach(el => el.remove());
    feedList.innerHTML = "";
    let videoIdx = 0, postCount = 0;
    payload.data.forEach(p => {
      if (isYoutubePost(p)) {
        videoGrid.appendChild(renderVideoTile(postToVideo(p), videoIdx++));
      } else {
        feedList.appendChild(renderMiniPost(p));
        postCount++;
      }
    });
    if (!postCount) {
      feedList.innerHTML = '<p class="mini-empty">Nenhuma publicação por aqui ainda.</p>';
    }
    maybeShowVideoEmpty();
  })
  .catch(() => {
    videoGrid.querySelectorAll(".video-skeleton-posts").forEach(el => el.remove());
    feedList.innerHTML = '<p class="mini-empty">Não foi possível carregar as publicações.</p>';
    maybeShowVideoEmpty();
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
