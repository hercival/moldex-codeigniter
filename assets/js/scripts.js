$( document ).ready(function() {
	var wi = $(window).width(); // Stores the numerical value of the width into the variable "wi"


    $('.thumbnail').hover(
        function(){
            $(this).find('.news-caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.news-caption').slideUp(250); //.fadeOut(205)
        })

    $('.gallery').flickity({
		contain: true,
		wrapAround: true
	});
});

// thumbnails.carousel.js jQuery plugin
;(function(window, $, undefined) {

    var conf = {
        center: true,
        backgroundControl: false
    };

    var cache = {
        $carouselContainer: $('.thumbnails-carousel').parent(),
        $thumbnailsLi: $('.thumbnails-carousel li'),
        $controls: $('.thumbnails-carousel').parent().find('.carousel-control')
    };

    function init() {
        cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
        cache.$thumbnailsLi.first().addClass('active-thumbnail');

        if(!conf.backgroundControl) {
            cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
        }
        else {
            cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
        }

        if(conf.center) {
            cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
        }
    }

    function refreshOpacities(domEl) {
        cache.$thumbnailsLi.removeClass('active-thumbnail');
        cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
    }   

    function bindUiActions() {
        cache.$carouselContainer.on('slide.bs.carousel', function(e) {
            refreshOpacities(e.relatedTarget);
        });

        cache.$thumbnailsLi.click(function(){
            cache.$carouselContainer.carousel($(this).index());
        });
    }

    $.fn.thumbnailsCarousel = function(options) {
        conf = $.extend(conf, options);

        init();
        bindUiActions();

        return this;
    }

})(window, jQuery);

$('.thumbnails-carousel').thumbnailsCarousel();



