(function(){
  const videoGrid = document.getElementById("videoGrid");
  if (!videoGrid) return;

  for (let i = 0; i < 2; i++) {
    const sk = document.createElement("div");
    sk.className = "skeleton-row video-skeleton";
    sk.innerHTML = `<div class="skeleton-block" style="width:104px;aspect-ratio:16/9;flex-shrink:0;"></div>
      <div class="skeleton-lines"><span style="width:85%"></span><span style="width:50%"></span></div>`;
    videoGrid.appendChild(sk);
  }

  fetch("/api/videos")
    .then(res => res.json())
    .then(payload => {
      videoGrid.querySelectorAll(".video-skeleton").forEach(el => el.remove());
      payload.data.forEach(v => videoGrid.appendChild(window.renderVideoCard(v)));
      if (!videoGrid.querySelector(".video-card")) {
        videoGrid.innerHTML = '<p class="video-empty">Nenhum vídeo publicado ainda.</p>';
      }
    })
    .catch(() => {
      videoGrid.querySelectorAll(".video-skeleton").forEach(el => el.remove());
      if (!videoGrid.querySelector(".video-card")) {
        videoGrid.innerHTML = '<p class="video-empty">Não foi possível carregar os vídeos.</p>';
      }
    });
})();
