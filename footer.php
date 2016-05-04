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
      <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
    <?php if ( has_nav_menu( 'social' ) ) : ?>
      <nav id="site-navigation" class="social-navigation" role="navigation" aria-label="<?php _e( 'social Menu', 'base' ); ?>">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'social',
            'menu_class'     => 'social-menu',
           ) );
        ?>
      </nav><!-- .main-navigation -->
    <?php endif; ?>
  <?php endif; ?>
     <p><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?> &nbsp; &copy; <?php the_date('Y') ?></a> All Rights Reserved. </p>
  </div>
  <div class="float-right">

      <p> <a href="http://digitallyinspiredmedia.com" target="_parent"> Designed by Digitally Inspired Media </a></p>
  </div>
    </div>
</footer>
<!-- Footer -->
<?php wp_footer(); ?>
</body>
</html>
