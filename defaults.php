<?php

    $defaults = array (
        array('enabled', '0'),
        //array('lengthnum', '1'),
        array('length', 'months'),
        array('position', 'bottomright'),
        array('barmessage', __('By continuing to use the site, you agree to the use of cookies.', 'eu-cookie-law')),
        array('barlink', __('more information', 'eu-cookie-law')),
        array('barbutton', __('Accept', 'eu-cookie-law')),
        array('closelink', __('Close', 'eu-cookie-law')),
        array('boxcontent', __('The cookie settings on this website are set to "allow cookies" to give you the best browsing experience possible. If you continue to use this website without changing your cookie settings or you click "Accept" below then you are consenting to this.', 'eu-cookie-law')),
        array('bhtmlcontent', __('<b>Content not available.</b><br><small>Please allow cookies by clicking Accept on the banner</small>', 'eu-cookie-law')),
        array('backgroundcolor', '#000000'),
        array('fontcolor', '#FFFFFF'),
        array('autoblock', '0'),
        array('boxlinkblank', '0'),
        array('tinymcebutton', '0'),
        array('scrollconsent', '0'),
        array('navigationconsent', '0'),
        array('networkshare', '0'),
        array('onlyeuropean', '0'),
        array('customurl', get_site_url() ),
        array('cc-disablecookie', __('Revoke cookie consent', 'eu-cookie-law')),
        array('cc-cookieenabled', __('Cookies are enabled', 'eu-cookie-law')),
        array('cc-cookiedisabled', __('Cookies are disabled<br>Accept Cookies by clicking "%s" in the banner.', 'eu-cookie-law')),
        array('networkshareurl', ecl_getshareurl())
    );

    $my_options = get_option('peadig_eucookie');
    $conta = count($defaults);
    for($i=0;$i<$conta;$i++){
        if (!$my_options[$defaults[$i][0]]) {
            $my_options[$defaults[$i][0]] = $defaults[$i][1];
            update_option('peadig_eucookie', $my_options);            
        }
    }

    function ecl_getshareurl() {
        if ( is_multisite() ) {
            $sURL = network_site_url();
        } else {
            $sURL = site_url();
        }
        $sURL    = site_url(); // WordPress function
        $asParts = parse_url( $sURL ); // PHP function

        if ( ! $asParts )
          wp_die( 'ERROR: Path corrupt for parsing.' ); // replace this with a better error result

        $sScheme = $asParts['scheme'];
        $nPort   = $asParts['port'];
        $sHost   = $asParts['host'];
        $nPort   = 80 == $nPort ? '' : $nPort;
        $nPort   = 'https' == $sScheme AND 443 == $nPort ? '' : $nPort;
        $sPort   = ! empty( $sPort ) ? ":$nPort" : '';
        $sReturn = $sHost . $sPort;

        return $sReturn;
    }
?>