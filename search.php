<?php get_header(); ?>
	<div class="twelve columns">
	  <h2 class="archive_title"><span class="browse_text">Search results for</span> &ldquo;<?php the_search_query(); ?>&rdquo;</h2>
	  <?php
    if ( have_posts() ) :
       while (have_posts()) : the_post();
         get_template_part( 'loop', 'posts' );
       endwhile;
    else : ?>
      <p>It looks like no posts were found for the search term <strong>&ldquo;<?php the_search_query(); ?>&rdquo;</strong></p>
      <h3>Tips for better search results:</h3>
      <ul class="callout">
        <li>Double-check your spelling. <em>(Those typos are killer.)</em></li>
        <li>Try several similar search terms. <em>(e.g. "panda", "pandas", "adorable bears")</em></li>
        <li>When in doubt, <strike>scream and shout</strike> browse the site manually.</li>
        <li>If you still can't find what you're looking for, contact the administrator of the site.</li>
      </ul>
    <?php endif; ?>
    <div class="nine columns offset-by-three">
      <?php anatomy_pagination(); ?>
    </div>
	</div>
	<div class="four columns">
	  <?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>