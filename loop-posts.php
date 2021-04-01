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
    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <div class="the_excerpt">
      <?php $post_meta = anatomy_options( 'display[meta_data]', true );
      if ( $post_meta == true ) : ?>
        <p class="tags"><i class="icon-time"></i> <strong><?php the_date('M dS, Y'); ?></strong></p>
        <?php if ( get_the_category() ) : ?>
        <p class="tags"><i class="icon-bookmark" title="Categories for <?php the_title(); ?>"></i> <?php the_category(' '); ?> </p>
        <?php endif; ?>
        <?php if ( get_the_tags() ) : ?>
        <p class="tags"><i class="icon-tags" title="Tags for <?php the_title(); ?>"></i> <?php the_tags('', ' ', ''); ?> </p>
        <?php endif; ?>
      <?php endif; ?>
      <?php the_excerpt(); ?>
    </div>
    <div class="meta_data">
      <?php // the_date( 'M dS, Y' ); ?> <?php // the_author(); ?>
      <?php anatomy_comment_count(); ?>
      <a href="<?php the_permalink(); ?>" class="button continue">Keep reading</a>
    </div>
  </div>
</article>