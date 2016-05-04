<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 *
 * @package Wordpress
 * @subpackage Base
 * @since  Base v1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="content-type" content="text/html;" charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="resource-type" content="document" />
	<meta http-equiv="content-language" content="en-us" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="author" content=" <?php $user_info = get_userdata(1); echo '' . $user_info->user_login; ?> "/>
	<meta name="contact" content=" <?php $user_info = get_userdata(1); echo '' . $user_info->user_email; ?> "/>
	<meta name="description" content="<?php if ( is_single() ) {
	        single_post_title('', true);
	    } else {
	        bloginfo('name'); echo " - "; bloginfo('description');
	    }
	    ?>" />
					<?php if(is_single() || is_page() || is_home()) { ?>
    <meta name="googlebot" content="index,noarchive,follow,noodp" />
    <meta name="robots" content="all,index,follow" />
  <meta name="msnbot" content="all,index,follow" />
<?php } else { ?>
    <meta name="googlebot" content="noindex,noarchive,follow,noodp" />
    <meta name="robots" content="noindex,follow" />
  <meta name="msnbot" content="noindex,follow" />
<?php }?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	 <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	  <?php endif; ?>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<?php wp_head(); ?>
</head>

<body <?php body_class(( array( "pushmenu-push") )); ?>>
<div id="page" class="site">
	<header class="header-navigation">
        <div class="mainnav">
		<!-- logo -->
		<h1 class="logo">
    		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/logo.png"
					class="img-reponsive header-image"
					alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) );?>"  title="Logo"
				/>
			</a>
    	</h1>
    	<!-- logo end -->
    	<!-- Menu begin -->
  		<nav class="pushmenu pushmenu-left">
   			<div class="main-navigation">
     			<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || has_nav_menu( 'footer' ) ) : ?>
					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Primary Menu', 'base' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class'     => 'primary-menu',
								 ) );
							?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>
				<?php endif; ?>
    		</div>
  		</nav>
		 <!-- menu end -->
        </div>
  		<!-- menu icon-->
  			<a id="nav-toggle" href="#"><span></span></a>
  		<!-- menu icon end -->
	</header>
<!-- header over -->

<!-- .site-header-main -->
	<div id="content" class="site-content">
