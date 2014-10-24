// add loaded class
jQuery(window).load(function($) {
   $('body').addClass('loaded');
   $('.checkout-option').click(function(e) {
      e.preventDefault();
      var price_id = $(this).data('price-id');
      $('#edd_purchase_form_17 #edd_price_option_17').each(function() {
        $(this).attr('checked', false);
      });
      $('#edd_purchase_form_17 #edd_price_option_17_' + price_id ).attr( 'checked', true );
      $('#edd_purchase_form_17').trigger('submit');
   });
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
  $('#rotate').rotaterator({fadeSpeed:500, pauseSpeed: 5000});
});