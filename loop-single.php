<article <?php post_class( 'single_entry' ); ?>>
  <?php $format = is_page_template ( 'template-landing.php' ) ? 'landing' : 'single'; ?>
  <h2 class="the_title <?php echo $format; ?>"><?php the_title(); ?></h2>
  <!-- TODO: Detect meta settings. -->
  <?php 
  $post_meta = anatomy_options( 'display[meta_data]', true );
  if ( is_single() AND $post_meta == true ) : ?>
  <div class="post_meta"><p><span>By <?php the_author_posts_link(); ?></span> <span><i class="icon-time"></i> <?php the_date('M dS, Y'); ?></span> <span><?php anatomy_comment_count( false ); ?></span></p></div>
  <?php endif; ?>
  <?php the_content(); ?>
  <?php get_template_part( 'sidebar', 'promotion' ); ?>
  <?php 
  $author_bio = anatomy_options( 'display[author_bio]', true );
  if ( is_single() AND $author_bio == true ) : ?>
    <div class="vcard author_bio" itemscope itemtype="http://schema.org/Person">
      <div class="alpha two columns">
        <div class="photo author_image" itemprop="image"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?></div>
      </div>
      <div class="omega ten columns">
        <div class="website"><a href="<?php the_author_meta( 'user_url' ); ?>" class="url button" itemprop="url">Website</a></div>
        <h4 class="fn author_name" itemprop="name"><?php the_author_meta( 'display_name' ); ?></h4>
        <?php if ( get_the_author_meta( 'display_name' ) == 'Anne Dorko' ) { ?>
          <p><span class="title" itemprop="jobTitle">Captain</span> of <span class="org">Without Boxes</span></p>
        <?php } ?>
        <p class="author_description"><?php the_author_meta( 'description' ); ?></p>
      </div>
    </div>
  <?php endif; ?>
</article>