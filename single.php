<?php get_header(); ?>
  <div class="twelve columns">
    <?php
    $options = anatomy_options();
    if (have_posts()) :
       while (have_posts()) : the_post();
        
         $format = get_post_format() ? get_post_format() : 'single';
         get_template_part( 'loop', $format );
         
       endwhile;
       comments_template();
    endif;
    ?>
  </div>
  <div class="four columns">
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>