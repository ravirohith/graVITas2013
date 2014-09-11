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

echo"<a href='vit13sp_create_event.php'>Create Event</a> | <a href='vit13sp_view_event.php'>View/Edit Event</a><br /><br />Create event";

//operations
/*
$sql = mysql_query("select * from eventDetails");

while($row = mysql_fetch_array($sql)){
print_r($row);
echo"<br />";
}
*/

//after posting
if(isset($_POST['name'])){
$name = mysql_real_escape_string($_POST['name']);
$brief = mysql_real_escape_string($_POST['brief']);
$content = mysql_real_escape_string($_POST['content']);
$rules = mysql_real_escape_string($_POST['rules']);
$judgement = mysql_real_escape_string($_POST['judgement']);

$prize = $_POST['prize'];
$venue = $_POST['venue'];
$time = $_POST['time'];

if($_POST['date']!='')
$date = $_POST['date'];
else 
$date = 27;

$coord = mysql_real_escape_string($_POST['coordinators']);
$phone = $_POST['contact'];
$email = mysql_real_escape_string($_POST['email']);
$cat = $_POST['category'];
$subcat = $_POST['subcat'];
$pic = $_POST['pic'];


$result=mysql_query("insert into eventDetails values(null,'{$name}','{$brief}','{$content}','{$rules}','{$judgement}','{$prize}','{$venue}','{$time}',$date,'{$coord}','{$phone}','{$email}','{$cat}','{$subcat}','{$pic}');");

if($result) echo"<br />Data Addition Successfull.<br /> <a href='vit13sp_create_event.php'>Add more</a>";
else echo "<br />Error!! Could not add.  <a href='vit13sp_create_event.php'>Try again</a><br />".mysql_error();

}

//before posting
else{
echo "<form method='post' action='vit13sp_create_event.php'>
<table>

<tr>
<td>Event Name</td>
<td><input type='text' name='name' /></td>
</tr>

<tr>
<td>Event Intro/Brief</td>
<td><input type='text' name='brief' /></td>
</tr>

<tr>
<td>Description</td>
<td><textarea name='content' cols='60' rows='8'></textarea></td>
</tr>

<tr>
<td>Rules</td>
<td><textarea name='rules' cols='60' rows='8'></textarea></td>
</tr>

<tr>
<td>Judgement</td>
<td><textarea name='judgement' cols='60' rows='8'></textarea></td>
</tr>

<tr>
<td>Prize</td>
<td><input type='text' name='prize' /> (separate by ;)</td>
</tr>

<tr>
<td>Venue</td>
<td><input type='text' name='venue' /></td>
</tr>

<tr>
<td>Time</td>
<td><input type='text' name='time' /> HH:MM:SS</td>
</tr>

<tr>
<td>Date</td>
<td><input type='text' name='date' value='27' /> Like 17</td>
</tr>

<tr>
<td>Event Coordinators</td>
<td><input type='text' name='coordinators' /> (separate by ;)</td>
</tr>

<tr>
<td>Phone</td>
<td><input type='text' name='contact' /> (separate by ;)</td>
</tr>

<tr>
<td>E-mail</td>
<td><input type='text' name='email' /> (separate by ;)</td>
</tr>

<tr>
<td>Category</td>
<td><input type='text' name='category' /></td>
</tr>

<tr>
<td>Sub-Category</td>
<td><input type='text' name='subcat' /> (if any)</td>
</tr>

<tr>
<td>Picture</td>
<td><input type='file' name='pic' /> (not yet)</td>
</tr>


<tr>
<td></td>
<td><input type='submit'value='submit' /></td>
</tr>


</table>
</form>";

}



?>