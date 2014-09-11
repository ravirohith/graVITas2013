<?php
if(isset($_GET['feed'])){

if($_GET['feed']=="about"){
echo "<div id='a-vid'>
		<object width='640' height='360'><param name='movie' value='//www.youtube.com/v/GGSeeZAM8BI?hl=en_US&amp;version=3'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='//www.youtube.com/v/GGSeeZAM8BI?hl=en_US&amp;version=3' type='application/x-shockwave-flash' width='640' height='360' allowscriptaccess='always' allowfullscreen='true'></embed></object>
		<br />
		<img src='images/drag_ptr_up.png' id='mov-pointer' />
		<h6>Watch this to know more!!</h6>
	</div>
	<div id='a-txt'>
		<h1>ABOUT graVITas</h1><br /> Along the crossroads of Chennai and Bengaluru lies the University host to India's most incredible and innovative Techno-Management Fest, graVITas.
		In the year 2009, graVITas marked the beginning of a legacy. Since then, this annual fest of VIT University has been consistently accomplishing the milestones of novelty and ingenuity. 
		With the onset of yet another year, the time has come for yet another carnival to spread its wings wide and open and to welcome the savvies and thinkers from around the nation - graVITas’13.
		graVITas which is considered to be a symbol of flawlessness is all set to showcase its exclusivity in every sphere of Technology and Management. 
		The fifth edition has set the theatre for the battleships of technology, innovation, imagination and creativity to showcase.
		Never to forget the prime objective of having such a Techno-Management fest, to spread knowledge, define new means of technology; delineate the organizing province and spreading a word of concern to the entire world.
		Yes, we have brought it back, for tu
		. Explore, enhance and experience an ambience of extravagance. 
		Be prepared to witness the rephrasing of history one more time.
	</div>";
}

elseif($_GET['feed']=='events'){
echo"<div id='events'>
	<div id='econtent'>
	<div id='technical'>
	View All<br />
	<a href='events1.html'><img src='images/view_all_button.png' /></a>
	</div>
	<div id='management'>
	View All<br />
	<a href='events2.html'><img src='images/view_all_button.png' /></a>
	</div>
	<div id='workshops'>
	View All<br />
	<a href='events3.html'><img src='images/view_all_button.png' /></a>
	</div>
	<div id='informals'>
	View All<br />
	<a href='events4.html'><img src='images/view_all_button.png' /></a>
	</div>
	</div>																										
</div>";
}

else if($_GET['feed']=='hosp'){
echo"<div id='hospitality'>
	<h2>ACCOMODATION DETAILS</h2>
	<ol>
		<li>Online registrations for accommodation are available.</li>
		<li>Accommodation will be provided on first come first serve basis.</li>
		<li>Request for individual rooms during allotment and complaints in this regard will not be entertained.</li>
		<li>After registration, the participant(s) can contact the hospitality team for accommodation.</li>
            <!--<li>Complimentary breakfast will be provided along with accommodation.</li>-->
		<li>Please note that you will have to share the accommodation facility with other participants from other colleges.</li>
		<li>Safety lockers will be provided for laptops only.</li>
		<li>Mattresses, blankets & pillows will be provided.</li>
		<li>Accommodation will be provided from 25th September 2013, 9:00 am to 30th September 2013, 12:00 PM.</li>
		<li>It is compulsory for the participants to bring their college Id card along with bona fide certificates.</li>
		<li>Consumption of alcohol, narcotics or smoking or any other indisciplinary action in the University premises will lead to severe action.</li>
		<li>We are not responsible for any loss of valuables, luggage or any other.</li>
	</ol>
</div>";
}

else if($_GET['feed']=='lectures'){
echo"<div id='lectures'>
<h2>Coming Soon</h2>
</div>";
}

else if($_GET['feed']=='gallery'){
echo"<div id='gallery'>
	<a href='gallery.php'>Image Gallery</a>
	<a href='#'>Video Gallery</a>	
</div>";
}



}
else{
	echo "There is nothing here yet. Come back soon.";
	}

?>