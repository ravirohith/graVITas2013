<?php
	require 'extras/config.php';
	require 'extras/check_internals_session.php';
?>
<html>
<style type="text/css">
	#header{
		border:1px black solid;
		width:1300px;
		height:100px;
		margin:0 auto;
		overflow:none;
	}
	#main{
		border:1px black solid;
		width:1300px;
		height:600px;
		margin:10px auto;
	}
	#events_bills{
		border:1px black solid;
		float:left;
		margin-top:50px;
		margin-left:300px;
	}
	#accomodation_bills{
		border:1px black solid;
		float:left;
		margin-left:100px;
		margin-top:50px;
	}
</style>
<body style='display:block;'>
<div id='wrapper'>
	<div id='headlogos'>  </div>
	<div style='clear:both;' ></div>
	<ul id='fluidMenuBar'></ul>
	<div id='content-wr'>
		<div id='content'>
	<div id="events_bills">
	EVENTS
	<?php
		$query = "SELECT * FROM colleges WHERE events_approved=0";
		echo "<table border='1'>";
		echo "<tr><th>Contingent No</th>
				  <th>Cost</th>
				  <th>Approve</th>
				</tr>";
		$ans = mysql_query($query) or die(mysql_error());
		while($res = mysql_fetch_assoc($ans))
		{
			echo "<tr>";
			echo "<td>".$res['contingent']."</td>";
			echo "<td>".$res['events_cost']."</td>";
			echo "<td>
				<form method='POST' action='internals_approve2.php'>
				<input type='hidden' name='srno' value='".$res['srno']."' />
				<input type='hidden' name='costing' value=9 />
				<input type='submit' value='Approve' />
				</form>
				</td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
	</div>
	<div id="accomodation_bills">
		ACCOMODATION
		<?php
		$query = "SELECT * FROM colleges WHERE accomodation_approved=0";
		echo "<table border='1'>";
		echo "<tr><th>Contingent No</th>
				  <th>Cost</th>
				  <th>Approve</th>
				</tr>";
		$ans = mysql_query($query) or die(mysql_error());
		while($res = mysql_fetch_assoc($ans))
		{
			echo "<tr>";
			echo "<td>".$res['contingent']."</td>";
			echo "<td>".$res['accomodation_cost']."</td>";
			echo "<td>
				<form method='POST' action='internals_approve2.php'>
				<input type='hidden' name='srno' value='".$res['srno']."' />
				<input type='hidden' name='costing' value=10/>
				<input type='submit' value='Approve' />
				</form>
				</td>";
			echo "</tr>";
		}
		echo "</table>";
		?>
	</div>
</div>
</div>
</div>
</body>
</html>