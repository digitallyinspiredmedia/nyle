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
			 ?>
		</p>


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
