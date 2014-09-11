<?php
session_start();
//start connection
$connect = mysql_connect("localhost","vitgravi_tech13","aricore13");
if(!$connect){
	die("Database connection Error");
	}
//select database
$db = mysql_select_db("vitgravi_13_events");
if(!$db){
	die("Database selection Error");
	}

echo"<a href='vit13sp_create_event.php'>Create Event</a> | <a href='vit13sp_view_event.php'>View/Edit Event</a><br /><br />View event<br />";

echo"<style>
td{
padding:5px;
}
</style>";
//operations

$sql = mysql_query("select * from eventDetails");

echo "<table border='1'><tr><th>S. No</th><th>Event Name</th><th>category</th><th>Edit</th></tr>";
$c=1;
while($row = mysql_fetch_array($sql)){
echo "<tr><td width='50px'>{$c}</td><td width='500px'>{$row['name']}</td><td width='100px'>{$row['category']}</td><td><a href='vit13sp_edit_event.php?id={$row['id']}'>Edit</a></td?</tr>";
$c++;
}



?>