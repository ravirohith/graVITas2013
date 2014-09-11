<?php
	session_start();
		require '../extras/config.php';
		require '../extras/session_set.php';
		$session = $_SESSION['conti'];
	$ans = mysql_query("SELECT * FROM participants WHERE contingent = $session AND contingent_head = 1");
	$res = mysql_fetch_assoc($ans);
	$email = $res['email'];
	$name = $res['name'];

	$content = "Hi ".$name;
	$content .= "Your registration for graVITas 2013 has been confirmed.";
	$content .= "Your registration ID is <b>".$session."</b>";

	$to = $email;
	$from = "registrations@vitgravitas.com";
	$header = "From:".$from;
	$subject = "Confirmation Mail for Contingent Number - ".$session;
	mail($to,$subject,$content,$header);

	mysql_query("UPDATE colleges SET confirm=1 WHERE contingent=$session") or die(mysql_error());
	header("location:../confirm_reg.php");
?>