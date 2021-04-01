<?php $options = anatomy_options(); ?>
<article <?php post_class( 'partial_entry' ); ?>>
  <?php $thumbnail = anatomy_post_thumbnail(); ?>
  <?php if ( $thumbnail ) {
    $offset = 'omega';  ?>
  <div class="three columns alpha post_thumb">
    <?php echo anatomy_post_thumbnail(); ?>
  </div>
  <?php } else {
    $offset = 'offset-by-three alpha'; 
  } ?>
  <div class="nine columns post_content <?php echo $offset; ?>">
    <div class="post_format quote the_excerpt">
      <?php the_content(); ?>
    </div>
    <div class="meta_data">
      <?php // the_date( 'M dS, Y' ); ?> <?php // the_author(); ?>
      <?php anatomy_comment_count(); ?>
      <a href="<?php the_permalink(); ?>" class="button continue">Keep reading</a>
    </div>
  </div>
</article>