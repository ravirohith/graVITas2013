/*Script.js for all functions*/
$(document).ready(function () {
            //set width of wrapper;
         //   $('#no-reflection').county({ endDateTime: new Date('2013/09/27 00:00:00'), reflection: false, animation: 'scroll', theme: 'black' });

//workshops
$(".workshop_body").hide();
         
$(".workshop_header").click(function(){ 
        var workshopBody = $(this).next();
	workshopBody.slideToggle(1000,"backout"); 
        
	});         
            

});








/*
function getFeed(type){
var xhr;
	if(window.XMLHttpRequest) xhr = new XMLHttpRequest();
	else xhr = new ActiveXObject("Microsoft.XMLHTTP");
	xhr.onreadystatechange=function(){
		if(xhr.readyState==4 && xhr.status==200){
			$("#content").html(xhr.responseText);			
		}
		else{
			$("#content").html("<img style='margin-top:-30px; margin-left:20px; ' src='images/loading.gif' height='150' width='150'/>");
		}
	}
	xhr.open("GET","content.php?feed="+type,true);
	xhr.send();
}
 

  function dmove1(){
	  document.getElementById("draggable3").style.left= 0 + "px";
          getFeed('about');
	  sel();
  }
  function dmove2(){
	  document.getElementById("draggable3").style.left= 140 + "px";
          getFeed('events');
	  sel();
  }
  function dmove3(){
	  document.getElementById("draggable3").style.left= 280 + "px";
          getFeed('lectures');
	  sel();
  }
  function dmove4(){
	  document.getElementById("draggable3").style.left= 420 + "px";
          getFeed('hosp');
	  sel();
  }
  function dmove5(){
	  document.getElementById("draggable3").style.left= 560 + "px";
	  sel();
  }
  function dmove6(){
	  document.getElementById("draggable3").style.left= 700 + "px";
	  sel();
  }
  function dmove7(){
	  document.getElementById("draggable3").style.left= 840 + "px";
	  sel();
  }
  function del(){
	  }
  function sel(){
	  var x=document.getElementById("draggable3");
	  var p= x.currentStyle || window.getComputedStyle(x);
	  var r=parseInt(p.left);
	  if (r<70){
	  document.getElementById("draggable3").style.left= 0 + "px";
	  document.getElementById("events").style.visibility="hidden";
	  document.getElementById("gallery").style.visibility="hidden";
	  document.getElementById("lectures").style.visibility="hidden";
	  document.getElementById("hospitality").style.visibility="hidden";
	  setTimeout(del(),500);
	  document.getElementById("a-gravi").style.visibility="visible";
	  }
	  else if(r>=70 && r<210){
	  document.getElementById("draggable3").style.left= 140 + "px";
	  document.getElementById("a-gravi").style.visibility="hidden";
	  document.getElementById("gallery").style.visibility="hidden";
	  document.getElementById("lectures").style.visibility="hidden";
	  document.getElementById("hospitality").style.visibility="hidden";
	  setTimeout(del(),500);
	  document.getElementById("events").style.visibility="visible";
	  }
	  else if(r>=210 && r<350){
	  document.getElementById("draggable3").style.left= 280 + "px";
	  document.getElementById("a-gravi").style.visibility="hidden";
	  document.getElementById("gallery").style.visibility="hidden";
	  document.getElementById("events").style.visibility="hidden";
	  document.getElementById("hospitality").style.visibility="hidden";
	  setTimeout(del(),500);
	  document.getElementById("lectures").style.visibility="visible";
	  }
	  else if(r>=350 && r<490){
	  document.getElementById("draggable3").style.left= 420 + "px";
	   document.getElementById("a-gravi").style.visibility="hidden";
	  document.getElementById("gallery").style.visibility="hidden";
	  document.getElementById("events").style.visibility="hidden";
	  document.getElementById("lectures").style.visibility="hidden";
	  setTimeout(del(),500);
	  document.getElementById("hospitality").style.visibility="visible";
	  }   
	  else if(r>=490 &&  r<630){
	  document.getElementById("draggable3").style.left= 560 + "px";
	  document.getElementById("a-gravi").style.visibility="hidden";
	  document.getElementById("events").style.visibility="hidden";
	  document.getElementById("hospitality").style.visibility="hidden";
	  document.getElementById("lectures").style.visibility="hidden";
	  setTimeout(del(),500);
	  document.getElementById("gallery").style.visibility="visible";
	  }
          else if(r>=630 && r<770){
          document.getElementById("draggable3").style.left= 700 + "px"; 
          }
          else if(r>=770){
          document.getElementById("draggable3").style.left= 840 + "px"; 
          } 
} */
  /*
  function init(){
	  document.getElementById("hospitality").style.visibility="hidden";
	  document.getElementById("events").style.visibility="hidden";
	  document.getElementById("lectures").style.visibility="hidden";
	  document.getElementById("gallery").style.visibility="hidden";
	  document.getElementById("a-gravi").style.visibility="visible";
  }
  
  */
  //end
  