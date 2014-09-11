<?php
require '../process/config.php';
if(isset($_GET['part']) and $_GET['part'] != '')
{
	$results = array();
	$count=0;
    $query = "SELECT * FROM colleges WHERE contingent LIKE '%".$_GET['part']."%'";
	$ans = mysql_query($query) or die(mysql_error());
	while($res = mysql_fetch_assoc($ans))
	{
	$results[$count] = array('conringent'=>$res['contingent'],
							'college_name' =>$res['college_name'],
							'accomodation_cost' => $res['accomodation_cost'],
							'events_cost'=>$res['events_cost'],
							'confirm'=>$res['confirm']);
			$count +=1;
	
	}
	// return the array as json with PHP 5.2
	echo json_encode($results);
}



