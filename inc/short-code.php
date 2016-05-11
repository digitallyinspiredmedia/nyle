<?php

//short  code
function productlink( $atts, $content = null ) {
   return '<div class="product-buy"><a class="btn-6" target="_blank" href="'.do_shortcode($content).'"> Buy Now <span> </span> </a></div>';
}
add_shortcode('productlink', 'productlink');


function productdesc( $atts, $content = null ) {
   return '<div class="hairarticle-des">'.do_shortcode($content).'</div>';
}
add_shortcode('productdesc', 'productdesc');


function producttitle( $atts, $content = null ) {
   return '<p class="hairarticle-producttitle">'.do_shortcode($content).'</p>';
}
add_shortcode('producttitle', 'producttitle');

?>
