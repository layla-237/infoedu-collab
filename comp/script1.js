  function getFavs() { try { return new Set(JSON.parse(localStorage.getItem('eliceu_favs') || '[]')); } catch { return new Set(); } }
  function saveFavs(s) { localStorage.setItem('eliceu_favs', JSON.stringify([...s])); }

  function renderStars(r) {
    return Array.from({length:5},(_,i)=>`<span style="font-size:12px;color:${i<Math.round(r)?'#f5c518':'#ddd'}">★</span>`).join('');
  }

  function showToast(msg = '✓ Adăugat!') {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2500);
  }

  const ITEMS_PER_PAGE = 9;
  const state = {
    search: '', profil: [], sector: [], medieMax: 10,
    sort: 'default', page: 1, view: 'grid',
    compareIds: new Set()
  };

  // ─── RENDER CARDS ────────────────────────────────────────────────────────
  function renderCards() {
    const favs = getFavs();

    let filtered = allLicee.filter(l => {
      const q = state.search.toLowerCase();
      if (q && !l.name.toLowerCase().includes(q) && !l.specializare.toLowerCase().includes(q) &&
          !l.profil.toLowerCase().includes(q) && !l.sector.toLowerCase().includes(q)) return false;
      if (state.profil.length && !state.profil.includes(l.profil)) return false;
      if (state.sector.length && !state.sector.includes(l.sector)) return false;
      if (l.medie > state.medieMax) return false;
      return true;
    });

    filtered.sort((a,b) => {
      switch(state.sort) {
        case 'rating-desc': return b.rating - a.rating;
        case 'rating-asc':  return a.rating - b.rating;
        case 'medie-desc':  return b.medie - a.medie;
        case 'medie-asc':   return a.medie - b.medie;
        case 'name-asc':    return a.name.localeCompare(b.name);
        case 'name-desc':   return b.name.localeCompare(a.name);
        default: return 0;
      }
    });

    const total = filtered.length;
    const totalPages = Math.max(1, Math.ceil(total / ITEMS_PER_PAGE));
    if (state.page > totalPages) state.page = 1;
    const paged = filtered.slice((state.page-1)*ITEMS_PER_PAGE, state.page*ITEMS_PER_PAGE);

    document.getElementById('countShown').textContent = paged.length;
    document.getElementById('countTotal').textContent = total;

    const grid = document.getElementById('productsGrid');
    const empty = document.getElementById('emptyState');

    if (!paged.length) {
      grid.innerHTML = '';
      empty.classList.add('visible');
    } else {
      empty.classList.remove('visible');
      grid.className = 'products-grid' + (state.view === 'list' ? ' list-view' : '');
      grid.innerHTML = paged.map((l, i) => {
        const isFav = favs.has(l.id);
        const isComp = state.compareIds.has(l.id);
        return `
          <div class="product-card" style="animation-delay:${i*.06}s" onclick="goToLiceu(${l.id}, event)">
            ${l.badge ? `<div class="card-badge badge-${l.badge}">${l.badgeText}</div>` : ''}
            <button class="fav-btn ${isFav ? 'active' : ''}" onclick="toggleFav(${l.id}, event)" title="${isFav ? 'Elimina din favorite' : 'Adaugă la favorite'}">${isFav ? '❤️' : '🤍'}</button>

            <div class="card-image-wrap">
              <img src="${l.image}" alt="${l.name}" loading="lazy">
              <div class="card-overlay"></div>
            </div>

            <div class="card-body">
              <div class="card-category">${l.profil} · ${l.sector}</div>
              <div class="card-title">${l.name}</div>
              <div class="card-desc">${l.desc}</div>

              <div class="card-stats">
                <div class="stat-chip">${l.elevi.toLocaleString()}</div>
                <div class="stat-chip">${l.clase} clase</div>
              </div>

              <div style="display:flex;align-items:center;gap:6px;margin-top:2px">
                <div style="display:flex;gap:2px">${renderStars(l.rating)}</div>
                <span style="font-size:12px;font-weight:700;color:var(--text-muted)">${l.rating} (${l.reviews})</span>
              </div>

              <div class="card-price-row">
                <div>
                  <div class="price-unit">Medie admitere</div>
                  <div class="price-main">${l.medie.toFixed(2)}</div>
                </div>
                <div style="display:flex;gap:8px">
                  <button class="add-btn ${isComp ? 'compare-added' : ''}"
                    onclick="toggleCompare(${l.id}, event)">
                    ${isComp ? 'Selectat' : 'Compară'}
                  </button>
                  <button class="add-btn ${isFav ? 'added' : ''}"
                    onclick="toggleFav(${l.id}, event)">
                    ${isFav ? '✓' : '+'}
                  </button>
                </div>
              </div>
            </div>
          </div>
        `;
      }).join('');
    }

    renderPagination(totalPages);
    renderCompareBa();
  }

  function goToLiceu(id, e) {
    if (e.target.closest('button')) return;
    window.location.href = `liceu.html?id=${id}`;
  }

  // ─── FAVORITE ───────────────────────────────────────────────────────────
  function toggleFav(id, e) {
    if (e) e.stopPropagation();
    const favs = getFavs();
    if (favs.has(id)) { favs.delete(id); showToast('✕ Eliminat din favorite'); }
    else { favs.add(id); showToast('❤️ Adăugat la favorite!'); }
    saveFavs(favs);
    renderCards();
  }

  // ─── COMPARE ────────────────────────────────────────────────────────────
  function toggleCompare(id, e) {
    if (e) e.stopPropagation();
    if (state.compareIds.has(id)) {
      state.compareIds.delete(id);
    } else {
      if (state.compareIds.size >= 3) { alert('Poți selecta maxim 3 licee pentru comparare.'); return; }
      state.compareIds.add(id);
      showToast( 'Adăugat la comparare!');
    }
    renderCards();
  }

  function renderCompareBa() {
    const bar = document.getElementById('compareBar');
    const names = document.getElementById('compareBarNames');
    if (!state.compareIds.size) { bar.classList.remove('visible'); return; }
    bar.classList.add('visible');
    names.innerHTML = [...state.compareIds].map(id => {
      const l = getLiceuById(id);
      return `<div class="compare-bar-chip">${l ? l.name.replace('Colegiul Național ','CN ') : id} <button onclick="toggleCompare(${id})">✕</button></div>`;
    }).join('');
  }

  document.getElementById('compareGoBtn').addEventListener('click', () => {
    if (!state.compareIds.size) return;
    window.location.href = `compare.html?ids=${[...state.compareIds].join(',')}`;
  });

  // ─── PAGINATION ──────────────────────────────────────────────────────────
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

  document.getElementById('searchInput').addEventListener('input', function() { state.search = this.value; state.page = 1; renderCards(); });
  document.getElementById('searchBtn').addEventListener('click', () => { state.search = document.getElementById('searchInput').value; state.page = 1; renderCards(); });
  document.getElementById('sortSelect').addEventListener('change', function() { state.sort = this.value; state.page = 1; renderCards(); });

  document.querySelectorAll('.filter-profil').forEach(cb => cb.addEventListener('change', () => {
    state.profil = [...document.querySelectorAll('.filter-profil:checked')].map(x => x.value);
    state.page = 1; renderCards();
  }));
  document.querySelectorAll('.filter-sector').forEach(cb => cb.addEventListener('change', () => {
    state.sector = [...document.querySelectorAll('.filter-sector:checked')].map(x => x.value);
    state.page = 1; renderCards();
  }));

  document.getElementById('medieSlider').addEventListener('input', function() {
    state.medieMax = parseFloat(this.value);
    document.getElementById('medieMax').value = this.value;
    state.page = 1; renderCards();
  });

  document.getElementById('gridViewBtn').addEventListener('click', () => {
    state.view = 'grid';
    document.getElementById('gridViewBtn').classList.add('active');
    document.getElementById('listViewBtn').classList.remove('active');
    renderCards();
  });
  document.getElementById('listViewBtn').addEventListener('click', () => {
    state.view = 'list';
    document.getElementById('listViewBtn').classList.add('active');
    document.getElementById('gridViewBtn').classList.remove('active');
    renderCards();
  });

  document.getElementById('clearFilters').addEventListener('click', () => {
    state.profil = []; state.sector = []; state.medieMax = 10; state.search = ''; state.page = 1;
    document.querySelectorAll('.filter-profil, .filter-sector').forEach(c => c.checked = false);
    document.getElementById('medieMax').value = 10;
    document.getElementById('medieSlider').value = 10;
    document.getElementById('searchInput').value = '';
    renderCards();
  });

  // Mobile drawer
  document.getElementById('mobileFilterBtn').addEventListener('click', () => document.getElementById('filterDrawer').classList.add('open'));
  ['drawerBackdrop','drawerClose'].forEach(id => document.getElementById(id)?.addEventListener('click', () => document.getElementById('filterDrawer').classList.remove('open')));

  // ─── INIT ────────────────────────────────────────────────────────────────
  renderCards();
  