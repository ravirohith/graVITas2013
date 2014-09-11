<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>.:[graVITas 2013]:..:An International Knowlegde Carnival</title>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    
    
    
    <link type="text/css" href="css/jquery.ui.theme.css" rel="stylesheet" />
		<link type="text/css" href="css/jquery.ui.core.css" rel="stylesheet" />
        <link type="text/css" href="css/jquery.ui.slider.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
		
        <style type="text/css">
			span.reference{
				font-family:Arial;
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:13px;
			}
			span.reference a{
				color:#fff;
				margin-right:20px;
				text-transform:uppercase;
			}
			span.reference a:hover{
				border-bottom:1px solid #ddd;
			}
		</style>

<!--
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
-->
</head>

<body>
<div id="wrapper">
	
	<div id="menu">
		<ul>
		<li><a href="#" style="color:white;">HOME</a></li>
		<li><a href="#">SPONSORS</a></li>
		<li><a href="#">TEAM</a></li>
		<li><a href="#">REGISTER</a></li>
		<li><a href="contact.php">CONTACT US</a></li>
		</ul>
	</div>
	
	<!--dashbox start-->
	<div id="dbox">
		<div id="mbox">
			<div id="dagrav" onclick="getFeed('about')"></div>
			<div id="devents" onclick="getFeed('events')"></div>
			<div id="dlectures" onclick="getFeed('lectures')"></div>
			<div id="dhosp" onclick="getFeed('hosp')"></div>
			<div id="dgall" onclick="getFeed('gallery')"></div>  
		</div>
		<div id="containment-wrapper">
			<div id="draggable3" onmouseout="sel()" onmouseup="sel()"></div>
		</div>
	</div>
	<!--dashbox end-->