<?php
	session_start();
	if(isset($_SESSION['conti'])&&isset($_SESSION['college_name'])&&!empty($_SESSION['conti'])&&!empty($_SESSION['college_name']))
	{
		header("location:index_step2.php");
	}
?>
<html>
<head>
<script type="text/javascript">
	function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
 	//alert(document.getElementById('password').value);
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57) || k==64 || k==95 || k==9);
	}
	function alpha_n(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k >= 48 && k <= 57) || k==32 || k==9);
}
</script>
<link rel="stylesheet" href='css/main.css'/>
<style type="text/css">
#login{
	border:1px black solid;
	margin:30px auto;
	width:300px;
	height:150px;
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
		<div id="login">
			<table>
			<form method="POST" action="process/index_login.php">
			<tr><td>Contingent No: </td><td><input type="text" name="contingent" onkeypress="return alpha_n(event)"/></td></tr>
			<tr><td>Password :</td> <td><input type="password" id="password" name="contingent_password" onkeypress="return alpha(event)"/></td></tr>
			<tr><td><input type="submit" value="Login" /></td></tr>
			</form>
			</table>
			<br/>
			<a href="policy.php" >Not a User.Register here!</a>
		</div>
</div>
</div>
</div>
</body>
</html>