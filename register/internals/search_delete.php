<?php
session_start();
require '../process/config.php';
$receipt_no = $_POST['receipt_no'];
$query = "SELECT * FROM bill WHERE receipt_no = '$receipt_no'";
$ans = mysql_query($query) or die("Unable to select from bill");

$res = mysql_fetch_assoc($ans);
$name = $res['name'];
$registration = $res['registration'];
$contact_no = $res['contact_no'];
$event_name = $res['event_name'];
$seats = $res['seats'];
$amount = $res['amount'];
$username = $res['username'];
$date = $res['date'];
$deleted_username = $_SESSION['user'];
$deleted_date = date("Y-m-d");

mysql_query("INSERT INTO deleted_bill(receipt_no,name,registration,contact_no,event_name,
			seats,amount,username,date,deleted_username,deleted_date) VALUES(
			'$receipt_no','$name','$registration',$contact_no,'$event_name',$seats,$amount,
			'$username','$date','$deleted_username','$deleted_date')") or die("Deleted bill not done");

mysql_query("DELETE FROM bill WHERE receipt_no='$receipt_no'") or die("Bill not deleted");

$query = "SELECT * FROM page2 WHERE event_name='$event_name'";

$ans = mysql_query($query) or die("Page 2 data not selected");
$res = mysql_fetch_assoc($ans);
$seats_available = $res['seats_available'];
$seats_available = $res['seats_available'] + $seats;
echo $seats_available;

if($seats_available != 0)
{
	mysql_query("UPDATE page2 SET seats_available=$seats_available WHERE event_name='$event_name'") or die("Did not increase seats"); 
}
header("location:../manage/search.php");

?>