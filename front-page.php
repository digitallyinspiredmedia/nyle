<?php

get_header(); ?>

<div id="content" class="col-full">
<div id="main" class="col-left">

<div class="carousel slide" data-ride="carousel" id="homeslider">
	<div class="carousel-inner">
		<?php
		$the_query = new WP_Query(array(
		'post_type' => 'home_slider',
		'order' => 'ASC',
		'posts_per_page' => 1
		));
		while ( $the_query->have_posts() ) :
		$the_query->the_post();
		?>
		<div class="item active"><?php 
			echo '<div class="entry-content">';
				echo '<div class="">';
					echo '<img src="'.get_the_post_thumbnail_url($post_id, 'full').'" />';
				echo '</div>';
			echo '</div>'; ?>
		</div><!-- item active -->
		<?php
			endwhile;
			wp_reset_postdata();
		?> <!-- single active slider --> 
		<?php
			$the_query = new WP_Query(array(
			'post_type' => 'home_slider',
			'order' => 'ASC',
			'posts_per_page' => 2,
			'offset' => 1
			));
			while ( $the_query->have_posts() ) :
				$the_query->the_post();
		?>
		<div class="item"><?php
			echo '<div class="entry-content">';
				echo '<div class="">';
					echo '<img src="'.get_the_post_thumbnail_url($post_id, 'full').'" />';
				echo '</div>';
			echo '</div>'; ?>
		</div><!-- item -->
		<?php
			endwhile;
			wp_reset_postdata();
		?>
	</div><!-- carousel-inner -->



<!-- Carousel Buttons Next/Prev -->

    <a class="left carousel-control" href="#homeslider" role="button" data-slide="prev">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/left-arrow.png" />
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#homeslider" role="button" data-slide="next">
    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/image/right-arrow.png" />
    <span class="sr-only">Next</span>
      
    </a>
</div>
    
    </div>
    </div>
<?php get_footer(); ?>
