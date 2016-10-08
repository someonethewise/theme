jQuery(document).ready(function($) {

	// add loaded class
	jQuery('body').addClass('loaded');

    $( "#cta .button" ).hover(
      function() {
        $('body').addClass('cta');
      }, function() {
        $('body').removeClass('cta');
      }
    );

    $('#how-it-works').on( 'click', function(e) {
        e.preventDefault();

        $(this).next().fadeIn();
        $(this).remove();
    });

	$('.page-template-page-templatesaffiliates-php .affiliates-header').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
		$(this).addClass( 'can-hover' );
	});

});
