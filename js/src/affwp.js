// add loaded class
jQuery(window).load(function($) {
 
  jQuery('body').addClass('loaded');
 // jQuery('.pricing-options').removeClass('animate');

});


(function($){
    $.fn.extend({ 
        rotaterator: function(options) {
 
            var defaults = {
                fadeSpeed: 500,
                pauseSpeed: 100,
				child: null
            };
             
            var options = $.extend(defaults, options);
         
            return this.each(function() {
                  var o =options;
                  var obj = $(this);                
                  var items = $(obj.children(), obj);
				  items.each(function() {$(this).hide();})
				  if(!o.child){var next = $(obj).children(':first');
				  }else{var next = o.child;
				  }
				  $(next).fadeIn(o.fadeSpeed, function() {
						$(next).delay(o.pauseSpeed).fadeOut(o.fadeSpeed, function() {
							var next = $(this).next();
							if (next.length == 0){
									next = $(obj).children(':first');
							}
							$(obj).rotaterator({child : next, fadeSpeed : o.fadeSpeed, pauseSpeed : o.pauseSpeed});
						})
					});
            });
        }
    });
})(jQuery);

jQuery(document).ready(function($) {

  $('.scroll').click(function(event){
    event.preventDefault();
    var offset = $($(this).attr('href')).offset().top;
    $('html, body').animate({scrollTop:offset}, 800);
  });

  // $(function() {
  //   $('a[href*=#]:not([href=#])',':not.mfp-with-anim').click(function() {
  //     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  //       var target = $(this.hash);
  //       target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  //       if (target.length) {
  //         $('html,body').animate({
  //           scrollTop: target.offset().top
  //         }, 1000);
  //         return false;
  //       }
  //     }
  //   });
  // });

  $('.checkout-option').click(function(e) {

     e.preventDefault();
     var price_id = parseInt( $(this).data('price-id') );

     $('.edd_price_options input').each(function() {
       $(this).prop('checked', '');
     });

     console.log( price_id );

     $('#edd_purchase_17 #edd_price_option_17_' + price_id ).prop( 'checked', 'checked' );
     $('#edd_purchase_17').trigger('submit');
  });

  $('#rotate').rotaterator({fadeSpeed:500, pauseSpeed: 5000});
});