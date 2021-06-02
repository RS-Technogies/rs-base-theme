/* ----------------- Start Document ----------------- */
(function ($) {
    "use strict";

    $(document).ready(function () {

        /*--------------------------------------------------*/
        /*  Mobile Menu - mmenu.js
        /*--------------------------------------------------*/
        $(function () {
            function mmenuInit() {
                var wi = $(window).width();
                if (wi <= '992') {

                    $('#footer').removeClass("sticky-footer");

                    $(".mmenu-init").remove();
                    $("#navigation").clone().addClass("mmenu-init").insertBefore("#navigation").removeAttr('id').removeClass('style-1 style-2').find('ul').removeAttr('id');
                    $(".mmenu-init").find(".container").removeClass("container");

                    $(".mmenu-init").mmenu({
                        "counters": true
                    }, {
                        // configuration
                        offCanvas: {
                            pageNodetype: "#wrapper"
                        }
                    });

                    var mmenuAPI = $(".mmenu-init").data("mmenu");
                    var $icon = $(".hamburger");

                    $(".mmenu-trigger").click(function () {
                        mmenuAPI.open();
                    });

                    mmenuAPI.bind("open:finish", function () {
                        setTimeout(function () {
                            $icon.addClass("is-active");
                        });
                    });
                    mmenuAPI.bind("close:finish", function () {
                        setTimeout(function () {
                            $icon.removeClass("is-active");
                        });
                    });


                }
                $(".mm-next").addClass("mm-fullsubopen");
            }

            mmenuInit();
            $(window).resize(function () {
                mmenuInit();
            });
        });

        /*  User Menu */
        $('.user-menu').on('click', function () {
            $(this).toggleClass('active');
        });


        /*----------------------------------------------------*/
        /*  Sticky Header
        /*----------------------------------------------------*/
        $("#header").not("#header-container.header-style-2 #header").clone(true).addClass('cloned unsticky').insertAfter("#header");
        $("#navigation.style-2").clone(true).addClass('cloned unsticky').insertAfter("#navigation.style-2");

        // Logo for header style 2
        $("#logo .sticky-logo").clone(true).prependTo("#navigation.style-2.cloned ul#responsive");


        // sticky header script
        var headerOffset = $("#header-container").height() * 2; // height on which the sticky header will shows

        $(window).scroll(function () {
            if ($(window).scrollTop() >= headerOffset) {
                $("#header.cloned").addClass('sticky').removeClass("unsticky");
                $("#navigation.style-2.cloned").addClass('sticky').removeClass("unsticky");
            } else {
                $("#header.cloned").addClass('unsticky').removeClass("sticky");
                $("#navigation.style-2.cloned").addClass('unsticky').removeClass("sticky");
            }
        });


        /*----------------------------------------------------*/
        /* Top Bar Dropdown Menu
        /*----------------------------------------------------*/

        $('.top-bar-dropdown').on('click', function (event) {
            $('.top-bar-dropdown').not(this).removeClass('active');
            if ($(event.target).parent().parent().attr('class') == 'options') {
                hideDD();
            } else {
                if ($(this).hasClass('active') && $(event.target).is("span")) {
                    hideDD();
                } else {
                    $(this).toggleClass('active');
                }
            }
            event.stopPropagation();
        });

        $(document).on('click', function (e) {
            hideDD();
        });

        function hideDD() {
            $('.top-bar-dropdown').removeClass('active');
        }


        /*----------------------------------------------------*/

        /*  Inline CSS replacement for backgrounds etc.
        /*----------------------------------------------------*/
        function inlineCSS() {

            // Common Inline CSS
            $(".some-classes, section.fullwidth, .img-box-background, .flip-banner, .property-slider .item, .fullwidth-property-slider .item, .fullwidth-home-slider .item, .address-container").each(function () {
                var attrImageBG = $(this).attr('data-background-image');
                var attrColorBG = $(this).attr('data-background-color');

                if (attrImageBG !== undefined) {
                    $(this).css('background-image', 'url(' + attrImageBG + ')');
                }

                if (attrColorBG !== undefined) {
                    $(this).css('background', '' + attrColorBG + '');
                }
            });

        }

        // Init
        inlineCSS();

        function parallaxBG() {

            $('.parallax').prepend('<div class="parallax-overlay"></div>');

            $(".parallax").each(function () {
                var attrImage = $(this).attr('data-background');
                var attrColor = $(this).attr('data-color');
                var attrOpacity = $(this).attr('data-color-opacity');

                if (attrImage !== undefined) {
                    $(this).css('background-image', 'url(' + attrImage + ')');
                }

                if (attrColor !== undefined) {
                    $(this).find(".parallax-overlay").css('background-color', '' + attrColor + '');
                }

                if (attrOpacity !== undefined) {
                    $(this).find(".parallax-overlay").css('opacity', '' + attrOpacity + '');
                }

            });
        }

        parallaxBG();


        // Slide to anchor
        $('#titlebar .listing-address').on('click', function (e) {
            e.preventDefault();

            $('html, body').animate({
                scrollTop: $($.attr(this, 'href')).offset().top - 40
            }, 600);
        });

        /*----------------------------------------------------*/
        /*  Parallax
        /*----------------------------------------------------*/

        /* detect touch */
        if ("ontouchstart" in window) {
            document.documentElement.className = document.documentElement.className + " touch";
        }
        if (!$("html").hasClass("touch")) {
            /* background fix */
            $(".parallax").css("background-attachment", "fixed");
        }

        /* fix vertical when not overflow
        call fullscreenFix() if .fullscreen content changes */
        function fullscreenFix() {
            var h = $('body').height();
            // set .fullscreen height
            $(".content-b").each(function (i) {
                if ($(this).innerHeight() > h) {
                    $(this).closest(".fullscreen").addClass("overflow");
                }
            });
        }

        $(window).resize(fullscreenFix);
        fullscreenFix();

        /* resize background images */
        function backgroundResize() {
            var windowH = $(window).height();
            $(".parallax").each(function (i) {
                var path = $(this);
                // variables
                var contW = path.width();
                var contH = path.height();
                var imgW = path.attr("data-img-width");
                var imgH = path.attr("data-img-height");
                var ratio = imgW / imgH;
                // overflowing difference
                var diff = 100;
                diff = diff ? diff : 0;
                // remaining height to have fullscreen image only on parallax
                var remainingH = 0;
                if (path.hasClass("parallax") && !$("html").hasClass("touch")) {
                    //var maxH = contH > windowH ? contH : windowH;
                    remainingH = windowH - contH;
                }
                // set img values depending on cont
                imgH = contH + remainingH + diff;
                imgW = imgH * ratio;
                // fix when too large
                if (contW > imgW) {
                    imgW = contW;
                    imgH = imgW / ratio;
                }
                //
                path.data("resized-imgW", imgW);
                path.data("resized-imgH", imgH);
                path.css("background-size", imgW + "px " + imgH + "px");

                let attrBgSize = $(this).attr('data-background-size');

                if(attrBgSize !== undefined){
                    path.css("background-size",attrBgSize);
                }
                else{
                    path.css("background-size", imgW + "px " + imgH + "px");
                }

            });
        }



        $(window).resize(backgroundResize);
        $(window).focus(backgroundResize);
        backgroundResize();

        /* set parallax background-position */
        function parallaxPosition(e) {
            var heightWindow = $(window).height();
            var topWindow = $(window).scrollTop();
            var bottomWindow = topWindow + heightWindow;
            var currentWindow = (topWindow + bottomWindow) / 2;
            $(".parallax").each(function (i) {
                var path = $(this);
                var height = path.height();
                var top = path.offset().top;
                var bottom = top + height;
                // only when in range
                if (bottomWindow > top && topWindow < bottom) {
                    //var imgW = path.data("resized-imgW");
                    var imgH = path.data("resized-imgH");
                    // min when image touch top of window
                    var min = 0;
                    // max when image touch bottom of window
                    var max = -imgH + heightWindow;
                    // overflow changes parallax
                    var overflowH = height < heightWindow ? imgH - height : imgH - heightWindow; // fix height on overflow
                    top = top - overflowH;
                    bottom = bottom + overflowH;


                    // value with linear interpolation
                    // var value = min + (max - min) * (currentWindow - top) / (bottom - top);
                    var value = 0;
                    if ($('.parallax').is(".titlebar")) {
                        value = min + (max - min) * (currentWindow - top) / (bottom - top) * 2;
                    } else {
                        value = min + (max - min) * (currentWindow - top) / (bottom - top);
                    }

                    // set background-position
                    var orizontalPosition = path.attr("data-oriz-pos");
                    orizontalPosition = orizontalPosition ? orizontalPosition : "50%";
                    $(this).css("background-position", orizontalPosition + " " + value + "px");
                }
            });
        }

        if (!$("html").hasClass("touch")) {
            $(window).resize(parallaxPosition);
            //$(window).focus(parallaxPosition);
            $(window).scroll(parallaxPosition);
            parallaxPosition();
        }

        /*----------------------------------------------------*/
        /*  Image Box
        /*----------------------------------------------------*/
        $('.img-box').each(function(){

            // add a photo container
            $(this).append('<div class="img-box-background"></div>');

            // set up a background image for each tile based on data-background-image attribute
            $(this).children('.img-box-background').css({'background-image': 'url('+ $(this).attr('data-background-image') +')'});

            // background animation on mousemove
            // $(this).on('mousemove', function(e){
            //   $(this).children('.img-box-background').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
            // })
        });

        // Jumping background fix for IE
        if (navigator.userAgent.match(/Trident\/7\./)) { // if IE
            $('body').on("mousewheel", function () {
                event.preventDefault();

                var wheelDelta = event.wheelDelta;
                var currentScrollPosition = window.pageYOffset;
                window.scrollTo(0, currentScrollPosition - wheelDelta);
            });
        }

        /*----------------------------------------------------*/
        /*  Back to Top
        /*----------------------------------------------------*/
        var pxShow = 600; // height on which the button will show
        var fadeInTime = 300; // how slow / fast you want the button to show
        var fadeOutTime = 300; // how slow / fast you want the button to hide
        var scrollSpeed = 500; // how slow / fast you want the button to scroll to top.

        $(window).scroll(function () {
            if ($(window).scrollTop() >= pxShow) {
                $("#backtotop").fadeIn(fadeInTime);
            } else {
                $("#backtotop").fadeOut(fadeOutTime);
            }
        });

        $('#backtotop a').on('click', function () {
            $('html, body').animate({scrollTop: 0}, scrollSpeed);
            return false;
        });

        /*----------------------------------------------------*/
        /*  Sticky Footer (footer-reveal.js)
        /*----------------------------------------------------*/

        // disable if IE
        if (navigator.userAgent.match(/Trident\/7\./)) { // if IE
            $('#footer').removeClass("sticky-footer");
        }

        $('#footer.sticky-footer').footerReveal();

// ------------------ End Document ------------------ //
    });

})(this.jQuery);


(function ($) {

    $.fn.footerReveal = function (options) {

        $('#footer.sticky-footer').before('<div class="footer-shadow"></div>');

        var $this = $(this),
            $prev = $this.prev(),
            $win = $(window),

            defaults = $.extend({
                shadow: true,
                shadowOpacity: 0.12,
                zIndex: -10
            }, options),

            settings = $.extend(true, {}, defaults, options);

        $this.before('<div class="footer-reveal-offset"></div>');

        if ($this.outerHeight() <= $win.outerHeight()) {
            $this.css({
                'z-index': defaults.zIndex,
                position: 'fixed',
                bottom: 0
            });

            $win.on('load resize', function () {
                $this.css({
                    'width': $prev.outerWidth()
                });
                $prev.css({
                    'margin-bottom': $this.outerHeight()
                });
            });
        }

        return this;

    };

})(this.jQuery);
