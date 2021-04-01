<?php get_header(); ?>
  <div class="sixteen columns">
    <div class="alpha eleven columns">
      <?php
      $display_all = anatomy_options( 'display_all_entries_in_section', false );
      
      $term = $wp_query->queried_object;
      // Customize in case people want to display EVERYTHING on one page
      if ( $display_all === true || $display_all == 'true' ) {
        $posts = query_posts( $query_string . '&posts_per_page=-1' );
        // Calculate 2 columns
        $num_posts = count( $posts );
        if ( $num_posts >= 2 ) {
          $do_columns = true;
          if ( $num_posts&1 ) {
            // Odd
            $col_1  = ( $num_posts - 1 ) / 2 + 1;
            $col_2  = $col_1 - 1;
          } else {
            // Even
            $col_1  = $num_posts / 2;
            $col_2  = $col_1;
          }
        }
      }
      ?><h2 class="archive_title"><div class="browse_text">Browse Our Dictionary</div>Type: <?php echo $term->name; ?></h2>
      <?php
      if ( have_posts() ) :
        $display = anatomy_options( 'archive_content_display', 'title_only' );
           if ( $display == 'title_only') {
             // Do even columns, only if we're dealing with titles
             if ( isset( $do_columns ) ) {
               $col_1_posts = new WP_Query( $query_string . '&posts_per_page=' . $col_1 );
               echo '<div class="alpha five columns">';
               while ( $col_1_posts->have_posts() ) : $col_1_posts->the_post();
                  get_template_part( 'loop', 'titles' );
               endwhile;
               echo '</div>
               <div class="omega six columns">';
               $col_2_posts = new WP_Query( $query_string . '&posts_per_page=' . $col_2 . '&offset=' . $col_1 );
                while ( $col_2_posts->have_posts() ) : $col_2_posts->the_post();
                   get_template_part( 'loop', 'titles' );
                endwhile;
                echo '</div>';
             } else {
               // Go through all the posts without dealing with columns
               while ( have_posts() ) : the_post();
                 get_template_part( 'loop', 'titles' );
               endwhile;
               
             }
           } elseif ( $display == 'whole_entry' ) {
             // Go through all the posts
             while ( have_posts() ) : the_post();
                get_template_part( 'loop', 'entry' );
             endwhile;  
           }
           if ( $display_all === false || $display_all == 'false' ) {
             // Don't bother with pagination unless we might need it
             anatomy_pagination();
           }
            ?>
         <?php
      else : ?>
      <h2 style="font-style:italic;">No entries were found under <?php echo $term->name; ?>.</h2>
        <p>Please try another type or use the search tool above.</p>
      <?php endif; ?>
    </div>
    <div class="omega five columns">
      <?php 
      global $wp_string;
      query_posts( $wp_string . '&post_type=post' );
      get_sidebar(); ?>
    </div>
  </div>  
<?php get_footer(); ?>