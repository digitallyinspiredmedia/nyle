<?php
/**
 * The template for displaying all portfolio content
 *
 * @package Base
 * @subpackage Base Rillusion
 * @since  Base v1.0
 */

get_header(); ?>
<div id="primary" class="container-fluid">
	<main id="main" class="site-main" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
<!-- content for portfolio begin -->
<article>

		<!-- Page title -->
		<h4 class="portfolio-company-name"> <?php the_title(); ?> </h4>

	<!-- List of image for portfolio -->
	<div class="container">
		<div class="portfolio-inner-image">
			<p><?php 	the_content();
			// wps_thumbnails_list(); ?>
		</p>
<?php

the_post_navigation( array(
	'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
		'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
		'<span class="post-title">%title</span>',
	'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
		'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
		'<span class="post-title">%title</span>',
) );


 ?>

		</div><!-- portfolio-inner-image -->
		<div class="clearfix"> </div>
	</div><!-- .container -->
	<!-- List of image for portfolio end -->
</article>
<!-- content for portfolio end -->
	<?php endwhile; ?>

	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
