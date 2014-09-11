<?php
require 'config.php';
$contingent = htmlentities(mysql_real_escape_string($_POST['contingent']));
$password = htmlentities(mysql_real_escape_string($_POST['contingent_password']));
$ans = mysql_query("SELECT * FROM colleges WHERE contingent=$contingent && contingent_password='$password'") or die(mysql_error());
if(mysql_num_rows($ans))
{
	session_start();
	$res=mysql_fetch_assoc($ans);
	$_SESSION['conti'] = $res['contingent'];
    $_SESSION['college_name'] = $res['college_name']; 
	//echo "success"; 
	header('Location:../index_view.php');
}
else{
	//echo "failure";
	header('Location:../index.php');
}
?>