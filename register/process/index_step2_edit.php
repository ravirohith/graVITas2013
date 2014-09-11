<?php
require '../extras/config.php';
require '../extras/session_set.php';
$srno = htmlentities(mysql_real_escape_string($_POST['srno']));
$name = htmlentities(mysql_real_escape_string($_POST['name']));
$phone = htmlentities(mysql_real_escape_string($_POST['phone']));
$query = "UPDATE participants SET name='$name',phone=$phone WHERE srno=$srno";
mysql_query($query) or die(mysql_error());
header("location:../index_step2.php"); 
?>