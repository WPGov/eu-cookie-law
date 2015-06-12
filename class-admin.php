<?php

add_action('admin_init', 'peadig_eucookie_init' );
function peadig_eucookie_init(){
	register_setting( 'peadig_eucookie_options', 'peadig_eucookie' );
}
 	
add_action('admin_menu', 'show_peadig_eucookie_options');
function show_peadig_eucookie_options() {
	add_options_page('EU Cookie Law', 'EU Cookie Law', 'manage_options', 'peadig_eucookie', 'peadig_eucookie_options');
}

add_action( 'admin_enqueue_scripts', 'ecl_enqueue_color_picker' );
function ecl_enqueue_color_picker( $hook_suffix ) {
    $screen = get_current_screen();

    if ( $screen->id == 'settings_page_peadig_eucookie') {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'elc-color-picker', plugins_url('js/eucookiesettings.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }
}

// ADMIN PAGE
function peadig_eucookie_options() {
?>
	<div class="wrap">
        <div style="position: absolute;right: 20px;">
            <a style="padding:20px;" href="http://www.wpgov.it" target="_blank" title="WPGov.it">
                <img src="<?php echo plugins_url('img/wpgov.png',__FILE__); ?>" />
            </a>
            <a style="padding:20px;" href="http://peadig.com" target="_blank" title="Peadig.com">
                <img src="<?php echo plugins_url('img/peadig.png',__FILE__); ?>" />
            </a>
        </div>
		<h2>EU Cookie Law &bull; <?php echo get_option( 'ecl_version_number' ); ?>
            <a href="//wordpress.org/plugins/eu-cookie-law/changelog/" target="_blank" class="add-new-h2">
                <?php _e('Changelog', 'eu-cookie-law'); ?>
            </a>
            <a href="//wordpress.org/support/view/plugin-reviews/eu-cookie-law" target="_blank" class="add-new-h2">
                <?php _e('Rate us', 'eu-cookie-law'); ?> ★★★★★
            </a>
            <a href="//wordpress.org/support/plugin/eu-cookie-law" target="_blank" class="add-new-h2">
                <?php _e('Support', 'eu-cookie-law'); ?>
            </a>
        </h2>
		<form method="post" action="options.php">
			<?php settings_fields('peadig_eucookie_options'); ?>
			<?php
                ecl_check_defaults();
                $options = get_option('peadig_eucookie');
            ?>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="enabled"><?php _e('Activate'); ?></label></th>
					<td><input id="enabled" name="peadig_eucookie[enabled]" type="checkbox" value="1" <?php checked('1', $options['enabled']); ?> /></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="autoblock"><?php _e('Auto Block'); ?> (beta)</label></th>
					<td><input id="autoblock" name="peadig_eucookie[autoblock]" type="checkbox" value="1" <?php checked('1', $options['autoblock']); ?> /><br>
<small><?php _e('This function will automatically block iframes, embeds and scripts in your post, pages and widgets.', 'eu-cookie-law'); ?></small></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="tinymcebutton"><?php _e('Enable TinyMce Button'); ?></label></th>
					<td><input id="tinymcebutton" name="peadig_eucookie[tinymcebutton]" type="checkbox" value="1" <?php checked('1', $options['tinymcebutton']); ?> /><br>
<small><?php _e('Click here if you want to turn on the tinymce button for manual insertion of EU Cookie Law shortcodes while editing contents.'); ?></small></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="lengthnum">
                    <?php _e('Cookie acceptance lenght', 'eu-cookie-law'); ?></label></th>
					<td><input id="lengthnum" type="text" name="peadig_eucookie[lengthnum]" value="<?php echo $options['lengthnum']; ?>" size="5" /> 
						<select name="peadig_eucookie[length]">
							  <option value="days"<?php if ($options['length'] == 'days') { echo ' selected="selected"'; } ?>>
                                  <?php _e('days', 'eu-cookie-law'); ?></option>
							  <option value="weeks"<?php if ($options['length'] == 'weeks') { echo ' selected="selected"'; } ?>>
                                  <?php _e('weeks', 'eu-cookie-law'); ?></option>
							  <option value="months"<?php if ($options['length'] == 'months') { echo ' selected="selected"'; } ?>>
                                  <?php _e('months', 'eu-cookie-law'); ?></option>
						</select><br>
<small><?php _e('Once the user clicks accept the bar will disappear. You can set how long this will apply for before the bar reappears to the user.', 'eu-cookie-law'); ?></small>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="scrollconsent"><?php _e('Scroll Consent'); ?></label></th>
					<td><input id="scrollconsent" name="peadig_eucookie[scrollconsent]" type="checkbox" value="1" <?php checked('1', $options['scrollconsent']); ?> /><br>
<small><?php _e('Click here if you want to consider scrolling as cookie acceptation. Users should be informed about this...'); ?></small></td>
				</tr>
			</table>
        <hr>
			<h3 class="title"><?php _e('Appearance'); ?></h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="position"><?php _e('Position'); ?></label></th>
					<td>
						<select name="peadig_eucookie[position]">
							  <option value="bottomright"<?php if ($options['position'] == 'bottomright') { echo ' selected="selected"'; } ?>>
                                  <?php _e('Bottom Right', 'eu-cookie-law'); ?></option>
							  <option value="topright"<?php if ($options['position'] == 'topright') { echo ' selected="selected"'; } ?>>
                                  <?php _e('Top Right', 'eu-cookie-law'); ?></option>
							  <option value="bottomleft"<?php if ($options['position'] == 'bottomleft') { echo ' selected="selected"'; } ?>>
                                  <?php _e('Bottom Left', 'eu-cookie-law'); ?></option>
							  <option value="topleft"<?php if ($options['position'] == 'topleft') { echo ' selected="selected"'; } ?>>
                                  <?php _e('Top Left', 'eu-cookie-law'); ?></option>
						</select>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="backgroundcolor">
                    <?php _e('Background Color', 'eu-cookie-law'); ?></label></th>
					<td><input id="backgroundcolor" type="text" name="peadig_eucookie[backgroundcolor]" value="<?php echo $options['backgroundcolor']; ?>" class="color-field" data-default-color="#000000"/></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="fontcolor">
                    <?php _e('Font Color', 'eu-cookie-law'); ?></label></th>
					<td><input id="fontcolor" type="text" name="peadig_eucookie[fontcolor]" value="<?php echo $options['fontcolor']; ?>"  class="color-field" data-default-color="#ffffff"/></td>
				</tr>
			</table>
        <hr>
			<h3 class="title"><?php _e('Content'); ?></h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="barmessage">
                    <?php _e('Bar Message', 'eu-cookie-law'); ?></label></th>
					<td><input id="barmessage" type="text" name="peadig_eucookie[barmessage]" value="<?php echo $options['barmessage']; ?>" size="100" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="barlink">
                    <?php _e('More Info Text', 'eu-cookie-law'); ?></label></th>
					<td><input id="barlink" type="text" name="peadig_eucookie[barlink]" value="<?php echo $options['barlink']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="barbutton">
                    <?php _e('Accept Text', 'eu-cookie-law'); ?></label></th>
					<td><input id="barbutton" type="text" name="peadig_eucookie[barbutton]" value="<?php echo $options['barbutton']; ?>" /></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="boxlinkid">
                    <?php _e('Bar Link', 'eu-cookie-law'); ?><br/><small>
                    <?php _e('Use this field if you want to link a page instead of showing the popup', 'eu-cookie-law'); ?></small></label></th>
                    <td>
                    <?php $args = array(
                        'depth'                 => 0,
                        'child_of'              => 0,
                        'selected'              => $options['boxlinkid'],
                        'echo'                  => 1,
                        'name'                  => 'peadig_eucookie[boxlinkid]',
                        'id'                    => 'boxlinkid', 
                        'show_option_none'      => 'none', 
                        'show_option_no_change' => null, 
                        'option_none_value'     => null, 
                    ); ?>

                    <?php wp_dropdown_pages($args); ?>
                    </td>
				</tr>
                <tr valign="top"><th scope="row"><label for="closelink">
                    <?php _e('"Close Popup" Text', 'eu-cookie-law'); ?></label></th>
					<td><input id="closelink" type="text" name="peadig_eucookie[closelink]" value="<?php echo $options['closelink']; ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="boxcontent">
                    <?php _e('Popup Box Content', 'eu-cookie-law'); ?><br>
                    <small><?php _e('Use this to add a popup that informs your users about your cookie policy', 'eu-cookie-law'); ?></small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[boxcontent]' id='boxcontent' rows='9' ><?php echo $options['boxcontent']; ?></textarea>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="bhtmlcontent">
                    <?php _e('Blocked code message', 'eu-cookie-law'); ?><br>
                    <small><?php _e('This is the message that will be displayed for locked-code areas', 'eu-cookie-law'); ?></small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[bhtmlcontent]' id='bhtmlcontent' rows='9' ><?php echo $options['bhtmlcontent']; ?></textarea>
					</td>
				</tr>
			</table>
            </table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
?>