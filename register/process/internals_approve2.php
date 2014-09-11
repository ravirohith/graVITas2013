<?php
	require ('../extras/config.php');
	$contingent = htmlentities(mysql_real_escape_string($_POST['contingent']));
	$costing = htmlentities(mysql_real_escape_string($_POST['costing']));
	$dd_num = htmlentities(mysql_real_escape_string($_POST['dd_num']));
	$bank = htmlentities(mysql_real_escape_string($_POST['bank']));
	$amount = htmlentities(mysql_real_escape_string($_POST['amount']));
	$datepicker = htmlentities(mysql_real_escape_string($_POST['datepicker']));
    $date = array();
    $date = explode('/',$datepicker);
	$date = date("Y")."-".$date[0]."-".$date[1];
	if($costing==9)
	{
		$query = "INSERT INTO dd(contingent,purpose,dd_num,bank,date,amount) VALUES
		($contingent,'Events',$dd_num,'$bank','$date',$amount)";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE colleges SET events_approved=1 WHERE contingent=$contingent";
		mysql_query($query) or die(mysql_error());
	}
	 if($costing==10)
	{
		$query = "INSERT INTO dd(contingent,purpose,dd_num,bank,date,amount) VALUES
		($contingent,'Accomodation',$dd_num,'$bank',$date,$amount)";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE colleges SET accomodation_approved=1 WHERE contingent=$contingent";
		mysql_query($query) or die(mysql_error());
	}
	header("location:../internals_approve.php");
?>