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
		<h1>EU Cookie Law
            <a href="//wordpress.org/plugins/eu-cookie-law/changelog/" target="_blank" class="add-new-h2">
                <?php esc_html_e('Changelog', 'eu-cookie-law'); ?>
            </a>
            <a href="//wordpress.org/support/view/plugin-reviews/eu-cookie-law" target="_blank" class="add-new-h2">
                <?php esc_html_e('Rate us', 'eu-cookie-law'); ?> ★★★★★
            </a>
            <a href="//translate.wordpress.org/projects/wp-plugins/eu-cookie-law" target="_blank" class="add-new-h2">
                <?php esc_html_e('Translate', 'eu-cookie-law'); ?>
            </a>
            <a href="//wordpress.org/support/plugin/eu-cookie-law" target="_blank" class="add-new-h2">
                <?php esc_html_e('Support', 'eu-cookie-law'); ?>
            </a>
        </h1>
		<form method="post" action="options.php">
			<?php settings_fields('peadig_eucookie_options'); ?>
			<?php
                ecl_check_defaults();
                $options = get_option('peadig_eucookie');
            ?>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="enabled"><?php esc_html_e('Activate'); ?></label></th>
					<td><input id="enabled" name="peadig_eucookie[enabled]" type="checkbox" value="1" <?php checked('1', $options['enabled']); ?> /></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="autoblock"><?php esc_html_e('Auto Block', 'eu-cookie-law'); ?></label></th>
					<td><input id="autoblock" name="peadig_eucookie[autoblock]" type="checkbox" value="1" <?php checked('1', $options['autoblock']); ?> /><br>
<small><?php esc_html_e('This function will automatically block iframes, embeds and scripts in your post, pages and widgets.', 'eu-cookie-law'); ?></small></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="tinymcebutton"><?php esc_html_e('Enable TinyMCE Button', 'eu-cookie-law'); ?></label></th>
					<td><input id="tinymcebutton" name="peadig_eucookie[tinymcebutton]" type="checkbox" value="1" <?php checked('1', $options['tinymcebutton']); ?> /><br>
<small><?php esc_html_e('Click here if you want to turn on the TinyMCE button for manual insertion of EU Cookie Law shortcodes while editing contents.', 'eu-cookie-law'); ?></small></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="lengthnum">
                    <?php esc_html_e('Cookie acceptance length', 'eu-cookie-law'); ?></label></th>
					<td><input id="lengthnum" type="text" name="peadig_eucookie[lengthnum]" value="<?php echo absint( $options['lengthnum'] ); ?>" size="5" />
						<select name="peadig_eucookie[length]">
							  <option value="days"<?php if ($options['length'] == 'days') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('days', 'eu-cookie-law'); ?></option>
							  <option value="weeks"<?php if ($options['length'] == 'weeks') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('weeks', 'eu-cookie-law'); ?></option>
							  <option value="months"<?php if ($options['length'] == 'months') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('months', 'eu-cookie-law'); ?></option>
						</select><br>
<small><?php esc_html_e('Once the user clicks accept the bar will disappear. You can set how long this will apply for before the bar reappears to the user.', 'eu-cookie-law'); ?> <?php esc_html_e('Set "0" for SESSION cookie.', 'eu-cookie-law'); ?></small>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="scrollconsent"><?php esc_html_e('Scroll Consent', 'eu-cookie-law'); ?></label></th>
					<td><input id="scrollconsent" name="peadig_eucookie[scrollconsent]" type="checkbox" value="1" <?php checked('1', $options['scrollconsent']); ?> /><br>
<small><?php esc_html_e('Click here if you want to consider scrolling as cookie acceptation. Users should be informed about this...', 'eu-cookie-law'); ?></small></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="navigationconsent"><?php esc_html_e('Navigation Consent', 'eu-cookie-law'); ?></label></th>
					<td><input id="navigationconsent" name="peadig_eucookie[navigationconsent]" type="checkbox" value="1" <?php checked('1', $options['navigationconsent']); ?> /><br>
<small><?php esc_html_e('Click here if you want to consider continuing navigation as cookie acceptation. Users should be informed about this...', 'eu-cookie-law'); ?></small></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="networkshare"><?php esc_html_e('Share Cookie across Network', 'eu-cookie-law'); ?></label></th>
					<td><input id="networkshare" name="peadig_eucookie[networkshare]" type="checkbox" value="1" <?php checked('1', $options['networkshare']); ?> /><br>
<small><?php esc_html_e('Click here if you want to share euCookie across your network (subdomains or multisite)', 'eu-cookie-law'); ?></small></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="networkshareurl">
                    <?php esc_html_e('Network Domain', 'eu-cookie-law'); ?></label></th>
					<td><input id="networkshareurl" type="text" name="peadig_eucookie[networkshareurl]" value="<?php echo esc_attr( $options['networkshareurl'] ); ?>" size="40" /></td>
				</tr>
			</table>
        <hr>
			<h3 class="title"><?php esc_html_e('Appearance'); ?></h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="position"><?php esc_html_e('Position', 'eu-cookie-law'); ?></label></th>
					<td>
						<select name="peadig_eucookie[position]">
							  <option value="bottomright"<?php if ($options['position'] == 'bottomright') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('Bottom Right', 'eu-cookie-law'); ?></option>
							  <option value="topright"<?php if ($options['position'] == 'topright') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('Top Right', 'eu-cookie-law'); ?></option>
                              <option value="topcenter"<?php if ($options['position'] == 'topcenter') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('Top Center', 'eu-cookie-law'); ?></option>
							  <option value="bottomleft"<?php if ($options['position'] == 'bottomleft') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('Bottom Left', 'eu-cookie-law'); ?></option>
							  <option value="topleft"<?php if ($options['position'] == 'topleft') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('Top Left', 'eu-cookie-law'); ?></option>
                              <option value="bottomcenter"<?php if ($options['position'] == 'bottomcenter') { echo ' selected="selected"'; } ?>>
                                  <?php esc_html_e('Bottom Center', 'eu-cookie-law'); ?></option>
						</select>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="backgroundcolor">
                    <?php esc_html_e('Background Color', 'eu-cookie-law'); ?></label></th>
					<td><input id="backgroundcolor" type="text" name="peadig_eucookie[backgroundcolor]" value="<?php echo $options['backgroundcolor']; ?>" class="color-field" data-default-color="#000000"/></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="fontcolor">
                    <?php esc_html_e('Font Color', 'eu-cookie-law'); ?></label></th>
					<td><input id="fontcolor" type="text" name="peadig_eucookie[fontcolor]" value="<?php echo $options['fontcolor']; ?>"  class="color-field" data-default-color="#ffffff"/></td>
				</tr>
			</table>
        <hr>
			<h3 class="title"><?php esc_html_e('Content'); ?></h3>
			<table class="form-table">
				<tr valign="top"><th scope="row"><label for="barmessage">
                    <?php esc_html_e('Bar Message', 'eu-cookie-law'); ?></label></th>
					<td><input class="i18n-multilingual-display" id="barmessage" type="text" name="peadig_eucookie[barmessage]" value="<?php echo esc_attr( $options['barmessage'] ); ?>" size="100" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="barlink">
                    <?php esc_html_e('More Info Text', 'eu-cookie-law'); ?></label></th>
					<td><input id="barlink" type="text" name="peadig_eucookie[barlink]" value="<?php echo esc_attr( $options['barlink'] ); ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="barbutton">
                    <?php esc_html_e('Accept Text', 'eu-cookie-law'); ?></label></th>
					<td><input id="barbutton" type="text" name="peadig_eucookie[barbutton]" value="<?php echo esc_attr( $options['barbutton'] ); ?>" /></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="boxlinkid">
                    <?php esc_html_e('Bar Link', 'eu-cookie-law'); ?><br/><small>
                    <?php esc_html_e('Use this field if you want to link a page instead of showing the popup', 'eu-cookie-law'); ?></small></label></th>
                    <td>
                    <?php
                    $args = array(
                        'depth'                 => 0,
                        'child_of'              => 0,
                        'selected'              => $options['boxlinkid'],
                        'echo'                  => 0,
                        'name'                  => 'peadig_eucookie[boxlinkid]',
                        'id'                    => 'boxlinkid', 
                        'show_option_none'      => '* '.__('Custome Message'), 
                        'show_option_no_change' => null, 
                        'option_none_value'     => null, 
                    ); ?>

                    <?php
                    $lol = wp_dropdown_pages($args);
                    $add = null;
                    if ( $options['boxlinkid'] == 'C' ) { $add = ' selected="selected" '; }
                    $end = '<option class="level-0" value="C"'.$add.'>* '.__('Custom URL').'</option></select>';
                    $lol = preg_replace('#</select>$#', $end, trim($lol)); 
                    echo $lol; ?>
                        <br><br><input id="boxlinkblank" name="peadig_eucookie[boxlinkblank]" type="checkbox" value="1" <?php checked('1', $options['boxlinkblank']); ?> /><label for="boxlinkblank"><small>Add target="_blank"</small></label>
                    </td>
                    
				</tr>
                <tr valign="top"><th scope="row"><label for="customurl">
                    <?php esc_html_e('Custom URL'); ?></label></th>
					<td><input id="customurl" type="text" name="peadig_eucookie[customurl]" value="<?php echo esc_attr( $options['customurl'] ); ?>" />
                        <small> <?php esc_html_e('Enter the destination URL'); ?></small></td>
				</tr>
                <tr valign="top"><th scope="row"><label for="closelink">
                    <?php esc_html_e('"Close Popup" Text', 'eu-cookie-law'); ?></label></th>
					<td><input id="closelink" type="text" name="peadig_eucookie[closelink]" value="<?php echo esc_attr( $options['closelink'] ); ?>" /></td>
				</tr>
				<tr valign="top"><th scope="row"><label for="boxcontent">
                    <?php esc_html_e('Popup Box Content', 'eu-cookie-law'); ?><br>
                    <small><?php esc_html_e('Use this to add a popup that informs your users about your cookie policy', 'eu-cookie-law'); ?></small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[boxcontent]' id='boxcontent' rows='9' ><?php echo esc_textarea( $options['boxcontent'] ); ?></textarea>
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="bhtmlcontent">
                    <?php esc_html_e('Blocked code message', 'eu-cookie-law'); ?><br>
                    <small><?php esc_html_e('This is the message that will be displayed for locked-code areas', 'eu-cookie-law'); ?></small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[bhtmlcontent]' id='bhtmlcontent' rows='9' ><?php echo esc_textarea( $options['bhtmlcontent'] ); ?></textarea>
					</td>
				</tr>
                <tr>
            </table>
                <hr>
                <h3 class="title">Shortcode [cookie-control]</h3>
			<table class="form-table">
                </tr>
                    <tr valign="top"><th scope="row"><label for="cc-cookieenabled">
                    <?php esc_html_e('Cookie enabled message', 'eu-cookie-law'); ?><br>
                    <small><?php esc_html_e('This is the message that will be displayed when cookie are enabled', 'eu-cookie-law'); ?></small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[cc-cookieenabled]' id='cc-cookieenabled' rows='9' ><?php echo esc_textarea( $options['cc-cookieenabled'] ); ?></textarea><br>
                    
                    <label style="font-size:0.9em;font-weight:bold;" for="cc-disablecookie"><?php esc_html_e('"Disable Cookie" Text', 'eu-cookie-law'); ?></label>
                    <input id="cc-disablecookie" type="text" name="peadig_eucookie[cc-disablecookie]" value="<?php echo $options['cc-disablecookie']; ?>" />
					</td>
				</tr>
                <tr valign="top"><th scope="row"><label for="cc-cookiedisabled">
                    <?php esc_html_e('Cookie disabled message', 'eu-cookie-law'); ?><br>
                    <small><?php esc_html_e('This is the message that will be displayed when cookie are not accepted', 'eu-cookie-law'); ?></small></label></th>
					<td>
<textarea style='font-size: 90%; width:95%;' name='peadig_eucookie[cc-cookiedisabled]' id='cc-cookiedisabled' rows='9' ><?php echo esc_textarea( $options['cc-cookiedisabled'] ); ?></textarea>
					</td>
				</tr>
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}
?>