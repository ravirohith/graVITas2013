<?php
session_start();
require '../extras/config.php';
$contingent = $_SESSION['conti'];
	$query = "SELECT no_of_participants FROM colleges WHERE contingent=$contingent";
	$ans = mysql_query($query) or die(mysql_error());
	$res = mysql_fetch_assoc($ans);
	$nop = $res['no_of_participants']; 
$accomodation_cost = 0;
$a_name = $_POST['name'];
$a_count = count($a_name);
$conti_head = $a_name[0];
$a_phone = $_POST['phone'];
$conti_phone = $a_phone[0];
$a_gender = $_POST['gender'];
if(isset($_POST['accomadation']))
 $a_accomodation = $_POST['accomadation'];
$i = 0;
if(isset($_POST['s_date']))
$a_arrive = $_POST['s_date'];
if(isset($_POST['e_date']))
$a_depart = $_POST['e_date'];


$college_name = $_SESSION['college_name'];


while(isset($a_name[$i]) && !empty($a_name[$i])){

$gender = $a_gender[$i];
$name = $a_name[$i];
$phone = $a_phone[$i];
if(isset($_POST['accomadation'])){
$accomodation = $a_accomodation[$i];

if($accomodation==100){
	
	$date_arrive = explode('-',$a_arrive[$i]);
	//print_r($date_arrive);
	$date1 = date("Y")."-".$date_arrive[1]."-".$date_arrive[0];

	
	
	$date_depart = explode('-',$a_depart[$i]);
	//print_r($date_depart);
	$date2 = date("Y")."-".$date_depart[1]."-".$date_depart[0];;
	$acc_days = $date_depart[0] - $date_arrive[0];
	
	$accomodation_cost += $acc_days*150; 
	echo $date1." ".$date2;

$query = "INSERT INTO participants(contingent,college_name,name,phone,contingent_head,accomodation,s_date,e_date,gender) 
VALUES($contingent,'$college_name','$name',$phone,0,$accomodation,'$date1','$date2','$gender') ";
mysql_query($query) or die(mysql_error());
//header("location:../index_step2.php");
}
}
else {
	
	$contingent = $_SESSION['conti'];
	$college_name = $_SESSION['college_name'];
	$contingent_head = 1;

$query = "INSERT INTO participants(contingent,college_name,name,phone,contingent_head,accomodation,gender) 
			VALUES($contingent,'$college_name','$name',$phone,0,0,'$gender') ";
mysql_query($query) or die(mysql_error());

}

$query = "UPDATE colleges SET accomodation_cost=$accomodation_cost,name='$conti_head',phone=$conti_phone WHERE contingent=$contingent";
mysql_query($query) or die(mysql_error());

$i = $i + 1;
}
/*echo "<form method='POST' action="">
	Name : <input type='text' name='name' id='name'/><br />
	<!--<input type='text' name='regno'/><br />-->
	Phone : <input type='text' name='phone' id='phone' /><br /> 
	<input type='submit' value='ADD' onclick='clicky()'/>
</form>";*/
header("location:../index_step3.php");
?>