<?php
include '../admin/function.php';
  
 //   ob_start("sanitize_output"); // Output buffering start
   ob_start(); // Output buffering start
   
 
    $pageTitle1='High school';        

include 'init.php';
global $con;
global $pageTitle1;
global $stmt1;
global $rows;
include '../template/header.php';
include('../template/pagination.php');
?>


  <div class="overlay" id="overlay"></div>

  <!-- MOBILE FILTER DRAWER -->
  <div class="filter-drawer" id="filterDrawer">
    <div class="filter-drawer-backdrop" id="drawerBackdrop"></div>
    <div class="filter-drawer-panel" id="drawerPanel">
      <div class="drawer-header">
        <h2>Filtre</h2>
        <button class="drawer-close" id="drawerClose">✕</button>
      </div>
    </div>
  </div>

  <!-- TOAST -->
  <div class="toast" id="toast">✓ Adăugat la lista ta!</div>

  <!-- PAGE -->
  <div class="page-wrapper">
    <div class="breadcrumb">
      <a href="index.html">Acasă</a>
      <span>›</span>
      <span>Toate Liceele</span>
    </div>

    <div class="shop-banner">
      <div>
        <h1>Toate Liceele din București</h1>
        <p>Explorează, compară și adaugă la lista ta. Găsește liceul perfect.</p>
      </div>
      <div class="banner-badge">15+ Licee disponibile</div>
    </div>

    <!-- COMPARE BAR -->
    <div class="compare-bar" id="compareBar">
      <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap">
        <span style="font-weight:900">Comparare:</span>
        <div class="compare-bar-names" id="compareBarNames"></div>
      </div>
      <button class="compare-go-btn" id="compareGoBtn">Compară acum →</button>
    </div>

    <div class="search-bar-wrap">
      <div class="search-input-wrap">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input class="search-input" id="searchInput" type="text" placeholder="Caută un liceu, profil sau specializare…">
      </div>
      <button class="mobile-filter-btn" id="mobileFilterBtn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 6h18M7 12h10M11 18h2"/></svg>
        Filtre
      </button>
      <button class="search-btn" id="searchBtn">Caută</button>
    </div>

    <div class="shop-main">
      <!-- FILTER SIDEBAR -->
      <aside class="filter-sidebar" id="filterSidebar">
        <div class="filter-card">
          <div class="filter-card-header">
            <h3>Profil</h3>
            <div class="filter-toggle">▾</div>
          </div>
          <div class="filter-options">
            <label class="filter-option"><input id="myCheck7" onclick="myFunction7();" type="checkbox" value="Real"  class="filter-profil"><div class="check-box"></div><span class="filter-option-label">Real</span><span class="filter-option-count"><?php echo profil('Real') ?></span></label>
            <label class="filter-option"><input id="myCheck8" onclick="myFunction8();" type="checkbox" value="Uman" class="filter-profil"><div class="check-box"></div><span class="filter-option-label">Umanist</span><span class="filter-option-count"><?php echo profil('Umanist')?>  </span></label>
            <label class="filter-option"><input id="myCheck9" onclick="myFunction9();" type="checkbox" value="Mixt" class="filter-profil"><div class="check-box"></div><span class="filter-option-label">Resurse naturale</span><span class="filter-option-count"><?php echo profil('Resurse naturale si Protecția mediului') ?></span></label>
            <label class="filter-option"><input id="myCheck10" onclick="myFunction10();" type="checkbox" value="Mixt" class="filter-profil"><div class="check-box"></div><span class="filter-option-label">Servicii</span><span class="filter-option-count"><?php echo profil('Servicii') ?></span></label>
            <label class="filter-option"><input id="myCheck11" onclick="myFunction11();" type="checkbox" value="Mixt" class="filter-profil"><div class="check-box"></div><span class="filter-option-label">Tehnic</span><span class="filter-option-count"><?php echo profil('Tehnic')?></span></label>
          </div>
        </div>
        <div class="filter-card">
          <div class="filter-card-header">
            <h3>Sector</h3>
            <div class="filter-toggle">▾</div>
          </div>
          <div class="filter-options">
            <label class="filter-option"><input id="myCheck1" onclick="myFunction1();" type="checkbox" value="Sector 1"  class="filter-sector"><div class="check-box"></div><span class="filter-option-label">Sector 1</span><span class="filter-option-count"><?= sector('Sector 1')?></span></label>
            <label class="filter-option"><input id="myCheck2" onclick="myFunction2();" type="checkbox" value="Sector 2" class="filter-sector"><div class="check-box"></div><span class="filter-option-label">Sector 2</span><span class="filter-option-count"><?= sector('Sector 2')?></span></label>
            <label class="filter-option"><input id="myCheck3" onclick="myFunction3();" type="checkbox" value="Sector 3" class="filter-sector"><div class="check-box"></div><span class="filter-option-label">Sector 3</span><span class="filter-option-count"><?= sector('Sector 3')?></span></label>
            <label class="filter-option"><input id="myCheck4" onclick="myFunction4();" type="checkbox" value="Sector 4" class="filter-sector"><div class="check-box"></div><span class="filter-option-label">Sector 4</span><span class="filter-option-count"><?= sector('Sector 4')?></span></label>
            <label class="filter-option"><input id="myCheck5" onclick="myFunction5();" type="checkbox" value="Sector 5" class="filter-sector"><div class="check-box"></div><span class="filter-option-label">Sector 5</span><span class="filter-option-count"><?= sector('Sector 5')?></span></label>
            <label class="filter-option"><input id="myCheck6" onclick="myFunction6();" type="checkbox" value="Sector 6" class="filter-sector"><div class="check-box"></div><span class="filter-option-label">Sector 6</span><span class="filter-option-count"><?= sector('Sector 6')?></span></label>
          </div>
        </div>
        <div class="filter-card">
          <div class="filter-card-header">
            <h3>Medie admitere</h3>
            <div class="filter-toggle">▾</div>
          </div>
          <div class="price-range-wrap">
            <div class="price-inputs">
              <input class="price-input" id="medieMin" type="number" value="5" min="5" max="10" step="0.1">
              <span class="price-sep">—</span>
              <input class="price-input" id="medieMax" type="number" value="10" min="5" max="10" step="0.1">
            </div>
            <input type="range" class="range-slider" id="medieSlider" min="5" max="10" step="0.1" value="10">
          </div>
        </div>
        <button class="apply-filters-btn" id="applyFilters">Aplică filtrele</button>
        <button class="clear-filters" id="clearFilters">Șterge toate filtrele</button>
      </aside>

      <!-- GRID AREA -->
      <div class="grid-area">
        <div class="active-filters" id="activePills"></div>

        <div class="sort-bar">
          <span class="results-count">
            Afișez <strong id="countShown">
              <?php 
              $pn = isset($_GET['pn']) ? $_GET['pn'] : 1; 
              if($pn * 9 > $rows){
                echo $rows;
              } else {    
              echo $pn * 9;
              } 
            ?>
            </strong> licee din <strong id="countTotal"><?= $rows ?></strong>
          </span>
          <div class="sort-controls">
            <span class="sort-label">Sortează:</span>
            <select class="sort-select" id="sortSelect">
              <option value="default">Recomandate</option>
              <option value="rating-desc">Rating descrescător</option>
              <option value="rating-asc">Rating crescător</option>
              <option value="medie-desc">Medie admitere ↓</option>
              <option value="medie-asc">Medie admitere ↑</option>
              <option value="name-asc">Nume A–Z</option>
              <option value="name-desc">Nume Z–A</option>
            </select>
            <div class="view-toggle">
              <button class="view-btn active" id="gridViewBtn" title="Grid">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><rect x="3" y="3" width="8" height="8" rx="1"/><rect x="13" y="3" width="8" height="8" rx="1"/><rect x="3" y="13" width="8" height="8" rx="1"/><rect x="13" y="13" width="8" height="8" rx="1"/></svg>
              </button>
              <button class="view-btn" id="listViewBtn" title="Listă">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/></svg>
              </button>
            </div>
          </div>
        </div>
     
     
     
        <div class="products-grid" id="productsGrid">

        <!-- <div class="product-card" style="animation-delay: .1s">

            
            <div class="card-image-wrap">
              <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=1200&q=80" alt="Colegiul Național „Sfântul Sava”" loading="lazy">
              <div class="card-overlay"></div>
            </div>
            <div class="card-body">
              <div class="card-category">Real · Sector 5</div>
              <div class="card-title">Colegiul Național „Gheorghe Lazăr”</div>
              <div class="card-desc">Tradiție academică de excepție, cu performanțe remarcabile la matematică și informatică. Locul de formare al multor olimpici naționali și internaționali.</div>

              <div class="card-stats">
                <div class="stat-chip">1,200</div>
                <div class="stat-chip">34 clase</div>
              </div>

              <div style="display:flex;align-items:center;gap:6px;margin-top:2px">
                <div style="display:flex;gap:2px">
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                </div>

                <span font-size:12px;font-weight:400;color:var(--text-muted)>5 (300)</span>
              </div>

              <div class="card-price-row">
                <div>
                  <div class="price-unit">Medie admitere</div>
                  <div class="price-main">9.88</div>
                </div>
                <div style="display:flex;gap:8px">
                  <button class="add-btn" >
                    Compară
                  </button>
                </div>
              </div>
            </div>
          </div>-->

<?php           
   

 $rows1 = $stmt1->fetchAll();
                foreach($rows1 as $row){?>





  

         <div class="product-card" style="animation-delay: .1s">

            
            <div class="card-image-wrap">
            <a href="liceu_page.php?id=<?php echo $row['id_numa_liceu']; ?>" target="_blank"> 
            <img src="../admin/layout/images/liceu/<?php echo $row['photo'] ?>" alt="<?php echo $row['tip'].' '.$row['name'] ?>" loading="lazy">
            <div class="card-overlay"></div>
            </a> 
            </div>
            <div class="card-body">
              <div class="card-category"><?= $row['zone'] ?></div>
              <div class="card-title"><?php echo $row['tip'].' '.$row['name'] ?></div>
              <div class="card-desc">Tradiție academică de excepție, cu performanțe remarcabile la matematică și informatică. Locul de formare al multor olimpici naționali și internaționali.</div>

              <div class="card-stats">
                <div class="stat-chip">Nr de Locuri</div>
                <div class="stat-chip"><?php echo place($row['name']) ?> </div>
              </div>

              <!--<div style="display:flex;align-items:center;gap:6px;margin-top:2px">
                <div style="display:flex;gap:2px">
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                  <span style="font-size:12px;color:#f5c518">★</span>
                </div>

                <span font-size:12px;font-weight:400;color:var(--text-muted)>5 (300)</span>
              </div>-->

              <div class="card-price-row">
                <div>
                  <div class="price-unit">Medie admitere</div>
                  <div class="price-main"><?php echo media($row['name']) ?></div>
                </div>
                <div style="display:flex;gap:8px">
                  <button class="add-btn" >
                    Compară
                  </button>
                </div>
              </div>
            </div>
          </div>
  
<?php
}
 ?>


        </div>
        
                <br>
                <div style="width: 300%;" id="pagination_controls"><?php echo $paginationCtrls; ?></div>


        <div class="empty-state" id="emptyState">
          <div class="empty-icon"></div>
          <h3>Niciun liceu găsit</h3>
          <p>Încearcă să ajustezi filtrele sau termenul de căutare.</p>
        </div>
        <div class="pagination" id="pagination"></div>
      </div>
    </div>
  </div>

<?php 

if(isset($_SESSION['name1']) && isset($_SESSION['name2'])){

  $name1 = $_SESSION['name1'];
  $name2 = $_SESSION['name2'];
  $stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "filter  WHERE rand1 = ? AND rand2 = ?");
  $stmt->execute(array($name1, $name2));
  $rows2 = $stmt->fetch();

    if($rows2['s1'] == 1){
    echo '<script>document.getElementById("myCheck1").click();</script>';
    }else{
      echo '<script>document.getElementById("myCheck1").checked = false;</script>';
    }

    if($rows2['s2'] == 1){
      echo '<script>document.getElementById("myCheck2").click();</script>'; 
    }else{
      echo '<script>document.getElementById("myCheck2").checked = false;</script>';
    }

    if($rows2['s3'] == 1){
      echo '<script>document.getElementById("myCheck3").click();</script>'; 
    }else{
      echo '<script>document.getElementById("myCheck3").checked = false;</script>';
    }

    if($rows2['s4'] == 1){
      echo '<script>document.getElementById("myCheck4").click();</script>'; 
    }else{
      echo '<script>document.getElementById("myCheck4").checked = false;</script>';      
    } 

    if($rows2['s5'] == 1){
      echo '<script>document.getElementById("myCheck5").click();</script>'; 
    }else{
      echo '<script>document.getElementById("myCheck5").checked = false;</script>';      
    }
    
    if($rows2['s6'] == 1){
      echo '<script>document.getElementById("myCheck6").click();</script>'; 
    }else{
        echo '<script>document.getElementById("myCheck6").checked = false;</script>';
    }      
   if($rows2['p1'] == 1){
    echo '<script>document.getElementById("myCheck7").click();</script>';
    }else{
      echo '<script>document.getElementById("myCheck7").checked = false;</script>';
    }
   if($rows2['p2'] == 1){
    echo '<script>document.getElementById("myCheck8").click();</script>';
    }else{
      echo '<script>document.getElementById("myCheck8").checked = false;</script>';
    }
   if($rows2['p3'] == 1){
    echo '<script>document.getElementById("myCheck9").click();</script>';
    }else{
      echo '<script>document.getElementById("myCheck9").checked = false;</script>';
    }
   if($rows2['p4'] == 1){
    echo '<script>document.getElementById("myCheck10").click();</script>';
    }else{
      echo '<script>document.getElementById("myCheck10").checked = false;</script>';
    }
   if($rows2['p5'] == 1){
    echo '<script>document.getElementById("myCheck11").click();</script>';
    }else{
      echo '<script>document.getElementById("myCheck11").checked = false;</script>';
    }


}

include '../template/footer.php'; ?>
