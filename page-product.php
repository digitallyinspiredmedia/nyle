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
  		<h1 class="page-title productpa"><?php the_title(); ?></h1>
<?php
 endwhile;
 endif;
?>
<div class="hairneeds-wrapper">
<p class="sectiontitle"> Shampoo </p>
<ul class="products">
	<?php
  $args = array (
     'post_type' => 'product', 'order'     => 'DESC', 'orderby' => 'date', 'posts_per_page' =>  120,
     'tax_query' => array(
       array(
        'taxonomy' => 'type',
        'field'    => 'slug',
        'terms'    => 'shampoo',
       ),
      )
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

</div> <!-- hair need wrapper - shampoo -->
<div class="hairneeds-wrapper conditionerlist">
<p class="sectiontitle"> Conditioner</p>
<ul class="products">
	<?php
  $args = array (
     'post_type' => 'product', 'order'     => 'DESC', 'orderby' => 'date', 'posts_per_page' =>  120,
     'tax_query' => array(
       array(
        'taxonomy' => 'type',
        'field'    => 'slug',
        'terms'    => 'conditioner',
       ),
      )
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

</div><!-- hair needs wrapper conditioner -->

</div>
</div>

<?php get_footer(); ?>
