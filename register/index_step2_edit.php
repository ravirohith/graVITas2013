<?php
	session_start();
	require 'extras/session_set.php';
	require 'extras/config.php';
	if(isset($_POST['srno_edit']))
	{
		$srno = $_POST['srno_edit'];
		$query = "SELECT * FROM participants WHERE srno=$srno";
		$ans = mysql_query($query) or die(mysql_error());
		$res = mysql_fetch_assoc($ans);
		$name = $res['name'];
		$phone = $res['phone'];
	}
?>
<html>
<head>
<head>
<link rel="stylesheet" href='css/main.css'/>
<style type="text/css">
#existent_members{
	float:left;
	border:1px black solid;
	margin-left:300px;
	margin-top:30px;
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
}
.changes{
	border:1px black dashed;
	padding:2px;
	float:right;
	width:60px;
	height:auto;
	margin-top:-20px;
	font-size:11px;
	padding:2px;
}
</style>
<script type="text/javascript" src="jquery.js">
	/*function clicky()
	{
		var html = "<img src='img/loading.gif' />";
		document.getElementById("show").innerHTML = html;	
		var name = document.getElementById("name").value;
		var phone = document.getElementById("phone").value;
		alert("asdfasdf");
		//alert(num)
		var xmlhttp;
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
		{
			if(xmlhttp.readyState ==4 && xmlhttp.status == 200)
			{
				document.getElementById("show").innerHTML = '';
				document.getElementById("show").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","process/index_step2.php?name="+name+"?phone="+phone,true);
		xmlhttp.send();*/
	}
</script>
</head>
<body>
<div id="header"></div>
<div id="main">
<div id="add_member">
<form method="POST" action="process/index_step2_edit.php">
	Name : <input type="text" name="name" id="name" value="<?php if(isset($_POST['srno_edit'])) echo $name?>"/><br />
	<!--<input type="text" name="regno" /><br />-->
	Phone : <input type="text" name="phone" id="phone" value="<?php if(isset($_POST['srno_edit'])) echo $phone?>"/><br /> 
	<input type="hidden" value="<?php echo $_POST['srno_edit'] ?>" name="srno" />
	<input type="submit" value="CHANGE" />
</form>
</div>
<div id="existent_members">
<?php
	$contingent = $_SESSION['conti'];
	$query = "SELECT * FROM participants WHERE contingent=$contingent";
	$ans = mysql_query($query) or die(mysql_error());
	while($res = mysql_fetch_assoc($ans))
	{
		echo "<div class='member'>";
			echo "Name : ".$res['name']."<br /";
			echo "Phone : ".$res['phone'];
		echo "</div>";
	}
?>
</div>
</div>
</body>
</html>