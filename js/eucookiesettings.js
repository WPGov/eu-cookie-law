jQuery(document).ready(function($){
	$( "#boxcontent" ).prop( "disabled", $('#boxlinkid').val() );
	$( "#closelink" ).prop( "disabled", $('#boxlinkid').val() );
    $('.color-field').wpColorPicker();
	$('#boxlinkid').on('change', function() {
		$( "#boxcontent" ).prop( "disabled", this.value );
		$( "#closelink" ).prop( "disabled", this.value );
	});
});