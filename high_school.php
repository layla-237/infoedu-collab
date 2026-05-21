<?php
include 'function.php';
  
    ob_start("sanitize_output"); // Output buffering start
 //  ob_start(); // Output buffering start
   
  
    $pageTitle1='High school';        

include 'init.php';


$_SESSION['setlang'] = 'yes';
$_SESSION['url'] = 'table/';
$_SESSION['addbutton'] = lang('ADD NEW SCHOOL');
$_SESSION['formidname'] = 'opti_form';
$_SESSION['tableidname'] = 'opti_data';
$_SESSION['modaltitle'] = lang('EDIT SCHOOL'); //ok
$_SESSION['modaldatatarget'] = '#optiModal'; //ok $modaIDlName = #-$modalDataTarget
$_SESSION['modalidname'] = 'optiModal';//ok $modaIDlName = #-$modalDataTarget
$_SESSION['dbname'] = DB_PREFIX . 'numa_liceu';
$_SESSION['keyid'] = 'id_numa_liceu';
$_SESSION['Where'] = " WHERE  stopx=0";
$_SESSION['cfield'] = '';
$_SESSION['status'] = '';
$_SESSION['vfield'] = '';
$_SESSION['searchfield'] = array('name', 'city', 'zone', 'address', 'photo');
$_SESSION['fieldname'] = array('id_numa_liceu', 'name', 'description', 'city', 'zone', 'address', 'photo', 'program_9', 'program_10', 'program_11', 'program_12'); // create an array
$_SESSION['selectOption'] = array('tx', 'tx', 'ta', 'scity', 'szone', 'tx', 'im', 'sprg', 'sprg', 'sprg', 'sprg');
$_SESSION['selectfield'] = ('id_numa_liceu');
$_SESSION['placeholder'] = array('SCHOOL NAME', 'DESCRIPTION', 'CITY', 'ZONE', 'ADDRESS', 'PHOTO', 'PROGRAM 9', 'PROGRAM 10', 'PROGRAM 11', 'PROGRAM 12');
$_SESSION['required'] = array('required', 'required', 'required', 'required', 'required', 'required', 'required', 'required', 'required', 'required');
$_SESSION['labelmname'] =  array('SCHOOL NAME', 'DESCRIPTION', 'CITY', 'ZONE', 'ADDRESS', 'PHOTO', 'PROGRAM 9', 'PROGRAM 10', 'PROGRAM 11', 'PROGRAM 12');
$_SESSION['maxlength'] = array(11, 45, array(6, 50), 45, 45, 45, 45, 45, 45, 45, 45);
$_SESSION['tableheader'] = array('SCHOOL NAME', 'CITY', 'ZONE', 'ADDRESS', 'PHOTO');
$_SESSION['tableclass'] = array('hidden', '', 'hidden', '', '', '', '', 'hidden', 'hidden', 'hidden', 'hidden');
$_SESSION['Columns'] = array( 0 => 'name',1 => 'city',);


include 'table/index.php';


?>
