function renderVideoPost(v){
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
        <div class="post-role">Vídeo</div>
        <div class="post-time">${v.time} · ${icon("globe")}</div>
      </div>
    </div>
    <div class="post-text">
      <span class="lead">${v.title}</span>
      ${v.description ? `<div class="post-body" data-body>${v.description}</div><button class="see-more" data-see-more hidden>...ver mais</button>` : ""}
    </div>
    <div class="illustration">
      <iframe src="${v.embedUrl}" title="${v.title}" loading="lazy"
        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="post-source"><a href="${v.watchUrl}" target="_blank" rel="noopener noreferrer">Assistir no YouTube ↗</a></div>
  `;

  const bodyEl = el.querySelector("[data-body]");
  const seeMoreBtn = el.querySelector("[data-see-more]");
  if (bodyEl && seeMoreBtn) {
    requestAnimationFrame(() => {
      if (bodyEl.scrollHeight > bodyEl.clientHeight + 2) {
        seeMoreBtn.hidden = false;
        seeMoreBtn.addEventListener("click", () => {
          bodyEl.classList.add("expanded");
          seeMoreBtn.hidden = true;
        });
      }
    });
  }

  return el;
}

const videoGrid = document.getElementById("videoGrid");
if (videoGrid) {
  fetch("/api/videos")
    .then(res => res.json())
    .then(payload => {
      if (!payload.data.length) {
        if (!videoGrid.children.length) {
          videoGrid.innerHTML = '<p class="video-empty">Nenhum vídeo publicado ainda.</p>';
        }
        return;
      }
      payload.data.forEach(v => videoGrid.appendChild(renderVideoPost(v)));
    })
    .catch(() => {
      if (!videoGrid.children.length) {
        videoGrid.innerHTML = '<p class="video-empty">Não foi possível carregar os vídeos.</p>';
      }
    });
}
