jQuery(document).ready(function($){

	var euCookieSet = eucookielaw_data.euCookieSet;
	var expireTimer = eucookielaw_data.expireTimer;
	var scrollConsent = eucookielaw_data.scrollConsent;
	var networkShareURL = eucookielaw_data.networkShareURL;
	var isCookiePage = eucookielaw_data.isCookiePage;
	var isRefererWebsite = eucookielaw_data.isRefererWebsite;
	var deleteCookieUrl = eucookielaw_data.deleteCookieUrl;
	var autoBlock = eucookielaw_data.autoBlock;
	
	if (document.cookie.indexOf("euCookie") >= 0) {
	  $(".pea_cook_wrapper").fadeOut("fast");
	  euCookieSet = 1;
	}
	if ( euCookieSet > 0) {
		createCookie();
	}

	$(".eu_control_btn").click(function() {
		window.location.replace(deleteCookieUrl);
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
	
	$('#pea_cook_btn, .eucookie').on('click', function () {
		euCookieConsent();
	});
	
	jQuery(window).scroll(function(){
		if ( scrollConsent > 0 && document.cookie.indexOf("euCookie") < 0 && !euCookieSet ) {
			if (!isCookiePage) {
				euCookieConsent();
			}
		}	
	});

	function euCookieConsent() {
		createCookie();
		if (autoBlock == 1) {
			window.location = window.location;
		}
	}
	
	function createCookie() {
		var today = new Date(), expire = new Date();
		
		if (expireTimer > 0) {
			expire.setTime(today.getTime() + (expireTimer * 24 * 60 * 60 * 1000) );
			cookiestring = "euCookie=set; "+networkShareURL+"expires=" + expire.toUTCString() + "; path=/";
		} else {
			cookiestring = "euCookie=set; "+networkShareURL+"path=/";
		}
		document.cookie = cookiestring;
		$(".pea_cook_wrapper").fadeOut("fast");
	}
});