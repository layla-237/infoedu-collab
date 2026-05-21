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
echo "Session variables set: name1 = $name1, name2 = $name2";
$var = $_POST['name'];

$field = substr($var, 0, 2);
$val   = substr($var, -1);

$stmt = $con->prepare("SELECT * FROM " . DB_PREFIX . "filter  WHERE rand1 = ? AND rand2 = ?");
$stmt->execute(array($name1, $name2));

$rows = $stmt->rowCount();

if($rows == 1){

    $stmt = $con->prepare("UPDATE " . DB_PREFIX . "filter SET $field = ? WHERE rand1 = ? AND rand2 = ?");
    $stmt->execute(array($val, $name1, $name2));

} else {

    $stmt = $con->prepare("
        INSERT INTO " . DB_PREFIX . "filter
        (rand1, rand2, $field)
        VALUES (?, ?, ?)
    ");

    $stmt->execute(array($name1, $name2, $val));
}

?>