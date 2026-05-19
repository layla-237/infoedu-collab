const allLicee = [
  {
    id: 1,
    slug: "sfantul-sava",
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
    desc: "Cel mai bun liceu din București, cu rezultate excepționale la olimpiadele naționale și internaționale. Fondată în 1818, această instituție de elită a format generații de personalități din toate domeniile.",
    founded: 1818,
    address: "Str. Știrbei Vodă nr. 23, Sector 1, București",
    website: "https://www.sfantulsava.ro",
    phone: "+40 21 313 60 82",
    image: "https://images.unsplash.com/photo-1562774053-701939374585?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&q=80",
      "https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&q=80",
      "https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&q=80",
      "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 1, 2021: 1, 2022: 1, 2023: 1, 2024: 1, 2025: 1, 2026: 1 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.72, locuri: 120, limba: "Română" },
      { profil: "Matematică-Informatică (intensiv engleză)", ultimaMedie: 9.68, locuri: 60, limba: "Engleză" },
      { profil: "Științe ale Naturii", ultimaMedie: 9.51, locuri: 60, limba: "Română" }
    ]
  },
  {
    id: 2,
    slug: "gheorghe-lazar",
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
    desc: "Tradiție academică de excepție, cu performanțe remarcabile la matematică și informatică. Locul de formare al multor olimpici naționali și internaționali.",
    founded: 1860,
    address: "Bd. Schitu Măgureanu nr. 5, Sector 5, București",
    website: "https://www.cngl.ro",
    phone: "+40 21 312 88 97",
    image: "https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&q=80",
      "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80",
      "https://images.unsplash.com/photo-1598618443855-232ee0f819f6?w=600&q=80",
      "https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 4, 2021: 3, 2022: 3, 2023: 3, 2024: 3, 2025: 3, 2026: 3 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.66, locuri: 120, limba: "Română" },
      { profil: "Matematică-Informatică (intensiv germană)", ultimaMedie: 9.52, locuri: 30, limba: "Germană" },
      { profil: "Filologie", ultimaMedie: 9.22, locuri: 30, limba: "Română" }
    ]
  },
  {
    id: 3,
    slug: "mihai-viteazul",
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
    desc: "Unul dintre cele mai competitive licee din capitală. Excelentă la matematică, fizică și chimie, cu laboratoare moderne și cadre didactice de înaltă calificare.",
    founded: 1864,
    address: "Bd. Republicii nr. 14, Sector 2, București",
    website: "https://www.cnmv.ro",
    phone: "+40 21 315 39 44",
    image: "https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&q=80",
      "https://images.unsplash.com/photo-1576495199011-eb94736d05d6?w=600&q=80",
      "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600&q=80",
      "https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 6, 2021: 5, 2022: 5, 2023: 5, 2024: 5, 2025: 5, 2026: 5 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.60, locuri: 120, limba: "Română" },
      { profil: "Științe ale Naturii", ultimaMedie: 9.38, locuri: 60, limba: "Română" },
      { profil: "Filologie (intensiv franceză)", ultimaMedie: 9.12, locuri: 30, limba: "Franceză" }
    ]
  },
  {
    id: 4,
    slug: "spiru-haret",
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
    desc: "Cel mai renumit liceu cu profil uman din București. Excepțional la filologie, arte și științe sociale.",
    founded: 1872,
    address: "Str. Icoanei nr. 17-19, Sector 2, București",
    website: "https://www.cnsh.ro",
    phone: "+40 21 211 48 04",
    image: "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=600&q=80",
      "https://images.unsplash.com/photo-1550399105-c4db5fb85c18?w=600&q=80",
      "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=600&q=80",
      "https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 7, 2021: 7, 2022: 6, 2023: 6, 2024: 6, 2025: 6, 2026: 6 },
    mediiProfil: [
      { profil: "Filologie", ultimaMedie: 9.40, locuri: 90, limba: "Română" },
      { profil: "Filologie (intensiv engleză)", ultimaMedie: 9.28, locuri: 60, limba: "Engleză" },
      { profil: "Științe Sociale", ultimaMedie: 9.10, locuri: 60, limba: "Română" }
    ]
  },
  {
    id: 5,
    slug: "ion-luca-caragiale",
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
    desc: "Liceu echilibrat cu performanțe atât la profilul real cât și uman. Excelente rezultate la limba română și limbi străine.",
    founded: 1956,
    address: "Str. Ienăchiță Văcărescu nr. 2, Sector 1, București",
    website: "https://www.cnilc.ro",
    phone: "+40 21 311 22 66",
    image: "https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1532012197267-da84d127e765?w=600&q=80",
      "https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?w=600&q=80",
      "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80",
      "https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 9, 2021: 8, 2022: 8, 2023: 7, 2024: 8, 2025: 8, 2026: 8 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.35, locuri: 60, limba: "Română" },
      { profil: "Filologie", ultimaMedie: 9.18, locuri: 60, limba: "Română" },
      { profil: "Filologie (intensiv franceză)", ultimaMedie: 9.05, locuri: 30, limba: "Franceză" }
    ]
  },
  {
    id: 6,
    slug: "cantemir-voda",
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
    desc: "Liceu în continuă ascensiune, cu evoluție pozitivă în clasamente. Profil puternic pe științele naturii.",
    founded: 1878,
    address: "Str. Cantemir Vodă nr. 10, Sector 1, București",
    website: "https://www.cncv.ro",
    phone: "+40 21 312 10 08",
    image: "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1576495199011-eb94736d05d6?w=600&q=80",
      "https://images.unsplash.com/photo-1596496181871-9681eacf9764?w=600&q=80",
      "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&q=80",
      "https://images.unsplash.com/photo-1606761568499-6d2451b23c66?w=600&q=80"
    ],
    isNew: true,
    positions: { 2020: 14, 2021: 13, 2022: 12, 2023: 11, 2024: 10, 2025: 9, 2026: 9 },
    mediiProfil: [
      { profil: "Științe ale Naturii", ultimaMedie: 9.30, locuri: 90, limba: "Română" },
      { profil: "Matematică-Informatică", ultimaMedie: 9.12, locuri: 60, limba: "Română" },
      { profil: "Filologie", ultimaMedie: 8.88, locuri: 30, limba: "Română" }
    ]
  },
  {
    id: 7,
    slug: "iulia-hasdeu",
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
    desc: "Rezultate constante în clasamente. Profil uman solid cu accent pe limbi moderne și arte.",
    founded: 1921,
    address: "Str. Icoanei nr. 4, Sector 2, București",
    website: "https://www.cnijh.ro",
    phone: "+40 21 211 32 18",
    image: "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=600&q=80",
      "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=600&q=80",
      "https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=600&q=80",
      "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 12, 2021: 11, 2022: 11, 2023: 11, 2024: 11, 2025: 11, 2026: 11 },
    mediiProfil: [
      { profil: "Filologie", ultimaMedie: 9.25, locuri: 90, limba: "Română" },
      { profil: "Filologie (intensiv engleză)", ultimaMedie: 9.08, locuri: 60, limba: "Engleză" }
    ]
  },
  {
    id: 8,
    slug: "elena-cuza",
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
    desc: "Profil uman bine structurat, cu tradiție îndelungată în formarea absolvenților cu aptitudini umanistice.",
    founded: 1898,
    address: "Bd. Primăverii nr. 8, Sector 1, București",
    website: "https://www.cnec.ro",
    phone: "+40 21 222 34 56",
    image: "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1550399105-c4db5fb85c18?w=600&q=80",
      "https://images.unsplash.com/photo-1532012197267-da84d127e765?w=600&q=80",
      "https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=600&q=80",
      "https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 15, 2021: 14, 2022: 13, 2023: 13, 2024: 12, 2025: 12, 2026: 12 },
    mediiProfil: [
      { profil: "Filologie", ultimaMedie: 9.20, locuri: 90, limba: "Română" },
      { profil: "Filologie (intensiv franceză)", ultimaMedie: 9.02, locuri: 60, limba: "Franceză" }
    ]
  },
  {
    id: 9,
    slug: "dimitrie-cantemir",
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
    desc: "Performanțe bune pe zona real, cu orientare spre matematică și informatică aplicată.",
    founded: 1934,
    address: "Str. Dem I. Dobrescu nr. 2, Sector 1, București",
    website: "https://www.cndc.ro",
    phone: "+40 21 311 50 20",
    image: "https://images.unsplash.com/photo-1598618443855-232ee0f819f6?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1606761568499-6d2451b23c66?w=600&q=80",
      "https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=600&q=80",
      "https://images.unsplash.com/photo-1596496181871-9681eacf9764?w=600&q=80",
      "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 11, 2021: 10, 2022: 10, 2023: 10, 2024: 10, 2025: 10, 2026: 10 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.28, locuri: 90, limba: "Română" },
      { profil: "Științe ale Naturii", ultimaMedie: 9.05, locuri: 60, limba: "Română" }
    ]
  },
  {
    id: 10,
    slug: "grigore-moisil",
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
    desc: "Cel mai specializat liceu pe informatică din București. Absolvenții intră frecvent la facultăți de top din țară și din Europa.",
    founded: 1969,
    address: "Str. Atanasie Panu nr. 10, Sector 6, București",
    website: "https://www.cngm.ro",
    phone: "+40 21 316 02 41",
    image: "https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&q=80",
      "https://images.unsplash.com/photo-1516979187457-637abb4f9353?w=600&q=80",
      "https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&q=80",
      "https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 5, 2021: 5, 2022: 4, 2023: 4, 2024: 4, 2025: 4, 2026: 4 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.55, locuri: 150, limba: "Română" },
      { profil: "Matematică-Informatică (intensiv engleză)", ultimaMedie: 9.44, locuri: 60, limba: "Engleză" }
    ]
  },
  {
    id: 11,
    slug: "tudor-vianu",
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
    desc: "Performanțe remarcabile la informatică, cu numeroși olimpici naționali și internaționali. Unul dintre cele mai competitive licee din România.",
    founded: 1957,
    address: "Str. Arhitect Ion Mincu nr. 10, Sector 1, București",
    website: "https://www.cntv.ro",
    phone: "+40 21 230 58 48",
    image: "https://images.unsplash.com/photo-1562774053-701939374585?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&q=80",
      "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80",
      "https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600&q=80",
      "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 3, 2021: 2, 2022: 2, 2023: 2, 2024: 2, 2025: 2, 2026: 2 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.58, locuri: 120, limba: "Română" },
      { profil: "Matematică-Informatică (intensiv engleză)", ultimaMedie: 9.50, locuri: 60, limba: "Engleză" },
      { profil: "Matematică-Informatică (bilingv)", ultimaMedie: 9.42, locuri: 30, limba: "Franceză" }
    ]
  },
  {
    id: 12,
    slug: "sincai",
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
    desc: "Profil puternic pe științele naturii, cu laboratoare moderne de biologie și chimie.",
    founded: 1948,
    address: "Str. Mihai Bravu nr. 60, Sector 4, București",
    website: "https://www.cnsincai.ro",
    phone: "+40 21 322 45 67",
    image: "https://images.unsplash.com/photo-1576495199011-eb94736d05d6?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1596496181871-9681eacf9764?w=600&q=80",
      "https://images.unsplash.com/photo-1606761568499-6d2451b23c66?w=600&q=80",
      "https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&q=80",
      "https://images.unsplash.com/photo-1519452575417-564c1401ecc0?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 17, 2021: 16, 2022: 15, 2023: 14, 2024: 13, 2025: 13, 2026: 13 },
    mediiProfil: [
      { profil: "Științe ale Naturii", ultimaMedie: 9.22, locuri: 90, limba: "Română" },
      { profil: "Matematică-Informatică", ultimaMedie: 9.05, locuri: 60, limba: "Română" }
    ]
  },
  {
    id: 13,
    slug: "balcescu",
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
    desc: "Liceu cu tradiție umanistă, cu rezultate bune la olimpiade de limbă și literatură.",
    founded: 1945,
    address: "Str. Știrbei Vodă nr. 37, Sector 1, București",
    website: "https://www.cnbalcescu.ro",
    phone: "+40 21 313 44 21",
    image: "https://images.unsplash.com/photo-1481627834876-b7833e8f5570?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?w=600&q=80",
      "https://images.unsplash.com/photo-1550399105-c4db5fb85c18?w=600&q=80",
      "https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=600&q=80",
      "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 19, 2021: 18, 2022: 17, 2023: 16, 2024: 15, 2025: 14, 2026: 14 },
    mediiProfil: [
      { profil: "Filologie", ultimaMedie: 9.18, locuri: 90, limba: "Română" },
      { profil: "Științe Sociale", ultimaMedie: 8.95, locuri: 60, limba: "Română" }
    ]
  },
  {
    id: 14,
    slug: "aurel-vlaicu",
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
    desc: "Liceu bun cu profil real, mai puțin competitiv, potrivit elevilor cu medii medii-bune.",
    founded: 1972,
    address: "Str. Aurel Vlaicu nr. 12, Sector 1, București",
    website: "https://www.cnav.ro",
    phone: "+40 21 314 56 78",
    image: "https://images.unsplash.com/photo-1598618443855-232ee0f819f6?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1588072432836-e10032774350?w=600&q=80",
      "https://images.unsplash.com/photo-1541339907198-e08756dedf3f?w=600&q=80",
      "https://images.unsplash.com/photo-1562774053-701939374585?w=600&q=80",
      "https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 22, 2021: 21, 2022: 20, 2023: 18, 2024: 17, 2025: 16, 2026: 16 },
    mediiProfil: [
      { profil: "Matematică-Informatică", ultimaMedie: 9.10, locuri: 90, limba: "Română" },
      { profil: "Științe ale Naturii", ultimaMedie: 8.88, locuri: 60, limba: "Română" }
    ]
  },
  {
    id: 15,
    slug: "cantacuzino",
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
    desc: "Profil real echilibrat, cu accent pe biologie și chimie. Bune rezultate la bacalaureat.",
    founded: 1965,
    address: "Bd. Lacul Tei nr. 22, Sector 2, București",
    website: "https://www.cncantacuzino.ro",
    phone: "+40 21 242 33 11",
    image: "https://images.unsplash.com/photo-1597534458220-9fb4969f2df5?w=1200&q=80",
    gallery: [
      "https://images.unsplash.com/photo-1506784365847-bbad939e9335?w=600&q=80",
      "https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=600&q=80",
      "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&q=80",
      "https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&q=80"
    ],
    isNew: false,
    positions: { 2020: 20, 2021: 20, 2022: 19, 2023: 18, 2024: 17, 2025: 16, 2026: 15 },
    mediiProfil: [
      { profil: "Științe ale Naturii", ultimaMedie: 9.12, locuri: 90, limba: "Română" },
      { profil: "Matematică-Informatică", ultimaMedie: 8.95, locuri: 60, limba: "Română" }
    ]
  }
];

// Helper: get by id
function getLiceuById(id) {
  return allLicee.find(l => l.id === parseInt(id));
}

// Helper: get by slug
function getLiceuBySlug(slug) {
  return allLicee.find(l => l.slug === slug);
}

// Helper: get multiple by ids
function getLiceeByIds(ids) {
  return ids.map(id => getLiceuById(id)).filter(Boolean);
}

