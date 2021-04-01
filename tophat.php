<?php
$sitename  = anatomy_options( 'display[sitename]', true );
$tophat = anatomy_options( 'display[tophat]', true );
if ( $tophat ) : ?>
<div id="tophat">
 <div class="container">
   <div class="sixteen columns">
     <?php 
     $search = anatomy_options( 'display', array( 'top_search' => true ) );
     // If set, use value. If not set, the options empty will mean it's default at true. If options full it means search display is false.
     $top_search = isset( $search['top_search'] ) ? $search['top_search'] : ( !empty( $search ) ? false : true ); ?>
     <div class="<?php echo ( $top_search ? 'twelve' : 'sixteen' ); ?> columns alpha">
       <?php
       $nav = array(
         'theme_location' => 'tophat',
         'fallback_cb'    => 'anatomy_default_menu'
       );
       if ( $sitename ) {
         $nav['items_wrap'] = '<ul id="%1$s" class="%2$s"><li class="title"><a href="' . get_bloginfo('url') . '" title="' . get_bloginfo('name') . '"><i class="icon-home"></i> ' . get_bloginfo('name') . '</li>%3$s</ul>';
       }
       wp_nav_menu( $nav ); ?>
     </div>
     <?php if ( $top_search ) : ?>
     <div class="four columns omega">
       <?php get_search_form(); ?>
     </div>
     <?php endif; ?>
   </div>
 </div>
</div>
<?php endif; ?>