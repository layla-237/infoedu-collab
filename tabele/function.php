<?php

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = '../../../uploads/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($dbName,$keyId,$user_id)
{
	include('../../../connect.php');
	$statement = $con->prepare("SELECT image FROM $dbName WHERE $keyId= '$user_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["image"];
	}
}

function get_total_all_records($dbName)
{
	include('../../../connect.php');
	$statement = $con->prepare("SELECT * FROM $dbName");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

function clearSession($name=null){
    session_start();
    unset($_SESSION['currency']);
    return;
}

    
    function checkItem($select ,$from,$value){
        
    	include('../../../connect.php');
        $statement = $con->prepare("SELECT $select FROM " . DB_PREFIX . "$from WHERE $select LIKE ?");
        $statement->execute(array($value));
        $count = $statement->rowCount();
        return $count;
        
        
    }

    
    function checkCurr($value){
        
    	include('../../../connect.php');
        $statement = $con->prepare("SELECT Name FROM " . DB_PREFIX . "currencies WHERE Name LIKE ? AND Base='1' ");
        $statement->execute(array($value));
        $count = $statement->rowCount();
        if ($count ==1) {
            $statement = $con->prepare("SELECT Account_No FROM " . DB_PREFIX . "accsetup WHERE Prg_Name='bank' ");
            $statement->execute();
            $result=$statement->fetch();
            $result1= $result['Account_No'];
            
        }else{
            $statement = $con->prepare("SELECT Account_No FROM " . DB_PREFIX . "accsetup WHERE Prg_Name='bank1' ");
            $statement->execute();
            $result=$statement->fetch();
            $result1= $result['Account_No'];
            
        }
        
        return $result1;
        
        
    }



    function checkItemlike($select ,$from,$value,$and =null){
        
        global $con;
        
        $statement = $con->prepare("SELECT $select FROM " . DB_PREFIX . "$from WHERE $select LIKE ? $and");
        
        $statement->execute(array($value));
        
        $count = $statement->rowCount();
        
        return $count;
        
        
    }



function currencybase(){

	include('../../../connect.php');
    $stat3 = $con->prepare("SELECT Currency_ID , Title FROM " . DB_PREFIX . "currencies WHERE Base = 1  AND Cash_R='1' AND stopx = '0'");
    $stat3->execute();
    $curr  = $stat3->fetchAll();
    foreach($curr as $cur){
       $vv =$cur['Title']; 
    }
    return $vv;

    
}


?>