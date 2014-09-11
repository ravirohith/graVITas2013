<?php include_once("include/header.php") ?>
<style>
#contactForm td{
padding:5px;

}
</style>
<div id="content-wr">
	<div id="content">
		<!--content goes here-->
	<div id="contactForm" style='float:left; width:48%'>
	<?php
	if(isset($_POST['email'])){
	//send email
	  $email = $_POST['email'];
	  $subject = "Contact From ".$_POST['name'] ;
	  
	  if($_POST['type']=='general') $to = "info@vitgravitas.com";
	  else if($_POST['type']=='registration') $to = "registrations@vitgravitas.com";
	  
	  $message = $_POST['query'];
	  mail($to, $subject, $message, "From:" . $email);
	  echo "Thank you for using our Contact form. Our awesome staff will get back to you soon.";
	}
	else{
	echo"<div style='margin-left:50px; height:50px; font-size:20px'>Contact Us</div>
	<form method='post' action='contact.php' id='contact'><table id='contactForm'>
		<tr><td>Name</td> <td><input type='text' name='name' placeholder='Name' /></td></tr>
		<tr><td>University</td> <td><input type='univ' name='univ' placeholder='University' /></td></tr>
		<tr><td>Query related to:</td><td>
		<input type='radio' name='type' value='general' /><label>General Enquiry</label>
		<input type='radio' name='type' value='registration' /><label>Registration</label>
		<tr><td>Email</td> <td><input type='email' name='email' placeholder='E-mail' /></td></tr>
		<tr><td>Query</td> <td><textarea name='query' cols='16' rows='4'></textarea></td></tr>
		<tr> <td></td> <td><input type='submit' value='submit' /></td> </tr>
	</table></form>";
	}
	?>
	</div><!--contact form end-->
	
	<!--map-->
	<div id='map'  style='float:left; width:48%'>
	<div style='margin-left:50px; height:50px; font-size:20px'>Meet Us here: On Sept 27</div>
	<div style="width:400px;height:450px; margin-left:50px;"><iframe width="400" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=VIT%2BUniversity%2C%2Bvellore%2C%2BTamil%2BNadu%2C%2BIndia(VIT+University)&ie=UTF8&z=16&t=m&iwloc=near&output=embed"></iframe><br />
	<table width="400" cellpadding="0" cellspacing="0" border="0">
	<tr>
	<td align="center"><small>
	<a style='color:white;' href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=VIT%2BUniversity%2C%2Bvellore%2C%2BTamil%2BNadu%2C%2BIndia(VIT+University)&ie=UTF8&z=15&t=m&iwloc=near">View Larger Map</a>
	</small></td>
	</tr>
	</table>
	</div>
	</div>
	<!--map end-->
	
	</div><!--content-->
</div><!--content-wr-->

</div><!--wrapper-->

</body>
</html>