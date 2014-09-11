<?php
	session_start();
	require 'extras/session_set.php';
	require 'process/config.php';
?>
<html>
<head>
<script type="text/javascript">
    var close = 0;
    function clicky(){
        close = 1;
    }

    function unload() {
      if(close==0) return('You need to confirm before closing the window.');
  }
window.onbeforeunload = unload;
</script>
	<link rel="stylesheet" href='css/main.css'/>
<style>
#event_summary{

    margin-left:300px;
    margin-top:30px;
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
        <div id='event_summary'>
            <b>EVENT SUMMARY</b><br/>
	<?php
    
    $contingent = $_SESSION['conti'];
    $query = "SELECT * FROM bill WHERE contingent=$contingent";
    $ans = mysql_query($query) or die(mysql_error());
    
    
    echo "<table border='1'>";
   
    echo "<tr><th>Event Name</th><th>Members</th><th>Cost</th></tr>";
   
    while($res=mysql_fetch_assoc($ans)){
    echo "<tr>";
    echo "<td>".$res['event_name']."</td>";
    echo "<td>";
    if(!empty($res['member1']))echo $res['member1'].", ";
    if(!empty($res['member2']))echo $res['member2'].", ";
    if(!empty($res['member3']))echo $res['member3'].", ";
    if(!empty($res['member4']))echo $res['member4'];
    echo "</td>";
    echo "<td>".$res['cost']."</td>";
    echo "</tr>";
    }
    
    echo "</table>";

    echo "<form action='#' method='POST'>";
    echo "<input type='submit' value='Download Bill' >";
    echo "</form>";

    echo "<form action='process/checkout.php' method='POST'>";
    echo "<input type='submit' value='Confirm Registration' onclick='clicky()' >";
    echo "</form>";
	?>
</div>
</div>
</div>
</div>
</body>
</html>