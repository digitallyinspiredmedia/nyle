<?php
/*
 *  Template Name: Ingrediant
 *
 * @package Base
 * @subpackage Base Rillusion
 * @since  Base v1.0
 */
get_header(); ?>

<!-- Portfolio -->

<div class="container">

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <h1 class="page-title"><?php the_title(); ?></h1>
<!-- ingrediant -->
           <?php
             $taxonomyName = "product_cat";
//This gets top layer terms only.  This is done by setting parent to 0.  
    $parent_terms = get_terms($taxonomyName, array('parent' => 0, 'order' => 'ASC', 'orderby' => 'id', 'hide_empty' => false));

    echo '<ul class="ingredient-cover">';
    foreach ($parent_terms as $pterm) {

       $thumbnail_id = get_woocommerce_term_meta( $pterm->term_id, 'thumbnail_id', true );

// get the image URL
$image = wp_get_attachment_url( $thumbnail_id );
//color code
        $thumb_src = get_term_meta($pterm->term_id, 'ingredient-code', true);
if($thumb_src != '') :

        // print the IMG HTML for parent category
      // echo "<div src='$image' alt='' width='400' height='400' />";

        //show parent categories ?>
        <li class="ingredient-list" style="background-image:url( <?php echo $image; ?>); ">
            <div class="ingredient-listwrapper">

<?php
        echo '<span class="colorbar" style="background-color:'.$thumb_src.'"></span>';
        echo '<a href="' . get_term_link($pterm->name, $taxonomyName) . '"><div class="ingredientcontent-cover"><h2 class="ingredient-name">' . $pterm->name . '</h2>';
         echo '<p>'. $pterm->description . '</p>';
echo '</div>';

endif;



echo '  </div></a></li>';

        }
        


    echo '</ul>';
           ?>
<!-- ingrediant -->
           
           <!--/.products-->

 <?php
  endwhile;
  endif;
 ?>

<?php get_footer(); ?>
