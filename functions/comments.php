<?php
function anatomy_comment_count( $button = true ) {
  $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

  if ( comments_open() ) {
  	if ( $num_comments == 0 ) {
  	  $comment_icon = 'comment-alt';
  		$comments = __('No&nbsp;Comments');
  	} elseif ( $num_comments > 1 ) {
  	  $comment_icon = 'comments';
  		$comments = $num_comments . __('&nbsp;Comments');
  	} else {
  	  $comment_icon = 'comment';
  		$comments = __('1&nbsp;Comment');
  	}
  	if ( $button ) {
  	  $write_comments = '<a href="' . get_comments_link() .'" class="button comments"><i class="icon-'.$comment_icon.'"></i>&nbsp;'. $comments.'</a>';
  	} else {
  	  $write_comments = '<i class="icon-'.$comment_icon.'"></i>&nbsp;<a href="' . get_comments_link() .'" class="comments">'. $comments.'</a>';
  	}
  } else {
  	$write_comments =  __('');
  }
  echo $write_comments;
}

function anatomy_gravatar($rating = false, $size = false, $default = false, $border = false) {
	global $comment;
	$out = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($comment->comment_author_email);
	if($rating && $rating != '')
		$out .= "&amp;rating=".$rating;
	if($size && $size != '')
		$out .="&amp;size=".$size;
	if($default && $default != '')
		$out .= "&amp;default=".urlencode($default);
	if($border && $border != '')
		$out .= "&amp;border=".$border;
	echo $out;
}

function anatomy_bubble_comments( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  extract( $args, EXTR_SKIP ); ?>
  <li <?php comment_class(); ?>>
    <article id="comment-<?php comment_ID(); ?>">
      <div class="gravatar" style="background: url(<?php echo anatomy_gravatar(false,100); ?>) no-repeat;"></div>
      <header class="vcard">
        <div class="author">
          <cite>
            <?php
              global $post;
              $author_class = 'the_author';
              $author = get_the_author_meta( 'ID' );
              if ( $author == $comment->user_id ) {
                $author_class .= ' highlight';
              }
            ?>
            <span class="<?php echo $author_class; ?>"><?php echo comment_author(); ?></span>
            <span class="website"><i class="icon-link"></i><?php comment_author_url_link('Website'); ?></span>
          </cite>
        </div>
        <time datetime="<?php echo comment_date('c'); ?>" class"time"><i class="icon-time"></i> <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)); ?>"><?php printf(__('%1$s', 'roots'), get_comment_date(),  get_comment_time()); ?></a></time>
      </header>
      <div class="bubble">
        <section class="comment">
          <?php if ($comment->comment_approved == '0') { ?>
            <div class="alert alert-block fade in">
              <a class="close" data-dismiss="alert">&times;</a>
              <p><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
            </div>
          <?php } ?>
          <?php comment_text() ?>
          <?php edit_comment_link(__('<i class="icon-wrench"></i>'), '', ''); ?>
          <?php echo get_comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="icon-comments-alt"></i> Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </section>
      </div>

    </article>
<?php }

function anatomy_comment_pings( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  extract( $args, EXTR_SKIP ); ?>
  <li <?php comment_class(); ?>>
    <span class="author">"<?php echo comment_author(); ?>"</span> sent a <?php echo $comment->comment_type; ?>.
    <span class="link"><?php comment_author_url_link('View it here.'); ?></span>
<?php }