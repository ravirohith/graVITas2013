<?php
session_start();
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$res = mysql_fetch_assoc(mysql_query($query));
$dbusername = $res['username'];
if(!($username == $dbusername))
header("location:internals.php");
?>