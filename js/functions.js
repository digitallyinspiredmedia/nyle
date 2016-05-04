(function($) {

    var Slider = (function () {

        function _Slider(element, settings) {
            this.defaults = {
                slideDuration: '3000',
                speed: 500
                /*
                ,
                arrowRight: '.right-arrow',
                arrowLeft: '.left-arrow'
                */
            };

            this.settings = $.extend({}, this.defaults, settings);

            this.initials = {
                currentSlide: 0,
                $currentSlide: null,
                totalSlides: false,
                cssTransitions: false
            };

            $.extend(this, this.initials);

            this.$el = $(element);

            this.changeSlide = $.proxy(this.changeSlide, this);

            this.init();

        }

        return _Slider;

    })();

    Slider.prototype.init = function () {
        this.cssTransitionTest();
        this.$el.addClass('slider');
        this.build();
        this.events();
        this.activate();
        this.initTimer();
    };

    Slider.prototype.cssTransitionTest = function () {
        var elem = document.createElement('modernizr');

        var props = ['transition', 'WebkitTransition', 'MozTransition', 'OTransition', 'msTransition'];

        for (var i in props) {
            var prop = props[i];
            var result = elem.style[prop] !== undefined ? prop : false;
            if (result) {
                this.cssTransitions = result;
                break;
            }
        }
    };

    Slider.prototype.addCSSDuration = function () {
        var sliderModule = this;

        sliderModule.$el.find('.testimonial-slide').each(function () {

            this.style[sliderModule.cssTransitions + 'Duration'] = sliderModule.settings.speed + 'ms';
        });
    };

    Slider.prototype.removeCSSDuration = function () {
        var sliderModule = this;

        //here we are using 'this' but we can also write sliderModule
        //since we are refering to the same element...shorter and cleaner
        this.$el.find('.testimonial-slide').each(function () {
            this.style[sliderModule.cssTransitions + 'Duration'] = '';
        });
    };


    //create indicator dots below which also have the functionality
    //as the arrows
    Slider.prototype.build = function () {
        var $indicators = this.$el.append("<ul class='dots-wrapper'>").find('.dots-wrapper');
        this.totalSlides = this.$el.find('.testimonial-slide').length;
        for (var i = 0; i < this.totalSlides; i++) {
            $indicators.append("<li data-index=" + i + ">");
        }
    };

    Slider.prototype.activate = function () {
        this.$currentSlide = this.$el.find('.testimonial-slide').eq(0);
        this.$el.find('.dots-wrapper li').eq(0).addClass('active');
    };

    Slider.prototype.events = function () {
        $('body')
            .on('click', this.settings.arrowRight, {
            direction: 'right'
        }, this.changeSlide)
            .on('click', this.settings.arrowLeft, {
            direction: 'left'
        }, this.changeSlide)
            .on('click', '.dots-wrapper li', this.changeSlide);
    };

    Slider.prototype.clearTimer = function () {
        if (this.timer) {
            clearInterval(this.timer);
        }
    };

    Slider.prototype.initTimer = function () {
        this.timer = setInterval(
        this.changeSlide, this.settings.slideDuration);
    };

    Slider.prototype.startTimer = function () {
        this.initTimer();
        this.throttle = false;
    };

    Slider.prototype.changeSlide = function (e) {
        if (this.throttle) {
            return;
        }
        this.throttle = true;

        this.clearTimer();

        var direction = this._direction(e);

        var animate = this._next(e, direction);
        if (!animate) {
            return;
        }

        var $nextSlide = this.$el.find('.testimonial-slide').eq(this.currentSlide).addClass(direction + ' active');

        if (!this.csstransitions) {
            this._jsAnimation($nextSlide, direction);
        } else {
            this._cssAnimation($nextSlide, direction);
        }
    };

    Slider.prototype._direction = function (e) {
        var direction;
        if (typeof e !== 'undefined') {
            direction = (typeof e.data === 'undefined' ? 'right' : e.data.direction);
        } else {
            direction = 'right';
        }
        return direction;
    };

    Slider.prototype._next = function (e, direction) {
        var index = (typeof e !== 'undefined' ? $(e.currentTarget).data('index') : undefined);
        switch (true) {
            case (typeof index !== 'undefined'):
                if (this.currentSlide == index) {
                    this.startTimer();
                    return false;
                }
                this.currentSlide = index;
                break;
            case (direction == 'right' && this.currentSlide < (this.totalSlides - 1)):
                this.currentSlide++;
                break;
            case (direction == 'right'):
                this.currentSlide = 0;
                break;
            case (direction == 'left' && this.currentSlide === 0):
                this.currentSlide = (this.totalSlides - 1);
                break;
            case (direction == 'left'):
                this.currentSlide--;
                break;
        }
        return true;
    };

    Slider.prototype._cssAnimation = function ($nextSlide, direction) {
        setTimeout(function () {
            this.$el.addClass('transition');
            this.addDuration();
            this.$currentSlide.addClass('shift' + direction);
        }.bind(this), 100);

        setTimeout(function () {
            this.$el.removeClass('transition');
            this.removeCSSDuration();
            this.$currentSlide.removeClass('active shift-left shift-right');
            this.$currentSlide = $nextSlide.removeClass(direction);
            this._updateIndicators();
            this.startTimer();
        }.bind(this), 100 + this.settings.speed);
    };

    Slider.prototype._jsAnimation = function ($nextSlide, direction) {
        var sliderModule = this;

        if (direction == 'right') {
            sliderModule.$currentSlide.addClass('js-reset-left');
        }
        var animation = {};
        animation[direction] = '0%';

        var animationPrev = {};
        animationPrev[direction] = '100%';

        this.$currentSlide.animate(animationPrev, this.settings.speed);

        $nextSlide.animate(animation, this.settings.speed, 'swing', function () {
            sliderModule.$currentSlide.removeClass('active js-reset-left').attr('style', '');
            sliderModule.$currentSlide = $nextSlide.removeClass(direction).attr('style', '');
            sliderModule._updateIndicators();
            sliderModule.startTimer();
        });
    };

    Slider.prototype._updateIndicators = function () {
        this.$el.find('.dots-wrapper li').removeClass('active').eq(this.currentSlide).addClass('active');
    };

    $.fn.Slider = function (options) {
        return this.each(function (index, el) {
            el.Slider = new Slider(el, options);
        });
    };
})(jQuery);

var args = {
    arrowRight: '.right-arrow',
    arrowLeft: '.left-arrow',
    speed: 500,
    slideDuration: 3000
};

jQuery('.testimonial').Slider(args);



var biggestHeight = "0";
jQuery(".testimonial .testimonial-ul > .testimonial-slide.active").each(function(){
    if ($(this).height() > biggestHeight ) {
      biggestHeight = $(this).height()
    }
});

jQuery(".testimonial .testimonial-ul").height(biggestHeight);
