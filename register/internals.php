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
	#form{
		border:1px black solid;
		width:400px;
		margin:0 auto;
		margin-top:50px;
	}
</style>
<script type="text/javascript">
	function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
 	//alert(document.getElementById('password').value);
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57) || k==64 || k==95 || k==9);
	}
</script>
<body style='display:block;'>
<div id='wrapper'>
	<div id='headlogos'>  </div>
	<div style='clear:both;' ></div>
	<ul id='fluidMenuBar'></ul>
	<div id='content-wr'>
		<div id='content'>
	<div id="form">
	<form method="POST" action="process/internals.php">
		Username : <br/><input type="text" name="username" onkeypress="return alpha(event)"/><br />
		Password : <br /><input type="password" name="password" onkeypress="return alpha(event)"/><br />
		<input type="submit" value="Login" />
	</form>
	</div>
</body>
</div>
</div>
</div>
</html>