<?php
session_start();
require '../extras/config.php';
$name = htmlentities(mysql_escape_string($_POST['regname']));
$phone = htmlentities(mysql_escape_string($_POST['regphone']));
$email = htmlentities(mysql_escape_string($_POST['regemail']));
if(isset($_POST['regaccomadation']))
$accomodation = htmlentities(mysql_escape_string($_POST['regaccomadation']));
$gender = htmlentities(mysql_real_escape_string($_POST['reggender']));
$no_of_participants = htmlentities(mysql_real_escape_string($_POST['regnop']));
if(isset($_POST['regs_date']))
{
	$arrive = htmlentities(mysql_escape_string($_POST['regs_date']));
	$date_arrive = array();
	$date_arrive = explode('-',$arrive);
	//print_r($date_arrive);
	$date1 = date("Y")."-".$date_arrive[1]."-".$date_arrive[0];
//echo $date1;
}
if(isset($_POST['rege_date']))
{
	$depart = htmlentities(mysql_escape_string($_POST['rege_date']));
	$date_depart = array();
	$date_depart = explode('-',$depart);
	//print_r($date_depart);
	$date2 = date("Y")."-".$date_depart[1]."-".$date_depart[0];;
}
$contingent = $_SESSION['conti'];
$college_name = $_SESSION['college_name'];
$contingent_head = 1;
if(isset($_POST['regaccomadation']))
{
	$query = "INSERT INTO participants(contingent,college_name,name,email,phone,contingent_head,
			  accomodation,s_date,e_date,gender,no_of_participants) 
			  VALUES($contingent,'$college_name','$name','$email',$phone,1,$accomodation,'$date1',
			  '$date2','$gender',$no_of_participants) ";
	mysql_query($query) or die(mysql_error());
	header("location:../index_step2.php");
}
else
{
	$query = "INSERT INTO participants(contingent,college_name,name,email,phone,contingent_head,
			  accomodation,s_date,e_date,gender,no_of_participants) 
			  VALUES($contingent,'$college_name','$name','$email',$phone,1,0,'',
			  '','$gender',$no_of_participants) ";
	mysql_query($query) or die(mysql_error());
	header("location:../index_step2.php");
}
/*echo "<form method='POST' action="">
	Name : <input type='text' name='name' id='name'/><br />
	<!--<input type='text' name='regno'/><br />-->
	Phone : <input type='text' name='phone' id='phone' /><br /> 
	<input type='submit' value='ADD' onclick='clicky()'/>
</form>";*/
?>