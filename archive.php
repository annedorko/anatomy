<?php get_header(); ?>
	<div class="twelve columns">
	  <?php /* If this is a category archive */ if (is_category()) { ?>
    <h2 class="archive_title"><div class="browse_text">Posts in</div> <?php single_cat_title(); ?></h2>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
    <h2 class="archive_title"><div class="browse_text">Posts tagged</div> <?php single_tag_title(); ?></h2>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2 class="archive_title"><div class="browse_text">Archive for</div> <?php the_time('F jS, Y'); ?></h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
    <h2 class="archive_title"><div class="browse_text">Archive for</div> <?php the_time('F, Y'); ?></h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2 class="archive_title"><div class="browse_text">Archive for</div> <?php the_time('Y'); ?></h2>
    <?php } ?>
    <?php if ( is_author() ) { 
      $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 
      ?>
      <h2 class="archive_title"><div class="browse_text">Posts written by</div> <?php the_author_meta( 'display_name', $curauth->ID ); ?></h2>
    <?php } ?>
	  <?php
	  $options = anatomy_options();
	  $author_bio = isset( $options['display']['author_bio'] ) ? $options['display']['author_bio'] : false;
	  if ( is_author() AND $author_bio ) : 
	    ?>
	    <article class="archive author_bio">
	      <h3>About the author:</h3>
          <div class="alpha two columns">
            <div class="author_image"><?php echo get_avatar( get_the_author_meta( 'user_email', $curauth->ID ), 70 ); ?></div>
          </div>
          <div class="omega ten columns">
            <div class="website"><a href="<?php the_author_meta( 'user_url' ); ?>" class="button">Visit my website.</a></div>
            <h4 class="author_name"><?php the_author_meta( 'display_name', $curauth->ID ); ?></h4>
            <p class="author_description"><?php the_author_meta( 'description', $curauth->ID ); ?></p>
          </div>
	    </article>
    <?php endif;
    if (have_posts()) :
       while (have_posts()) : the_post();
         get_template_part( 'loop', 'posts' );
       endwhile;
    endif;
    ?>
    <div class="nine columns offset-by-three">
      <?php anatomy_pagination(); ?>
    </div>
	</div>
	<div class="four columns">
	  <?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>