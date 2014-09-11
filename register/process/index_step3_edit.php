<?php
session_start();
require '../extras/config.php';
require '../extras/session_set.php';

//echo 1;

$members = htmlentities(mysql_real_escape_string($_POST['members']));
$n = count($members);
$member1='';$member2='';$member3='';$member4='';
if(!empty($members[0]))
$member1 = $members[0];
if(!empty($members[1]))
$member2 = $members[1];
if(!empty($members[2]))
$member3 = $members[2];
if(!empty($members[3]))
$member4 = $members[3];
$contingent =$_SESSION['conti'];
//echo $member1.$member2.$member3.$member4;

$event_name = htmlentities(mysql_real_escape_string($_POST['event_name']));
$query = "SELECT * FROM events WHERE event_name = '$event_name'";
$ans = mysql_query($query) or die(mysql_error());
$res = mysql_fetch_assoc($ans);

//echo 2;

$query1 = "SELECT * FROM participants WHERE contingent=$contingent";
$ans1 = mysql_query($query1) or die(mysql_error());
$count = 0;
$res1 = mysql_fetch_assoc($ans1);
for($i=0; $i<4; $i++){
	if(!empty($res1['member'.$i+1])){
		$count = $count + 1;
	}
}
$n = $n - $count;
$limit = $res['max_seats'];
$cost = $res['cost'];
$seats = $res['seats_available'];
$seats = $seats - $n;
$query = "UPDATE events SET seats_available=$seats WHERE event_name='$event_name'";
mysql_query($query) or die(mysql_error());


//echo 3;

$srno = htmlentities(mysql_real_escape_string($_POST['srno']));
$query = "UPDATE bill SET event_name='$event_name',contingent=$contingent,
						  member1='$member1',member2='$member2',
						  member3='$member3',member4='$member4',
						  cost=$cost WHERE srno=$srno";
mysql_query($query) or die(mysql_error());

//echo 4;

header("location:../index_step3.php");
?>