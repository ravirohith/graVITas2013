<?php
	session_start();
	require 'extras/session_set.php';
	require 'extras/config.php';
	$contingent = $_SESSION['conti'];
	$srno = $_GET['srno'];
	$query = "SELECT * FROM bill WHERE srno=$srno";
	$res = mysql_fetch_assoc(mysql_query($query));
	$member1 = $res['member1'];
	$member2 = $res['member2'];
	$member3 = $res['member3'];
	$member4 = $res['member4'];
	$event_name = $res['event_name'];
?>
<html>
<head>
<script type="javascript">
	var jmax_seats;
	var count = 0;
	function maxxy(max_seats)
	{
		jmax_seats = max_seats;
		alert("The max members per team for this event is " + jmax_seats);
	}
	function checky(id)
	{
		if(document.getElementById(id).checked==true) count=count+1;
		else if(document.getElementById(id).checked==false) count = count - 1;
		//alert(count + " a " + jmax_seats);
		if(count > jmax_seats)
		{
				alert("You have exceeded the max limit for this event");
				document.getElementById(id).checked=false;
		}
		
	}
</script>
</head>
<body>
<form method="POST" action="process/index_step3_edit.php">
<div id="members">
	<?php
		$query = "SELECT * FROM participants WHERE contingent=$contingent";
		$ans = mysql_query($query) or die(mysql_error());
		while($res = mysql_fetch_assoc($ans))
		{
			 if($res['name'] == $member1  ||
				$res['name'] == $member2  ||
				$res['name'] == $member3  ||
				$res['name'] == $member4   )
			echo $res['name']."<input type='checkbox' name='members[]' value='".$res['name']."' checked/>";
			else
			echo $res['name']."<input type='checkbox' name='members[]' value='".$res['name']."'/>";
		}
		
	?>
</div>
<div id="events">
	<?php
		$query = "SELECT * FROM events";
		$ans = mysql_query($query) or die(mysql_error());
		echo "<select name='event_name'>";
		echo "<option selected>".$event_name."</option>";
		while($res = mysql_fetch_assoc($ans))
		{
			echo "<option>".$res['event_name']."</option>";
		}
		echo "</select>";
		echo "<input type='hidden' name='srno' value=".$srno." />";
		echo "<input type='submit' value='Edit Event' />";
	?>
</div>
<div id="registered_events">
	<?php
		$query = "SELECT * FROM bill WHERE contingent = $contingent";
		$ans = mysql_query($query) or die(mysql_error());
		while($res = mysql_fetch_assoc($ans))
		{
			echo "Event Name : ".$res['event_name'];
			echo "Members : <br />".$res['member1'];
			if(!empty($res['member2']))
			echo $res['member2'];
			if(!empty($res['member3']))
			echo $res['member3'];
			if(!empty($res['member4']))
			echo $res['member4'];
			//echo "<a href='process/index_step3_edit.php?srno=".$res['srno']."'>EDIT</a><br />";
			echo "<a href='process/index_step3_delete.php?srno=".$res['srno']."'>DELETE</a><br />";
		}
	?>
</div>
</form>
</body>
</html>