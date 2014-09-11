<?php
require '../extras/config.php';
$srno = $_POST['srno'];
$a = urlencode("1");
$b = urlencode($srno);
header("location:../index_step3.php?ajax=$a&srno=$b");
?>