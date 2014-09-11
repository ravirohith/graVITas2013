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
<style type="text/css">
#existent_members{
	float:left;
	border:1px black solid;
	margin-left:300px;
	margin-top:30px;
	width:400px;
	height:auto;
	padding:5px;
}
#add_member{
	float:left;
	border:1px black solid;
	margin-left:100px;
	margin-top:30px;
	width:400px;
	height:250px;
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

</style>
<script type="text/javascript">
	function checkbox()
	{	
		//var days = document.getElementById("accomodation").value;
		//alert(days);
		if(document.getElementById("accomodation").checked)
			{
				document.getElementById("s_date").disabled = false;
				document.getElementById("e_date").disabled = false;
				document.getElementById("accomodation").value = 100;
			}
		else 
			{
			 	document.getElementById("s_date").disabled = true;
	 	    	document.getElementById("e_date").disabled = true;
                document.getElementById("accomodation").value = 0;  
	    	}
	}
	function alpha(e) {
	    var k;
	    document.all ? k = e.keyCode : k = e.which;
	 	//alert(document.getElementById('password').value);
	    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || k==9);
	}
	function alpha_n(e) {
	    var k;
	    document.all ? k = e.keyCode : k = e.which;
	 	//alert(document.getElementById('password').value);
	    return ((k >= 48 && k <= 57) ||  k == 32 || k==9);
	}
	
 	function check()
 	{
 		var email = document.getElementById('regemail');
    	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	    if (!filter.test(email.value)) {
		    alert('Please provide a valid email address');
		    email.focus;
		    return false;
	 	}
	 	if(document.getElementsByName("regname")[0].value == '')
		{
			alert("Please provide the name.");
			return false;
		}
		if(document.getElementsByName("regphone")[0].value == '')
		{
			alert("Please provide a Phone Number.");
			return false;
		}
		if(document.getElementsByName("regphone")[0].value.length != 10)
		{
			alert("Phone Number should be 10 digits.");
			return false;
		}
		if(document.getElementsByName("regemail")[0].value == '')
		{
			alert("Please provide an email id.");
			return false;
		} 
		if(document.getElementsByName("regnop")[0].value == '')
		{
			alert("Please provide number of participants.");
			return false;
		} 
		if(document.getElementsByName("reggender")[0].value == '')
		{
			alert("Please select the gender.");
			return false;
		} 
	}
</script>

</head>
<body>
<div id="header">
</div>
<div id="main">
<div id="add_member">
<b>ADD CONTINGENT HEAD</b>
<table>
<form method="POST" action="process/index_step2_head.php" >
	
	 <tr><td style="align:center;">Name</td><td style="align:center;"><input type="text" name="regname" id="name" onkeypress="return alpha(event)"/></td></tr>
	<!--<input type="text" name="regno" /><br />-->
	<tr><td style="align:center;">Phone</td><td style="align:center;"><input type="text" name="regphone" id="phone" maxlength="10" onkeypress="return alpha_n(event)"/></td></tr> 
	<tr><td style="align:center;">Email</td><td style="align:center;"><input type="email" name="regemail" id="email"/></td></tr> 
	<tr><td style="align:center;">Gender</td><td style="align:center;"><input type="radio" name="reggender" value="m">Male</input>
																		<input type="radio" name="reggender" value="f">Female</input></td></tr>
	<tr><td style="align:center;">Number Of Participants</td><td style="align:center;"><input type="text" name="regnop" maxlength="2" /></td></tr>
	<tr><td style="align:center;">Accomodation</td><td style="align:center;"><input type="checkbox" name="regaccomadation" id="accomodation" onchange="checkbox()" value=0 >Required</td></tr>
	<tr><td style="align:center;">Start Date</td><td style="align:center;"><select name="regs_date" id="s_date" disabled >
	             <option selected>26-09-2013</option>
	             <option>27-09-2013</option>
	             <option>28-09-2013</option>
	             <option>29-09-2013</option>
				 </select></td></tr>
    <tr><td style="align:center;">End Date</td><td style="align:center;"><select name="rege_date" id="e_date" disabled >
	             <option selected>26-09-2013</option>
	             <option>27-09-2013</option>
	             <option>28-09-2013</option>
	             <option>29-09-2013</option>
	             </select></td></tr>
	<tr><td style="align:center;"><input type="submit" value="ADD" onclick="return check()" /></td></tr>
</form>

</div>
<!-- <div id="existent_members"> -->
<?php
	/*$contingent = $_SESSION['conti'];
	$query = "SELECT * FROM participants WHERE contingent=$contingent";
	$ans = mysql_query($query) or die(mysql_error());
	while($res = mysql_fetch_assoc($ans))
	{
		echo "<div class='member'>";
		    echo "<div class='inner_member'>";
			echo "Name : ".$res['name']."<br />";
			echo "Phone : ".$res['phone'];
		    echo "</div>";
		    echo "<div class='inner_member1'>";
			echo "Date : ".$res['date']."<br />";
			echo "Days : ".$res['accomodation'];
		    echo "</div>";
			echo "<div class='changes'>";

			echo "<form action='index_step2_edit.php' method='POST' ";
			echo "<input type='hidden' name='srno_edit' value=".$res['srno']." >";
			echo "<input type='submit' name='edit' value='EDIT' >";
            
			echo "<form action='index_step2_delete.php' method='POST' >";
			echo "<input type='hidden' name='srno_delete' value=".$res['srno']." >";
			echo "<input type='submit' name='edit' value='DELETE' >";


			//echo "<a href='index_step2 _edit.php?srno=".$res['srno']."'>EDIT</a><br />";
			//echo "<a href='process/index_step2_delete.php?srno=".$res['srno']."'>DELETE</a>";
			echo "</div>";
		echo "</div>";
	}*/
?>

</div>

</body>
</html>