<?php
     require_once('config.php');  
    $root = (!empty($_SERVER['HTTPS']) ? APP_SURL : APP_URL) . 'admin/';
//    $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/smc/admin/';
   // define('ROOT_URI', $root);
    ini_set('default_charset', 'UTF-8');

     include 'connect.php';  
    //Routes
    $tpl  = 'template/';    //Templates Directory
    $lang = 'languages/';    //Language Directory  
    $func = 'functions/';    //Functions Directory  
    $css  = $root.'/layout/css/';   //Css Directory
    $js   = $root.'/layout/js/';    //Js Directory
    
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
    //Include navbar on all pages execpt the one with out $noNavbar variable
//    if(!isset($noNavbar)){include $tpl.'navbar.php';} 


?>