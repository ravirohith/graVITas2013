<?php
require '../extras/config.php';
$srno = htmlentities(mysql_real_escape_string($_POST['srno']));
$query = "DELETE FROM participants WHERE srno=$srno";
mysql_query($query) or die(mysql_error());
header("location:../index_step2.php");
?>