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

echo"<a href='vit13sp_create_event.php'>Create Event</a> | <a href='vit13sp_view_event.php'>View/Edit Event</a><br /><br />Edit event";

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
$date = $_POST['date'];
$coord = mysql_real_escape_string($_POST['coordinators']);
$phone = $_POST['contact'];
$email = mysql_real_escape_string($_POST['email']);
$cat = $_POST['category'];
$subcat = $_POST['subcat'];
$pic = $_POST['pic'];

$result=mysql_query("update eventDetails set name='{$name}', brief='{$brief}', content='{$content}', rules='{$rules}', judgement='{$judgement}', prize='{$prize}', venue='{$venue}', time='{$time}', date=$date, coordinators='{$coord}', contact='{$phone}', email='{$email}', category='{$cat}',subcat='{$subcat}', pic='{$pic}' where id={$_POST['id']}");


if($result) echo"<br />Data Editing Successfull.<br /> <a href='vit13sp_create_event.php'>Create Event</a> | <a href='vit13sp_view_event.php'>Edit Event</a>";
else echo "<br />Error!! Could not edit.  <a href='vit13sp_view_event.php'>Try again</a><br />".mysql_error();

}


//before posting
if(isset($_GET['id'])){

$id=$_GET['id'];
$result=mysql_query("select * from eventDetails where id=".$id);

if($result){

$row=mysql_fetch_array($result);

echo "<form method='post' action='vit13sp_edit_event.php'>
<table>

<tr>
<td>Event Name</td>
<td><input type='text' name='name' value='{$row['name']}' /></td>
</tr>

<tr>
<td>Event Intro/Brief</td>
<td><input type='text' name='brief' value='{$row['brief']}' /></td>
</tr>

<tr>
<td>Description</td>
<td><textarea name='content' cols='60' rows='8'>{$row['content']}</textarea></td>
</tr>

<tr>
<td>Rules</td>
<td><textarea name='rules' cols='60' rows='8'>{$row['rules']}</textarea></td>
</tr>

<tr>
<td>Judgement</td>
<td><textarea name='judgement' cols='60' rows='8'>{$row['judgement']}</textarea></td>
</tr>

<tr>
<td>Prize</td>
<td><input type='text' name='prize' value='{$row['prize']}' /> (separate by ;)</td>
</tr>

<tr>
<td>Venue</td>
<td><input type='text' name='venue' value='{$row['venue']}' /></td>
</tr>

<tr>
<td>Time</td>
<td><input type='text' name='time' value='{$row['time']}'  /> HH:MM:SS</td>
</tr>

<tr>
<td>Date</td>
<td><input type='text' name='date' value='{$row['date']}'  /> Like 17</td>
</tr>

<tr>
<td>Event Coordinators</td>
<td><input type='text' name='coordinators' value='{$row['coordinators']}'  /> (separate by ;)</td>
</tr>

<tr>
<td>Phone</td>
<td><input type='text' name='contact' value='{$row['contact']}'  /> (separate by ;)</td>
</tr>

<tr>
<td>E-mail</td>
<td><input type='text' name='email' value='{$row['email']}'  /> (separate by ;)</td>
</tr>

<tr>
<td>Category</td>
<td><input type='text' name='category' value='{$row['category']}'  /></td>
</tr>

<tr>
<td>Sub-Category</td>
<td><input type='text' name='subcat' value='{$row['subcat']}'  /> (if any)</td>
</tr>

<tr>
<td>Picture</td>
<td><input type='file' name='pic' />(not yet....)
(If given will update the old one.)</td>
</tr>

<tr>
<td></td>
<td>
<input type='hidden' name='id' value='{$id}' />
<input type='submit' value='submit' /></td>
</tr>

</table>
</form>";
}//result
}//isset-get



?>