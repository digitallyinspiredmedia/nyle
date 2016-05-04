--meta name-author : user name in php
--meta name-contact: user email in php
  from https://codex.wordpress.org/Function_Reference/get_userdata

Social Share
  Open Graph
  Facebook
  Twitter
  Google +

--load all script at bottom
--add async for all script
--remove version from all style and script
--remove emojicons



<!-- custom post for team -->
<?php
  // WP_Query arguments
  $args = array (
    'post_type' => 'productpage',
  );

  // The Query
  $query = new WP_Query( $args );

  // The Loop
  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();
?>
    <div class="col-f-3">
    <div class="portfolio-wrapper">
    <a href="<?php the_permalink(); ?>">

      <div class="three-box-body">
        <div class="portfolio-company">
            <ul>
            <?php
            $catimage = get_the_terms($post->ID, 'productpage' );
              if ($catimage && ! is_wp_error($catimage)) :
                $term_slugs_arr = array();
                foreach ($catimage as $catimage) {

              ?>
            <li>
            <?php echo $catimage->name; ?>
            <img src="<?php echo z_taxonomy_image_url($catimage->term_id, 'thumbnail'); ?>" />
            </li>
            <?php
              }endif; ?>
            </ul>
        </div>
    </div>
    </a>
    </div>
    </div>

  <!-- four-box 1 end -->


<?php
}
} else {
  // no posts found
  echo "<h1>boom no content team page </h1>";
}

// Restore original Post Data
wp_reset_postdata();
?>
</div>


<?php
//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

$taxonomy     = 'productpage';
$orderby      = 'name';
$show_count   = 1;      // 1 for yes, 0 for no
$pad_counts   = 1;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = 'FDFS';
$empty        = 0;

$args = array(
  'taxonomy'     => $taxonomy,
  'orderby'      => $orderby,
  'show_count'   => $show_count,
  'pad_counts'   => $pad_counts,
  'hierarchical' => $hierarchical,
  'title_li'     => $title,
  'hide_empty'   => $empty
);
?>

<ul>
<?php wp_list_categories( $args ); ?>

</ul>
