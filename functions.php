<?php
/* functions.php for Anatomy */

add_theme_support( 'custom-background' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

# ===== THEME MENUS ====== #

register_nav_menus(array(
  'tophat'     => 'Top Hat',
  'regular'   => 'Menu',
  'footer'  => 'Footer'
));

# ===== SIDEBARS ====== #

register_sidebar( array(
  'name'          => __( 'Default Sidebar' ),
  'id'            => 'normal-sidebar',
  'description'   => __( 'Widgets in this area will be shown as the default sidebar.' ),
  'before_title'  => '<h4>',
  'after_title'   => '</h4>'
) );


$homepage_columns = anatomy_options( 'homepage_columns', 3 );
$col_class = 'column';
if ( $homepage_columns == 2 ) {
  $col_class .= 's eight';
} elseif ( $homepage_columns == 3 ) {
  $col_class .= ' one-third';
} elseif ( $homepage_columns == 4 ) {
  $col_class .= 's four';
}

register_sidebar( array(
  'name'          => __( 'Homepage Columns' ),
  'id'            => 'front-page-columns',
  'description'   => __( 'Widgets in this area will be shown in columns of three on the home page.' ),
  'before_title'  => '<h3>',
  'after_title'   => '</h3>',
  'before_widget' => '<div id="%1$s" class="' . $col_class . ' %2$s">',
  'after_widget'  => '</div>'
) );

register_sidebar( array(
  'name'          => __( 'Homepage Sidebar' ),
  'id'            => 'front-page-sidebar',
  'description'   => __( 'Widgets in this area will be shown in the sidebar of the home page.' ),
  'before_title'  => '<h4>',
  'after_title'   => '</h4>'
) );

register_sidebar( array(
  'name'          => __( 'Footer Widgets' ),
  'id'            => 'footer-widgets',
  'description'   => __( 'Widgets in this area will be shown in the footer of every page.' ),
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
  'before_widget' => '<div id="%1$s" class="four columns widget %2$s">',
  'after_widget'  => '</div>'
) );

register_sidebar( array(
  'name'          => __( 'Promotion After Content' ),
  'id'            => 'promotion-widgets',
  'description'   => __( 'You know how most big bloggers have something to promote after their posts? These widgets will be shown above the profile &amp; comments, after the content of every post.' ),
  'before_title'  => '<h4>',
  'after_title'   => '</h4>',
  'before_widget' => '<div id="%1$s" class="six columns widget %2$s">',
  'after_widget'  => '</div>'
) );

# ===== OPTIONS FUNCTIONS ====== #

function anatomy_current_tab( $default = 'engage' ) {
  if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
    return $_GET['tab'];
  } else {
    return $default;
  }
}

function register_anatomy_options_page() {
  add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'theme_options', 'anatomy_options_function' );
}
function anatomy_options_function() {
  $scripts = array(
    'scripts' => array(
      'logo-upload' => array(
        'source'  => get_stylesheet_directory_uri() . '/scripts/logo-upload.js',
        'depends' => array( 'jquery', 'jquery-ui-core', 'jquery-ui-slider', 'jquery-ui-sortable', 'media-upload', 'thickbox' )
      )
    ),
    'styles'  => array(
      'jquery-ui'     => 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css',
      'font-awesome'  => get_stylesheet_directory_uri() . '/stylesheets/font-awesome/font-awesome-admin.css',
      'options-css'   => get_stylesheet_directory_uri() . '/stylesheets/options.css',
      'thickbox'      => null
    )
  );
  // Register and enqueue each script!
  foreach ( $scripts['scripts'] as $name => $args ) {
    if ( !empty( $args['depends'] ) and !empty( $args['source'] ) ) {
      // If there's a depends AND a source...
      wp_register_script( $name, $args['source'], $args['depends'] );
    } else if ( !empty( $args['source'] ) and empty( $args['depends'] ) ) {
      // Only a source, no depends
      wp_register_script( $name, $args['source'] );
    }
    wp_enqueue_script( $name );
  }
  // Register and enqueue each style!
  foreach ( $scripts['styles'] as $name => $source ) {
    if ( $source ) {
      // If there is a source, we are registering a new style
      wp_register_style( $name, $source );
    }
    wp_enqueue_style( $name );
  }  
  require_once( get_template_directory() . '/theme-options.php' );
}
add_action( 'admin_menu', 'register_anatomy_options_page' );

function anatomy_options( $setting = null, $default = null ) {
  $options = get_option( 'anatomy_options' );
  if ( !empty( $setting ) ) {
    // If options have EVER been saved... default better be false.
    if ( !empty($options) and $default == 'true' ) { // Adding $default == true means that we're only overriding the default on boolean values
      $default = false;
    }
    // If array, let's dig deeper
    $bracket = strpos( $setting, '[' );
    if ( $bracket !== false ) {
      // First option...
      $first  = substr( $setting, 0, $bracket );
      // Set the new Options variable to this...
      $options = isset ( $options[ $first ] ) ? $options[ $first ] : null;
      // Get and set the new Settings call to the subsetting
      if ( $options ) {
        $length = (strlen( $first ) + 1);
        $sub    = substr( $setting, $length, -1 );
        $setting = $sub;
      }
    }
    if ( $options ) {
      // Options wasn't null
      $single_option = isset( $options[ $setting ] ) ? $options[ $setting ] : ( !empty( $default ) ? $default : false );
    } else {
      $single_option = $default;
    }
    return $single_option;
  } else {
    return !empty( $options ) ? $options : array() ;
  }
}

function anatomy_background( $single = true, $secondary = false ) {
  $textures = anatomy_options( 'texture_set' );
  if ( $textures == 'sterile' ) {
    return false;
  } else {
    $bg = explode( '|', $textures );
    $inverted = anatomy_options( 'inverted_design', 'default' );
    if ( ( $inverted == 'default' and $secondary == false ) or ( $inverted == 'inverted' and $secondary == true ) ) {
      $which = 'light';
    } else {
      $which = 'dark';
    }
    if ( $single == true ) {
      $part = $which == 'light' ? 1 : 0;
      $base = get_template_directory_uri() . '/images/backgrounds/' . $which . '_' . $bg[$part] . '.png';
      return $base;
    } else {
      foreach ( $bg as $key => $b ) {
        $bg[$key] = get_template_directory_uri() . '/images/backgrounds/' . $which . '_' . $b . '.png';
      }
      return $bg;
    }
  }
}

function anatomy_options_validate( $input ) {
  // die( var_dump( $input ) );
  $options = anatomy_options();
  // Check for false checkboxes ( makes checkboxes work with tabs )
  if ( isset( $input['checkbox'] ) and is_array( $input['checkbox'] ) ) {
    foreach ( $input['checkbox'] as $key => $checkboxes ) {
      if ( is_array( $checkboxes ) ) {
        foreach ( $checkboxes as $key => $ckbx ) {
          if ( !isset( $input[ $key ] ) || $input[ $key ] == false || $input[ $key ] == null ) {
            $input[ $key ] = 'false';
          }
        }
      } else {
        if ( !isset( $input[ $key ] ) || $input[ $key ] == false || $input[ $key ] == null ) {
          $input[ $key ] = 'false';
        }
      }
    }
    unset( $input['checkbox'] );
  }
  
  if ( is_array( $input ) and !empty( $input ) ) {
    // Just update what's here, OK?
    foreach ( $input as $key => $changed ) {
      $options[$key] = $changed;
    }
  }
  return $options;
}

# ===== OPTIONS SETTINGS ====== #
function register_anatomy_settings() {
  $sections = array(
    'anatomy_messages_section' => array(
      'label'     => __( 'Messages' ),
      'function'  => 'anatomy_messages_function',
      'tab'       => 'engage',
      'fields'    => array(
        'anatomy_message_field' => array(
          'label'     => __( 'Explain Your Cause' ),
          'function'  => 'anatomy_message_field_function'
        ),
        'anatomy_comments_field' => array(
          'label'     => __( 'Encourage Discussion' ),
          'function'  => 'anatomy_comments_intro_function'
        )
      )
    ),
    'anatomy_feeling_section' => array(
      'label'     => __( 'Emote Feeling' ),
      'function'  => 'anatomy_feelings_function',
      'tab'       => 'design',
      'fields'    => array(
        'anatomy_emotion_field' => array(
          'label'     => __( 'Create Emotion' ),
          'function'  => 'anatomy_emotion_function'
        ),
        'anatomy_vibe_field' => array(
          'label'     => __( 'Send Vibes' ),
          'function'  => 'anatomy_vibe_function'
        ),
        'anatomy_mood_field' => array(
          'label'     => __( 'Set The Mood' ),
          'function'  => 'anatomy_mood_function'
        ),
        'anatomy_ambiance_field' => array(
          'label'     => __( 'Deliver Ambiance' ),
          'function'  => 'anatomy_ambiance_function'
        )
      )
    ),
    'anatomy_branding_section' => array(
      'label'     => __( 'Establish Branding' ),
      'function'  => 'anatomy_branding_function',
      'tab'       => 'design',
      'fields'    => array(
        'anatomy_logo_section' => array(
          'label'     => __( 'Your Logo' ),
          'function'  => 'anatomy_logo_function'
        ),
        'anatomy_social_icons' => array(
          'label'     => __( 'Social Identity' ),
          'function'  => 'anatomy_icons_function'
        ),
        'anatomy_social_section' => array(
          'label'     => __( '' ),
          'function'  => 'anatomy_social_function'
        )
      )
    ),
    'anatomy_advanced_section' => array(
      'label'     => __( 'Tweak User Experience' ),
      'function'  => 'anatomy_advanced_function',
      'tab'       => 'design',
      'fields'    => array(
        'anatomy_homepage_section' => array(
          'label'     => __( 'Homepage Experience' ),
          'function'  => 'anatomy_homepage_function'
        ),
        'anatomy_hide_section' => array(
          'label'     => __( 'Show &amp; Tell' ),
          'function'  => 'anatomy_hide_function'
        )
      )
    ),
    'anatomy_dictionary_section' => array(
      'label'     => __( 'Dictionary Settings'),
      'function'  => 'anatomy_dictionary_function',
      'tab'       => 'dictionary',
      'fields'    => array(
        'anatomy_search_section' => array(
          'label'     => __( 'Searching Entries' ),
          'function'  => 'anatomy_dictionary_search_function'
        ),
        'anatomy_browse_section' => array(
          'label'     => __( 'Browsing Entries' ),
          'function'  => 'anatomy_archive_content_display_function'
        ),
        'anatomy_archives_section' => array(
          'label'     => __( 'Pagination' ),
          'function'  => 'anatomy_archive_sections_function'
        )
      )
    )
  );
  foreach ( $sections as $section => $settings ) {
    /* Register the section first */
    $tab = 'anatomy_' . $settings['tab'];
    // $tab = 'theme_options';
    add_settings_section( $section, $settings['label'], $settings['function'], $tab );
    foreach ( $settings['fields'] as $field => $details ) {
      /* Register the section's fields second */
      add_settings_field( $field, $details['label'], $details['function'], $tab, $section );
    }
    /* Register the tab so that it saves the options to the overall options array */
    register_setting( $tab, 'anatomy_options', 'anatomy_options_validate' );
  }
}
add_action( 'admin_init', 'register_anatomy_settings' );

# ===== OPTION FUNCTIONS ====== #
include( 'functions/options.php' );

# ===== PAGINATION ====== #
function anatomy_pagination() {
  global $wp_query; 
  
  $total   = $wp_query->max_num_pages;
  $current = $wp_query->query_vars['paged'] > 1 ? $wp_query->query_vars['paged'] : 1;
  if ( is_search() ) {
    // Searches need a special format...
    $base = get_search_link() . '/' . '%_%';
  } elseif ( substr( get_pagenum_link(1), -1) != '/' ) {
    $base = get_pagenum_link(1) . '/%_%';
  } else {
    $base = get_pagenum_link(1) . '%_%';
  }
  $pages   = paginate_links( array(
    'base'      => $base,
    'total'     => $total,
    'current'   => $current,
    'prev_text' => '<i class="icon-caret-left"></i>',
    'next_text' => '<i class="icon-caret-right"></i>',
    'format'    => 'page/%#%/',
    'type'      => 'array'
  ) );
  
  $paginate = '<ul class="pagination">';
  
  if ( isset( $pages ) and !empty( $pages ) ) {
    foreach ( $pages as $page ) {
      $paginate .= '<li class="page">'.$page.'</li>';
    }
  }
  $paginate .= '</ul>';
  echo $paginate;
}

# ===== DEFAULT MENU ====== #

function anatomy_default_menu( $args ) {
  $all_pages = get_pages();
  $current_page_id = get_the_ID();
  extract( $args );
  $list = '<ul id="' . $menu_id . '">';
  foreach ( $all_pages as $page ) {
    $class = 'menu-item';
    if ( $current_page_id == $page->ID ) {
      $class .= ' current_page_item';
    }
    $list .= '<li class="' . $class . '"><a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) .  '</a></li>';
  }
  $list .= '</ul>';
  echo $list;
}

# ===== THUMBNAILS ====== #
include( 'functions/thumbnails.php' );

# ===== WYSIWYG ====== #
include( 'functions/wysiwyg.php' );

# ===== COMMENTS ====== #
include( 'functions/comments.php' );

# ===== SHORTCODES ====== #
include( 'functions/shortcodes.php' );

# ===== CUSTOM DICTIONARY ====== #

function custom_dictionary_types_format( $args, $taxonomy ) {
  if ( $taxonomy == 'types' ) {
    $args['classes'] = 'tags';
    $args['before_list'] = '<i class="icon-info-sign"></i> ';
  }
  return $args;
}
add_filter( 'format_dictionary_args', 'custom_dictionary_types_format', 8, 2 );

function anatomy_sort_array_of_objects( $a, $b ) {
  return strcmp( $a->name, $b->name );
}

if ( !function_exists( 'wpd_plugin_is_installed' ) ) {
  function wpd_plugin_is_installed() {
    // Returns true or false
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if ( is_plugin_active( 'wp-dictionary/wp-dictionary.php' ) === true ) {
      return true;
    } else {
      return false;
    }
  }
}
if ( wpd_plugin_is_installed() ) {
  require_once( 'functions/dictionary.php' );
}