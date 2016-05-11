<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Wordpress
 * @subpackage Base
 * @since  Base v1.1
 */

?>


</div><!-- .site-content / #content -->
</div><!-- .site / #page -->

<!-- Footer -->
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footersite-info">
  <div class="copyright float-left">
      <ul class="social-menu">
        <li> <a href="http://facebook.com" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/facebook.png "> </a></li>
        <li> <a href="http://twitter.com" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/twitter.png "> </a></li>
        <li> <a href="http://pinterest.com" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/pinterest.png "> </a></li>
        <li> <a href="http://linkedin.com" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/linkedin.png "> </a></li>
        <li> <a href="http://youtube.com" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/youtube.png "> </a></li>
        <li> <a href="http://plus.google.com" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/googleplus.png "> </a></li>
      </ul>
     <p><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?> &nbsp; &copy; <?php the_date('Y') ?></a> All Rights Reserved. </p>
  </div>
  <div class="madein float-right">

      <p> <a href="http://digitallyinspiredmedia.com" target="_blank"> Designed by Digitally Inspired Media </a></p>
  </div>
    </div>
</footer>

<script>
  jQuery('#zoom01').elevateZoom({
    zoomType: "inner",
cursor: "crosshair",
zoomWindowFadeIn: 1000,
zoomWindowFadeOut: 750
   });


jQuery('p:empty').remove();
jQuery(document).ready(function(){
  $('form').addClass("awesome-form");
});

jQuery(function(){
  jQuery('.awesome-form .input-group input').focusout(function(){
    var text_val = $(this).val();
    if(text_val === "") {
      jQuery(this).removeClass('has-value');
    } else {
      jQuery(this).addClass('has-value');
    }
  });
});



jQuery('.wpcf7-form-control').attr('autocomplete','off');

var cf7input = $( ".wpcf7-form-control" );
  if ( cf7input.parent().is( "span" ) ) {
    cf7input.unwrap();
  } else {
    cf7input.wrap( "<div></div>" );
  }
jQuery('.form-group br').remove();

jQuery('.form-control').focusout(function(){
 var text_value=jQuery(this).val();
     if(text_value!='')
       {
jQuery(this).addClass("active");
        }else{jQuery(this).removeClass("active");}
});

(function($){
  function floatLabel(inputType){
    $(inputType).each(function(){
      var $this = $(this);
      // on focus add cladd active to label
      $this.focus(function(){
        $this.next().addClass("active");
      });
      //on blur check field and remove class if needed
      $this.blur(function(){
        if($this.val() === '' || $this.val() === 'blank'){
          $this.next().removeClass();
        }
      });
    });
  }
  // just add a class of "floatLabel to the input field!"
  floatLabel(".floatLabel");
})(jQuery);






</script>


<!-- Footer -->
<?php wp_footer(); ?>
</body>
</html>
