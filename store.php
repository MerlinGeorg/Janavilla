<?php include('header.php') ?>



<div id="home" class="container-wrapper container-fullwidth"><div class="title-container-outer-wrap">
	<div class="title-container-wrap">
	<div class="title-container clearfix">




		<div id="str-eng" class="entry-title-wrap">

		<?php $storetype = $_GET['sid']; 
		
         if ($storetype=='dm')
          {
		 ?>				



			<h1 class="entry-title draw-a-line-standby">
										Domestic Stores						
			</h1>
		<?php  
		 }
		   else	
		{?>
		   	<h1 class="entry-title draw-a-line-standby">
										International Stores						
			</h1>
		<?php } ?>
		</div>

        <div id="str-arab" class="entry-title-wrap">

		<?php $storetype = $_GET['sid']; 
		
         if ($storetype=='dm')
          {
		 ?>				



			<h1 class="entry-title draw-a-line-standby">
										المتجر 						
			</h1>
		<?php  
		 }
		   else	
		{?>
		   	<h1 class="entry-title draw-a-line-standby">
										المتجر 					
			</h1>
		<?php } ?>
		</div>


			</div>
</div>
</div><div class="container clearfix">	<div class="page-contents-wrap  ">
			
		<div id="post-10048" class="post-10048 page type-page status-publish hentry">

					<div class="entry-page-wrapper entry-content clearfix">
					<p><!-- Google Code for zebrano-iletisim Conversion Page --><br />
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">// <![CDATA[ var google_conversion_id = 972692211; var google_conversion_language = "en"; var google_conversion_format = "3"; var google_conversion_color = "ffffff"; var google_conversion_label = "3CMMCNLL8F8Q87XozwM"; var google_remarketing_only = false; // ]]&gt;</script><br />
<script src="//www.googleadservices.com/pagead/conversion.js" type="text/javascript">// <![CDATA[ // ]]&gt;</script><br />
<noscript></p>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/972692211/?label=3CMMCNLL8F8Q87XozwM&amp;guid=ON&amp;script=0"/></div>
<p></noscript></p>
<p><!-- Google Code for Remarketing Tag --><br />
<!-------------------------------------------------- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: https://google.com/ads/remarketingsetup ---------------------------------------------------><br />
<script type="text/javascript">// <![CDATA[ var google_conversion_id = 972692211; var google_custom_params = window.google_tag_params; var google_remarketing_only = true; // ]]&gt;</script><br />
<script src="//www.googleadservices.com/pagead/conversion.js" type="text/javascript">// <![CDATA[ // ]]&gt;</script><br />
<noscript></p>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/972692211/?value=0&amp;guid=ON&amp;script=0"/></div>
<p></noscript></p>
<p><script>// <![CDATA[ (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-22781005-1', 'auto'); ga('send', 'pageview'); // ]]&gt;</script></p>

 <?php 
 
 if ($storetype=='dm')
          {
		 
      
      $s22="SELECT * from store_map where smap_type = 'Domestic'  limit 1 ";
          }
 else
 {
     $s22="SELECT * from store_map where smap_type = 'International'  limit 1 ";
 }
      $sl22=$db->prepare($s22);
      $sl22->execute();

     while( $res44=$sl22->fetch(PDO::FETCH_ASSOC))
{
      // echo $res44;
      ?>

<p><iframe src="<?php echo $res44['smap_url']; ?>" width="1200" height="480"></iframe></p>
<?php } ?>

<div id="dtl-eng">
	<div id="random-accordion-id-24" class="wp-accordion accordions-shortcode">
		

<?php 
      // echo $subcat; 
      if($storetype=='dm')
        {
      $s2="SELECT * from store where store_type = 'Domestic' and store_status = 1 ";
        }
       else
       {
      $s2="SELECT * from store where store_type = 'International' and store_status = 1 "; 	
       }
        $sl2=$db->prepare($s2);
        $sl2->execute();

 while($res4=$sl2->fetch(PDO::FETCH_ASSOC))
 {
?>

    
		<h3 ><a href="#Adana-0"><?php echo $res4['store_name']?></a></h3>
		<div class="accordian-shortcode-content " >
			<p><?php echo $res4['store_adress']?> </p>
		</div>
	

<?php } ?>		


	</div>
</div>


<div id="dtl-arab">
	<div id="random-accordion-id-24" class="wp-accordion accordions-shortcode">

<?php 
      // echo $subcat; 
      if($storetype=='dm')
        {
      $s2="SELECT * from store where store_type = 'Domestic' and store_status = 1 ";
        }
       else
       {
      $s2="SELECT * from store where store_type = 'International' and store_status = 1 "; 	
       }
        $sl2=$db->prepare($s2);
        $sl2->execute();

 while($res4=$sl2->fetch(PDO::FETCH_ASSOC))
 {
?>

    
	
		<h3 ><a href="#Adana-0"><?php echo $res4['store_name_arab']?></a></h3>
		<div class="accordian-shortcode-content " >
			<p><?php echo $res4['store_adress_arab']?> </p>
		</div>
	
<?php } ?>		


	</div>
</div>





	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript"> /* <![CDATA[ */ 
	jQuery(document).ready( function($){ jQuery("#random-accordion-id-24").accordion({"heightStyle":"content","autoHeight":false,"disabled":false,"active":true,"animated":"slide","clearStyle":false,"collapsible":true,"event":"click","fillSpace":false} ); }); 
	/* ]]&gt; */ </script>

	
					</div>
										
		</div><!-- .entry-content -->

		</div>
	</div>
<div class="footer-end-block clearfix">
	<div class="footer-section-heading section-align-center">
			</div>
	</div>
<footer class="footer-section clearfix">
<div id="goto-top" title="top of page"><i class="feather-icon-arrow-up"></i></div>
<div class="footer-section-inner">
<div id="copyright" class="footer-one-third no-footer-widgets">
	<div class="copyright-wrap">
		Copyright &copy; 2016	</div>
</div>
<div  class="footer-one-third no-footer-widgets">

	<div class="copyright-wrap">



		<!--<h3 style="margin: 5px;color: #ffff"><b>Connect us</b></h3>-->

		<!--<a href=""><img src="images/facebook.png" style="width: 40px"></a>-->
		<!--<a href=""><img src="images/instagram.png" style="width: 50px"></a>-->
		<!--<a href=""><img src="images/twitter.png" style="width: 50px"></a>-->
		</div>

</div>
</div>
</footer>

<!-- share button -->
<div onmouseover="filethis();" onmouseout="closethis();" class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_default_style" style="bottom:0px; right:22px;background: transparent;">
    <!-- <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_pinterest"></a>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
    <!-- <button style="background-color: transparent;width: 150px;border-radius: 10px;border:hidden;color: black;background-color: rgb(223, 213, 154);font-style: inherit;font-family: sans-serif;font-size: 20px" data-toggle="modal" data-target="#myModal">Register</button> -->
  <div style="bottom: 0px"> 
   <div id="logreg-ul" style="background: transparent;">
    <ul >
    	<li><a href="http://nuevoinformatica.com/janavilla/admin"><b style="color: #f94029;cursor: pointer;">Login</b></a></li>
    	<li><b style="color: #f94029;cursor: pointer;" data-toggle="modal" data-target="#myModal">Register</b></li>
    </ul>
   </div>
   <div>
    <a><img style="background: transparent;width: 50px" src="images/user123.png"></a>
   </div>
  </div>
   

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
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/typed.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/menu/verticalmenu.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/videojs/video.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/menu/superfish.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.easing.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var ajax_var = {"url":"https:\/\/www.zebranomobilya.com.tr\/en\/wp-admin\/admin-ajax.php","nonce":"c21dfc98ea"};
/* ]]> */
</script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/page-elements.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.fitvids.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/waypoints/waypoints.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/imagesloaded.pkgd.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/hoverIntent.min.js?ver=1.8.1'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/jquery/ui/position.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/jquery/ui/tooltip.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/owlcarousel/owl.carousel.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/modernizr.custom.47002.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/classie.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.parallax.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.stickymenu.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/lightbox/js/lightgallery.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/froogaloop2.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/lightbox/js/lg-video.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/lightbox/js/lg-autoplay.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/lightbox/js/lg-zoom.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/lightbox/js/lg-thumbnail.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/lightbox/js/lg-fullscreen.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/common.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/jquery/ui/tabs.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/jquery/ui/accordion.min.js?ver=1.11.4'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/supersized/supersized.3.2.7.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/supersized/supersized.shutter.js'></script>
<script type='text/javascript'>


$( document ).ready(function() {
    $('#eng_menu').show();
       $('#arab_menu').hide();
       $('#logreg-ul').hide();
       $('#str-arab').hide();
       $('#str-eng').show();
       $('#dtl-arab').hide();
       $('#dtl-eng').show();
});


		jQuery(function($){	
			jQuery.supersized({
				slideshow               :   1,
				autoplay				:	1,
				start_slide             :   1,
				image_path				:	'https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/images/supersized/',
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
		{image : 'https://www.zebranomobilya.com.tr/en/wp-content/uploads/2016/12/Back-koltuk-1.jpg', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap background-slideshow-controls"><h1 class="slideshow_title slideshow_text_shift_up slideshow_title_animation">back-koltuk</h1></div>', thumb : '', url : ''}				],
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
		
function changelang(lang)
{
	var language = lang;

	if (language=='arab') 
	{
       $('#eng_menu').hide();
       $('#arab_menu').show();
       $('#str-arab').show();
       $('#str-eng').hide();
       $('#dtl-arab').show();
       $('#dtl-eng').hide();
	}
	else
	{
		$('#eng_menu').show();
       $('#arab_menu').hide();
       $('#str-arab').hide();
       $('#str-eng').show();
       $('#dtl-arab').hide();
       $('#dtl-eng').show();
	}	
	
	
	
}

function filethis()
{
	$('#logreg-ul').show();
}

function closethis()
{
	$('#logreg-ul').hide();
}				
		
</script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.touchSwipe.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-includes/js/wp-embed.min.js?ver=4.6.17'></script>
</body>
</html>