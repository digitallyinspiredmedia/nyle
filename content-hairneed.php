<?php
/**
 * The template used for displaying page content
 *
 * @package Base
 * @subpackage Base Rillusion
 * @since  Base v1.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="banner">
    <?php
		// Post thumbnail.
		the_post_thumbnail( 'category-thumb', array('class' => 'img-responsive') );
	?>
</div>
	<div class="entry-content" id="content-bgimage" style="background-image: url('<?php if (class_exists('MultiPostThumbnails')) : echo MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'productingredient-image',NULL, 'full'); endif; ?> ') !important ; ">
  <div class="productimage-relate">
        <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'product-image', NULL,  'product-featured-thumbnail'); endif; ?>
</div>
    <div class="hairneed-content">
		<?php the_content();

        $productid="_related_prodcut_value_key";
$var = do_shortcode( '[product_url id="'. get_post_meta($post->ID,$productid , true) .'"]' );
        echo $var;

        ?>
        </div>


	</div><!-- .entry-content -->

	

</article><!-- #post-## -->
