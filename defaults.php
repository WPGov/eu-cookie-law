<?php

    $defaults = array (
        array('enabled', '0'),
        array('lengthnum', '1'),
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
        array('tinymcebutton', '0'),
        array('scrollconsent', '0')
    );

    $my_options = get_option('peadig_eucookie');
    $conta = count($defaults);
    for($i=0;$i<$conta;$i++){
        if (!$my_options[$defaults[$i][0]]) {
            $my_options[$defaults[$i][0]] = $defaults[$i][1];
            update_option('peadig_eucookie', $my_options);            
        }
    }
?>