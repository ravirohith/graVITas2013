<?php
require '../extras/config.php';
session_start();
$query = "SELECT * FROM colleges ORDER BY contingent DESC LIMIT 1";
	$ans = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	if(mysql_num_rows($ans)==0){
		$contingent = 10000;
	}
	else{
		$conti = $res['contingent'];
		$contingent = $conti + 1;
	}
$college_name = htmlentities(mysql_real_escape_string($_POST['searchField']));
$password = htmlentities(mysql_real_escape_string($_POST['contingent_password']));
$repassword = htmlentities(mysql_real_escape_string($_POST['recontingent_password']));
$email = htmlentities(mysql_escape_string($_POST['regemail']));
$no_of_participants = htmlentities(mysql_real_escape_string($_POST['regnop']));
if($password!==$repassword || empty($password) || empty($repassword) ){
header("location:../register.php");
}
else{

$query = "INSERT INTO colleges(college_name,contingent,contingent_password,email,no_of_participants) 
		  VALUES('$college_name',$contingent,'$password','$email',$no_of_participants)";
mysql_query($query) or die(mysql_error());


$_SESSION['conti'] = $contingent;
$_SESSION['college_name'] = $college_name;
header("location:../index_step2.php"); 
}
?>