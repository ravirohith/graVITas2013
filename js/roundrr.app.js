
jQuery(document).ready(function()
{
//	alert("hey");
		$select_flag_im="NULL";
		$select_flag="NULL";
         var currentImage = "";
         var interfaceLock = false; 

	  	jQuery("#roundrr_container").roundrrwheel(
	  	{
			mode: 'pick', //mode can be pick or standard
			autoplay: true,
			autoplayDirection: 'anticlockwise',
			autoplayDuration: 4000,
			centerClass: 'roundrr_center',
			listClass: 'list', 
			itemClass: 'item', 
			radius: 220, 
			animSpeed:400, 
			centerX: 29, 
			centerY: 60, 
			animationEffect: 1, //(1:off, 5:light,10:heavy, 15:subtle)
			selectEvent: "click", 	
			centerImageSrc: "images/placeholder2.png",
			//on selecting/clicking an item on the wheel
			onSelect: function($selected)
			{  
			
			if ($select_flag_im=="NULL") {
				//alert("first time");
				$select_flag_im="true";
			}
			else{
				console.log($select_flag);
					$nam2=$select_flag.children("div.my_class");
					$nam3=$nam2.find('img').attr('alt');
					$nam2.find('img').attr('src',"icons/"+$nam3+".png");
					/*$nam=($select_flag).find('img').attr('alt');
				$nam2=($select_flag).children("div.my_class");
				$nam3=$nam2.find('img').attr('src');

				$alt_nam=$nam2.find('img').attr('alt');
				$im_sr="icons/"+$alt_nam+".png";
				$nam2.find('img').attr('src',$im_src);
*/
			};

			$select_flag=$selected;
				$name=($selected).find('img').attr('alt');
				$name2=($selected).children("div.my_class");
				$name3=$name2.find('img').attr('src');

				$alt_name=$name2.find('img').attr('alt');
				$im_src="icons/"+$alt_name+"_hol.png";
				$name2.find('img').attr('src',$im_src);
				
				//console.log($name3);
			showLargeImage($selected, 'noanim');
			},
			//on beginning to spin/animate the wheel
			onNextBegin: function($m)
			{
			   
			   interfaceLock = true;
			 
			},
			onPrevBegin: function($m)
			{
			   
			   interfaceLock = true;
			 
			},
			//once an image has moved under the 'pick'
			onImageFocus: function($item)
			{

            showLargeImage($item, 'none');
		
			 
			},
			//once an image/image set is no longer under the 'pick'
			onImageBlur:  function($item)
			{
			   
			}, 
			//once the animation has completed
			onAnimationComplete: function($menu)
			{
			
			     jQuery('.centerImage').attr('src', currentImage);
			     jQuery('.centerImage').load(function()
			     {
			       
			        interfaceLock = false;
			     });
			
			 
			},
			angleOffset: Math.PI, 
			onShow: function($menuitems)
			{
				
				$menuitems.each(function(i)
				{
					var $this = jQuery(this);
					$this.delay(i*100).fadeIn(500);
				});
				
				
			}
			
		});
		
		
		
		
		
		jQuery("#roundrr_container").roundrrwheel("show");
		$('#next').bind('click', spinMenuRight);
		$('#prev').bind('click', spinMenuLeft);
		
		function showLargeImage($i, mode)
		{
		  
			interfaceLock = true;
			var thisImage   = $i.find('img');
			var focusedImage = thisImage.attr('src');
            var largerImage = focusedImage.replace('_bigger', '');	
            var imageCaption = thisImage.attr('alt');
            
//-----------------------------------------------------------------
            $new="";
        //    alert(imageCaption);
            
            if (imageCaption=="Computers") {
            	$new="<div class='show1'>Event1<br>Event2</div>"
            };


//---------------------------------------------------------------------
            var speechBubble =  jQuery('.roundrr_speech');
            speechBubble.fadeIn();   
            
            currentImage = largerImage;
            
            jQuery('#roundrr_caption').fadeIn();
			jQuery('#roundrr_caption').html(imageCaption);
            jQuery(".centerImage").fadeOut();
          

            jQuery(".roundrr_center").html("<div class='show2'>Event1<br>Event2<br></div>");	
            /*if(mode=='noanim')
            {
                jQuery('.centerImage').attr('src', currentImage);
			     jQuery('.centerImage').load(function()
			     {
			        interfaceLock = false;
			        
			     });
            }*/
           
		}
		
		
		
		   /*Spin the menu to the left*/
			function spinMenuLeft()
			{
			   if(!(interfaceLock))
			  {
			   jQuery("#roundrr_container").roundrrwheel("prev");
			   }			   
			}
			
			/*Spin the menu to the right*/
			function spinMenuRight()
			{
		      if(!(interfaceLock))
			  {
			   jQuery("#roundrr_container").roundrrwheel("next");
			   } 
			}
			function left(){
				spinMenuLeft();
				spinMenuLeft();
			}
			function right(){

			}
			function replace_pic($selected){

			
			}
			/*Keydown events
			$(window).keydown(function(event) 
			{
				var keycode = event.keyCode;
				switch(keycode)
				{
				  case 39:
           		  spinMenuLeft();
  				  break;
  				  case 37:
           		  spinMenuRight();
  				   break;
		     } });*/


	  });