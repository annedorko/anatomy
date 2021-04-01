<?php get_header(); ?>
  <div class="twelve columns">
    <?php
    if (have_posts()) :
       while (have_posts()) : the_post();
         get_template_part( 'loop', 'single' );
       endwhile;
       // Include comments if enabled
       if ( $post->comment_status == 'open' ) :
         comments_template();
       endif; 
    endif;
    ?>
  </div>
  <div class="four columns">
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>