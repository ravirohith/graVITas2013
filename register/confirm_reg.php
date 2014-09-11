<?php
	session_start();
	require 'extras/session_set.php';
	require 'process/config.php';
?>

<html>
<head>
<script type="text/javaScript" src="calendar/datepicker.js" ></script>
<link href="calendar/datepicker.css" rel="stylesheet" />

<link rel="stylesheet" href='css/main.css'/>
<style >
#reg_summary{
	border:1px soid black;
	width:400px;
	height:auto;
	margin:0 auto;
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
 
<div id="reg_summary">
	<?php
	$contingent = $_SESSION['conti'];
	$query = "SELECT * FROM colleges WHERE contingent=$contingent ";
	$ans = mysql_query($query)or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	?>
	<u><h3><style="text-align:center;">FINAL SUMMARY</style></h3></u><br/>		
	CONTINGENT NUMBER:<br/>
	<?php echo "<b>".$contingent."</b>-To be used for future Login purposes only..<br/><br/>" ?>
	AMOUNT SUMMARY:<br/>
	<?php echo "<b>".$res['events_cost']."</b><br/><br/>"; ?>
	INSTRUCTIONS:<br/>
	<p>
		1.Hello<br/>
		2.Hello world<br/>
		3.<br/>
		4.<br/>
	</p>
	<br/>
	THANK YOU... 

<form action='process/fina.php' method='POST' >
	<input type='submit' value='GO HOME'>
</form>
</div>
</body>
</div>
</div>
</div>
</html>