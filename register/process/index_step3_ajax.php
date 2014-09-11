<?php
	require '../extras/config.php';
	$type = $_GET['type'];
	$query = "SELECT * FROM events WHERE type=$type";
	$ans = mysql_query($query) or die(mysql_error());
	if(!empty($ans))
	{
	echo "<table border='1'>";
	echo "<tr><th>Select</th><th>Name</th><th>Members/team</th><th>Teams available</th><th>Cost/Team</th></tr>";
	while($res = mysql_fetch_assoc($ans))
	{
		$extras = $res['seats_available'] % $res['max_seats'];
		$teams = (int)($res['seats_available']/$res['max_seats']);
		
		echo "<tr>";
		//echo "<td><input type='radio' name='event_name' onselect='javascript:max(".$res['max_seats'].");'/></td>";
		echo "<td><input type='checkbox' value='".$res['event_name']."' name='event_name[]'/></td>";
		echo "<td>".$res['event_name']."</td>";
		echo "<td>".$res['max_seats']."</td>";
		echo "<td>".$teams."</td>";
		echo "<td>".$res['cost']."</td>";
		echo "</tr>";
	}
	echo "</table>";
	}
	else 
	{
		echo "";
	}
	
?>