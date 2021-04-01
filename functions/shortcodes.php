<?php
// shortcodes.php Anatomy Theme by Anne Dorko

function anatomy_buttons( $atts, $content = null ) {
  extract( shortcode_atts( array(
  		'color'     => 'gray',
  		'text'      => '',
  		'href'      => '',
  		'target'    => '_self',
  		'size'      => '',
  		'icon'      => '',
  		'style'     => ''
  	), $atts ) );
  
  $link_text = $content ? do_shortcode( $content ) : $text;
  $icon_html = !empty( $icon ) ? '<i class="icon-' . $icon . '"></i> ' : '';
  $button = '<a href="' . $href . '" class="button ' . $color . ' ' . $size . '" target="' . $target . '" style="' . $style . '">' . $icon_html . $link_text . '</a>';
  return $button;
}
add_shortcode( 'button', 'anatomy_buttons' );

function anatomy_fontawesome( $atts ) {
  extract( shortcode_atts( array(
  		'name' => 'home'
  	), $atts ) );
  return '<i class="icon-' . $name . '"></i>';
}
add_shortcode( 'icon', 'anatomy_fontawesome' );

function anatomy_columns( $atts, $content = null ) {
  extract( shortcode_atts( array(
  		'width'     => 'one',
  		'offset'    => ''
  	), $atts ) );
  $offset = !empty( $offset ) ? 'offset-by-' . $offset : '';
  return '<div class="columns ' . $width . ' ' . $offset . '">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'column', 'anatomy_columns' );

function anatomy_clear() {
  return '<div class="clear"></div>';
}
add_shortcode( 'clear', 'anatomy_clear' );

// Add support for widget shortcodes
add_filter('widget_text', 'do_shortcode');