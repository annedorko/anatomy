<form role="search" method="get" class="searchform">
  <label class="screen-reader-text" for="s">Search for:</label>
  <?php
  if ( function_exists( 'wpd_theme_options' ) ) :
  $restrict_to_dictionary = anatomy_options( 'search_only_entries' );
  if ( $restrict_to_dictionary ) { ?>
    <input type="hidden" name="post_type" value="dictionary" id="post_type" />
  <?php }
  endif;  ?>
  <input type="text" value="" name="s" class="s" placeholder="Search" />
  <button type="submit" class="searchsubmit"><i class="icon-search"></i></button>
</form>