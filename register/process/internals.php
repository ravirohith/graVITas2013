<?php
session_start();
require '../extras/config.php';
$username = htmlentities(mysql_real_escape_string($_POST['username']));
$password = htmlentities(mysql_real_escape_string($_POST['password']));
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$ans = mysql_query($query) or die(mysql_error());
$res = mysql_fetch_assoc($ans);
$dbusername = $res['username'];
$dbpassword = $res['passsword'];
$count = mysql_num_rows($ans);
echo $count;
echo $username;
echo $password;
if($count)
{
header("location:../internals_approve.php");

$_SESSION['username'] = $_POST['username'];
}
else
header("location:../internals.php");
?>