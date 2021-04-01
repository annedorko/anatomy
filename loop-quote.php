<?php $options = anatomy_options(); ?>
<article <?php post_class( 'single_entry' ); ?>>
  <div class="post_format quote">
    <?php the_content(); ?>
  </div>
  <?php 
  $author_bio = isset( $options['display']['author_bio'] ) ? $options['display']['author_bio'] : false;
  if ( is_single() AND $author_bio == true ) : ?>
    <div class="author_bio">
      <div class="alpha two columns">
        <div class="author_image"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?></div>
      </div>
      <div class="omega ten columns">
        <div class="website"><a href="<?php the_author_meta( 'user_url' ); ?>" class="button">Visit my website.</a></div>
        <h4 class="author_name"><?php the_author_meta( 'display_name' ); ?></h4>
        <p class="author_description"><?php the_author_meta( 'description' ); ?></p>
      </div>
    </div>
  <?php endif; ?>
</article>