<html>
<head>
<link rel="stylesheet" href="auto/autocomplete.css" type="text/css" media="screen">
<script src="auto/jquery.js" type="text/javascript"></script>
<script src="auto/dimensions.js" type="text/javascript"></script>
<script src="auto/autocomplete.js" type="text/javascript"></script>
<script type="text/javascript">
	function alpha(e) {
	    var k;
	    document.all ? k = e.keyCode : k = e.which;
	 	//alert(document.getElementById('password').value);
	    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57) || k==64 || k==95 || k==9);
	}

	function equally()
	{
		if(document.getElementsByName("searchField")[0].value == '')
		{
			alert("College Name is empty");
			return false;
		}
		var pass = document.getElementById("pass").value;
		var repass = document.getElementById("repass").value;
		if(pass != repass)
		{
			alert("Passwords dont match!");
			return false;
		}
		var email = document.getElementById('regemail');
    	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	    if (!filter.test(email.value))
	    {
		    alert('Please provide a valid email address');
		    email.focus;
		    return false;
	 	}

	 	if(document.getElementById("regemail").value == '')
		{
			alert("Email is empty");
			return false;
		} 

		if(document.getElementById("nop").value == '')
		{
			alert("Please provide number of participants.");
			return false;
		} 
		if(document.getElementById("nop").value < 20 )
		{
			alert("There can be a maximum of 20 participants in a contingent.");
			return false;
		} 
			
	}

	$(function(){
	    setAutoComplete("searchField", "results", "auto/autocomplete.php?part=");
	});
</script>
<link rel="stylesheet" href='css/main.css'/>
<style type="text/css">
#register{
	border:1px black solid;
	margin:30px auto;
	width:400px;
	height:250px;
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
			<div id="register">
	<form method="POST" action="process/index_register.php">
		<!--create an ajax query for conti number-->
		<table>
		<tr><td>College Name </td><td><input id="searchField" name="searchField" type="text" autocomplete="off" />
			</select></td></tr>
		<tr><td>Password </td> <td><input type="password" id="pass" name="contingent_password" onkeypress="return alpha(event)"/></td></tr>
		<tr><td>Re-enter Password </td> <td><input type="password" id="repass" name="recontingent_password" onkeypress="return alpha(event)"/></td></tr>
		<tr><td>Email</td><td style="align:center;"><input type="email" name="regemail" id="regemail"/></td></tr> 
		<tr><td>Number Of Participants</td><td style="align:center;"><input type="text" name="regnop" id="nop" maxlength="2" /></td></tr>
		<!--create a require 'college_names.php'-->
		<tr><td><input type="submit" value="Go graVITas!" onclick="return equally()"/></td></tr>
	</table>
	</form>
</div>
</div>
</div>
</div>
</body>
</html>