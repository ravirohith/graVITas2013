<?php
	require '../extras/config.php';
	session_start();
	$answer = htmlentities(mysql_real_escape_string($_POST['answer']));
	if($answer == 1)
		header("location:../register.php");
	else if($answer == 0)
	{
		$_SESSION['conti'] = '';
		$_SESSION['college_name'] = '';
		header("location:../index.php");
	}
	?>