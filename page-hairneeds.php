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
   <div class="pagebanner" style="background-image: url('<?php echo get_the_post_thumbnail_url($post_id, 'full'); ?> ');" ></div>
    <h1 class="page-title"><?php the_title(); ?></h1>
<?php
 endwhile;
 endif;
?>
<div class="hairneeds-wrapper">

<ul class="hairneedcover">
<?php
  // WP_Query arguments
  $args = array ( 'post_type' => 'hairneeds',  'order' => 'ASC', 'orderby' => 'menu_order' );
  // The Query
  $query = new  WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>

      <li class="hairneedlist">
    <a href="<?php the_permalink(); ?>">
<?php
                $productid="_brand_color_value_key";

echo '<div class="titlebox" style="background-color:'. get_post_meta($post->ID,$productid , true).'">';

        echo '<span class="titlewrapper">' . get_the_title() . '</span>';
echo '</div>';
echo '<div class="imagebox">';

           if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'hairneedmini-image', NULL,  'hairneedmini-featured-thumbnail'); endif;
echo '</div>'; ?>
    </a>
          </li>

<?php
}
} else {
  // no posts found

}

// Restore original Post Data
wp_reset_postdata();
?>
     </ul>
 <div class="harineedform">
    <?php echo do_shortcode('[contact-form-7 id="281" title="Hair Needs Form"]'); ?>
    </div>
</div>

</div>
</div>

<?php get_footer(); ?>
