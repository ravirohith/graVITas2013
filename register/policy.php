<html>
<head>
<link rel="stylesheet" href='css/main.css'/>
<style type="text/css">
#policy{
	border:1px black solid;
	margin:0 auto;
	width:300px;
	height:350px;
}
#buttons{
	border:1px black solid;
	margin:0 auto;
	width:300px;
	height:150px;
}
#buttons_accept{
	border:1px black solid;
	float:left;
	width:100px;
	height:50px;
	margin-left:50px;
}
#buttons_reject{
	border:1px black solid;
	float:left;
	width:100px;
	height:50px;
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
	<div id="policy">
		The policy goes in here ....
	</div>
	<div id="buttons">
	<div id="buttons_accept">
		<form method="POST" action ="process/policy.php">
			<input type="submit" value="I accept" />
			<input type="hidden" value="1" name="answer"/>
		</form>
	</div>
	<div id="buttons_reject">
		<form method="POST" action ="process/policy.php">
			<input type="submit" value="I Reject" />
			<input type="hidden" value="0" name="answer"/>
		</form>
	</div>
	</div>
</div>
</div>
</div>
</body>
</html>