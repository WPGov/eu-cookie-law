jQuery(document).ready(function($){

	var expireTimer = eucookielaw_data.expireTimer;
	var scrollConsent = eucookielaw_data.scrollConsent;
	
	$(".eu_control_btn").click(function() {
		document.cookie = "euCookie=set; Max-Age=0; path=/";
		window.location.reload();
	});
	
	$("#fom").click(function() {
		if( $('#fom').attr('href') === '#') { 
			$(".pea_cook_more_info_popover").fadeIn("slow");
			$(".pea_cook_wrapper").fadeOut("fast");
		}
	});
	
	$("#pea_close").click(function() {
		$(".pea_cook_wrapper").fadeIn("fast");
		$(".pea_cook_more_info_popover").fadeOut("slow");
	});
	
	$('#pea_cook_btn, .eucookie').click(function() {
		euCookieConsent();
	});
	
	jQuery(window).scroll(function(){
		if ( scrollConsent > 0 && document.cookie.indexOf("euCookie") < 0 ) {		
			euCookieConsent();
		}	
	});
	
	function euCookieConsent() {
		var today = new Date(), expire = new Date();
		expire.setTime(today.getTime() + (expireTimer * 24 * 60 * 60 * 1000) );
		document.cookie = "euCookie=set; expires=" + expire.toUTCString() + "; path=/";
		window.location.reload();
	}
});