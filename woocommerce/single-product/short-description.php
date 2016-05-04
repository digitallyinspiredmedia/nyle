<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

if ( ! $post->post_excerpt ) {
	return;
}

?>
<div itemprop="description">
	<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
</div>

<hr>
Content page 
<?php the_content(); ?>
<hr>
category of the product 
<?php
 
$terms = get_the_terms( $post->ID, 'product_cat' );
foreach ( $terms as $term ){
  $category_name = $term->name;
  $category_thumbnail = get_woocommerce_term_meta($term->term_id, 'thumbnail_id', true);
  $image = wp_get_attachment_url($category_thumbnail);
  
  echo '<a href="'. get_term_link($term, $terms) .'"><img class="absolute category-image" src="'.$image.'"></a>';
}

 ?>
<hr>
product image
<?php

if ( has_post_thumbnail() ) {
			$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
			$image         = get_the_post_thumbnail( $post->ID, array(200,200) );
     
    echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
echo '<br>';
 $thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail',$image ); 
echo $thumbnail; 


	?>