$(window).load(function() {
    /*-------------------------------------HOME_SLIDER-------------------------------------*/
	$(".homeslider").owlCarousel({
    	items: 1,
    	loop: true,
        autoplay: true,
		margin: 1,
		dots: true,
		nav: false,
		navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		responsive: {
			0: {
				items: 1
			},
			480: {
				items: 1
			},
			600: {
				items: 1
			},
			768: {
				items: 1
			},
			1024: {
				items: 1
			},
			1600: {
				items: 1
			}
		},
	});
});

$(function () {

	/*-------------------------------------ANNIMATION_WAYPOINT-------------------------------------*/
    if ($('.scroll_effect')) {
        var arrayElements = [],
            isMobile = {
                Android: function () {
                    return navigator.userAgent.match(/Android/i);
                },
                BlackBerry: function () {
                    return navigator.userAgent.match(/BlackBerry/i);
                },
                iOS: function () {
                    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                },
                Opera: function () {
                    return navigator.userAgent.match(/Opera Mini/i);
                },
                Windows: function () {
                    return navigator.userAgent.match(/IEMobile/i);
                },
                any: function () {
                    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                }
            },
            effectsOnMobiles = false,
            doAnimations = false;
        if (isMobile.any() && effectsOnMobiles) doAnimations = true;
        if (isMobile.any() && !effectsOnMobiles) doAnimations = false;
        if (!isMobile.any()) doAnimations = true;

        function wayjs(link, effect, delay_e) {

            if (doAnimations) {

                link.css('opacity', '0');

                var Animate_effect = false;

                link.waypoint({
                    handler: function () {
                        animate_effect(link, Animate_effect, effect, delay_e);
                    },
                    offset: '100%',
                    triggerOnce: true
                }, function () {
                    $.waypoints("refresh");
                });
            }
        }

        function animate_effect(link, Animate_effect, effect, delay_e) {
            if (Animate_effect === false) {
                setTimeout(function () {
                    link.addClass('animated ' + effect);
                    link.css('opacity', '1');
                }, delay_e);

            }
            Animate_effect = true;
        }

        $('.scroll_effect').each(function () {
            $(this).show();
            var effect = $(this).attr('data-effect'),
                delay_e = $(this).attr('data-delay');
            if (delay_e == "") delay_e = 0;
            wayjs($(this), effect, delay_e);
        });
    }


	/*-------------------------------------GO_TO_TOP-------------------------------------*/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 300);
        return false;
    });


	/*-------------------------------------STICKY_NAV-------------------------------------*/
	if ($('.nav_wrapper').length) {
		var stickyNavTop = $('.nav_wrapper').offset().top,
            stickyNav = function () {
                var scrollTop = $(window).scrollTop();

                if (scrollTop > stickyNavTop) {
                    $('body').addClass('sticky');
                } else {
                    $('body').removeClass('sticky');
                }
            };
        stickyNav();

        $(window).scroll(function () {
            stickyNav();
        });
	}


	/*-------------------------------------TABLE_WRAP-------------------------------------*/
    $('table').each(function(){
        if( !$(this).parent().hasClass('table-responsive') ){
            $(this).wrap('<div class="table-responsive"></div>');
        }
    });

    
    /*-------------------------------------LEFT_RIGHT_CONTAINER-------------------------------------*/
	var $window = $(window);
	function resize() {
		var w = $window.width(),
            h = $window.height(),
            header = $('header').outerHeight(),
            footer = $('footer').outerHeight(),
            mainContainer = h - (header + footer),
            c = $('.container').outerWidth(),
            l = $('.sectionOdd .cont_left').outerWidth(),
            lh = $('.sectionOdd .cont_right').outerHeight(),
            
            r = $('.sectionEven .cont_right').outerWidth(),
            rh = $('.sectionEven .cont_right').outerHeight();
		var rw = (c - l) + (w - c) / 2;
		var lw = (c - r) + (w - c) / 2;
        $('.mainContainer').css('min-height', mainContainer);
		$('.sectionOdd .cont_right_bg').css({'width': rw});
		//$('.sectionOdd .cont_left').css({'height': lh});
        
		$('.sectionEven .cont_right_bg').css({'width': lw});
		$('.sectionEven .cont_left').css({'height': rh});
        
        //console.log(c+' - '+l+' x '+lh+' - '+r+' x '+rh+' - '+rw+' - '+lw)
	}
	$window.resize(resize).trigger('resize');
    
    
    /*-------------------------------------YOUTUBE_POPUP-------------------------------------*/
	if($(".popup-youtube").length > 0){
		$(".popup-youtube").YouTubePopUp();
		//$(".popup-youtube").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
	}
    
    
    /*-------------------------------------FORM_POPUP-------------------------------------*/
    $('.findAgentLink').click(function(){
        var hashEle = $(this).attr('href').split('#');
		if (hashEle.length > 1) {
            if (hashEle[1] == 'top')
                $('body, html').animate({scrollTop: 0},500);
            else
                jQuery('body, html').animate({scrollTop: $('#'+ hashEle[1]).offset().top - 50},500);
        };
    });
    // find element from url
	hashname = window.location.hash.replace('#', '');
	elem = $('#' + hashname);
	if(hashname.length > 1) {
		if(hashname == 'top')
		  $('body, html').animate({scrollTop: 0},200);
		else
		 $('body, html').animate({scrollTop: $(elem).offset().top - 50},500);
	};
    
    /*$('.clsprotype').click(function(){
        $.fancybox([ { href : '#formStep' } ]);
    });*/
    
    
    /*-------------------------------------HOW_IT_WORKS-------------------------------------*/
    $('.workSteps .editor_text').mCustomScrollbar({scrollbarPosition: "outside"});
    
    
    /*-------------------------------------RESPONSIVE_MENU-------------------------------------*/
    var ht = $(".nav_menu > ul").html();
    $(".sidebar-menu").append(ht);
    //$(".sidebar-menu").prepend('<li><a href="">Home</a></li>');

    $(document).on('click', '.subarrow', function () {
        $(this).siblings('ul').slideToggle();
        $(this).parent().toggleClass('active');
        $(this).toggleClass('opened');
    });
	
});