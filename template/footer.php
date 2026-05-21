 <?php 
$root = (!empty($_SERVER['HTTPS']) ? APP_SURL : APP_URL) . 'admin/';
$js  = $root.'/layout/js/'; 
?>
<!-- Scripts -->
    <script src="<?php echo $js; ?>script.js"></script>
  </body>
</html>