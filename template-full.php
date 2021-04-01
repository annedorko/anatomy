<?php 
/*
  Template Name: Full Width
*/
get_header(); ?>
  <div class="sixteen columns">
    <?php
    if (have_posts()) :
       while (have_posts()) : the_post();
         get_template_part( 'loop', 'single' );
       endwhile;
    endif;
    ?>
  </div>
<?php get_footer(); ?>