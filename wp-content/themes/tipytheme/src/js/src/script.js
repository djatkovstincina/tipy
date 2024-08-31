jQuery(document).ready(function ($) {
    
    var slickSliders = {

        init: function () {
            slickSliders.testimonialSlider();
        },

        testimonialSlider: function () {
            var testimonialSlider = $('.testimonials-slider');
            var PROPERTIES = {
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 14000,
                dots: true,
                infinite: true,
                arrows: true,
                pauseOnFocus: false,
                pauseOnHover: false,
                slide: '.testimonials-item',
                speed: 600,
                prevArrow: '<button type="button" class="slick-prev"><svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 12c0-.517.416-.936.93-.936h23.115c.513 0 .929.419.929.936a.933.933 0 0 1-.93.936H.93A.933.933 0 0 1 0 12Z" fill="#231F20"/><path d="M0 12c0-.283.127-.551.346-.729L8.05 5.007a.924.924 0 0 1 1.306.141.941.941 0 0 1-.14 1.317L2.408 12l6.808 5.535c.399.324.462.914.14 1.316a.924.924 0 0 1-1.306.141L.346 12.728A.94.94 0 0 1 0 12Z" fill="#231F20"/></svg></button>',
                nextArrow: '<button type="button" class="slick-next"><svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M25 12a.933.933 0 0 0-.93-.936H.956A.933.933 0 0 0 .026 12c0 .517.416.936.93.936H24.07c.513 0 .928-.42.928-.936Z" fill="#231F20"/><path d="M25 12a.939.939 0 0 0-.346-.729L16.95 5.007a.924.924 0 0 0-1.306.141.941.941 0 0 0 .14 1.317L22.592 12l-6.808 5.535a.941.941 0 0 0-.14 1.316.924.924 0 0 0 1.306.141l7.704-6.264A.939.939 0 0 0 25 12Z" fill="#231F20"/></svg></button>',
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
                        }
                    }
                ]
            };
            testimonialSlider.slick(PROPERTIES);
        },
    };

    /**
     * Collection of useful site functions
     * @type {{init: init, smoothScroll: smoothScroll}}
     */
    var siteFunctions = {
        init: function () {
            siteFunctions.smoothScroll();
        },
        /**
         * Smooth Scroll function for anchor clicks
         */
        smoothScroll: function () {
            $('a[href*="#"]').click(function () {
                var target = $(this.hash);
                if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                    target = target.length ? target : $('[name="' + this.hash.slice(1) + '"]');
                    if (target.length) {
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - 75
                        }, 1000);
                        return false;
                    }
                }
            });
        }
    };

    $(document).ready(function () {
        slickSliders.init();
        siteFunctions.init();
    });
});