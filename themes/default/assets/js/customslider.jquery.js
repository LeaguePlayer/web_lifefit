!(function($) {

    $.fn.customslider = function(options) {
        if ( this.size() <= 0 )
            return;

        var _this = this,
            opt = $.extend({
                inSpeed: 600,
                outSpeed: 600,
                slideshow: true,
                showHandlers: false,
                duration: 5000
            }, options || {}),
            sliderWidth = this.width(),
            sliderNav = $('.slider-nav', _this),
            slides = [],
            count = 0,
            currentSlide,
            timer = null,
            handlers;

        $('.slide', this).each(function() {
            var index = $(this).index();
            slides[index] = $(this);
            count++;
        });

        if ( opt.showHandlers ) {
            _this.find('.slider-width').append('<div class="handlers">' + '<span class="handler-area"><span class="handler"></span></span>'.repeat(count) + '</div>');
            handlers = $('.handlers .handler', _this);
        }

        var changeSlide = function(index, direction) {
            if ( index === currentSlide )
                return;

            if ( direction === undefined )
                direction = -1;


            // animation baloon
            var description = $('.description', slides[index]).clone();
            var targetLeft = slides[index].offset().left+slides[index].innerWidth()-700;
            var descPos = direction > 0 ? targetLeft - 700 : targetLeft + 700;
            $('.description.active', _this).stop().animate({'left': direction * sliderWidth, opacity: 0}, opt.outSpeed, function() {
                $(this).remove();
            });
            _this.prepend(description);
            description.addClass('active')
                .stop(true, true)
                .css({'left': descPos, 'z-index': '10'})
                .animate({'left': targetLeft, opacity: 1}, opt.inSpeed);
            $('img:visible', _this).fadeOut(opt.outSpeed);
            $('.active', sliderNav).removeClass('active');


            // animation image
            $('img', slides[index]).stop(true, true).fadeIn(opt.inSpeed);
            $('.buttons button:eq('+index+')', slides[index]).addClass('active');
            $('li:eq('+index+')', sliderNav).addClass('active');


            // animation handler
            if ( opt.showHandlers ) {
                prevHandler = handlers.eq(currentSlide);
                currentHandler = handlers.eq(index);
                var floatHandler = $('<span class="float_handler"></span>').css({
                    position: 'absolute',
                    top: 0,
                    left: 10 * direction
                });
                currentHandler.append(floatHandler);

                $('.float_handler', prevHandler).stop(true, true).animate({'left': -10 * direction}, 100, function() {
                    $(this).remove();
                    floatHandler.delay(100).stop(true, true).animate({'left': 0}, 100);
                });
            }
            currentSlide = index;
        }

        var startTimer = function() {
            clearInterval(timer);
            timer = setInterval(function() {
                var ind = currentSlide === undefined ? 1 : currentSlide + 1;
                if ( ind > count - 1 ) {
                    changeSlide(0);
                } else {
                    changeSlide(ind);
                }
            }, opt.duration);
        }


        if ( opt.showHandlers ) {
            $('.handler-area', _this).on('click', function(e) {
                console.log( $(this) );
                clearInterval(timer);
                var index = $(this).index();
                var direction = index > currentSlide ? -1 : 1;
                changeSlide(index, direction);
                if ( opt.slideshow )
                    startTimer();
            });
        }


        $('li', sliderNav).on('click', function() {
            clearInterval(timer);
            var index = $(this).index();
            var direction = index > currentSlide ? -1 : 1;
            changeSlide(index, direction);
            if ( opt.slideshow )
                startTimer();
            return false;
        });

        changeSlide(0);
        if ( opt.showHandlers ) {
            handlers.eq(0).append($('<span class="float_handler"></span>').css({
                position: 'absolute',
                top: 0,
                left: 0
            }));
        }
        if ( opt.slideshow )
            startTimer();
    }

}(jQuery));