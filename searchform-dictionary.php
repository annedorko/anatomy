<div id="dictionary_search" class="search_box">
  <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <label class="screen-reader-text" for="s">Search for:</label>
    <input type="text" name="s" id="s" placeholder="Enter search terms" value="<?php echo get_search_query(); ?>" />
    <?php
    if ( function_exists( 'wpd_theme_options' ) ) :
    $restrict_to_dictionary = anatomy_options( 'search_only_entries' );
    if ( $restrict_to_dictionary ) { ?>
      <input type="hidden" name="post_type" value="dictionary" id="post_type" />
    <?php }
    endif;  ?>
    <button type="submit" id="searchsubmit" class="button black"><i class="icon-search"></i> Search</button>
  </form>
</div>