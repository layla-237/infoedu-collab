 function renderPagination(totalPages) {
    const pag = document.getElementById('pagination');
    if (totalPages <= 1) { pag.innerHTML = ''; return; }
    let html = `<button class="page-btn" onclick="goPage(${state.page-1})" ${state.page===1?'disabled':''}>‹</button>`;
    for (let i=1; i<=totalPages; i++) html += `<button class="page-btn ${i===state.page?'active':''}" onclick="goPage(${i})">${i}</button>`;
    html += `<button class="page-btn" onclick="goPage(${state.page+1})" ${state.page===totalPages?'disabled':''}>›</button>`;
    pag.innerHTML = html;
  }
  function goPage(n) { state.page = n; renderCards(); window.scrollTo({top:0,behavior:'smooth'}); }

  // ─── EVENTS ──────────────────────────────────────────────────────────────
  document.getElementById('menuBtn').addEventListener('click', () => {
    document.getElementById('sidebar').classList.add('active');
    document.getElementById('overlay').classList.add('active');
  });
  ['closeBtn','overlay'].forEach(id => {
    document.getElementById(id).addEventListener('click', () => {
      document.getElementById('sidebar').classList.remove('active');
      document.getElementById('overlay').classList.remove('active');
    });
  });

  function handleClick(cb) {
  display("Clicked, new value = " + cb.checked);
}