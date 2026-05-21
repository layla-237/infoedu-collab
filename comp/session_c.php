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


$stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "filter  WHERE rand1 = ? AND rand2 = ? ");
$stmt->execute(array($name1, $name2));
$rows = $stmt->rowCount();
$row1 = $stmt->fetch();
echo "hhhSession variables set: name1 = $name1, name2 = $name2, var = $var";

if($rows == 1){
    echo "xxxxxxxxxxxxxx";
    if($row1['c1'] != $var && $row1['c2'] != $var && $row1['c3'] != $var){
        
    if($row1['c1'] == 0){
            $stmt = $con->prepare("UPDATE " . DB_PREFIX . "filter SET c1 = ? WHERE rand1 = ? AND rand2 = ?");
            $stmt->execute(array($var, $name1, $name2));
        } elseif($row1['c2'] == 0){
            $stmt = $con->prepare("UPDATE " . DB_PREFIX . "filter SET c2 = ? WHERE rand1 = ? AND rand2 = ?");
            $stmt->execute(array($var, $name1, $name2));        
        }elseif($row1['c3'] == 0){
            $stmt = $con->prepare("UPDATE " . DB_PREFIX . "filter SET c3 = ? WHERE rand1 = ? AND rand2 = ?");
            $stmt->execute(array($var, $name1, $name2));        
        }
        
  }
}

  if($rows !=1){
    echo "Value already exists in one of the columns.";
    $stmt = $con->prepare("INSERT INTO " . DB_PREFIX . "filter (rand1, rand2, c1) VALUES (?, ?, ?)");

    $stmt->execute(array($name1, $name2, $var));
}


?>