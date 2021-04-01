<?php
/* wysiwyg.php Anatomy Theme by Anne Dorko */

// Help from http://wordpress.stackexchange.com/questions/3882/can-i-add-a-custom-format-to-the-format-option-in-the-text-panel

// Customize the format dropdown items
add_action( 'after_setup_theme', 'anatomy_after_setup_theme' );
function anatomy_after_setup_theme() { add_editor_style(); }

add_filter('mce_buttons_2', 'anatomy_mce_buttons_2');
function anatomy_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter('tiny_mce_before_init', 'anatomy_tiny_mce_before_init');
function anatomy_tiny_mce_before_init($settings) {
    $settings['theme_advanced_blockformats'] = 'p,address,pre,h2,h3,h4,h5,h6';

    // Reference http://tinymce.moxiecode.com/examples/example_24.php
    $style_formats = array(
            array('title' => 'Callout Box', 'block' => 'div', 'classes' => 'callout' ),
            array('title' => 'Highlight', 'inline' => 'span', 'classes' => 'highlight' ),
            array('title' => 'Credits', 'block' => 'p', 'classes' => 'credits')
        );
    // Before 3.1 you needed a special trick to send this array to the configuration.
    // See this post history for previous versions.
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}