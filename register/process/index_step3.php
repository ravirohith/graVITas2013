<?php
		session_start();
		require '../extras/config.php';
		require '../extras/session_set.php';
		$members = $_POST['members'];
		$n = count($members);
		$_SESSION['count']=$n;
		$member1='';$member2='';$member3='';$member4='';
		if(!empty($members[0]))
		$member1 = $members[0];
		if(!empty($members[1]))
		$member2 = $members[1];
		if(!empty($members[2]))
		$member3 = $members[2];
		if(!empty($members[3]))
		$member4 = $members[3];
		
		//echo $member1.$member2.$member3.$member4;

		//$eventf = $_POST['eventf'];
		//$eventi = $_POST['eventi'];
		//$eventw = $_POST['eventw']; 
		$event_name = $_POST['event'];
		$fevent_name = $event_name[0];
		
	
		$query = "SELECT * FROM events WHERE event_name = '$fevent_name'";
		$ans = mysql_query($query) or die(mysql_error());
		$res = mysql_fetch_assoc($ans);
		$limit = $res['max_seats'];
		$cost = $res['cost'];
		$seats = $res['seats_available'];
		$seats = $seats - $n;
		$query = "UPDATE events SET seats_available=$seats WHERE event_name='$fevent_name'";
		mysql_query($query) or die(mysql_error());
		//echo 1;
		$contingent =$_SESSION['conti'];
		$query = "INSERT INTO bill(event_name,contingent,member1,member2,member3,member4,cost) 
		          VALUES('$fevent_name',$contingent,'$member1','$member2','$member3','$member4',
		          $cost)";
	    mysql_query($query) or die(mysql_error());
	    $query = "SELECT events_cost FROM colleges WHERE contingent=$contingent";
	    $ans = mysql_query($query) or die(mysql_error());
	    $res = mysql_fetch_assoc($ans);
	    $cost = $cost + $res['events_cost'];
	    $query = "UPDATE colleges SET events_cost=$cost WHERE contingent=$contingent";
	    $ans = mysql_query($query) or die(mysql_error());
        //echo 2;

		header("location:../index_step3.php");
	?>