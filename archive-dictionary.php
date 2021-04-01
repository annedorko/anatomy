<?php get_header(); ?>
	<div class="twelve columns">
	  <?php
	  $display = anatomy_options( 'archive_content_display', 'title_only' );
    if (have_posts()) :
       while (have_posts()) : the_post();
         if ( $display == 'title_only') {
           get_template_part( 'loop', 'titles' );
         } elseif ( $display == 'whole_entry' ) {
           get_template_part( 'loop', 'dictionary' );
         }
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