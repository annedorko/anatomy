<?php 
// dictionary.php Anatomy Theme by Anne Dorko

if ( function_exists( 'dictionary_icon_styles' ) === false ) {
  // Create icon styles for menu and dictionary admin pages
  
  add_action('admin_head','dictionary_icon_styles');
  function dictionary_icon_styles() {
    global $post_type;
    if (!empty($_GET['post_type']) and $_GET['post_type'] == 'dictionary') {
      $current = true;
    }
    ?>
    <style type="text/css" media="screen">
    #adminmenu #menu-posts-dictionary.menu-icon-post div.wp-menu-image {
      background: url(<?php echo get_template_directory() . '/wp-dictionary/images/menu-icon.png'; ?>) 4px -32px no-repeat;
    }
    #adminmenu #menu-posts-dictionary.menu-icon-post:hover div.wp-menu-image, #adminmenu #menu-posts-dictionary.menu-icon-post.wp-has-current-submenu div.wp-menu-image {
        background: url(<?php echo get_template_directory() . '/wp-dictionary/images/menu-icon.png'; ?>) 4px 0px no-repeat;
      }
      #icon-edit.icon32-posts-dictionary {
        background: url(<?php echo get_template_directory() . '/wp-dictionary/images/page-icon.png'; ?>);
      }
    </style>
    <?php
  }
}