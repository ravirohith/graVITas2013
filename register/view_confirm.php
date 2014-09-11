<?php
	session_start();
	require 'extras/session_set.php';
	require 'process/config.php';
?>
<html>
<head>
	<link rel="stylesheet" href='css/main.css'/>
</head>
<body>
	<div id='header'>
    </div>
	
    <div id='main'>
	<?php
    
    $contingent = $_SESSION['conti'];
    $query = "SELECT * FROM bill WHERE contingent=$contingent";
    $ans = mysql_query($query) or die(mysql_error());
    
    
    echo "<table border='1'>";
   
    echo "<tr><th>Event Name</th><th>Member1</th><th>Member2</th><th>Member3</th><th>Member4</th><th>Cost</th></tr>";
   
    while($res=mysql_fetch_assoc($ans)){
    echo "<tr>";
    echo "<td>".$res['event_name']."</td>";
    echo "<td>".$res['member1']."</td>";
    echo "<td>".$res['member2']."</td>";
    echo "<td>".$res['member3']."</td>";
    echo "<td>".$res['member4']."</td>";
    echo "<td>".$res['cost']."</td>";
    echo "</tr>";
    }
    
    echo "</table>";

    echo "<form action='process/view_confirm.php' method='POST'>";
    echo "<input type='submit' value='CONFIRM' >";

    echo "<form action='process/view_decline.php' method='POST'>";
    echo "<input type='submit' value='DECLINE' >";
    
	?>
</div>
</body>
</html>