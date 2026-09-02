(function(){
  const videoGrid = document.getElementById("videoGrid");
  if (!videoGrid) return;

  for (let i = 0; i < 4; i++) {
    const sk = document.createElement("div");
    sk.className = "skeleton-tile video-skeleton-videos";
    sk.innerHTML = `<div class="skeleton-block"></div><div class="skeleton-lines"><span style="width:85%"></span><span style="width:45%"></span></div>`;
    videoGrid.appendChild(sk);
  }

  fetch("/api/videos")
    .then(res => res.json())
    .then(payload => {
      videoGrid.querySelectorAll(".video-skeleton-videos").forEach(el => el.remove());
      payload.data.forEach((v, i) => videoGrid.appendChild(window.renderVideoTile(v, i)));
      window.maybeShowVideoEmpty();
    })
    .catch(() => {
      videoGrid.querySelectorAll(".video-skeleton-videos").forEach(el => el.remove());
      window.maybeShowVideoEmpty();
    });
})();
