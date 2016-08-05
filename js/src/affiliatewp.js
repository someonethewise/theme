jQuery(document).ready(function($) {

	// add loaded class
	jQuery('body').addClass('loaded');
	
    // $('.scroll').click(function(event) {
    //     event.preventDefault();
    //     var offset = $($(this).attr('href')).offset().top;
    //     $('html, body').animate({scrollTop:offset}, 800);
    // });
    //
	// $('body').addClass('js');
    //
    // $( 'a > img' ).parent().addClass( 'has-image' );
    //
    // $( document.body ).on( 'click', 'div.gallery, div.tiled-gallery', function(e) {
    //      $('body').addClass( 'carousel-open');
    // });
    //
    // $( document.body ).bind('jp_carousel.afterClose', function(e) {
    //     $('body').removeClass('carousel-open');
    // });

    //var $gallery = $('.screenshots .js-flickity');
    //.flickity();

    // $('a.next').on( 'click', function( event ) {
    //     event.preventDefault();
    //     $gallery.flickity('next');
    // });

    // http://stackoverflow.com/questions/3898130/check-if-a-user-has-scrolled-to-the-bottom
    // $(window).scroll(function() {
    //     if ($(window).scrollTop() + $(window).height() == $(document).height() ) {
    //         $('body').addClass('site-bottom');
    //     }
    // });

    $( "#cta .button" ).hover(
      function() {
        $('body').addClass('cta');
      }, function() {
        $('body').removeClass('cta');
      }
    );

    // $(".ct-series-b .circle-blip").hover(function() {
    //     $(this).addClass("animated");
    // });
    //
    // $('.circle-blip').bind('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(e) {
    //     $(this).removeClass("animated");
    // });


    $('#how-it-works').on( 'click', function(e) {
        e.preventDefault();

        // $('.hidden-integrations').addClass('reveal');
        //  console.log( 'clicked' );

        $(this).next().fadeIn();
        $(this).remove();
    });


});
