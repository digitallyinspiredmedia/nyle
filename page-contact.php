<?php
/*
 *  Template Name: Conatact
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
        <div class="contactuspage">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
            </div>
<?php
 endwhile;
 endif;
?>

    </div>
</div>
<?php get_footer(); ?>

