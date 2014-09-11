<?php
if(isset($_POST["n"])){
// Evaluate the connection
//connection settings


	$n = mysql_real_escape_string($_POST['n']);
	$b = mysql_real_escape_string($_POST['b']);
	$y = mysql_real_escape_string($_POST['y']);
	$c = mysql_real_escape_string($_POST['c']);
	$num = mysql_real_escape_string($_POST['num']);
	$e = mysql_real_escape_string($_POST['e']);
	$t = mysql_real_escape_string($_POST['t']);
	$d = mysql_real_escape_string($_POST['d']);
	
	$sql = "SELECT name FROM campusAmbassador WHERE email='$e' LIMIT 1";
	
	//work accordingly
    $query = mysql_query($sql); 
	//$e_check = mysql_num_rows($query);
	// FORM DATA ERROR HANDLING
	
	if($n == "" || $b == "" || $y == "" || $c == "" || $num == "" || $e == "" || $t == "" || $d == ""){
		echo "The form submission is missing values.";
        exit();
	} //else if ($e_check > 0){ 
       // echo "That email address is already in use in the system";
       // exit();
     else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Add user info into the database table for the main site table
		$abc = "INSERT INTO campusAmbassador (name, branch, year, college, number, email, text, designation)       
		        VALUES('$n','$b','$y','$c','$num','$e','$t','$d')";
		$query = mysql_query($abc);
		if($query){
		echo "Signup Success";
		}exit();
	}
	exit();
}
?>
<html>
<head>
<title>CAMPUS AMBASSADORS</title>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<script  src="js/jquery.js" ></script>
<script  src="js/bootstrap.min.js" ></script>
</head>
<script>

function _(x){
	return document.getElementById(x);
}
function emptyElement(x){
	_(x).innerHTML = "";
}

function signup(){
	location.hash = 'signupbtn';
	var n = _("name").value;
	var b = _("branch").value;
	var y = _("year").value;
	var c = _("college").value;
	var num = _("number").value;
	var e = _("email").value;
	var t = _("textarea").value;
	var d =_("designation").value;
	var status = _("status");
	status.innerHTML = "";
	var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var filtertext  = /^([a-zA-Z])*$/;
	var re = /^[0-9]*$/;
	if(!filtertext.test(n)||!filtertext.test(d))
	{
		status.innerHTML = "error : only alphabets for name and designation";
		location.hash = 'signupbtn';
		}
		else
	if (!re.test(y)||!re.test(num)){
	status.innerHTML = "error : enter year and contact field in numeric";
	location.hash = 'signupbtn';}
	else if(y>5){
		status.innerHTML = "error : enter correct year";
		location.hash = 'signupbtn';
		}
		else
	if(num.length < 10){
		status.innerHTML = "error : enter correct mobile number";
		location.hash = 'signupbtn';
		
		}
		else if (filter.test(e)){
		if(n == "" || b == "" || y == "" || c == "" || num == "" || e == "" || t == "" || d == ""){
		status.innerHTML = "error : Fill out all of the form data";
		location.hash = 'signupbtn';
	}
	else {
		_("signupbtn").style.display = "none";
		status.innerHTML = 'please wait ...';
		var ajax = new XMLHttpRequest();
		ajax.open("POST","index.php",true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() {
	        if(ajax.readyState==4 && ajax.status== 200) {
	            if(ajax.responseText != "signup_success"){
					status.innerHTML = ajax.responseText;
					_("submit").style.display = "block";
				} else {
					window.scrollTo(0,0);
					_("signupform").innerHTML = "OK you have successfully registered";
				}
	        }
        }
        ajax.send("n="+n+"&b="+b+"&y="+y+"&c="+c+"&num="+num+"&e="+e+"&t="+t+"&d="+d);
	}
		
		}
	else {status.innerHTML = "error : enter valid email address";
	location.hash = 'signupbtn';}
	
}
function openTerms(){
	_("terms").style.display = "block";
	emptyElement("status");
}

</script>

<body>
<div class="container">
  <div class="accordion well-small" id="accordion2">
    <div class="accordion-group">
      <div class="well">
      <div>
       <a class="accordion-toggle btn btn-primary" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        REGISTRATION
        </a> 
        <a class="btn btn-primary" href="http://www.vitgravitas.com/" style="float:right;">
        MAIN SITE
        </a></div>
        <div style="margin-top:-50px;">
          <center>
         <a><img src="images/campusamba.jpg"/></a>
         </center>
         </div>
        </div>
      <div id="collapseOne" class="accordion-body collapse in">
        <div class="accordion-inner">
          <div class="container well">
            <form class="form-horizontal" name="signupform" id="signupform" onSubmit="return false;">
              <div class="form-group">
                <label class="col-lg-2 control-label">NAME</label>
                <div class="col-lg-10">
                  <input type="text" maxlength="20" class="form-control" id="name" placeholder="Name">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">BRANCH</label>
                <div class="col-lg-10">
                  <input type="text" maxlength="20" class="form-control" id="branch" placeholder="Branch">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">YEAR</label>
                <div class="col-lg-10">
                  <input type="text" maxlength="1" class="form-control" id="year" placeholder="Year">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">COLLEGE</label>
                <div class="col-lg-10">
                  <input type="text" maxlength="20" class="form-control" id="college" placeholder="College">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">CONTACT NO.</label>
                <div class="col-lg-10">
                  <input type="text" maxlength="10" class="form-control" id="number" placeholder="Contact">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">DESIGNATION</label>
                <div class="col-lg-10">
                  <input type="text" maxlength="20" class="form-control" id="designation" placeholder="Designation">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">EMAIL ID</label>
                <div class="col-lg-10">
                  <input type="text" maxlength="40" class="form-control" id="email" placeholder="Email id">
                </div>
              </div>
              <center>
                YOUR CONTRIBUTION FOR graVITas'13, VIT UNIVERSITY, VELLORE - 632014, TAMIL NADU, INDIA<br />
                <textarea id="textarea" maxlength="300" cols="100" rows="10"></textarea>
              </center>
              <div class="form-group">
                <div class="col-lg-10">
                
                  <button id="signupbtn" class="btn btn-success col-lg-offset-4" onClick="signup();">SUBMIT</button>
                  
                </div>
              </div>
              <span id="status"></span>
            </form>
          </div>
        </div>
      </div>
    </div>
    <pre>
When we talk about distinction amid the finest, we believe in it. We believe in promoting those incomparable individuals who have the knack of defining exceptional thinking abilities and exhibiting their skills by becoming envoys. 
Yes, graVITas 2013 has pledged to unleash the genius of everyone associated with it, and this is an opportunity for those budding endowed individuals who are resourceful in becoming the CAMPUS AMBASSADORS for the 5th Edition of the International Knowledge Carnival of VIT University. 
Join us, and witness the rephrasing of history!
<strong>So what are you supposed to do?</strong><br />
Simple!!
1. You will have to coordinate with the students from your college.
2. You will have to coordinate with the registration procedure and overall management of students of your respective colleges

<strong>How do you benefit out of it?</strong><br />
1. You will be CERTIFIED during the final day of graVITas 2013. 
2. You become the proud 'AMBASSADOR' of your college in graVITas 2013.
3. You will be recognised and honoured based on the number of participants from your institute.

For more details, please contact:

Adhavan S - 9176150372
Bala Kumaran - 9787211489

E-mail id: marketing.gravitas13@gmail.com          
</pre>
  </div>
</div>
<br />
<br />
<br />
<br />
<br />
<script>
		$(document).ready(function(){
			$(".collapse").collapse()
		});

</script>
</body>
</html>