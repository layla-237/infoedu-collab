// ─── DATA ───────────────────────────────────────────────────────────────
   
const allLicee = [
  {
    id: 1,
    name: "Colegiul Național „Sfântul Sava”",
    sector: "Sector 1",
    profil: "Real",
    specializare: "Matematică-Informatică",
    medie: 9.72,
    rating: 5,
    reviews: 312,
    elevi: 1200,
    clase: 34,
    badge: "top",
    badgeText: "Top 1 BUC",
    desc: "Cel mai bun liceu din București, rezultate excepționale la olimpiade.",
    isNew: false
  },
  {
    id: 2,
    name: "Colegiul Național „Gheorghe Lazăr”",
    sector: "Sector 5",
    profil: "Real",
    specializare: "Matematică-Informatică",
    medie: 9.66,
    rating: 5,
    reviews: 280,
    elevi: 1100,
    clase: 32,
    badge: "top",
    badgeText: "Top 3 BUC",
    desc: "Tradiție academică foarte puternică.",
    isNew: false
  },
  {
    id: 3,
    name: "Colegiul Național „Mihai Viteazul”",
    sector: "Sector 2",
    profil: "Real",
    specializare: "Matematică-Informatică",
    medie: 9.60,
    rating: 5,
    reviews: 260,
    elevi: 1150,
    clase: 33,
    badge: "top",
    badgeText: "Top 5 BUC",
    desc: "Unul dintre cele mai competitive licee.",
    isNew: false
  },
  {
    id: 4,
    name: "Colegiul Național „Spiru Haret”",
    sector: "Sector 2",
    profil: "Uman",
    specializare: "Filologie",
    medie: 9.40,
    rating: 4.8,
    reviews: 245,
    elevi: 1000,
    clase: 30,
    badge: "popular",
    badgeText: "Foarte căutat",
    desc: "Profil uman foarte bun și tradiție solidă.",
    isNew: false
  },
  {
    id: 5,
    name: "Colegiul Național „Ion Luca Caragiale”",
    sector: "Sector 1",
    profil: "Mixt",
    specializare: "Real/Uman",
    medie: 9.35,
    rating: 4.7,
    reviews: 210,
    elevi: 980,
    clase: 29,
    badge: "balanced",
    badgeText: "Echilibrat",
    desc: "Bun pe ambele profiluri.",
    isNew: false
  },
  {
    id: 6,
    name: "Colegiul Național „Cantemir Vodă”",
    sector: "Sector 1",
    profil: "Real",
    specializare: "Științe ale Naturii",
    medie: 9.30,
    rating: 4.6,
    reviews: 190,
    elevi: 900,
    clase: 28,
    badge: "rising",
    badgeText: "În creștere",
    desc: "Evoluție constant pozitivă.",
    isNew: true
  },
  {
    id: 7,
    name: "Colegiul Național „Iulia Hașdeu”",
    sector: "Sector 2",
    profil: "Uman",
    specializare: "Filologie",
    medie: 9.25,
    rating: 4.5,
    reviews: 170,
    elevi: 850,
    clase: 27,
    badge: "steady",
    badgeText: "Stabil",
    desc: "Rezultate constante în timp.",
    isNew: false
  },
  {
    id: 8,
    name: "Colegiul Național „Elena Cuza”",
    sector: "Sector 1",
    profil: "Uman",
    specializare: "Filologie",
    medie: 9.20,
    rating: 4.4,
    reviews: 150,
    elevi: 800,
    clase: 26,
    badge: "steady",
    badgeText: "Stabil",
    desc: "Profil uman bine structurat.",
    isNew: false
  },
  {
    id: 9,
    name: "Colegiul Național „Dimitrie Cantemir”",
    sector: "Sector 1",
    profil: "Real",
    specializare: "Matematică-Informatică",
    medie: 9.28,
    rating: 4.5,
    reviews: 180,
    elevi: 920,
    clase: 27,
    badge: "balanced",
    badgeText: "Echilibrat",
    desc: "Bun pe zona real.",
    isNew: false
  },
  {
    id: 10,
    name: "Colegiul Național „Grigore Moisil”",
    sector: "Sector 6",
    profil: "Real",
    specializare: "Matematică-Informatică",
    medie: 9.55,
    rating: 4.9,
    reviews: 300,
    elevi: 1100,
    clase: 31,
    badge: "top",
    badgeText: "IT Focus",
    desc: "Foarte puternic pe informatică.",
    isNew: false
  },

  {
    id: 11,
    name: "Colegiul Național „Tudor Vianu”",
    sector: "Sector 1",
    profil: "Real",
    specializare: "Matematică-Informatică",
    medie: 9.58,
    rating: 5,
    reviews: 340,
    elevi: 1200,
    clase: 34,
    badge: "top",
    badgeText: "Olimpiade",
    desc: "Performanțe foarte mari la informatică.",
    isNew: false
  },
  {
    id: 12,
    name: "Colegiul Național „Șincai”",
    sector: "Sector 4",
    profil: "Real",
    specializare: "Științe ale Naturii",
    medie: 9.22,
    rating: 4.4,
    reviews: 160,
    elevi: 870,
    clase: 26,
    badge: "steady",
    badgeText: "Stabil",
    desc: "Profil științe ale naturii.",
    isNew: false
  },
  {
    id: 13,
    name: "Colegiul Național „Bălcescu”",
    sector: "Sector 1",
    profil: "Uman",
    specializare: "Filologie",
    medie: 9.18,
    rating: 4.3,
    reviews: 140,
    elevi: 820,
    clase: 25,
    badge: "steady",
    badgeText: "Stabil",
    desc: "Liceu cu tradiție umanistă.",
    isNew: false
  },
  {
    id: 14,
    name: "Colegiul Național „Aurel Vlaicu”",
    sector: "Sector 1",
    profil: "Real",
    specializare: "Matematică-Informatică",
    medie: 9.10,
    rating: 4.2,
    reviews: 120,
    elevi: 780,
    clase: 24,
    badge: "basic",
    badgeText: "Standard",
    desc: "Liceu bun, mai puțin competitiv.",
    isNew: false
  },
  {
    id: 15,
    name: "Colegiul Național „Cantacuzino”",
    sector: "Sector 2",
    profil: "Real",
    specializare: "Științe ale Naturii",
    medie: 9.12,
    rating: 4.3,
    reviews: 130,
    elevi: 790,
    clase: 25,
    badge: "basic",
    badgeText: "Standard",
    desc: "Profil real echilibrat.",
    isNew: false
  }
];

const ITEMS_PER_PAGE = 9;

let state = {
  search: '',
  profil: [],
  sector: [],
  medieMax: 10,
  sort: 'default',
  page: 1,
  view: 'grid',
  addedIds: new Set(),
  compareIds: new Set(),
  minRating: 0
};


// ─── STARS ───────────────────────────────────────────────────
function renderStars(r) {
  let s = '';
  for (let i = 1; i <= 5; i++) {
    s += `<span class="star ${i <= r ? 'filled' : ''}">★</span>`;
  }
  return s;
}


// ─── RENDER CARDS ───────────────────────────────────────────
function renderCards() {

  let filtered = allLicee.filter(l => {
    const q = state.search.toLowerCase();

    if (q &&
      !l.name.toLowerCase().includes(q) &&
      !l.specializare.toLowerCase().includes(q) &&
      !l.profil.toLowerCase().includes(q) &&
      !l.sector.toLowerCase().includes(q)
    ) return false;

    if (state.profil.length && !state.profil.includes(l.profil)) return false;
    if (state.sector.length && !state.sector.includes(l.sector)) return false;
    if (l.medie > state.medieMax) return false;

    return true;
  });

  // SORT
  filtered.sort((a, b) => {
    switch (state.sort) {
      case 'rating-desc': return b.rating - a.rating;
      case 'rating-asc': return a.rating - b.rating;
      case 'medie-desc': return b.medie - a.medie;
      case 'medie-asc': return a.medie - b.medie;
      case 'name-asc': return a.name.localeCompare(b.name);
      case 'name-desc': return b.name.localeCompare(a.name);
      default: return 0;
    }
  });

  const total = filtered.length;
  const totalPages = Math.ceil(total / ITEMS_PER_PAGE);
  if (state.page > totalPages) state.page = 1;

  const start = (state.page - 1) * ITEMS_PER_PAGE;
  const paged = filtered.slice(start, start + ITEMS_PER_PAGE);

  document.getElementById('countShown').textContent = paged.length;
  document.getElementById('countTotal').textContent = total;

  const grid = document.getElementById('productsGrid');
  const empty = document.getElementById('emptyState');

  if (!paged.length) {
    grid.innerHTML = '';
    empty.classList.add('visible');
  } else {
    empty.classList.remove('visible');

    grid.innerHTML = paged.map((l, i) => {

      const isFav = state.addedIds.has(l.id);
      const isComp = state.compareIds.has(l.id);

      const badge = l.badge
        ? `<div class="card-badge badge-${l.badge}">${l.badgeText}</div>`
        : '';

      return `
        <div class="product-card" style="animation-delay:${i * 0.06}s">

          ${badge}

          <button class="fav-btn ${isFav ? 'active' : ''}"
            onclick="toggleFav(${l.id})">♡</button>

          <div class="card-image-wrap">
            <div class="card-icon-placeholder">${l.icon}</div>
            <div class="card-overlay"></div>
          </div>

          <div class="card-body">
            <div class="card-category">${l.profil} · ${l.sector}</div>
            <div class="card-title">${l.name}</div>
            <div class="card-desc">${l.desc}</div>

            <div class="card-stats">
              <div class="stat-chip"> ${l.elevi}</div>
              <div class="stat-chip"> ${l.clase}</div>
            </div>

            <div class="card-price-row">
              <div>
                <div class="price-unit">Medie</div>
                <div class="price-main">${l.medie.toFixed(2)}</div>
              </div>

              <div style="display:flex; gap:8px;">

                <button class="add-btn ${isComp ? 'added' : ''}"
                  onclick="toggleCompare(${l.id})">
                ${isComp ? 'Selectat' : 'Compară'}
                </button>

                <button class="add-btn ${isFav ? 'added' : ''}"
                  onclick="toggleFav(${l.id})">
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
  renderPills(); // FIX IMPORTANT
}


// ─── FAVORITE / LIST ────────────────────────────────────────
function toggleFav(id) {
  if (state.addedIds.has(id)) {
    state.addedIds.delete(id);
  } else {
    state.addedIds.add(id);
    showToast();
  }
  renderCards();
}


// ─── TOAST ───────────────────────────────────────────────────
function showToast() {
  const t = document.getElementById('toast');
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 2500);
}


// ─── COMPARE ────────────────────────────────────────────────
function toggleCompare(id) {
  if (state.compareIds.has(id)) {
    state.compareIds.delete(id);
  } else {
    if (state.compareIds.size >= 3) {
      alert("Max 3 licee.");
      return;
    }
    state.compareIds.add(id);
  }
  renderCards();
}


// ─── PAGINATION ─────────────────────────────────────────────
function renderPagination(totalPages) {
  const pag = document.getElementById('pagination');

  if (totalPages <= 1) {
    pag.innerHTML = '';
    return;
  }

  let html = `
    <button onclick="goPage(${state.page-1})" ${state.page===1?'disabled':''}>‹</button>
  `;

  for (let i = 1; i <= totalPages; i++) {
    html += `<button class="${i===state.page?'active':''}" onclick="goPage(${i})">${i}</button>`;
  }

  html += `
    <button onclick="goPage(${state.page+1})" ${state.page===totalPages?'disabled':''}>›</button>
  `;

  pag.innerHTML = html;
}

function goPage(n) {
  state.page = n;
  renderCards();
  window.scrollTo({ top: 0, behavior: 'smooth' });
}


// ─── PILLS ───────────────────────────────────────────────────
function renderPills() {
  const pills = document.getElementById('activePills');
  pills.innerHTML = '';
}


// ─── FILTER EVENTS (FIX BRACKET BUG) ────────────────────────
document.querySelectorAll('.filter-profil').forEach(cb => {
  cb.addEventListener('change', () => {
    state.profil = [...document.querySelectorAll('.filter-profil:checked')].map(x => x.value);
    state.page = 1;
    renderCards();
  });
});

document.querySelectorAll('.filter-sector').forEach(cb => {
  cb.addEventListener('change', () => {
    state.sector = [...document.querySelectorAll('.filter-sector:checked')].map(x => x.value);
    state.page = 1;
    renderCards();
  });
});


// ─── SEARCH ────────────────────────────────────────────────
document.getElementById('searchInput').addEventListener('input', function() {
  state.search = this.value;
  state.page = 1;
  renderCards();
});

document.getElementById('searchBtn').addEventListener('click', () => {
  state.search = document.getElementById('searchInput').value;
  state.page = 1;
  renderCards();
});


// ─── SORT ───────────────────────────────────────────────────
document.getElementById('sortSelect').addEventListener('change', function() {
  state.sort = this.value;
  state.page = 1;
  renderCards();
});


// ─── INIT ───────────────────────────────────────────────────
renderCards();

