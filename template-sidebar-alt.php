<?php 
/*
  Template Name: Sidebar on Left
*/
get_header(); ?>
  <div class="four columns">
    <?php get_sidebar(); ?>
  </div>
  <div class="twelve columns">
    <?php
    if (have_posts()) :
       while (have_posts()) : the_post();
         get_template_part( 'loop', 'single' );
       endwhile;
    endif;
    ?>
  </div>
<?php get_footer(); ?>