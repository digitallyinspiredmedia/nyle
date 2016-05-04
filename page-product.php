<?php
/*
 *  Template Name: Product
 *
 * @package Base
 * @subpackage Base Rillusion
 * @since  Base v1.0
 */
get_header(); ?>

<!-- Portfolio -->

<div class="container">

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="row four-content-1">
     <div class="col-f-12">
       <div class="four-box-title">
         <?php the_title(); ?>
<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 12
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
 <?php
  endwhile;
  endif;
 ?>

<?php get_footer(); ?>
