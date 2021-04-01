<?php get_header(); ?>
	<div class="twelve columns">
	  <?php
    if (have_posts()) :
       while (have_posts()) : the_post();
         // $format = get_post_format() ? get_post_format() : 'single';
         $format = 'single';
         if ( is_home() ) {
           $format = 'posts';
         }
         get_template_part( 'loop', $format );
       endwhile;
    endif;
    ?>
    <div class="nine columns offset-by-three">
      <?php anatomy_pagination(); ?>
    </div>
	</div>
	<div class="four columns">
	  <?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>