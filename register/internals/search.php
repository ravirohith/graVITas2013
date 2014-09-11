<!doctype html>
<?php
session_start();
require("../extras/session_set.php");
require("../process/config.php");
?>
<html>
<head>
<meta charset="utf-8">	
	<title>graVITas Internals</title>
	<link rel="shortcut icon" href="img/logo.ico"/>
	<link rel="stylesheet" type="text/css"  href="../css/search.css"/>
	<script src="search_autocomplete.js" type="text/javascript"></script>
	<script src="jquery.js"></script>
<script type="text/javascript">
	function alertt()
	{
		return confirm("Are you sure this is crap??");
	}
	$(document).ready(function()
	{
		var h=$(window).height();
		var w=$(window).width();
		//alert(h+" " + w);
		var wrapper=document.getElementById("wrapper");
		var main=document.getElementById("main");
		var top=document.getElementById("top");
		wrapper.style.width=w+"px";
		wrapper.style.height=h+"px";
		main.style.width=w+"px";
		top.style.width=w+"px";
		
		$(function(){
	    	setAutoComplete("searchField", "results", "search_autocomplete.php?part=");
		});
	});
</script>

</head>
<body>
	<div id="wrapper">
    <div id="main">
		<div id="inner_main">
			<div id="autocomplete">
				<H4>SEARCH CONTINGENT</H4> 
				<input id="searchField" maxlength="15" name="searchField" type="text" />
				<div id="results"></div>
			</div>
			
		</div>
     </div>
	</div>
    <footer>graVITas2013.All rights reserved</footer>
	</div>
</body>
</html>