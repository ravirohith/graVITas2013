<!DOCTYPE html>
<?php
	session_start();
	require 'extras/session_set.php';
	require 'extras/config.php';
	$contingent = $_SESSION['conti'];
?>
<html>
<head>
<link rel="stylesheet" href='css/main.css'/>
<style type="text/css">
#events{
	float:left;
	border:1px black solid;
	margin-left:50px;
	margin-top:30px;
	width:500px;
	height:auto;
	padding:5px;
}
#form{
	border:1px black solid;
}
#show{
	float:left;
	border:1px black solid;
}
#members{
	border:1px black solid;
	float:right;
	border:1px black solid;
	margin-right:30px;
	width:150px;
	height:auto;
	padding:5px;
}
#registered{
	width:400px;
	height:400px;
	position:fixed;
	margin:0 auto;
	display: none;
	z-index:20;
	top:50%;left:50%;
	margin-top:-200px;
	margin-left:-200px;
	border:1px black solid;
	background-color: red;
}
.member{
	border:1px black dotted;
	padding:2px;
} 
#clickme{
	position:fixed;
	width:30px;
	height:60px;
	border:1px black solid;
	margin-top:10px;
	left:10px;
	cursor:pointer;
}
#screen{
	top:0;
	left:0;
	position:absolute;
	background-color: rgba(0,0,0,0.7);
}
/* .changes{
	border:1px black dashed;
	padding:2px;
	float:right;
	width:90px;
	height:auto;
	margin-top:-20px;
	font-size:11px;
	padding:2px;
}*/

#formals{}
#premium{display:none;}
#workshops{display:none;}
</style>
<script type='text/javascript' src='extras/jquery.js'></script>

<script type='text/javascript'>
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
	
	function clear(){
     jmax_seats = 0;
     getElementByType('checkbox').checked=false;
	}


	function clicky()
	{
		var num = document.getElementById("type").value;
		var show = document.getElementsByClassName('show');
		//alert(num);
		if(num == 0)
		{
			for (var i = 0;i < show.length;i++)
			{
				show[i].style.display="none";
			}
			document.getElementById("formals").style.display="block";
		}
		if(num == 1)
		{
			for (var i = 0;i < show.length;i++)
			{
				show[i].style.display="none";
			}
			document.getElementById("premium").style.display="block";
		}
		if(num == 2)
		{
			for (var i = 0;i < show.length;i++)
			{
				show[i].style.display="none";
			}
			document.getElementById("workshops").style.display="block";
		}
	}

	window.history.forward();
    function noBack() { window.history.forward(); }

    $(document).ready(function()
		{
			//$('#clickme').fadeIn(1500);
			$(window).scroll(function(){
				var top=$(window).scrollTop();
				$("#clickme").css('margin-top',top+10);
			});

			$("#clickme").click(function(){
				$("#screen").css({'display':'block',
									'height':$(document).height(),
									'width':$(document).width() });
				$("#screen").fadeTo(0,0.5);
				$('body').css({'overflow':'hidden'});
				$("#registered").css({'display':'block'});
			});
			$("#screen").click(function(){
				$(this).css({'display':'none'});
				$("#registered").css({'display':'none'})
				$("body").css({'overflow':'scroll'});
			});
		});
</script>
</head>
<b><a href='index_step2.php'>ADD MEMBERS</a></b><br/>
	<b><a href='checkout.php'>SEE SUMMARY</a></b>
<body style='display:block;'>
<div id='wrapper'>
<div id="screen"></div>
<div id="clickme"></div>
	<div id="registered">
		<?php
		$query = "SELECT * FROM bill WHERE contingent = $contingent";
		$ans = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($ans)!=0){
		echo "<table border=1>";
		echo "<tr><th>Event Name</th><th>Members</th><th>Delte</th></tr>";
		}
		while($res = mysql_fetch_assoc($ans))
		{
			echo "<tr>";
			echo "<td>".$res['event_name']."</td>";
			echo "<td>".ucfirst($res['member1']).", ";
			if(!empty($res['member2']))
			echo ucfirst($res['member2']).", ";
			if(!empty($res['member3']))
			echo ucfirst($res['member3']).", ";
			if(!empty($res['member4']))
			echo ucfirst($res['member4'])."</td>";
			echo "<td>";
			echo "<form action='process/index_step3_delete.php' method='POST' >";
			echo "<input type='hidden' name='srno' value=".$res['srno']." >";
			echo "<input type='submit' name='delete' value='DELETE' onclick=\"return confirm('Are you sure?')\" >";
			echo "</form>";
			echo "</td>";
		    echo "</tr>";
		}
	?>
	</div>
	
	<div id='headlogos'>  </div>
	<div style='clear:both;' ></div>
	<ul id='fluidMenuBar'></ul>
	<div id='content-wr'>
		<div id='content'>

		<div id="select_events">
		<?php
			echo "<select name='type' id='type'>";
			echo "<option value='0'>Formal</option>";
			echo "<option value='2'>Workshop</option>";
			echo "<option value='1'>Premium</option></select>";
			echo "<input type='submit' value='Select Event' onclick=clicky() />";
		?>
		</div>
		<div id="form">
		<form method="POST" action="process/index_step3.php">
		<div id="show">
			<div id="formals" class="show">
				<?php
					$query = "SELECT * FROM events WHERE type=0";
					$ans = mysql_query($query) or die(mysql_error());
					if(!empty($ans))
					{
					echo "<table border='1'>";
					
					while($res = mysql_fetch_assoc($ans))
					{
						echo "<tr><th>Select</th><th>Name</th><th>Members/team</th><th>Teams available</th><th>Cost/Team</th></tr>";
						$extras = $res['seats_available'] % $res['max_seats'];
						$teams = (int)($res['seats_available']/$res['max_seats']);
						echo "<tr>";
						echo "<td><input type='radio' value='".$res['event_name']."' name='event[]' onchange=maxxy(".$res['max_seats'].") /></td>";
						echo "<td>".$res['event_name']."</td>";
						echo "<td>".$res['max_seats']."</td>";
						echo "<td>".$teams."</td>";
						echo "<td>".$res['cost']."</td>";
						echo "</tr>";
					}
					echo "</table>";
					}
				?>
			</div>
			<div id="premium" class="show">
			<?php
					$query = "SELECT * FROM events WHERE type=1";
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
						echo "<td><input type='radio' value='".$res['event_name']."' name='event[]' onchange=maxxy(".$res['max_seats'].") /></td>";
						echo "<td>".$res['event_name']."</td>";
						echo "<td>".$res['max_seats']."</td>";
						echo "<td>".$teams."</td>";
						echo "<td>".$res['cost']."</td>";
						echo "</tr>";
					}
					echo "</table>";
					}
				?>
			</div>
			<div id="workshops" class="show">
		<?php
				$query = "SELECT * FROM events WHERE type=2";
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
					echo "<td><input type='radio' value='".$res['event_name']."' name='event[]' onchange=maxxy(".$res['max_seats'].") /></td>";
					echo "<td>".$res['event_name']."</td>";
					echo "<td>".$res['max_seats']."</td>";
					echo "<td>".$teams."</td>";
					echo "<td>".$res['cost']."</td>";
					echo "</tr>";
				}
				echo "</table>";
				}
			?>
		</div>
		</div>
		<div id="members">
			<?php
			$query = "SELECT * FROM participants WHERE contingent=$contingent";
			$ans = mysql_query($query) or die(mysql_error());
			$count_member = 1;
			while($res = mysql_fetch_assoc($ans))
			{
				
				echo "<input type='checkbox' id='".$count_member."' onchange=checky(this.id) name='members[]' value='".$res['name']."'/>".$res['name']."<br />";
				$count_member = $count_member + 1;
			}
			echo "<input type='submit' value='Add Event' />";
			echo "<div class='changes'>";
			echo "<input type='hidden' value='".$res['srno']."' name='event_srno' />"."<br />";
			//echo "<input type='submit' value='Add Event' />";
			echo "</div>";
			?>
		</div>
		</form>
		</div>
	
</div>
</div>
</div>
</body>
</html>