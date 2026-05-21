<?php
     session_start(); //array
  
    include 'function.php';

    if (isset($_SESSION['username'])){ // If the user is login
        $pageTitle1='DASHBOARD';
        include 'init1.php';

        ////////////////////////////// Start Dashboard page //////////////////////////////////
        $numUser = 5; // Number of latest users
        $latestUsers=getLatest('*','users','UserID',$numUser ); // latest users array

        
        $numComment = 5; // Number of latest comments

        $edit= lang ('EDIT');
        $dele= lang ('DELETE');
        $acte= lang ('ACTIVATE');
        $appr= lang ('APPROVE');
        $root = (!empty($_SERVER['HTTPS']) ? APP_SURL : APP_URL) ;
       // define('ROOT_URI', $root);

        


?>
    <div class="dashboard-container">
      <!-- Dashboard Sidebar -->
<?php
  include 'template/sidebar.php';
?>
      <!-- Dashboard Sidebar Overlay -->


      <div class="dashboard-sidebar-overlay" id="dashboardSidebarOverlay"></div>
      <!-- Dashboard Main Content -->
      <main class="dashboard-main">
        <!-- Dashboard Header -->
<?php
  include 'template/header_main.php';   
  include 'template/content.php';

?>
        <!-- Dashboard Content -->

      </main>
    </div>
<?php
         include $tpl.'footer.php';
    } else{
        header('Location: index.php');  //Go back to index page
        exit();
    }

    ob_end_flush(); // Release the output
      ?>
