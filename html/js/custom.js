$(function () {
	$('body').removeClass('clicked'); 
	lazy(); 
	/*-------------------------------------STICKY_NAV--GO_TO_TOP-------------------------*/
	var previousScroll 	= 0,
		headMainHeight 	= $('.header_main').height(),
		headerOrgOffset = $('.header_main').offset().top + headMainHeight; 
	
	$(window).scroll(function () {
		var currentScroll = $(this).scrollTop();
		
        if(currentScroll > headerOrgOffset ) {
            if (currentScroll > previousScroll) {
                $('body').removeClass('fixed');
            } else {
                $('body').addClass('sticky fixed');
            }
        }
        else{
            $('body').removeClass('sticky fixed');
        }      
         
        previousScroll = currentScroll;
		
		if ($(this).scrollTop() > 200) {
			$('.scrollup').fadeIn();
		} else {
			$('.scrollup').fadeOut();
		}
	});
	$('.scrollup').click(function (e) {
        e.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, 300);
		return false;
	});

	/*-------------------------------------ACTICE_NAV------------------------------------*/
/* 	var loc 	= window.location.href;
	loc 		= loc.split(SITE_LOC_PATH+'/');
	loc 		= loc[1].split('/');
	var newLoc 	= (loc.length > 2) ? SITE_LOC_PATH + loc[loc.length - 2] + '/' : window.location.href;

	for (var o = $(".nav_menu ul a, .fnav ul a").filter(function () {return this.href == newLoc;}).addClass("active").parent().addClass("active");;) {
		if (!o.is("li")) break;
		o = o.parent().addClass("in").parent().addClass("active");
	} */

	/*-------------------------------------RESPONSIVE_NAV--------------------------------*/
	var nav = $(".nav_menu").html();
	$(".responsive_nav").append(nav);
	if($(".responsive_nav").children('ul').length) {
		$(".responsive_nav").addClass('mCustomScrollbar');
		$('.mCustomScrollbar').mCustomScrollbar({scrollbarPosition: "outside"});
	}
    
    $('.responsive_btn').click(function () {
        $('html').addClass('responsive');
    });
    $('.bodyOverlay').click(function () {
        if ($('html.responsive').length)
            $('html').removeClass('responsive');
    });
    
    $(document).on('click', '.subarrow', function () {
        $(this).parent().siblings().find('.sub-menu').slideUp();
        $(this).parent().siblings().removeClass('opened');

        $(this).siblings('.sub-menu').slideToggle();
        $(this).parent().toggleClass('opened');
	});

	/*-------------------------------------WIDGET----------------------------------------*/
    $('.wform').click(function (event) {
		$('.widget_form').slideToggle(300);
	});
	$('.wmap').click(function () {
		var ahref = $(this).data('href');
		window.location.href = ahref;
	});
	
	/*-------------------------------------TABLE_WRAP------------------------------------*/
    $('table').each(function () {
        if (!$(this).parent().hasClass('table-responsive')) {
            $(this).wrap('<div class="table-responsive"></div>');
        }
    }); 

	/*-------------------------------------CUSTOM_SCROLLBAR------------------------------*/
	$('.mCustomScrollbar').mCustomScrollbar({scrollbarPosition: "outside"});

	/*-------------------------------------STICKY_SIDEBAR--------------------------------*/
	$('.stickySidebar, .stickyContent').theiaStickySidebar({additionalMarginTop: 60});

	/*-------------------------------------YOUTUBE_POPUP---------------------------------*/
	if($(".popup-youtube").length > 0){
		$(".popup-youtube").YouTubePopUp( { autoplay: 1 } );
	}

	/*-------------------------------------NUMBERS_ONLY----------------------------------*/
    $('.numbersOnly').on("keyup", function () {
        this.value = this.value.replace(/[^0-9\,.]/g, '');
    });

	/*-------------------------------------DATEPICKER------------------------------------*/
    if($('[type="date"]').length) {
		if ( $('[type="date"]').prop('type') != 'date' ) {
			$('[type="date"]').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: "yy-mm-dd",
				yearRange: "c-0:c+10"
			});
		}
	}

	/*-------------------------------------HOME_SLIDER-----------------------------------*/
	$(".homeslider").owlCarousel({ 
		items: 1,
		loop: true,
		autoplay: true,
		autoplayHoverPause: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		margin: 1,
		dots: false,
		nav: true,
		animateOut: 'slideInUp',
		navElement: 'div',
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		lazyLoad: true,
		responsive: {
			0: { items: 1 },
			480: { items: 1 },
			600: { items: 1 },
			768: { items: 1 },
			992: { items: 1 },
			1600: { items: 1 }
		},
		
	});

	/*-------------------------------------PRODUCT_SLIDER--------------------------------*/
	$(".testi_slider").owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		margin: 30,
		dots: false,
		nav: true,
		navElement: 'div',
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		lazyLoad: true,
		responsive: {
			0: { items: 1 },
			480: { items: 1 },
			600: { items: 1 },
			768: { items: 1 },
			992: { items: 1 },
			1600: { items: 1 }
		}, 
	});
/*-------------------------------------FAQ--------------------------------*/
	$(".sk_toggle .sk_box > .sk_ques").bind("click", function () {
		if ($(this).parent().hasClass('opened')) {
			$(this).parent().siblings().removeClass('opened');
			$(this).parent().siblings().children(".sk_ans").slideUp(300);
			$(this).parent().removeClass('opened');
			$(this).next('.sk_ans').slideUp(300);
			return false;
		} else {
			$(this).parent().siblings().removeClass('opened');
			$(this).parent().siblings().children(".sk_ans").slideUp(300);
			$(this).parent().addClass('opened');
			$(this).next('.sk_ans').slideDown(300);
			return false;
		}
	})

	/*-------------------------------------news_slider--------------------------------*/
	$(".news_slider").owlCarousel({
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 3000,
		smartSpeed: 1000,
		margin: 30,
		dots: false,
		nav: true,
		navElement: 'div',
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		lazyLoad: true,
		responsive: {
			0: { items: 1 },
			480: { items: 1 },
			600: { items: 1 },
			768: { items: 1 },
			992: { items: 1 },
			1600: { items: 1 }
		}, 
	});
	
});

function lazy(){
    $(".lazy").lazyload({
        effect: 'fadeIn',
        delay: 1000
    });
}
