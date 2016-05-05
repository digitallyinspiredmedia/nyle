<?php
/*
 *  Template Name: Product
 *
 * @package Base
 * @subpackage Base
 * @since  Base v1.0
 */
get_header(); ?>

<div id="content" class="col-full">
<div id="main" class="col-left">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  		<h1 class="page-title"><?php the_title(); ?></h1>
<?php
 endwhile;
 endif;
?>
<div class="hairneeds-wrapper">


<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 120
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products-->

</div>

</div>
</div>

<?php get_footer(); ?>
