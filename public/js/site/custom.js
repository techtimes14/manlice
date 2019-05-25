//For resize
$(document).ready(function () {
    $(window).trigger('resize');
    $(window).scroll(function () {
        if ($(this).scrollTop() != 0) {
            $('.navbar-default').addClass('fixed');
        } else {
            $('.navbar-default').removeClass('fixed');
        }
    });
              var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
    
$('.navbar-toggle').on('click', function(){
    $(this).toggleClass("active");
    $("body").toggleClass("pos-change");
});
});


//humberger icon
$(document).on('click', function (event) {
    var $clickedOn = $(event.target),
        $collapsableItems = $('.collapse'),
        isToggleButton = ($clickedOn.closest('.navbar-toggle').length == 1),
        isLink = ($clickedOn.closest('a').length == 1),
        isOutsideNavbar = ($clickedOn.parents('.navbar').length == 0);

    if ((!isToggleButton && isLink) || isOutsideNavbar) {
        $collapsableItems.each(function () {
            $(this).collapse('hide');
        });
    }
});
$(document).ready(function() {
            $(".navbar-toggle.collapsed").click(function() {
                $("#dtx-header-hamburger-toggle").toggleClass("active");
            });
        });

   