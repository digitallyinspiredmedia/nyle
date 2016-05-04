<?php
/*
 *  Template Name: Hair Needs
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

<?php
  // WP_Query arguments
  $args = array ( 'post_type' => 'hairneeds', );
  // The Query
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
<div class="hairneeds-wrapper">
   <?php
    global $post;
    $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), false, '' );
  ?>
  <div class="hairneedcover" style="background-image: url(<?php echo $src[0]; ?> ) !important;background-size: cover;background-position: center; background-repeat: no-repeat;">
    <a href="<?php the_permalink(); ?>">
     <div class="cont">
       <div class="content">
           
        <?php echo '<span class="titlewrapper"><h4>' . get_the_title() . '</h4></span>'; ?>
     </div>
    </div>
    </a>
   </div>
</div>
<?php
}
} else {
  // no posts found

}
// Restore original Post Data
wp_reset_postdata();
?>
</div>
</div>

<?php get_footer(); ?>