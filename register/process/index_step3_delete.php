<?php
	session_start();
	require '../extras/config.php';
	require '../extras/session_set.php';
	$contingent = $_SESSION['conti'];
	$count = $_SESSION['count'];
	$srno = htmlentities(mysql_real_escape_string($_POST['srno']));
	$query = "SELECT * FROM bill WHERE srno=$srno";
	$ans = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	$event_name = $res['event_name'];
	$query = "SELECT * FROM events WHERE event_name='$event_name'";
	$ans = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	$seats = $res['seats_available'];
	$seats = $seats + $count;
	$cost = $res['cost'];
	
	mysql_query("UPDATE events SET seats_available=$seats WHERE event_name='$event_name'") or die(mysql_error()); 
	$query = "DELETE FROM bill WHERE srno=$srno";
	mysql_query($query) or die(mysql_error());
    
	$query = "SELECT events_cost FROM colleges WHERE contingent=$contingent ";
	$ans = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	$cost = $res['events_cost'] - $cost;
	$query = "UPDATE colleges SET events_cost=$cost WHERE contingent=$contingent";
	$ans = mysql_query($query) or die(mysql_error());


		header("location:../index_step3.php");
?>