<?php include('header.php') ?>


<?php

     $newsid = $_GET['nid'];
        $s33="SELECT * from news where news_id = '$newsid' ";
        $sl33=$db->prepare($s33);
        $sl33->execute();

$res5=$sl33->fetch(PDO::FETCH_ASSOC)
 ?>

  <div id="home" class="container-wrapper container-fullwidth">

    <div class="title-container-outer-wrap">
  <div class="title-container-wrap">
  <div class="title-container clearfix">
            <div class="entry-title-wrap">
      <h1 id="singlt_eng" class="entry-title draw-a-line-standby">

            <?php echo $res5['news_title'] ?>
                                </h1>

       <h1 id="singlt_arab" class="entry-title draw-a-line-standby">

            <?php echo $res5['news_title_arab'] ?>
                                </h1>                         
          </div>
      </div>
</div>
</div><div class="container clearfix"><div class="contents-wrap fullwidth-column">



    <div  class="post--wrapper">
      <div id="post-10640" class="post-10640 post type-post status-publish format-standard has-post-thumbnail hentry category-genel">
<div class="post-format-media"><a class="postsummaryimage" href="https://www.zebranomobilya.com.tr/en/index.php/2017/12/14/we-started-the-hilton-riyadh-on-october-1/"><img src="admin/uploads/<?php echo $res5["news_pic"] ?>" alt="" /></a></div><div class="entry-content postformat_contents post-display-excerpt clearfix">
<span class="post-meta-time-archive">
</span>
<div id="singlnews-eng" class="fullcontent-spacing"><article><p><?php echo $res5['news_desc'] ?></p>
</article></div>
<div id="singlnews-arab" class="fullcontent-spacing"><article><p><?php echo $res5['news_desc_arab'] ?></p>
</article></div>

</div>
<div class="postsummarywrap">

  <div class="datecomment clearfix">
              <i class="feather-icon-paper"></i>
    <span class="post-meta-category">
      <a href="https://www.zebranomobilya.com.tr/en/index.php/category/genel/" rel="category tag">Genel</a>   </span>
        <span class="post-single-meta">
            <span class="post-meta-time">
      <i class="feather-icon-clock"></i>
      <a href="https://www.zebranomobilya.com.tr/en/index.php/2017/12/14/we-started-the-hilton-riyadh-on-october-1/" title="Permalink to We started the Hilton Riyadh on October 1" rel="bookmark">
      <span class="date updated"><?php echo $res5['news_date'] ?></span>      </a>
      </span>
          </span>
  </div>
</div></div>      
<!-- You can start editing here. -->

      <!-- If comments are closed. -->
    <p id="eng-cont" class="no-comments">Comments are closed.</p>
    <p id="arab-cont" class="no-comments">.التعليقات مغلقة</p>
  
    </div>





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
    Copyright &copy; 2016 </div>
</div>
</div>

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

</footer>
</div>


  <!-- share script -->
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- share script -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/typed.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/menu/verticalmenu.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/videojs/video.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/menu/superfish.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.nicescroll.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/jquery.easing.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var ajax_var = {"url":"https:\/\/www.zebranomobilya.com.tr\/en\/wp-admin\/admin-ajax.php","nonce":"34514db720"};
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
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/html5player/jquery.jplayer.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/supersized/supersized.3.2.7.min.js'></script>
<script type='text/javascript' src='https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/js/supersized/supersized.shutter.js'></script>
<script type='text/javascript'>
    jQuery(function($){ 
        
  $( document ).ready(function() {
    $('#eng_menu').show();
       $('#arab_menu').hide();
       $('#mob-arab').hide();
       $('#mob-eng').show();
       $('#logreg-ul').hide();
       $('#arab-abt').hide();
       $('#singlt_eng').show();
       $('#singlt_arab').hide();
       $('#singlnews-arab').hide();
       $('#singlnews-eng').show();
       $('#eng-cont').show();
       $('#arab-cont').hide();

});       
        
      jQuery.supersized({
        slideshow               :   1,
        autoplay        : 1,
        start_slide             :   1,
        image_path        : 'https://www.zebranomobilya.com.tr/en/wp-content/themes/photonic/images/supersized/',
        stop_loop       : 0,
        random          :   0,
        slide_interval          :   8000,
        transition              :   1,
        transition_speed    : 1000,
        new_window        : 0,
        pause_hover             :   0,
        keyboard_nav            :   1,
        performance       : 2,
        image_protect     : 0,         
        min_width           :   0,
        min_height            :   0,
        vertical_center         :   1,
        horizontal_center       :   1,
        fit_always        : 0,
        fit_portrait          :   1,
        fit_landscape     :   0,
        slide_links       : 'blank',
        thumb_links       : 1,
        thumbnail_navigation    :   0,
        slides          :   [
    {image : 'images/bg2.jpeg', title : '<div class="fullscreen-slideshow-color" data-color="bright"></div><div class="slideshow-content-wrap"><h1 class="slideshow_title slideshow_text_shift_up slideshow_title_animation"></h1></div>', thumb : '', url : ''}        ],
        progress_bar      : 1,          
        mouse_scrub       : 1
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
       $('#arab-abt').show();
       $('#eng-abt').hide();
       $('#mob-arab').show();
       $('#mob-eng').hide();
       $('#singlt_eng').hide();
       $('#singlt_arab').show();
       $('#singlnews-arab').show();
       $('#singlnews-eng').hide();
       $('#eng-cont').hide();
       $('#arab-cont').show();
  }
  else
  {
    $('#eng_menu').show();
       $('#arab_menu').hide();
        $('#arab-abt').hide();
       $('#eng-abt').show();
       $('#mob-arab').hide();
       $('#mob-eng').show();
       $('#singlt_eng').show();
       $('#singlt_arab').hide();
       $('#singlnews-arab').hide();
       $('#singlnews-eng').show();
       $('#eng-cont').show();
       $('#arab-cont').hide();
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