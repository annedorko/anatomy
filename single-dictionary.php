<?php get_header(); ?>
  <div class="twelve columns">
    <h2 class="archive_title">
      <div class="browse_text">Browse Our Dictionary</div>
      <?php
      $types = get_the_terms( get_the_ID(), 'sections' );
        // Automatically add the current section to the beginning
        $auto = get_term_by( 'name', substr( get_the_title(), 0, 1 ), 'sections' );
        if ( $auto ) {
          $types[] = $auto;
          usort( $types, 'anatomy_sort_array_of_objects' );
        }
        // Create the list:
        $implode = array();
        foreach ( $types as $type ) {
          $implode[] = '<a href="'.get_term_link( $type ).'">' . $type->name . '</a>';
        }
        echo implode( $implode, ', ' );
        ?>
    </h2>
    <?php
    if (have_posts()) :
       while (have_posts()) : the_post();
         get_template_part( 'loop', 'entry' );
       endwhile;
       $dictionary_settings = get_option( 'wpd_settings' );
       if ( isset( $dictionary_settings['enable_comments'] ) AND $dictionary_settings['enable_comments'] == true ) {
         comments_template();
       }
    endif;
    ?>
  </div>
  <div class="four columns">
    <?php get_sidebar(); ?>
  </div>
<?php get_footer(); ?>