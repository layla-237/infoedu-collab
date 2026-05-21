 <?php 
$root = (!empty($_SERVER['HTTPS']) ? APP_SURL : APP_URL) . 'admin/';
$js  = $root.'../src/js/'; 
?>



  <footer>
    <div class="footer-logo">Ǝliceu</div>
    <div class="footer-grid">
      <div>
        <h3>Navigare</h3>
        <a href="licee.html">Toate Liceele</a>
        <a href="#">Favorite</a>
        <a href="compare.html">Comparare</a>
        <a href="indexf.html">Înregistrare</a>
      </div>
      <div>
        <h3>Resurse</h3>
        <a href="#">Test de îndrumare</a>
        <a href="#">Evenimente</a>
      </div>
      <div>
        <h3>Legal</h3>
        <a href="#">Termeni și condiții</a>
        <a href="#">Cookies</a>
      </div>
    </div>
  </footer>

  <script src="<?php echo $js; ?>liceu.js"></script>
</body>
</html>


