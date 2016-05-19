jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MQL = 960;

	//primary navigation slide-in effect
	/*if($(window).width() > MQL) {
		var headerHeight = $('.mobile-header').height();
		$(window).on('scroll',
		{
	        previousTop: 0
	    },
	    function () {
		    var currentTop = $(window).scrollTop();
		    //check if user is scrolling up
		    if (currentTop < this.previousTop ) {
		    	//if scrolling up...
		    	if (currentTop > 0 && $('.mobile-header').hasClass('is-fixed')) {
		    		$('.mobile-header').addClass('is-visible');
		    	} else {
		    		$('.mobile-header').removeClass('is-visible is-fixed');
		    	}
		    } else {
		    	//if scrolling down...
		    	$('.mobile-header').removeClass('is-visible');
		    	if( currentTop > headerHeight && !$('.mobile-header').hasClass('is-fixed')) $('.mobile-header').addClass('is-fixed');
		    }
		    this.previousTop = currentTop;
		});
	}*/

	//open/close primary navigation
	$('.mobile-nav-trigger').on('click', function(){

        var nav = $('.mobile-nav');

        $('.mobile-menu-icon').toggleClass('is-clicked');
        $('.mobile-header').toggleClass('menu-is-open');

        // In firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
        if( nav.hasClass('is-visible') ) {
            nav.removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
                $('body').removeClass('overflow-hidden');
            });
        } else {
            nav.addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
                $('body').addClass('overflow-hidden');
            });
        }
    });
});
