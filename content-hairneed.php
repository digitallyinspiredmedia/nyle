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
	<header class="entry-header">
		<?php  the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content" id="content-bgimage" style="background-image: url('<?php if (class_exists('MultiPostThumbnails')) : echo MultiPostThumbnails::get_post_thumbnail_url(get_post_type(), 'productingredient-image',NULL, 'full'); endif; ?> ') !important ;


">


		<?php the_content();


        ?>
		<?php

if (class_exists('MultiPostThumbnails')) :

MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'product-image', NULL,  'product-featured-thumbnail');

endif;

?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'base' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'base' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	

</article><!-- #post-## -->
