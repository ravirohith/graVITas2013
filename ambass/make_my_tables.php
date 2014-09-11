<?php

$db_conx = mysql_connect("DATA");
mysql_select_db(DATA);
if($db_conx)
{
	echo "database connected";
	
	}
	if(! $db_conx )
   {
     die('Could not connect: ' . mysql_error());
   }
   //campusAmbassador = users
   
$tbl_users = "CREATE TABLE IF NOT EXISTS campusAmbassador (
              id INT(11) NOT NULL AUTO_INCREMENT,
			  name VARCHAR(255) NOT NULL,
			  branch VARCHAR(255) NOT NULL,
			  year VARCHAR(255) NOT NULL,
			  college VARCHAR(255) NOT NULL,
			  number VARCHAR(255) NOT NULL,
			  designation VARCHAR(255) NOT NULL,
			  email VARCHAR(255) NOT NULL,
			  text VARCHAR(500) NOT NULL,
                          UNIQUE KEY (id)
             )";
$query = mysql_query($tbl_users);
if ($query === TRUE) {
	echo "<h3>user table created OK :) </h3>"; 
} else {
	echo "<h3>user table NOT created :( </h3>"; 
}
?>