<?php
/* front-page.php Displays The Front Page */
get_header();
$options = anatomy_options(); ?>

<?php
  // Lets show some custom content!
  $order = anatomy_options( 'homepage_order', array( 'headline', 'columns', 'content' ) );
  foreach ( $order as $option ) {
    switch ( $option ) {
      case 'headline' :
        ?>
        <!-- BEGIN HOMEPAGE MESSAGE -->
        <?php if ( !is_paged() ) : ?>
          <?php $message   = isset( $options['homepage']['message'] ) ? $options['homepage']['message'] : '';
          if ( !empty( $message ) ) : ?>
          <div class="front-page-headline sixteen columns">
            <h1><?php echo $message; ?></h1>
          </div>
        <!-- END HOMEPAGE MESSAGE -->
          <?php endif; ?>
        <?php endif; ?>
        <?php
        break;
      case 'columns' :
        ?>
        <!-- BEGIN HOMEPAGE COLUMNS -->
        <?php if ( !is_paged() ) : ?>
          <div class="front-page-columns">
            <?php dynamic_sidebar( 'front-page-columns' ); ?>
          </div>
        <?php endif; ?>
        <!-- END HOMEPAGE COLUMNS -->
        <?php
        break;
      case 'content' :
        ?>
        <!-- BEGIN HOMEPAGE CONTENT -->
        <?php $front_width = is_page_template ( 'template-full.php' ) ? 'sixteen' : 'twelve';
        $side_width = is_page_template ( 'template-full.php' ) ? false : true; ?>
        <div class="<?php echo $front_width; ?> columns">
          <?php
            /* Customize the type of posts displayed using options. */
            $homepage = anatomy_options( 'homepage' );
            if ( isset( $homepage['post_type'] ) && $homepage['post_type'] != 'post' ) :
              // Alternate post_type here
              $post_types = get_posts( array(
                'post_type' => $homepage['post_type']
              ) );
              foreach ( $post_types as $post ) : setup_postdata( $post );
                get_template_part( 'loop', 'posts' );
              endforeach; 
           else :
           if (have_posts()) :
             while (have_posts()) : the_post();
             $display = get_option('show_on_front');
             // This is the loop...
              if ( $display == 'posts' ) {
                $format = get_post_format() ? get_post_format() . '_excerpt' : 'posts';
                get_template_part( 'loop', $format );
              } elseif ( $display == 'page' ) {
                $format = get_post_format() ? get_post_format() : 'single';
                get_template_part( 'loop', $format );
              }
             // End the loop.
             endwhile;
          endif; ?>
          <div class="nine columns offset-by-three">
            <?php anatomy_pagination(); ?>
          </div>
          <?php endif; // Ending alternate home page post_type ?>
        </div>
        <?php if ( $side_width ) { ?>
        <div class="four columns">
          <ul>
            <?php if ( !is_paged() ) : ?>
              <?php dynamic_sidebar( 'front-page-sidebar' ); ?>
            <?php else : ?>
              <?php dynamic_sidebar( 'normal-sidebar' ); ?>
            <?php endif; ?>
          </ul>
        </div>
        <?php } ?>
        <!-- END HOMEPAGE CONTENT -->
        <?php
        break;
    }
  }
?>

<?php get_footer(); ?>