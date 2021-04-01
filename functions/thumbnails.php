<?php

/* Add custom thumbnails 
   Detects actual thumbnail, then first image (external or attachment)
================================! */

function anatomy_post_thumbnail() {
  global $post_id;
  $post_thumbnail = get_the_post_thumbnail( $post_id, 'thumbnail' );
  if ( empty( $post_thumbnail ) ) {
    // If the thumbnail isn't set, try to get the first image or just use the default
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img_url = isset( $matches[1][0] ) ? $matches[1][0] : null;
    $attachment_id = get_attachment_id_from_src( $first_img_url );
    $first_img     = !empty( $attachment_id ) ? wp_get_attachment_thumb_url( $attachment_id ) : null;
    if ( empty( $attachment_id ) and !empty( $first_img_url ) ) {
      // External URL
      $first_img = $first_img_url;
    } elseif ( empty( $first_img ) ) {
      // No images at all
      $first_img = null;
    }
    $post_thumbnail = $first_img ? '<img src="'.$first_img.'" class="wp-post-image attachment-thumbnail">' : null;
  }
  return $post_thumbnail;
}

function get_attachment_id_from_src( $image_src ) {
	global $wpdb;
	$query = 'SELECT ID FROM `' . $wpdb->posts . '` WHERE guid="' . $image_src . '"';
	$id = $wpdb->get_var( $wpdb->prepare( $query, 0 ) );
  return $id;
}