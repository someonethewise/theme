jQuery(document).ready(function($) {

	// link the last tab to the affiliate area page
	if ( $('#tabs').length ) {
		jQuery('#tabs').tabs({

			beforeActivate: function(event, ui) {

				if ( ui.newTab.data("link") === 'affiliate-area' ) {

					event.preventDefault();
					var url = $('.follow-link a').attr('href');
					location.href = url;
					return false;

				}

			}
		});
	}

	// add loaded class
	jQuery('body').addClass('loaded');

    $( "#cta .button" ).hover(
      function() {
        $('body').addClass('cta');
      }, function() {
        $('body').removeClass('cta');
      }
    );

	// how it works
    $('#how-it-works').on( 'click', function(e) {
        e.preventDefault();

        $(this).next().fadeIn();
        $(this).remove();
    });

	// animates the affiliate header when the mouse enters the header
	$('.page-template-page-templatesaffiliates-php .affiliates-header').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
		$(this).addClass( 'can-hover' );
	});

});
