<?php
include '../connect.php';
global $con;

if(isset($_POST['action']) && $_POST['action'] == 'add'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $stmt = $con->prepare("INSERT INTO " . DB_PREFIX . "users (`UserName`, `Email`, `Language`, `FullName`) VALUES (?, ?, ?, ?)");
    $status = $stmt->execute([$name, $email, $phone, $address]);

    if($status){
        header("Location: index.php");
        exit;
    }else{
        echo "error";
    }
}
//delete
if(isset($_POST['delete']) && $_POST['action'] == 'delete'){
    $id = $_GET['id'];
    $stmt = $con->prepare("UPDATE `users` SET `stopx`=? WHERE `id` = ?");
    $status = $stmt->execute(['1', $id]);
    if($status){
        header("Location: index.php");
        exit;
    }else{
        echo "error";
    }
}
//update
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $stmt = $con->prepare("UPDATE `users` SET `name`=?, `email`=?, `phone`=?, `address`=? WHERE `id` = ?");
    $status = $stmt->execute([$name, $email, $phone, $address, $id]);
    if($status){
        header("Location: index.php");
        exit;
    }else{
        echo "error";
    }
}


?>