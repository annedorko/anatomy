<?php
header('Content-type: text/css');
ob_start("anatomy_compress_css");
function anatomy_compress_css( $buffer ) {
  /* Remove comments */
  $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
  /* Remove tabs, spaces, newlines, etc. */
  $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
  return $buffer;
}
/* CSS files */
include( 'stylesheets/skeleton/base.css' );
include( 'stylesheets/skeleton/skeleton.css' );
include( 'stylesheets/skeleton/layout.css' );
include( 'stylesheets/font-awesome/font-awesome.css' );
include( 'style.css' );
// Load up the color scheme
if ( !isset( $_GET['color_scheme'] ) ) {
  $_GET['color_scheme'] = 'default';
}
$file = 'stylesheets/skins/' . $_GET['color_scheme'] . '.css';
include( $file );
// Load up inverted version
if ( !isset( $_GET['inverted'] ) ) {
  $_GET['inverted'] = 'default';
}
if ( $_GET['inverted'] == 'inverted' ) {
  $invert = 'stylesheets/skins/invert.css';
  include( $invert );
}
if ( !isset( $_GET['texture_set'] ) ) {
  $_GET['texture_set'] = 'linen|brillant';
}
function anatomy_background( $textures, $inverted, $secondary = false ) {
  if ( $textures == 'sterile' ) {
    return false;
  } else {
    $bg = explode( '|', $textures );
    if ( ( $inverted == 'default' and $secondary == false ) or ( $inverted == 'inverted' and $secondary == true ) ) {
      $which = 'light';
    } else {
      $which = 'dark';
    }

      $part = $which == 'light' ? 1 : 0;
      $base = 'images/backgrounds/' . $which . '_' . $bg[$part] . '.png';
      return $base;

  }
}
?>
body {
  background: url('<?php echo anatomy_background($_GET['textures'], $_GET['inverted']); ?>');
}
#tophat {
  background: url('<?php echo anatomy_background($_GET['textures'], $_GET['inverted'], true ); ?>');
}
<?php
if ( !isset( $_GET['fonts'] ) ) {
  $_GET['fonts'] = 'authentic';
}
$font = 'stylesheets/skins/fonts_' . $_GET['fonts'] . '.css';
include( $font );
ob_end_flush();