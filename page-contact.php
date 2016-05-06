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
  		<h1 class="page-title"><?php the_title(); ?></h1>
    <?php the_content(); ?>
<?php
 endwhile;
 endif;
?>
<?php get_footer(); ?>

    <form class="awesome-form">
  
  <div class="input-group">
    <input type="text">
    <label>Your Full Name</label>
  </div>
  
  <div class="input-group">
    <input type="email">
    <label>Your Email Address</label>
  </div>
  
  <input type="submit">
</form>