<?php
// Hooks your functions into the correct filters
function ecl_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'ecl_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'ecl_register_mce_button' );
	}
}
add_action('admin_head', 'ecl_add_mce_button');

function ecl_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['my_mce_button'] = plugins_url('shortcode.js',__FILE__);
	return $plugin_array;
}

function ecl_register_mce_button( $buttons ) {
	array_push( $buttons, 'my_mce_button' );
	return $buttons;
}
?>