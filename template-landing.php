<?php 
/*
  Template Name: Landing Page
*/
get_header( 'landing' ); ?>
  <div class="sixteen columns landing-page">
    <?php
    if (have_posts()) :
       while (have_posts()) : the_post();
         get_template_part( 'loop', 'single' );
       endwhile;
    endif;
    ?>
  </div>
<?php get_footer(); ?>