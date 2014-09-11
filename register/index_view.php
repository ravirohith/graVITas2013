<?php
	session_start();
	require 'extras/session_set.php';
	require 'process/config.php';
?>

<head>
<link rel="stylesheet" href='css/main.css'/>
<style type="text/css">
#existent_members{
	float:left;
	margin-left:100px;
	margin-top:30px;
	width:300px;
	height:auto;
	padding:5px;
}
#registered_events{
	float:left;
	margin-left:100px;
	margin-top:30px;
	width:300px;
	height:auto;
	padding:5px;
}
#dd{
	float:left;
	margin-left:500px;
	margin-top:-140px;
	width:300px;
	height:auto;
	padding:5px;
}
#add_member{
	float:left;
	border:1px black solid;
	margin-left:100px;
	margin-top:30px;
	width:300px;
	height:150px;
	padding:5px;
}
.member{
	border:1px black dotted;
	padding:2px;
	height:40px;
}
.changes{
	border:1px black dashed;
	padding:2px;
	float:right;
	width:60px;
	height:auto;
	margin-top:5px;
	font-size:11px;
	padding:2px;
}
.inner_member{
	float:left;
}
.inner_member1{
	float:left;
	margin-left:15px;
}
#red{
	color:red;
}
#green{
	color:green;
}
#logout{
	float:right;
	margin-right:40px; 
}

</style>
</head>
<body style='display:block;'>
<div id='wrapper'>
	<div id='headlogos'>  </div>
	<div style='clear:both;' ></div>
	<ul id='fluidMenuBar'></ul>
	<div id='content-wr'>
		<div id='content'>
<div id="existent_members">
<b>MEMBERS</b>
<?php
	$contingent = $_SESSION['conti'];
	$query = "SELECT * FROM participants WHERE contingent=$contingent";
	$ans = mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($ans)!=0){
		echo "<table border=1>";
		echo "<tr><th>Name</th><th>Phone</th><th>Date</th></tr>";
	}
	while($res = mysql_fetch_assoc($ans))
	{
		    
		    echo "<tr>";
		    			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['phone']."</td>";
			echo "<td>".$res['s_date']." to ".$res['e_date']."</td>";
		    echo "</tr>";

		    		
			//echo "<a href='index_step2 _edit.php?srno=".$res['srno']."'>EDIT</a><br />";
			//echo "<a href='process/index_step2_delete.php?srno=".$res['srno']."'>DELETE</a>";
	}
	echo "</table>";
?>
</div>
<div id="registered_events">
<b>EVENTS</b>
<?php
	$contingent = $_SESSION['conti'];
	$query = "SELECT * FROM bill WHERE contingent=$contingent";
	$ans = mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($ans)!=0){
		echo "<table border=1>";
		echo "<tr><th>Event</th><th>Members</th></tr>";
	}

	while($res = mysql_fetch_assoc($ans))
	{
	
		      echo "<tr>";
			echo "<td>".$res['event_name']."</td>";
			echo "<td>".$res['member1'].", ";
			if(!empty($res['member2']))
			echo $res['member2'].", ";
			if(!empty($res['member3']))
			echo $res['member3'].", ";
			if(!empty($res['member4']))
			echo $res['member4']."</td>";
			echo "</tr>";
	}
	echo "</table>";
    ?>
     </div>	

	<div id="dd">
	<b>DD</b>
    <?php
	$query = "SELECT * FROM dd WHERE contingent=$contingent";
	$ans = mysql_query($query) or die(mysql_error());

	if(mysql_num_rows($ans)!=0){
		echo "<table border=1>";
		echo "<tr><th>Event DD</th><th>Accomodation DD</th></tr>";
	}
			 $query1 = "SELECT events_approved,accomodation_approved FROM colleges WHERE contingent=$contingent";
			 $ans1 = mysql_query($query1) or die(mysql_error());
			 $res1 = mysql_fetch_assoc($ans1);
	while($res = mysql_fetch_assoc($ans))
	{
		    
		    echo "<tr>";
			 
			 if($res1['events_approved'] == 0){
			 	echo "<td><span id='red'>Not Received</span></td>";
			 }
			 else{
			 	echo "<td><span id='green'>Received</span></td>";	
			 }
		
			 if($res1['accomodation_approved'] == 0){
			 	echo "<td><span id='red'>Not Received</span></td>";
			 }
			 else{
			 	echo "<td><span id='green'>Received</span></td>";	
			 }
			 
			echo "</tr>";
	
	}
	echo "</table>";
?>

</div>
</div>
</div>
</div>
</div>