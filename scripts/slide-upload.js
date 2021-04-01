jQuery(document).ready(function($) {
	
	jQuery('.media_upload_button').click( function() {
		targetfield = jQuery(this).prev( '.media_upload' );
		targetpreview = jQuery(this).next( '.media_preview' );
		preview_img = jQuery( targetpreview ).find( 'img.media' ).each( function() {
			return img = jQuery(this);
		});
		tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
		return false;
	});
	
	window.send_to_editor = function( html ) {
		targetpreview.css( 'display', 'block' );
		imgurl = jQuery( 'img', html ).attr( 'src' );
		jQuery( targetfield ).val( imgurl );
		jQuery( preview_img ).attr('src', imgurl );
		jQuery( targetpreview ).css('display', 'block');
		// Remove the iFrame
		tb_remove();
	}
	
	jQuery('.media_delete').click( function(){
		jQuery( this ).next('img.media').attr( 'src', '' );
		jQuery( this ).parent( '.media_preview' ).css( 'display', 'none' );
		jQuery( this ).parent( '.media_preview' ).prev( '.media_upload_button' ).prev( '.media_upload' ).attr( 'value', ' ' );
	});
	
});