<?php

session_start();
include 'connect.php';  
global $con;

if(!isset($_SESSION['name1']) || !isset($_SESSION['name2'])){

    $_SESSION['name1'] = rand();
    $_SESSION['name2'] = rand();
}


$name1 = $_SESSION['name1'];
$name2 = $_SESSION['name2'];

$var = $_POST['name'];

$field = substr($var, 0, 2);
$val   = substr($var, -1);

$stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "filter  WHERE rand1 = ? AND rand2 = ? ");
$stmt->execute(array($name1, $name2));

$rows = $stmt->rowCount();

$row1 = $stmt->fetch();

if($rows == 1){

    
    if($row1['c1'] == $var){
        
    $stmt = $con->prepare("UPDATE " . DB_PREFIX . "filter SET c1 = ? WHERE rand1 = ? AND rand2 = ?");
    $stmt->execute(array('0', $name1, $name2));

     }elseif($row1['c2'] == $var){


    $stmt = $con->prepare("UPDATE " . DB_PREFIX . "filter SET c2 = ? WHERE rand1 = ? AND rand2 = ?");
    $stmt->execute(array('0', $name1, $name2));

     }elseif($row1['c3'] == $var){


    $stmt = $con->prepare("UPDATE " . DB_PREFIX . "filter SET c3 = ? WHERE rand1 = ? AND rand2 = ?");
    $stmt->execute(array('0', $name1, $name2));

     }
}

?>