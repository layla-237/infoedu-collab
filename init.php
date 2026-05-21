<?php
   session_start();
    require_once('config.php');  
    $root = (!empty($_SERVER['HTTPS']) ? APP_SURL : APP_URL) . 'admin/';
    ini_set('default_charset', 'UTF-8');
    
    include 'connect.php';  
    $tpl  = 'template/';    //Templates Directory
    $lang = 'languages/';    //Language Directory  
    $func = 'functions/';    //Functions Directory  
    $css  = $root.'layout/css/';   //Css Directory
    $js   = $root.'layout/js/';    //Js Directory

    $path = $_SERVER['REQUEST_URI'];
    $urlParts = explode("/", $path);
    if( $_SESSION['dir']  !=$urlParts[1]){
        session_unset();     // unset $_SESSION variable for the run-time 
        session_destroy();   // destroy session data in storage
        header('Location: index.php');
                
    }
    
    
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago

    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header('Location: index.php');
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
        include $tpl.'header.php';
//        include 'sendmail.php';
        //Include navbar on all pages execpt the one with out $noNavbar variable
      //  if(!isset($noNavbar)){include $tpl.'sidebar.php';} 
        
    
}



?>


