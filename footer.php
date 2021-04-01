		<div class="foot">
		  <div class="widgets sixteen columns">
		    <?php dynamic_sidebar( 'footer-widgets' ); ?>
		  </div>
		  <div class="footer sixteen columns">
		    <?php
  			wp_nav_menu( array(
           'theme_location'   => 'footer',
           'menu_id'          => 'footer_menu',
           'fallback_cb'      => 'anatomy_default_menu'
         ) );
  			?>
        <!-- You can comment out the following line if you do not wish to display it. -->
		    <p class="credits"><a href="http://anatomytheme.com?source=<?php echo urlencode( get_bloginfo('url') ); ?>&amp;page=<?php echo urlencode( $_SERVER['REQUEST_URI'] ); ?>" target="_blank" title="Responsive WordPress theme with Font Awesome">Anatomy Theme</a> by <a href="http://www.annedorko.com" target="_blank">Anne Dorko</a></p>
		  </div>
		</div>
	</div><!-- container -->
  <?php wp_footer(); ?>
  <!-- Icons by Font Awesome http://fortawesome.github.com/Font-Awesome/ -->
</body>
</html>