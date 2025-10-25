'use strict';
(function ($) {
    /**
     * Sanity Slider
     * Version: 2.4.10 (14/10/2019)
     * https://checksanity.ru
     */
    $.fn.sanitySlider = function (parameters) {
        $(this).each(function () {
            new sanitySliderClass($(this), parameters)
        })
    };
    let sanitySliderClass = function (slider, params) {
        let options = {
            itemsPerSlide: 1,
            itemMargin: 20,
            itemWidth: null,
            controlArrows: true,
            controlArrowsClass: '',
            controlDots: false,
            loop: false,
            slideByItem: false,
            height: null,
            tablet: {itemsPerSlide: 1, itemMargin: 10, itemWidth: null},
            mobile: {itemsPerSlide: 1, itemMargin: 8, itemWidth: null},
            mobile_s: {itemsPerSlide: 1, itemMargin: 5, itemWidth: null},
            id: 'default',
            autoHeight: false
        };
        let vars = {
            slideByItem: false,
            itemsPerSlide: 2,
            itemMargin: 20,
            responsive: false,
            startIdx: 0,
            endIdx: 0,
            rewind: 0,
            itemWidth: null,
            auto: false,
        };
        let elNextButton, elPrevButton;
        let elDots;
        let elContent;
        let mContentWidth;
        let elSlides;
        let mSlidesCount;
        let mIdx;
        this.construct = function (slider, params) {
            if (params) {
                $.extend(options, params);
            }
            slider.addClass('sanity_slider');
            if ($('> .sanity_slider__control', slider).length) {
                elPrevButton = $('> .sanity_slider__control .sanity_slider__arrow.sanity_slider__arrow_left', slider);
                elNextButton = $('> .sanity_slider__control .sanity_slider__arrow.sanity_slider__arrow_right', slider);
            } else {
                let control = $('<div class="sanity_slider__control"></div>').appendTo(slider);
                if (options.controlArrows) {
                    elPrevButton = $('<a class="sanity_slider__arrow ' + options.controlArrowsClass + ' sanity_slider__arrow_left"></a>').appendTo(control);
                    elNextButton = $('<a class="sanity_slider__arrow ' + options.controlArrowsClass + ' sanity_slider__arrow_right"></a>').appendTo(control);
                }
            }
            if (options.controlDots) {
                elDots = $('<div class="dots"></div>').appendTo(slider);
            }
            elContent = $('> .sanity_slider__content', slider);
            elContent.wrapInner('<div class="sanity_slider__content__slides"></div>');
            elSlides = $('> .sanity_slider__content__slides', elContent);
            mSlidesCount = $('> *', elSlides).length;
            if (options.height) {
                elSlides.css('height', options.height);
            }
            if (mSlidesCount > 1) {
                setLoop();
            }
            resize();
            if (mSlidesCount <= 1) {
                console.warn('Sanity.Slider.' + options.id + ': ' + mSlidesCount);
                elPrevButton.css('visibility', 'hidden');
                elNextButton.css('visibility', 'hidden');
                return;
            }
            refreshControl();
            bindControl();
            move();
            if (options.auto) {
                setInterval(function () {
                    moveForward();
                }, options.auto);
            }
            if (!isMobile.any()) {
                let timeout;
                $(window).resize(function () {
                    clearTimeout(timeout);
                    timeout = setTimeout(function () {
                        resize();
                        resetSlider();
                    }, 300);
                });
            }
        };
        let isMobile = {
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
                return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
            },
            any: function () {
                return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
            }
        };
        let resize = function () {
            let width = $(window).width();
            if (width >= 768 && width < 1024) {
                vars.itemsPerSlide = options.tablet.itemsPerSlide;
                vars.itemMargin = options.tablet.itemMargin;
                vars.responsive = false;
                vars.itemWidth = options.tablet.itemWidth;
            } else if (width >= 550 && width < 778) {
                vars.itemsPerSlide = options.mobile.itemsPerSlide;
                vars.itemMargin = options.mobile.itemMargin;
                vars.responsive = false;
                vars.itemWidth = options.mobile.itemWidth;
            } else if (width < 550) {
                vars.itemsPerSlide = options.mobile_s.itemsPerSlide;
                vars.itemMargin = options.mobile_s.itemMargin;
                vars.responsive = false;
                vars.itemWidth = options.mobile_s.itemWidth;
            } else {
                vars.itemsPerSlide = options.itemsPerSlide;
                vars.itemMargin = options.itemMargin;
                vars.responsive = options.responsive;
                vars.itemWidth = options.itemWidth;
            }
            if (vars.responsive) {
                vars.itemsPerSlide = 1;
            }
            if (vars.itemsPerSlide === 1) {
                vars.slideByItem = false;
            } else {
                vars.slideByItem = options.slideByItem;
            }
            mContentWidth = elContent.outerWidth();
            let slidesWidth = 0;
            elSlides.children().each(function () {
                let itemWidth = 0;
                if (vars.itemWidth) {
                    itemWidth = vars.itemWidth;
                } else {
                    if (vars.responsive && $(this)[0].hasAttribute('data-size') && vars.slideByItem) {
                        itemWidth = (mContentWidth / parseInt($(this).attr('data-size'))) - vars.itemMargin;
                    } else {
                        itemWidth = (mContentWidth / vars.itemsPerSlide) - vars.itemMargin;
                    }
                }
                $(this).width(itemWidth);
                $(this).css('margin', '0 ' + (vars.itemMargin / 2) + 'px');
                slidesWidth = slidesWidth + itemWidth + (vars.itemMargin * 2);
            });
            elSlides.css('width', slidesWidth + 'px');
        };
        let setLoop = function () {
            if (options.loop) {
                let first = elSlides.children().slice(0, vars.itemsPerSlide).clone();
                let last = elSlides.children().slice(-(vars.itemsPerSlide)).clone();
                first.appendTo(elSlides).addClass('clone').removeClass('active');
                last.prependTo(elSlides).addClass('clone').removeClass('active');
                mSlidesCount = $('> *', elSlides).length;
                vars.startIdx = vars.itemsPerSlide;
                vars.endIdx = mSlidesCount - vars.itemsPerSlide - vars.itemsPerSlide;
            } else {
                vars.startIdx = 0;
                vars.endIdx = mSlidesCount;
            }
            mIdx = vars.startIdx;
        };
        let refreshControl = function () {
            if (options.controlArrows) {
                if (options.loop) {
                    elPrevButton.css('visibility', 'visible');
                    elNextButton.css('visibility', 'visible');
                } else {
                    if (mIdx > 0) {
                        elPrevButton.css('visibility', 'visible');
                    } else {
                        elPrevButton.css('visibility', 'hidden');
                    }
                    if (mIdx + vars.itemsPerSlide >= mSlidesCount) {
                        elNextButton.css('visibility', 'hidden');
                    } else {
                        elNextButton.css('visibility', 'visible');
                    }
                }
            }
        };
        let resetSlider = function () {
            console.warn('Sanity.Slider: reset!');
            mIdx = 0;
            move();
            refreshControl();
        };
        let bindControl = function () {
            if (options.controlArrows) {
                elNextButton.bind('click', moveForward);
                elPrevButton.bind('click', moveBackward);
            }
        };
        let unbindControl = function () {
            if (options.controlArrows) {
                elNextButton.unbind('click');
                elPrevButton.unbind('click');
            }
        };
        let moveForward = function () {
            let item = $($('> div', elSlides).get(mIdx));
            item.removeClass('active');
            if (vars.slideByItem) {
                mIdx++
            } else {
                mIdx += vars.itemsPerSlide;
            }
            if (options.loop) {
                if (vars.startIdx + mIdx >= mSlidesCount) {
                    vars.rewind = vars.startIdx + (mIdx + vars.startIdx - mSlidesCount);
                } else {
                    vars.rewind = 0;
                }
            } else {
                if (mIdx > mSlidesCount) {
                    mIdx = mSlidesCount;
                }
            }
            move();
        };
        let moveBackward = function () {
            let item = $($('> div', elSlides).get(mIdx));
            item.removeClass('active');
            if (vars.slideByItem) {
                mIdx--;
            } else {
                mIdx -= vars.itemsPerSlide;
            }
            if (options.loop) {
                if (mIdx === 0) {
                    vars.rewind = vars.endIdx;
                } else if (mIdx < vars.itemsPerSlide) {
                    vars.rewind = vars.endIdx + mIdx;
                } else {
                    vars.rewind = 0;
                }
            } else {
                if (mIdx < 0) {
                    mIdx = 0;
                }
            }
            move();
        };
        let rewind = function () {
            if (vars.rewind !== 0) {
                let currentItem = $($('> div', elSlides).get(mIdx));
                currentItem.removeClass('active');
                let rewindItem = $($('> div', elSlides).get(vars.rewind));
                rewindItem.addClass('active');
                let offset = rewindItem.position().left * (-1);
                elSlides.animate({textIndent: 0},
                    {
                        duration: 0,
                        step: function (now, fx) {
                            $(this).css({
                                '-webkit-transform': 'translate3d(' + offset + 'px,0,0)',
                                '-moz-transform': 'translate3d(' + offset + 'px,0,0)',
                                '-ms-transform:': 'translate3d(' + offset + 'px,0,0)',
                                '-o-transform': 'translate3d(' + offset + 'px,0,0)',
                                'transform': 'translate3d(' + offset + 'px,0,0)',
                                '-webkit-transition': 'transform 0s linear',
                                '-moz-transition': 'transform 0s linear',
                                '-o-transition': 'transform 0s linear',
                                'transition': 'transform 0s linear'
                            });
                        },
                        complete: function () {
                            $(this).css({
                                '-webkit-transition': 'none',
                                '-moz-transition': 'none',
                                '-o-transition': 'none',
                                'transition': 'none'
                            });
                        },
                        easing: 'linear'
                    },
                );
                mIdx = vars.rewind;
                vars.rewind = 0;
            }
        };
        let move = function () {
            try {
                refreshControl();
                unbindControl();
                let item = $($('> div', elSlides).get(mIdx));
                item.addClass('active');
                let offset = item.position().left * (-1);
                // If one item and autoHeight enabled - recalculate stage height
                if (options.itemsPerSlide === 1 && options.autoHeight) {
                    elContent.css('height', item.height());
                }
                elSlides.animate({textIndent: 0},
                    {
                        duration: 300,
                        step: function (now, fx) {
                            $(this).css({
                                '-webkit-transform': 'translate3d(' + offset + 'px,0,0)',
                                '-moz-transform': 'translate3d(' + offset + 'px,0,0)',
                                '-ms-transform:': 'translate3d(' + offset + 'px,0,0)',
                                '-o-transform': 'translate3d(' + offset + 'px,0,0)',
                                'transform': 'translate3d(' + offset + 'px,0,0)',
                                '-webkit-transition': 'transform .3s linear',
                                '-moz-transition': 'transform .3s linear',
                                '-o-transition': 'transform .3s linear',
                                'transition': 'transform .3s linear'
                            });
                        },
                        complete: function () {
                            $(this).css({
                                '-webkit-transition': 'none',
                                '-moz-transition': 'none',
                                '-o-transition': 'none',
                                'transition': 'none'
                            });
                            rewind();
                            bindControl();
                        },
                        easing: 'linear'
                    },
                );
            } catch (e) {
                console.error('Sanity.Slider.' + options.id + ': ' + e);
            }
        };
        this.construct(slider, params);
    };
})(jQuery);