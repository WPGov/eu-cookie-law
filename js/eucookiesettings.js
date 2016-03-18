jQuery(document).ready(function($){
    $('.color-field').wpColorPicker();
	
	
	eclshowhide();
	
	$( "#networkshareurl" ).prop( "disabled", !$('#networkshare').is(':checked') );
	
	$('#boxlinkid').on('change', eclshowhide );

	$('#networkshare').on('change', function() {
		$( "#networkshareurl" ).prop( "disabled", !$('#networkshare').is(':checked') );
	});
	
	function eclshowhide() {
		if ($('#boxlinkid').val() == "C") {
			$( "#boxlinkblank" ).prop( "disabled", false );
			$( "#customurl" ).prop( "disabled", false );
			$( "#boxcontent" ).prop( "disabled", true );
			$( "#closelink" ).prop( "disabled", true );
		} else if ($('#boxlinkid').val()) {
			$( "#boxlinkblank" ).prop( "disabled", false );
			$( "#customurl" ).prop( "disabled", true );
			$( "#boxcontent" ).prop( "disabled", true );
			$( "#closelink" ).prop( "disabled", true );
		} else {
			$( "#boxlinkblank" ).prop( "disabled", true );
			$( "#customurl" ).prop( "disabled", true );
			$( "#boxcontent" ).prop( "disabled", false );
			$( "#closelink" ).prop( "disabled", false );
		}
	}
});