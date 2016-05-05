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
<!-- Footer -->
<?php wp_footer(); ?>
</body>
</html>
