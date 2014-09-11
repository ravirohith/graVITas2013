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
	margin-left:500px;
	margin-top:100px;
	width:400px;
	height:auto;
	padding:5px;
}
#add_member{
	float:left;
	margin-left:50px;
	margin-top:30px;
	width:300px;
	height:150px;
	padding:5px;
}
#table{
	width:400px;
	border:collapse;
	height:600px;
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
	margin-left:85px;
	margin-top:-30px;
}

</style>
<script type="text/javascript">
	var i = 0;
	function checkbox(i)
	{	
		//var days = document.getElementById("accomodation").value;
		//alert(days);
		
		if(document.getElementById("accomodation"+i).checked)
			{
				document.getElementById("s_date"+i).disabled = false;
				document.getElementById("e_date"+i).disabled = false;
				document.getElementById("accomodation"+i).value = 100;
			}
		else 
			{
			 	document.getElementById("s_date"+i).disabled = true;
	 	    	document.getElementById("e_date"+i).disabled = true;
                document.getElementById("accomodation"+i).value = 0;  
	    	}
	    	
	}
	function alpha(e) {
	    var k;
	    document.all ? k = e.keyCode : k = e.which;
	 	//alert(document.getElementById('password').value);
	    return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 ||  k==9);
	}
	function alpha_n(e) {
	    var k;
	    document.all ? k = e.keyCode : k = e.which;
	    return ((k >= 48 && k <= 57) || k==32 || k==9);
	}
	//window.history.forward();
    //function noBack() { window.history.forward(); }
    function finall(count)
    {
    	for(var i=0;i<count;i++)
    	{
			
			var name = document.getElementById('name' + i).value;
    		var phone = document.getElementById('phone' + i).value;
    		if(name == ''){
		    	alert("Name Empty");
		    	document.getElementById('name' + i).focus();

		    	return false;
		    }
		    if(phone == ''){
		    	alert("Phone Empty");
		    	document.getElementById('phone' + i).focus();
		    	
		    	return false;
		    }
		    if(phone.length<10){
		    	alert('Phone number should be 10 digits');
		        document.getElementById('phone' + i).focus();
		    	
		    	return false;	
		    }
    	}
    
    }
</script>

</head>
<body style='display:block;'>
<div id='wrapper'>
	<div id='headlogos'>  </div>
	<div style='clear:both;' ></div>
	<ul id='fluidMenuBar'></ul>
	<div id='content-wr'>
		<div id='content'>

<div id="add_member">
<b>ADD MEMBERS</b>
<table border=1>
<tr>
<th>Name</th><th>Phone</th><th>Gender</th><th>Accomodation</th><th>Start Date</th><th>End Date</th>
</tr>
<form method="POST" action="process/index_step2.php" >
	<?php 
	$i = 0;
	$contingent = $_SESSION['conti'];
	$query = "SELECT no_of_participants FROM colleges WHERE contingent=$contingent ";
	$ans = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	$count = $res['no_of_participants'];
	while($i<$count) 
{
echo "<tr>";
if($i == 0)
	echo "<td style='width:200px;text-align:center;padding:4px;'><input type='text' name='name[]' placeholder='Contingent Head' id='name".$i."' class='regname'  onkeypress='return alpha(event)'/></td>";
	else
		echo "<td style='width:200px;text-align:center;padding:4px;'><input type='text' name='name[]'  id='name".$i."' class='regname' placeholder='Name' onkeypress='return alpha(event)'/></td>";
	echo "<td><input type='text' name='phone[]' id='phone".$i."' maxlength='10' placeholder='Number' class='regnum' onkeypress='return alpha_n(event)'/></td>";
	echo "<td><select name='gender[]' id='gender".$i."' >
  		<option value='m'>Male</option>
  		<option value='f'>Female</option>
	    </select>";
	echo "</td>"; 
	echo "<td style='text-align:center;'><input type='checkbox' name='accomadation[]' style=\"align='center';\" id='accomodation".$i."' value='100' onchange='checkbox(".$i.")' ></td>";

    echo "<td><select name='s_date[]' id='s_date".$i."' disabled >
	             <option selected>26-09-2013</option>
	             <option>27-09-2013</option>
	             <option>28-09-2013</option>
	             <option>29-09-2013</option>
				 </select></td>";
	echo "<td><select name='e_date[]' id='e_date".$i."' disabled  >
	             <option selected>26-09-2013</option>
	             <option>27-09-2013</option>
	             <option>28-09-2013</option>
	             <option>29-09-2013</option>
	             </select></td>";
	
echo "</tr>";
$i = $i + 1;
}
echo "</table>";
echo "<br />";
echo "<input type='submit' value='NEXT' style='width:70px;' onclick='return finall(".$i.")'/>";
 ?>
</form>





</div>
</div>
</div>
</div>


</body>
</html>