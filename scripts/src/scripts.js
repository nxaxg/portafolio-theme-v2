$(document).ready(function(){
    smoothy();
    project();
    sliderAction();
});
function smoothy() {
    "use strict";
    $('a[href*=#]:not([href=#])').click(function () {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') || location.hostname === this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
}

function project(){
    $(".portfolio-proj").hover(function(){
        $(this).children('figcaption').slideToggle(400);
    });
    $(".portfolio-proj figcaption").hide();
}

function sliderAction(){
    $('#slider').unslider({
        autoplay: true,
        delay: 5000,
        arrows: true
    });
}