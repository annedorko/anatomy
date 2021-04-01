jQuery(document).ready(function($) {
	
	jQuery('#upload_logo_button').click( function() {
		post_id = 0;
		targetfield = jQuery(this).prev('#upload_logo');
		preview_img = jQuery('#logo_preview');
		tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
		return false;
	});
	
	window.send_to_editor = function( html ) {
		imgurl = jQuery( 'img', html ).attr( 'src' );
		jQuery( targetfield ).val( imgurl );
		jQuery( preview_img ).attr('src', imgurl );
		// Display the preview box
		preview = jQuery( '#logo_preview_box' );
		jQuery( preview ).css('display', 'block');
		// Remove the iFrame
		tb_remove();
	}
	
	jQuery('#delete_logo_image').click( function(){
		jQuery( '#logo_preview' ).attr( 'src', '' );
		jQuery( '#logo_preview_box' ).css( 'display', 'none' );
		jQuery( '#upload_logo' ).attr( 'value', '' );
	});
	
});