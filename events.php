<?php include_once("include/header.php");
//start connection
/*
$connect = mysql_connect("localhost","vitgravi_tech13","aricore13");
if(!$connect){
	die("Database connection Error");
	}
//select database
$db = mysql_select_db("vitgravi_13_events");
if(!$db){
	die("Database selection Error");
	}
	*/
 ?>
<style>
#eventDetails{
        box-shadow:0px 0px 10px 10px #000000;
        background:url(images/emc.png);
}
</style> 
<div id="content-wr">
	<div id="content">
	<?php 
	if(isset($_GET['eventId'])){
		$query = mysql_query("select * from eventDetails where id={$_GET['eventId']}");
		if(mysql_num_rows($query)){
		$row = mysql_fetch_array($query); 
		echo "<table id='eventDetails' border='0'>
		      <tr>
		      <td style='width:196px'>Date: {$row['date']}<br />Time: {$row['time']}<br />Venue: {$row['venue']}</td>
		      <td style='width:776px; text-align:center'><h2>{$row['name']}</h2></td>
		      <td style='width:196px'>Prize:{$row['prize']}</td><tr>";
		echo "<tr>
		      <td style='vertical-align:text-top;'>Category: {$row['category']}</td>
		      <td><h3>Intro:</h3><br /> {$row['brief']}<br /><br />
		      <h3>Description:</h3><br /> {$row['content']}<br /><br />
		      <h3>Rules:</h3><br /> {$row['rules']}<br /><br />
		      <h3>Judgement:</h3><br /> {$row['judgement']}<br /><br />
		      <h3>Co-ordinators:</h3><br /> {$row['coordinators']}<br /><br /></td>
		      <td style='vertical-align:text-top;'>Contact:  {$row['contact']}<br />Email:<br />{$row['email']}</td></tr>"; 
		echo"</table>";
		
		}
		else{
		echo "<h1>Nice try but sorry there is no such event.</h1>";
		}
	}
	else{
	//events circular menu
	/*
	echo"<h3>Events:</h3>";
		$query = mysql_query("select id,name from eventDetails");
		while($row = mysql_fetch_array($query)){ 
			echo"<a style='color:white;' href='events.php?eventId={$row['id']}'>{$row['name']}</a><br />";	
		}
		*/
		
	//v2
	echo"
 <div class='container' style='margin-left:-145px; margin-top:145px;'>


 <!-- Right-hand navigation -->
 
  
  
   <!-- central image -->
   <div class='roundrr_center'>
  
   </div>
   
   <!-- Speech bubble for captions -->
   <div class='roundrr_speech'>
   </div>
 
  
  <!-- actual caption text -->
  <div id='roundrr_caption'>
   </div>
   
  
 
  
  <!-- the container of images -->
	<div id='roundrr_container'>
		<ul class='list'>
		
			<li class='item'>	
			<div class='my_class'> 
			<img alt='applied engineering' src='images/roundrr/applied engineering.png'></img> 
			</div>	
			</li>

	        <li class='item'>	
			<div class='my_class'>  
			<img  alt='BioXyn' src='images/roundrr/bioxyn.png'></img>  </div>	</li>
			

           <li class='item'>	
			<div class='my_class'>  
			<img alt='builtrix' src='images/roundrr/builtrix.png' ></img>
			</div>	
			</li>
				
			<li class='item'>	
			<div class='my_class'>  
			<img alt='Computers' src='images/roundrr/computers.png'></img>
			</div>	
			</li>

			<li class='item'>	
			<div class='my_class'>  
			<img alt='Electrical' src='images/roundrr/electrical.png'></img>  </div>	</li>
			
			
			<li class='item'>	
			<div  class='my_class'>  
			<img alt='Management'src='images/roundrr/Management.png'></img>  
			</div>	
			</li>

			
			<li class='item'>	
			<div class='my_class'>  
			<img alt='Online' src='images/roundrr/online.png'></img>  </div>	
			</li>

			<li class='item'>	
			<div class='my_class'>  
			<img  alt='Premium' src='images/roundrr/premium.png'></img>  </div>	</li>
			
			<li class='item'>	
			<div class='my_class'>  
			<img  alt='quizzes' src='images/roundrr/quizzes.png'></img>  </div>	
			</li>
			
			<li class='item'>	
			<div class='my_class'>  
			<img  alt='Builtrix' src='images/roundrr/builtrix.png'></img>  </div>	</li>
			
			
			<li class='item'>	
			<div class='my_class'>  
			<img  alt='Robotics' src='images/roundrr/robotics.png'></img>  </div>	</li>
			
			<li class='item'>	
			<div class='my_class'>  
			<img  alt='Informal' src='images/roundrr/Informal.png'></img>  </div>	</li>
			
				
		</ul>
	</div>
	
	
	
	
  
  </div>	";
		
		
	}
	
	?>
	</div><!--content-->
</div><!--content-wr-->

</div><!--wrapper-->

</body>
</html>