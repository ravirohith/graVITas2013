<?php
//start connection
//code here
// Evaluate the connection
?>

<html>
<head>
<title>CAMPUS AMBASSADORS DATA</title>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<script  src="js/jquery.js" ></script>
<script  src="js/bootstrap.min.js" ></script>
</head>
<script>


</script>

<body>
<div class="container well">
  <center>
<h2><strong>CAMPUS AMBASSADORS DATA</strong></h2>
</center>
<?php
$mystring = "" ;
echo "<table class='table-striped table-bordered table-hover well table-coloured' align='center' cellspacing='2px' cellpadding='5px'>";
echo "<tr><th>ID</th>";
echo "<th>NAME</th>";
echo "<th>BRANCH</th>";
echo "<th>YEAR</th>";
echo "<th>COLLEGE</th>";
echo "<th>NUMBER</th>";
echo "<th>DESIGNATION</th>";
echo "<th>EMAIL</th>";
echo "<th>TEXT</th></tr>";
$sql = "SELECT * FROM users";
$query = mysql_query($sql);
if (!$query) { // add this check.
    die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {	
	echo "<tr><td>";
	echo $row["id"] . "</td>";
	echo "<td>" . $row["name"] . "</td>";
	echo "<td>". $row["branch"] ."</td>";
	echo "<td>". $row["year"] ."</td>";
	echo "<td>". $row["college"] ."</td>";
	echo "<td>". $row["number"] ."</td>";
	echo "<td>". $row["designation"] ."</td>";
	echo "<td>". $row["email"] ."</td>";
	echo "<td>". $row["text"];
	echo "</td></tr>";
	}
	
	echo "</table>";

/*$name = "sumit"; 
$branch = "IT";
$year = "3rd";
$college = "VIT";
$number = "8124014649";
$designation = "student";
$email = "sumit.kanwal@gmail.com";
$text = "kanwal is the best";
$counter = 10;
$mysting = "";
echo "<table class='table-striped table-bordered table-hover well table-coloured' align='center' cellspacing='2px' cellpadding='5px'>";
echo "<tr><th>NAME</th>";
echo "<th>BRANCH</th>";
echo "<th>YEAR</th>";
echo "<th>COLLEGE</th>";
echo "<th>NUMBER</th>";
echo "<th>DESIGNATION</th>";
echo "<th>EMAIL</th>";
echo "<th>TEXT</th></tr>";
while ( $counter <= 100 ) {
	$mystring = "<tr><td>";
	$mystring = $mystring . $name . "</td>";
	$mystring = $mystring . "<td>". $branch ."</td>";
	$mystring = $mystring . "<td>". $year ."</td>";
	$mystring = $mystring . "<td>". $college ."</td>";
	$mystring = $mystring . "<td>". $number ."</td>";
	$mystring = $mystring . "<td>". $designation ."</td>";
	$mystring = $mystring . "<td>". $email ."</td>";
	$mystring = $mystring . "<td>". $text;
	$mystring = $mystring . "</td></tr>";
	$counter = $counter + 10;
}
$mystring = $mystring . "</table>";*/

?> 
</div>

</body>
</html>