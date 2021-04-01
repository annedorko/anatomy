<a name="comments"></a>
<?php if (have_comments()) { ?>
  
  <section id="comments">
    
    <h2 class="clean"><?php printf(_n('1 Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'roots'), number_format_i18n(get_comments_number()), get_the_title()); ?></h2>
    
    <?php 
    $intro = anatomy_options( 'comments_intro' );
    if ( !empty( $intro ) ) { ?>
    <div class="comments-intro">
      <?php echo apply_filters( 'the_content', anatomy_options( 'comments_intro' ) ); ?>
    </div>
    <?php } ?>
    
    <ol class="commentlist">
      <?php wp_list_comments( array( 'callback' => 'anatomy_bubble_comments', 'type' => 'comment' ) ); ?>
    </ol>
    
    <ol class="pings">
      <?php wp_list_comments( array( 'callback' => 'anatomy_comment_pings', 'type' => 'pings' ) ); ?>
    </ol>
    
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) { // are there comments to navigate through ?>
      <nav id="comments-nav" class="pager">
        <div class="previous"><?php previous_comments_link(__('&larr; Older comments', 'roots')); ?></div>
        <div class="next"><?php next_comments_link(__('Newer comments &rarr;', 'roots')); ?></div>
      </nav>

    <?php } // check for comment navigation ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) { ?>
      <div class="alert alert-block fade in">
        <a class="close" data-dismiss="alert">&times;</a>
        <p><?php _e( 'Comments are closed.' ); ?></p>
      </div>
    <?php } ?>
  </section><!-- /#comments -->
<?php } else {
  $intro = anatomy_options( 'comments_intro' );
  if ( !empty( $intro ) ) { ?>
  <div class="comments-intro">
    <?php echo apply_filters( 'the_content', anatomy_options( 'comments_intro' ) ); ?>
  </div>
  <?php }
} ?>

<?php comment_form(); ?>