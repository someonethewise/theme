jQuery(document).ready(function() {

    // show the main nav when clicked
    jQuery('#how-it-works').click(function() {
        jQuery('#masthead').toggleClass('expanded');
    	
    //	var button = jQuery(this).text();
       
    	jQuery(this).html( jQuery(this).text() === "OK, got it" ? "See how it works" : "OK, got it" );
    });

});