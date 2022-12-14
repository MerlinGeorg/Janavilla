<?php include('header.php') ?>
	<div id="home" class="container-wrapper container-fullwidth">

	<ul id="slideshow-data" data-lastslide="5">
    
  <?php
        
        $s3="SELECT * from home_slider where homeslider_priority = 1";
        $sl3=$db->prepare($s3);
        $sl3->execute();

 while($res3=$sl3->fetch(PDO::FETCH_ASSOC))
 { ?>
		<li class="slide-0" data-slide="<?php echo $res3["homeslider_priority"] ?>" data-color="bright" data-src="<?php echo $res3["homeslider_pic"] ?>" data-thumbnail="<?php echo $res3["homeslider_pic"] ?>" data-title="Luxury Philospohy"></li>
		<input type="hidden" name="prio1" id="prio1" value="<?php echo $res3["homeslider_pic"] ?>">
		<input type="hidden" name="title1" id="title1" value="<?php echo $res3["homeslider_title"] ?>">
		<input type="hidden" name="subt1" id="subt1" value="<?php echo $res3["homeslider_subtitle"] ?>">
<?php } ?>	

<?php
        
        $s4="SELECT * from home_slider where homeslider_priority = 2";
        $sl4=$db->prepare($s4);
        $sl4->execute();

 while($res4=$sl4->fetch(PDO::FETCH_ASSOC))
 { ?>
		<li class="slide-0" data-slide="<?php echo $res4["homeslider_priority"] ?>" data-color="bright" data-src="<?php echo $res4["homeslider_pic"] ?>" data-thumbnail="<?php echo $res4["homeslider_pic"] ?>" data-title="Luxury Philospohy"></li>
		<input type="hidden" name="prio2" id="prio2" value="<?php echo $res4["homeslider_pic"] ?>">
		<input type="hidden" name="title2" id="title2" value="<?php echo $res4["homeslider_title"] ?>">
		<input type="hidden" name="subt2" id="subt2" value="<?php echo $res4["homeslider_subtitle"] ?>">
<?php } ?>	

<?php
        
        $s5="SELECT * from home_slider where homeslider_priority = 3";
        $sl5=$db->prepare($s5);
        $sl5->execute();

 while($res5=$sl5->fetch(PDO::FETCH_ASSOC))
 { ?>
		<li class="slide-0" data-slide="<?php echo $res5["homeslider_priority"] ?>" data-color="bright" data-src="<?php echo $res5["homeslider_pic"] ?>" data-thumbnail="<?php echo $res5["homeslider_pic"] ?>" data-title="Luxury Philospohy"></li>
		<input type="hidden" name="prio3" id="prio3" value="<?php echo $res5["homeslider_pic"] ?>">
		<input type="hidden" name="title3" id="title3" value="<?php echo $res5["homeslider_title"] ?>">
		<input type="hidden" name="subt3" id="subt3" value="<?php echo $res5["homeslider_subtitle"] ?>">
<?php } ?>

<?php
        
        $s6="SELECT * from home_slider where homeslider_priority = 4";
        $sl6=$db->prepare($s6);
        $sl6->execute();

 while($res6=$sl6->fetch(PDO::FETCH_ASSOC))
 { ?>
		<li class="slide-0" data-slide="<?php echo $res6["homeslider_priority"] ?>" data-color="bright" data-src="<?php echo $res6["homeslider_pic"] ?>" data-thumbnail="<?php echo $res6["homeslider_pic"] ?>" data-title="Luxury Philospohy"></li>
		<input type="hidden" name="prio4" id="prio4" value="<?php echo $res6["homeslider_pic"] ?>">
		<input type="hidden" name="title4" id="title4" value="<?php echo $res6["homeslider_title"] ?>">
		<input type="hidden" name="subt4" id="subt4" value="<?php echo $res6["homeslider_subtitle"] ?>">
<?php } ?>	

<?php
        
        $s7="SELECT * from home_slider where homeslider_priority = 5";
        $sl7=$db->prepare($s7);
        $sl7->execute();

 while($res7=$sl7->fetch(PDO::FETCH_ASSOC))
 { ?>
		<li class="slide-0" data-slide="<?php echo $res7["homeslider_priority"] ?>" data-color="bright" data-src="<?php echo $res7["homeslider_pic"] ?>" data-thumbnail="<?php echo $res7["homeslider_pic"] ?>" data-title="Luxury Philospohy"></li>
		<input type="hidden" name="prio5" id="prio5" value="<?php echo $res7["homeslider_pic"] ?>">
		<input type="hidden" name="title5" id="title5" value="<?php echo $res7["homeslider_title"] ?>">
		<input type="hidden" name="subt5" id="subt5" value="<?php echo $res7["homeslider_subtitle"] ?>">
<?php } ?>	


		
	</ul>		
		<!--Slide counter-->
			<div id="slidecounter">
			<span class="slidenumber"></span>
			<span class="totalslides"></span>
		    </div>
		
		<!--Arrow Navigation-->
		<a id="prevslide" class="prevnext-nav load-item"><i class="feather-icon-arrow-left"></i></a>
		<a id="nextslide" class="prevnext-nav load-item"><i class="feather-icon-arrow-right"></i></a>
		
		<div class="slideshow-controls-wrap">
			<div id="controls-wrapper" class="load-item slideshow-control-item">
				<div id="controls">		
					<!--Navigation-->
	 <a id="play-button"><i id="pauseplay" class="feather-icon-pause"></i></a> 
															</div>
			</div>
			<div class="slideshow-control-item mtheme-fullscreen-toggle fullscreen-toggle-off"><i class="fa fa-expand"></i></div>
		</div>
		
<div id="slidecaption"></div>
	<!--Control Bar-->
	<!--Time Bar-->
<div id="progress-back" class="load-item">
<div id="progress-bar"></div>
</div>
<div class="fullscreenslideshow-audio">
 <div id="jquery_jplayer_10640" class="fullscreenslideshow-audio-player jp-jplayer" data-loop="true" data-volume="0.75" data-autoplay="false" data-id="10640" data-audiofiles="mp3,m4a,oga" data-oga="https://www.zebranomobilya.com.tr/zebrano17.ogg" data-m4a="https://www.zebranomobilya.com.tr/zebrano17.m4a" data-mp3="https://www.zebranomobilya.com.tr/zebrano17.mp3" data-swfpath="https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/html5player/"></div> 

<div class="jp-audio">
	<div class="jp-type-single">
		<div id="jp_interface_10640" class="jp-interface">
			 <ul class="jp-controls">
				<li><a href="#" class="jp-pause" tabindex="1" title="pause"><i class="feather-icon-pause"></i></a></li>
				<li><a href="#" class="jp-play" tabindex="1" title="play"><i class="feather-icon-play"></i></a></li>
			</ul> 
		</div>
	</div>
</div>
</div>




<!-- share button -->
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_default_style" style="bottom:0px; right:0px;background-color:#732d2f;color: black;opacity: 0.8">
    
    <button style="background-color: transparent;width: 150px;border-radius: 10px;border:hidden;color: black;background-color: rgb(223, 213, 154);font-style: inherit;font-family: sans-serif;font-size: 20px" data-toggle="modal" data-target="#myModal">Register</button>

</div>
<!-- share button -->
<!-- share button -->
<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_default_style" style="bottom:0px; left:0px;background-color:transparent;">
        <img src="images/facebook.png" style="width: 40px">
		<img src="images/instagram.png" style="width: 50px">
		<img src="images/twitter.png" style="width: 50px">
    
    <!-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
    <!-- <button style="background-color: transparent;width: 150px;border-radius: 10px;border:hidden;color: black;background-color: rgb(223, 213, 154);font-style: inherit;font-family: sans-serif;font-size: 20px">Register</button> -->

</div>
<!-- share button -->

<!-- model -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #732d2f">
          <button type="button" class="close" data-dismiss="modal" style="color: rgb(223, 213, 154)">&times;</button>
          <h4 class="modal-title" style="text-align: center;color: rgb(223, 213, 154)">Registration Request</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="reg_form_mail.php">
          	<h4 class="demo-sub-title" style="color: rgb(223, 213, 154)">Name</h4>
          	<input type="text" style="border-color: rgb(223, 213, 154)" class="form-control" name="regname" id="regname" placeholder="name of the company or person">
          	<h4 class="demo-sub-title" style="color: rgb(223, 213, 154)">Type</h4>
          	<select class="form-control" style="color: rgb(223, 213, 154);border-color: rgb(223, 213, 154)" name="regtype" id="regtype" required="required">
          		<option value="">Select</option>
          		<option value="Supplier">Supplier</option>
          		<option value="Customer">Customer</option>
          	</select>
          	<h4 class="demo-sub-title" style="color: rgb(223, 213, 154)">Mail Id</h4>
          	<input type="mail" style="border-color: rgb(223, 213, 154)" class="form-control" name="regmail" id="regmail" placeholder="Mail id">
          	<h4 class="demo-sub-title" style="color: rgb(223, 213, 154)">Phone No</h4>
          	<input type="number" style="border-color: rgb(223, 213, 154)" class="form-control" name="regphn" id="regphn" placeholder="phone no" required="required">
          	<button type="submit" class="btn" style="background-color: #732d2f;color: rgb(223, 213, 154);margin-top: 7px">Submit</button>
          </form>
        </div>
        <div class="modal-footer" style="background-color: #732d2f">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="text-align: center;color: rgb(223, 213, 154);border-color: rgb(223, 213, 154);background-color: #732d2f">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- model -->

</div>
<!-- share script -->
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- share script -->
<script data-cfasync="false" src="assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/typed.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/menu/verticalmenu.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/videojs/video.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/menu/superfish.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/jquery.easing.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var ajax_var = {"url":"https:\/\/www.zebranomobilya.com.tr\/en\/wp-admin\/admin-ajax.php","nonce":"e04d75be82"};
/* ]]> */
</script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/page-elements.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/jquery.fitvids.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/waypoints/waypoints.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='assets/wp-includes/js/hoverIntent.minc245.js?ver=1.8.1'></script>
<script type='text/javascript' src='assets/wp-includes/js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='assets/wp-includes/js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='assets/wp-includes/js/jquery/ui/position.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='assets/wp-includes/js/jquery/ui/tooltip.mine899.js?ver=1.11.4'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/owlcarousel/owl.carousel.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/modernizr.custom.47002.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/classie.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/jquery.parallax.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/jquery.stickymenu.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/lightbox/js/lightgallery.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/froogaloop2.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/lightbox/js/lg-video.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/lightbox/js/lg-autoplay.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/lightbox/js/lg-zoom.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/lightbox/js/lg-thumbnail.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/lightbox/js/lg-fullscreen.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/common.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/html5player/jquery.jplayer.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/supersized/supersized.3.2.7.min.js'></script>
<script type='text/javascript' src='assets/wp-content/themes/photonic/js/supersized/supersized.shutter.js'></script>

<script type='text/javascript'>
		jQuery(function($){	
        
        var slider1 = document.getElementById('prio1').value;
        var slider2 = document.getElementById('prio2').value;
        var slider3 = document.getElementById('prio3').value;
        var slider4 = document.getElementById('prio4').value;
        var slider5 = document.getElementById('prio5').value;

        var title1 = document.getElementById('title1').value;
        var title2 = document.getElementById('title2').value;
        var title3 = document.getElementById('title3').value;
        var title4 = document.getElementById('title4').value;
        var title5 = document.getElementById('title5').value;

        var subt1 = document.getElementById('subt1').value;
        var subt2 = document.getElementById('subt2').value;
        var subt3 = document.getElementById('subt3').value;
        var subt4 = document.getElementById('subt4').value;
        var subt5 = document.getElementById('subt5').value;


			jQuery.supersized({
				slideshow               :   1,
				autoplay				:	1,
				start_slide             :   1,
				image_path				:	'',
				stop_loop				:	0,
				random					: 	0,
				slide_interval          :   8000,
				transition              :   1,
				transition_speed		:	1000,
				new_window				:	0,
				pause_hover             :   0,
				keyboard_nav            :   1,
				performance				:	2,
				image_protect			:	0,			   
				min_width		        :   0,
				min_height		        :   0,
				vertical_center         :   1,
				horizontal_center       :   1,
				fit_always				:	0,
				fit_portrait         	:   1,
				fit_landscape			:   0,
				slide_links				:	'blank',
				thumb_links				:	1,
				thumbnail_navigation    :   0,
				slides 					:  	[
		{image : 'admin/uploads/'+slider1, title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title  slideshow_title_animation">'+title1+'</h1><div class="slideshow_caption">'+subt1+'</div></div>', thumb : '', url : ''},

		{image : 'admin/uploads/'+slider2, title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title  slideshow_title_animation">'+title2+'</h1><div class="slideshow_caption">'+subt2+'</div></div>', thumb : '', url : ''},

		{image : 'admin/uploads/'+slider3, title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title  slideshow_title_animation">'+title3+'</h1><div class="slideshow_caption">'+subt3+'</div></div>', thumb : '', url : ''},

		{image : 'admin/uploads/'+slider4, title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title  slideshow_title_animation">'+title4+'</h1><div class="slideshow_caption">'+subt4+'</div></div>', thumb : '', url : ''},

		{image : 'admin/uploads/'+slider5, title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title  slideshow_title_animation">'+title5+'</h1><div class="slideshow_caption">'+subt5+'</div></div>', thumb : '', url : ''},
		// {image : 'https://www.zebranomobilya.com.tr/en/wp-content/uploads/2015/06/2019-007-2.jpg', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title  slideshow_title_animation">Luxury Philospohy</h1><div class="slideshow_caption">Quality spaces are springs of quality life …</div></div>', thumb : '', url : ''},
		// {image : 'https://www.zebranomobilya.com.tr/en/wp-content/uploads/2015/06/2019-014-2.jpg', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title  slideshow_title_animation">Luxury Philospohy</h1><div class="slideshow_caption">For us, expectation is offering concept and prestigious living space before anything else</div></div>', thumb : '', url : ''}				
		],
				progress_bar			:	1,					
				mouse_scrub				:	1
			});
			if ($.fn.swipe) {
				jQuery(".page-is-fullscreen #supersized,.page-is-not-fullscreen #supersized").swipe({
				  excludedElements: "button, input, select, textarea, .noSwipe",
				  swipeLeft: function() {
				    jQuery("#nextslide").trigger("click");
				  },
				  swipeRight: function() {
				    jQuery("#prevslide").trigger("click");
				  }
				});
			}
		});
</script>

<script type='text/javascript' src='assets/wp-content/themes/photonic/js/jquery.touchSwipe.min.js'></script>

<script type='text/javascript' src='assets/wp-includes/js/wp-embed.mina970.js?ver=4.6.17'></script>
</body>


</html>