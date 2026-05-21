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
$id = $_GET['id'];

        $stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "numa_liceu  WHERE id_numa_liceu = ? AND stopx = 0");
        $stmt->execute(array($id));
        $rows = $stmt->fetch();
        $s_name = $rows['name'];




          $stmt1 = $con->prepare("SELECT * FROM " . DB_PREFIX . "liceu  WHERE name = ? AND stopx = 0");
          $stmt1->execute(array($s_name));
          $row1 = $stmt1->fetchAll();

          $stmt2 = $con->prepare("SELECT * FROM " . DB_PREFIX . "medie  WHERE name = ? AND stopx = 0");
          $stmt2->execute(array($s_name));
          $row2 = $stmt2->fetchAll();

          $stmt3 = $con->prepare("SELECT * FROM " . DB_PREFIX . "poztion  WHERE name = ? AND stopx = 0");
          $stmt3->execute(array($s_name));
          $row3 = $stmt3->fetchAll();

          $stmt4 = $con->prepare("SELECT DISTINCT profil FROM " . DB_PREFIX . "liceu  WHERE name = ? AND stopx = 0");
          $stmt4->execute(array($s_name));
          $row4 = $stmt4->fetchAll();


?>
<div class="overlay" id="overlay"></div>

<div class="toast" id="toast">Adăugat la favorite!</div>

<div class="page-wrapper">

  <!-- BREADCRUMB -->
  <div class="breadcrumb">
    <a href="../acasa.html">Acasă</a>
    <span>›</span>
    <a href="liceu.php">Toate Liceele</a>
    <span>›</span>
    <span><?php echo $rows['tip']. ' '.$rows['name']; ?></span> 
  </div>

  <div class="product-main">

    <!-- HERO: gallery + info -->
    <div class="product-top">

      <div class="gallery-col fade-in">
        <div class="main-image-wrap">
          <img id="mainImg"
               src="../admin/layout/images/liceu/<?php echo $rows['photo'] ?>"
               alt="<?php echo $rows['tip']. ' '.$rows['name']; ?>">
          <div class="main-image-overlay"></div>
        </div>
        <div class="thumb-row">
          <div class="thumb active" onclick="setImg(this,'https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=1200&q=80')">
            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=200&q=70" alt="">
          </div>
          <div class="thumb" onclick="setImg(this,'https://images.unsplash.com/photo-1562774053-701939374585?w=1200&q=80')">
            <img src="https://images.unsplash.com/photo-1562774053-701939374585?w=200&q=70" alt="">
          </div>
        </div>
      </div>

      <div class="info-col fade-in fade-in-1">
        <h1 class="school-name"><?php echo $rows['tip']?><br><?php echo $rows['name']?></h1>

        <p class="school-desc">
          Unul dintre cele mai prestigioase colegii naționale din România, cu o tradiție de peste 170 de ani. Colegiul Gheorghe Lazăr formează anual sute de absolvenți care accesează universități de top din țară și din străinătate. Profilul dominant este matematică-informatică, cu rezultate remarcabile la olimpiade naționale și internaționale.
        </p>

        <div class="quick-stats">
          <div class="stat-box">
            <div class="stat-icon"></div>
            <div class="stat-value"><?php echo  place($rows['name']) ?></div>
            <div class="stat-label">Elevi</div>
          </div>
          <div class="stat-box">
            <div class="stat-icon"></div>
            <div class="stat-value">4</div>
            <div class="stat-label">Profiluri</div>
          </div>
          <div class="stat-box">
            <div class="stat-icon"></div>
            <div class="stat-value"><?php echo  media($rows['name']) ?></div>
            <div class="stat-label">Medie min. 2025</div>
          </div>
        </div>


      </div>
    </div>

    <!-- BOTTOM: specs left, admitere right -->
    <div class="bottom-grid"> 

      <!-- SPECIFICAȚII -->
      <div class="section-block fade-in fade-in-2">
        <div class="section-header">
          <h2>Specificații</h2>
        </div>
        <div class="section-body" style="padding:0;">
          <table class="specs-table">
            <tr><td>Denumire oficială</td><td><?php echo $rows['tip']. ' '.$rows['name']; ?></td></tr>
            <tr><td>Locație</td><td><?php echo $rows['address']; ?></td></tr>
            <tr><td>Sector</td><td><?php echo $rows['zone']; ?></td></tr>
            <tr><td>Program</td><td>Luni – Vineri, 08:00 – 16:00</td></tr>
            <tr><td>Tip liceu</td><td><?php echo $rows['tip']; ?></td></tr>
            <tr><td>Profiluri</td><td>
              <?php foreach($row4 as $row4) { ?>
                <span class="spec-badge"><?php echo $row4['profil'].','; ?></span>
              <?php } ?>  

            
            </td></tr>
            <tr><td>Număr elevi</td><td><?php echo  place($rows['name'])?></td></tr>
            <tr><td>Site oficial</td><td><a class="spec-link" href="https://cngl.ro" target="_blank">cngl.ro ↗</a></td></tr>
          </table>
        </div>
      </div>

      <!-- ISTORICUL ADMITERII -->
      <div class="section-block fade-in fade-in-3">
        <div class="section-header">
          <h2>Istoricul Admiterii</h2>
        </div>
        <div class="section-body" style="display:flex;flex-direction:column;gap:24px;">

          <div style="display:flex;gap:8px;border-bottom:2px solid var(--border);padding-bottom:0;">
            <button class="adm-tab active" onclick="switchTab('medii',this)">Arhivă medii</button>
            <button class="adm-tab" onclick="switchTab('pozitii',this)">Arhivă poziții</button>
          </div>

          <!-- MEDII -->
          <div id="tab-medii">
            <p style="font-size:13px;font-weight:600;color:var(--text-muted);margin-bottom:14px;">Ultima medie acceptată pe specializare și an</p>
            <div class="admitere-table-wrap">
              <table class="admitere-table arch-table">
                <thead>
                  <tr>
                    <th style="text-align:left;">Specializare</th>
                    <th>Bilingv</th>
                    <th>2025</th><th>2024</th><th>2023</th><th>2022</th><th>2021</th><th>2020</th>
                  </tr>
                </thead>
                <tbody>
                <?php           
 
                foreach($row2 as $row2){?>
  
                
                
                <tr>
                    <td class="spec-name"><?= $row2['specializare'];?></td>
                    <td class="bil-cell"><?= $row2['bilingv'];?></td>
                    <td><span class="medie-badge high"><?php echo $row2['u_medie_2025'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_medie_2024'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_medie_2023'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_medie_2022'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_medie_2021'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_medie_2020'];?></span></td>
                  </tr>
<?php
}
 ?>
                </tbody>
              </table>
            </div>
            
          </div>

          <!-- POZITII -->
          <div id="tab-pozitii" style="display:none;">
            <p style="font-size:13px;font-weight:600;color:var(--text-muted);margin-bottom:14px;">Locul în ierarhia din București al ultimului elev admis pe fiecare specializare</p>
            <div class="admitere-table-wrap">
              <table class="admitere-table arch-table">
                <thead>
                  <tr>
                    <th style="text-align:left;">Specializare</th>
                    <th>Bilingv</th>
                    <th>2025</th><th>2024</th><th>2023</th><th>2022</th><th>2021</th><th>2020</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>

                 <?php           
 
                foreach($row3 as $row2){?>
                 
                    <td class="spec-name"><?= $row2['specializare'];?></td>
                    <td class="bil-cell"><?= $row2['bilingv'];?></td>
                    <td><span class="medie-badge high"><?php echo $row2['u_pozition_2025'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_pozition_2024'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_pozition_2023'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_pozition_2022'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_pozition_2021'];?></span></td>
                    <td><span class="medie-badge high"><?= $row2['u_pozition_2020'];?></span></td>
                  </tr>
<?php
}
 ?>
             </tbody>
              </table>
            </div>
            <p style="font-size:12px;color:var(--text-muted);margin-top:12px;">* Pozițiile reprezintă locul în ierarhia generală a candidaților din București.</p>
          </div>

        </div>
      </div>

    </div><!-- /bottom-grid -->

  </div><!-- /product-main -->

  <!-- FOOTER -->
  <footer>
    <div class="footer-logo">Ǝliceu</div>
    <div class="footer-grid">
      <div>
        <h3>Platformă</h3>
        <a href="#">Toate liceele</a>
        <a href="#">Specializări</a>
        <a href="#">Test de orientare</a>
        <a href="#">Compară licee</a>
      </div>
      <div>
        <h3>Informații</h3>
        <a href="#">Despre noi</a>
        <a href="#">Contact</a>
        <a href="#">GDPR &amp; Confidențialitate</a>
        <a href="#">Termeni și condiții</a>
      </div>
      <div>
        <h3>Contact</h3>
        <a href="#">contact@eliceu.ro</a>
        <a href="#">+40 721 000 000</a>
        <a href="#">București, România</a>
      </div>
    </div>
  </footer>

</div><!-- /page-wrapper -->

<script>
  const menuBtn  = document.getElementById('menuBtn');
  const closeBtn = document.getElementById('closeBtn');
  const sidebar  = document.getElementById('sidebar');
  const overlay  = document.getElementById('overlay');

  menuBtn.addEventListener('click', () => { sidebar.classList.add('active'); overlay.classList.add('active'); });
  closeBtn.addEventListener('click', closeSidebar);
  overlay.addEventListener('click', closeSidebar);
  function closeSidebar() { sidebar.classList.remove('active'); overlay.classList.remove('active'); }

  function setImg(thumb, src) {
    document.getElementById('mainImg').src = src;
    document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
    thumb.classList.add('active');
  }

  const toast = document.getElementById('toast');
  function showToast(msg) {
    toast.textContent =msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
  }

  let compareActive = false;
  function toggleCompare() {
    compareActive = !compareActive;
    const btn = document.getElementById('compareBtn');
    if (compareActive) { btn.textContent = 'Adăugat la comparație'; btn.classList.add('active'); showToast('Adăugat la comparație!'); }
    else { btn.innerHTML = 'Compară'; btn.classList.remove('active'); }
  }

  function switchTab(tab, btn) {
    document.getElementById('tab-medii').style.display   = tab === 'medii'   ? 'block' : 'none';
    document.getElementById('tab-pozitii').style.display = tab === 'pozitii' ? 'block' : 'none';
    document.querySelectorAll('.adm-tab').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  }

  function openMap() {
    window.open('https://maps.google.com/?q=Colegiul+National+Gheorghe+Lazar+Bucuresti', '_blank');
  }
</script>
</body>
</html>