<?php
	require ('extras/config.php');
	$srno = $_POST['srno'];
	$costing = $_POST['costing'];
		$query = "SELECT * FROM colleges WHERE srno=$srno";
		$ans =  mysql_query($query) or die(mysql_error());
		$res = mysql_fetch_assoc($ans);
		$contingent = $res['contingent'];
	 
?>
<html>
<head>
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
	#form{
		border:1px black solid;
		width:400px;
		margin:0 auto;
		margin-top:50px;
	}
</style>
<script type="text/javascript">
	function alpha_n(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
 	//alert(document.getElementById('password').value);
    return ( k == 32 || (k >= 48 && k <= 57) );
	}
	function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
 	//alert(document.getElementById('password').value);
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57) || k==64 || k==95 || k==9);
	}
</script>
<script type="text/javaScript" src="calendar/datepicker.js" ></script>
<link href="calendar/datepicker.css" rel="stylesheet" />
</head>
<body style='display:block;'>
<div id='wrapper'>
	<div id='headlogos'>  </div>
	<div style='clear:both;' ></div>
	<ul id='fluidMenuBar'></ul>
	<div id='content-wr'>
		<div id='content'>
<div id="form">
	<form method="POST" action='process/internals_approve2.php'>
	<?php
	echo "Contingent Num : ".$contingent;
	?>
	<br />DD No : <br /><input type='text' name='dd_num' onkeypress="return alpha_n(event)"/><br />
	Bank : <br /><input type='text' name='bank' onkeypress="return alpha(event)"/><br />
	Date :  <br /><input type="text" name="datepicker" id="datepicker" readOnly onClick="GetDate(this);" /><br />
	Amount : <br /><input type='text' name='amount' /><br />
	<input type='hidden' name='costing' value=<?php echo $costing ?> />
	<input type='hidden' name='contingent' value=<?php echo $contingent ?> />
	<input type='submit' name='Approve' />
	</form>
</div>
</div>
</div>
</div>
</body>
</html>