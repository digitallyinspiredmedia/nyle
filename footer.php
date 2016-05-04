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
<footer>
  <div class="copyright float-left">
     <p>&copy; by <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> @ <?php echo date('Y'); ?></p>
  </div>
  <div class="float-right">
    <?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || has_nav_menu( 'footer' ) ) : ?>
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
      <nav id="site-navigation" class="footer-navigation" role="navigation" aria-label="<?php _e( 'Footer Menu', 'base' ); ?>">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'footer',
            'menu_class'     => 'footer-menu',
           ) );
        ?>
      </nav><!-- .main-navigation -->
    <?php endif; ?>
  <?php endif; ?>
  </div>
</footer>
<!-- Footer -->
<?php wp_footer(); ?>
</body>
</html>
