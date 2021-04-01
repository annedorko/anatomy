<?php $options = anatomy_options(); ?>
<article <?php post_class( 'single_entry' ); ?>>
  <h2 class="the_title"><?php the_title(); ?></h2>
  <?php the_content(); ?>
</article>