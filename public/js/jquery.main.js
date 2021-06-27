// page init
$(document).ready(function() {

	"use strict";
	
	initAddClass();
	// Add Class  init
	function initAddClass() {
		"use strict";
		
		jQuery('.setting-drop-opener').on( "click", function(e){
			e.preventDefault();
			jQuery("body").toggleClass("cart-dropdown-active");
		});
		jQuery('.cart-drop-opener').on( "click", function(e){
			e.preventDefault();
			jQuery("body").toggleClass("cart-drop-active");
		});
		jQuery('.search-opener').on( "click", function(e){
			e.preventDefault();
			jQuery("body").toggleClass("search-active");
		});
		jQuery('.nav-opener').on( "click", function(e){
			e.preventDefault();
			jQuery("body").toggleClass("nav-active");
		});
		jQuery('.drop-open').on( "click", function(e){
			e.preventDefault();
			jQuery("#nav > ul > li").toggleClass("drop-active");
		});
	}

	initCustomForms();
	// initialize custom form elements
	function initCustomForms() {
		jcf.replaceAll();
	}


	initSlickSlider();
	// Slick Slider init
	function initSlickSlider() {
		"use strict";

		jQuery('.deal-slider').slick({
			dots: true,
			speed: 800,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: false,
			arrows: false,
			autoplaySpeed: 2000
		});
		jQuery('.main-slider').slick({
			dots: false,
			speed: 800,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: true,
			arrows: true,
			fade: true,
			autoplaySpeed: 4000
		});
		jQuery('.portfolio-slider').slick({
			dots: false,
			speed: 800,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: true,
			arrows: true,
			autoplaySpeed: 2000,
			asNavFor: '.pagg-slider'
		});
		jQuery('.pagg-slider').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			asNavFor: '.portfolio-slider, .product-slider',
			focusOnSelect: true
		});
		jQuery('.product-slider').slick({
			dots: false,
			speed: 800,
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			autoplay: true,
			arrows: false,
			autoplaySpeed: 2000,
			asNavFor: '.pagg-slider'
		});
	}

	initAccordion();
	// accordion menu init
	function initAccordion() {
		jQuery('.accordion').slideAccordion({
			opener: '.opener',
			slider: '.slide',
			animSpeed: 300
		});
	}
	
	initFancybox();
	// lightbox init
	function initFancybox() {
		jQuery('a.lightbox, [data-fancybox]').fancybox({
			parentEl: 'body',
			margin: [50, 0]
		});
		jQuery("#newsletter-hiddenlink").fancybox().trigger('click');
	}

	initTouchNav();
	// handle dropdowns on mobile devices
	function initTouchNav() {
		jQuery('#nav').each(function() {
			new TouchNav({
				navBlock: this
			});
		});
	}

	initCountDown();
	// count down init
	function initCountDown() {
		var newDate = new Date(2019, 1, 28);
		
		jQuery("#defaultCountdown").countdown({until: newDate});
	}
	
	initbackTop();
	// backtop init
	function initbackTop() {
	  "use strict";

	  var jQuerybackToTop = jQuery("#back-top");
	  jQuery(window).on('scroll', function() {
	      if (jQuery(this).scrollTop() > 100) {
	          jQuerybackToTop.addClass('active');
	      } else {
	          jQuerybackToTop.removeClass('active');
	      }
	  });
	  jQuerybackToTop.on('click', function(e) {
	      jQuery("html, body").animate({scrollTop: 0}, 900);
	  });
	}

	initStickyScrollBlock();
	// initialize fixed blocks on scroll
	function initStickyScrollBlock() {
		ResponsiveHelper.addRange({
			'768..': {
				on: function() {
					jQuery('.nav-holder').stickyScrollBlock({
						setBoxHeight: true,
						activeClass: 'sticky',
						positionType: 'fixed',
						extraTop: function() {
							var totalHeight = 0;
							jQuery('0').each(function() {
								totalHeight += jQuery(this).outerHeight();
							});
							return totalHeight;
						}
					});
				},
				off: function() {
					jQuery('.nav-holder').stickyScrollBlock('destroy');
				}
			}
		});
	}

	jQuery('.img-col').tilt({
		maxTilt: 1,
	});


});


jQuery(window).on('load', function() {

	"use strict";

	new WOW().init();
	
	jQuery( "#loader" ).delay( 600 ).fadeOut( 300 );

	initIsoTop();
	// IsoTop init
	function initIsoTop() {

		"use strict";
		// Isotope init
		var isotopeHolder = jQuery('#feature-holder'),
			win = jQuery(window);
		jQuery('.filter-list a').on( "click", function(e){
			e.preventDefault();
			
			jQuery('.filter-list li').removeClass('active');
			jQuery(this).parent('li').addClass('active');
			var selector = jQuery(this).attr('data-filter');
			isotopeHolder.isotope({ filter: selector });
		});
		jQuery('#feature-holder').isotope({
			layoutMode: 'masonry',
			itemSelector: '.item-col',
			// percentPosition: true,
			masonry: {
				columnWidth: '.grid-sizer'
			}
		});
	}

});