(function ($) {
    "use strict";

	


    /*----------------------------------------
	   Sticky Menu Activation
	------------------------------------------*/

	$(window).on('scroll', function () {
		if ($(this).scrollTop() > 350) {
			$('.header-sticky').addClass('sticky');
		} else {
			$('.header-sticky').removeClass('sticky');
		}
	});
	
	/*-----------------------------------------
		Off Canvas Mobile Menu
	-------------------------------------------*/

	$(".header-action-btn-menu").on('click', function () {
		$("body").addClass('fix');
		$(".mobile-menu-wrapper").addClass('open');
	});

	$(".offcanvas-btn-close,.offcanvas-overlay").on('click', function () {
		$("body").removeClass('fix');
		$(".mobile-menu-wrapper").removeClass('open');
    });

    /*-----------------------------------------
		Off Canvas Search
	-------------------------------------------*/

	$(".header-action-btn-search").on('click', function () {
		$("body").addClass('fix');
		$(".offcanvas-search").addClass('open');
	});

	$(".offcanvas-btn-close,.body-overlay").on('click', function () {
		$("body").removeClass('fix');
		$(".offcanvas-search").removeClass('open');
	});
	
	/*-----------------------------------------
		Off Canvas Mobile Menu
	-------------------------------------------*/

	$(".header-action-btn-cart").on('click', function () {
		$("body").addClass('fix');
		$(".cart-offcanvas-wrapper").addClass('open');
	});

	$(".offcanvas-btn-close,.offcanvas-overlay").on('click', function () {
		$("body").removeClass('fix');
		$(".cart-offcanvas-wrapper").removeClass('open');
    });
    
    /*----------------------------------------
		Responsive Mobile Menu
	------------------------------------------*/

	//Variables
	var $offCanvasNav = $('.mobile-menu, .category-menu'),
	$offCanvasNavSubMenu = $offCanvasNav.find('.dropdown');

	//Close Off Canvas Sub Menu
	$offCanvasNavSubMenu.slideUp();

	//Category Sub Menu Toggle
	$offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
	var $this = $(this);
		if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
			e.preventDefault();
			if ($this.siblings('ul:visible').length){
				$this.parent('li').removeClass('active');
				$this.siblings('ul').slideUp();
			} else {
				$this.parent('li').addClass('active');
				$this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
				$this.closest('li').siblings('li').find('ul:visible').slideUp();
				$this.siblings('ul').slideDown();
			}
		}
	});
    
    /*----------------------------------------
	   Slider Activation
	------------------------------------------*/

	/* Hero Slider Activation */
    var swiper = new Swiper('.hero-slider .swiper-container', {
        loop: true,
        speed: 1150,
        spaceBetween: 30,
        slidesPerView: 1,
		effect: 'fade',
		pagination: true,
		navigation: true,


        // Navigation arrows
        navigation: {
            nextEl: '.hero-slider .home-slider-next',
            prevEl: '.hero-slider .home-slider-prev'
        },
        pagination: {
            el: '.hero-slider .swiper-pagination',
			type: 'bullets',
			clickable: 'true'
		},
		// Responsive breakpoints
	});
	
	
	
	/*----------------------------------------*/
	/*  Countdown
	/*----------------------------------------*/

	$('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
			$this.html(event.strftime('<div class="single-countdown"><span class="single-countdown_time">%D</span><span class="single-countdown_text">Days</span></div><div class="single-countdown"><span class="single-countdown_time">%H</span><span class="single-countdown_text">Hours</span></div><div class="single-countdown"><span class="single-countdown_time">%M</span><span class="single-countdown_text">Min</span></div><div class="single-countdown"><span class="single-countdown_time">%S</span><span class="single-countdown_text">Sec</span></div>'));
		});
	});

	/*----------------------------------------
		Aos Activation Js
	------------------------------------------*/

	AOS.init({
		duration: 1500, // values from 0 to 3000, with step 50ms
		disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
		offset: 0, // offset (in px) from the original trigger point
		once: true,
		easing: 'ease',
	});

	/*----------------------------------------*/
	/*  Shop Grid Activation
	/*----------------------------------------*/

	$('.shop_toolbar_btn > button').on('click', function (e) {
	
		e.preventDefault();
		
		$('.shop_toolbar_btn > button').removeClass('active');
		$(this).addClass('active');
		
		var parentsDiv = $('.shop_wrapper');
		var viewMode = $(this).data('role');
		
		
		parentsDiv.removeClass('grid_3 grid_4 grid_5 grid_list').addClass(viewMode);

		if(viewMode == 'grid_3'){
			parentsDiv.children().addClass('col-lg-4 col-md-4 col-sm-6').removeClass('col-lg-3 col-cust-5 col-12');
			
		}

		if(viewMode == 'grid_4'){
			parentsDiv.children().addClass('col-xl-3 col-lg-4 col-md-4 col-sm-6').removeClass('col-lg-4 col-cust-5 col-12');
		}
		
		if(viewMode == 'grid_list'){
			parentsDiv.children().addClass('col-12').removeClass('col-xl-3 col-lg-3 col-lg-4 col-md-6 col-md-4 col-sm-6 col-cust-5');
		}
			
	});

	/*----------------------------------------*/
	/*  Nice Select
	/*----------------------------------------*/

	$(document).on('ready', function () {
		$('.nice-select').niceSelect();
	});

	

	



	/*-----------------------------------------
		Sticky Sidebar Activation
	-------------------------------------------*/

	$('#sticky-sidebar').theiaStickySidebar({
		// Settings
		additionalMarginTop: 150
	});

	/*----------------------------------------*/
	/* Toggle Function Active
	/*----------------------------------------*/

	// showlogin toggle
	$('#showlogin').on('click', function () {
		$('#checkout-login').slideToggle(500);
	});
	// showlogin toggle
	$('#showcoupon').on('click', function () {
		$('#checkout_coupon').slideToggle(500);
	});
	// showlogin toggle
	$('#cbox').on('click', function () {
		$('#cbox-info').slideToggle(500);
	});

	// Ship box toggle
	$('#ship-box').on('click', function () {
		$('#ship-box-info').slideToggle(1000);
	});
	/*---------------------------------
        Scroll Up
    -----------------------------------*/
    function scrollToTop() {
        var $scrollUp = $('#scroll-top'),
            $lastScrollTop = 0,
            $window = $(window);

        $window.on('scroll', function () {
            var st = $(this).scrollTop();
            if (st > $lastScrollTop) {
                $scrollUp.removeClass('show');
            } else {
                if ($window.scrollTop() > 200) {
                    $scrollUp.addClass('show');
                } else {
                    $scrollUp.removeClass('show');
                }
            }
            $lastScrollTop = st;
        });

        $scrollUp.on('click', function (evt) {
            $('html, body').animate({scrollTop: 0}, 600);
            evt.preventDefault();
        });
    }
	scrollToTop();
	
	
	  
})(jQuery);

