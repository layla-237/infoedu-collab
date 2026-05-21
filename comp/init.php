<?php
   session_start();
    require_once('config.php');  
    $root = (!empty($_SERVER['HTTPS']) ? APP_SURL : APP_URL) . 'comp/';
    ini_set('default_charset', 'UTF-8');
    
    include 'connect.php';  
    $tpl  = '../admin/template/';    //Templates Directory
    $lang = '../admin/languages/';    //Language Directory  
    $func = '../admin/functions/';    //Functions Directory  
    $css  = $root.'../admin/layout/css/';   //Css Directory
    $js   = $root.'../admin/layout/js/';    //Js Directory

    $path = $_SERVER['REQUEST_URI'];
    $urlParts = explode("/", $path);
    
    
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago

    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header('Location: ../index.html');
  //  header("Refresh: $sec; url=index.php");
      //  sleep(5);

}else{
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    
        //Include the important files 
         
         If(isset($_SESSION['Language'])){
           
           $Language =$_SESSION['Language'].'.php' ; 
           include $lang.$Language;
         }else{
           
           include $lang.'en.php';
         }   
        
        $pageTitle=lang($pageTitle1);
        include $func.'functions.php';
       // include $tpl.'header.php';
//        include 'sendmail.php';
        //Include navbar on all pages execpt the one with out $noNavbar variable
      //  if(!isset($noNavbar)){include $tpl.'sidebar.php';} 
        
    
}



?>


