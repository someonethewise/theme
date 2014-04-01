jQuery(document).ready(function() {

    // show the main nav when clicked
    jQuery('#how-it-works').click(function(e) {
    	e.preventDefault();
        jQuery('#masthead').toggleClass('expanded');
       
    	jQuery(this).html( jQuery(this).text() === "OK, got it" ? "See how it works" : "OK, got it" );
    });
    
});


