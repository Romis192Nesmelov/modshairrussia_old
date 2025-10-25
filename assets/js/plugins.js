'use strict';
(function ($) {
    /**
     * Sanity Form (for CheckSanity: Kit 2.4)
     * Version: 2.4.3
     * https://checksanity.ru
     */
    $.fn.sanityForm = function (options) {
        $(this).each(function () {
            new sanityFormClass($(this), options);
        });
    };
    let sanityFormClass = function (form, options) {
        let vars = {
            request: 'sendContacts.php',
            messages: {
                error: 'Извините! При отправке возникла ошибка, пожалуйста перезагрузите страницу и попробуйте еще раз.',
                success: 'Ваши данные отправлены!',
            },
            actions: {
                error: function () {

                },
                success: function () {

                }
            },
            timeout: 2500
        };
        let elLock;
        this.construct = function (form, options) {
            $.extend(vars, options);
            form.addClass('sanity_form');
            elLock = $('<div class="sanity_form__lock">').appendTo(form);

            form.submit(function (e) {
                e.preventDefault();
                grecaptcha.ready(() => {
                    grecaptcha.execute('6LejgjYkAAAAAGOF9yROsbo3uMlIlxSKyvm6dMWU', {action: 'submit'}).then((token) => {
                        const data = new FormData(this);
                        data.set('token', token);
                        $.ajax({
                            url: vars.request,
                            method: 'post',
                            data: data,
                            dataType: 'json',
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend: function () {
                                elLock.addClass('show');
                                elLock.append('<div class="sanity_form__lock__loader">');
                            },
                            success: function (response) {
                                if (response.status === 'fail') {
                                    console.error(vars.messages.error);
                                    showResponse('fail', vars.messages.error);
                                    vars.actions.error();
                                } else {
                                    showResponse('success', vars.messages.success);
                                    vars.actions.success();
                                    console.log(response)
                                }
                            },
                            error: function (response) {
                                console.error(response);
                                showResponse('fail', vars.messages.error);
                                vars.actions.error();
                            }
                        });
                    })
                });
            });
        };
        let showResponse = function (status, message) {
            setTimeout(function () {
                elLock.empty();
                elLock.append('<div class="sanity_form__lock__icon sanity_form__lock__icon_' + status + '"></div><span class="sanity_form__lock__message">' + message + '</span>');
            }, vars.timeout);
        };
        this.construct(form, options);
    };
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
                            // If one item and autoHeight enabled - recalculate stage height
                            if (options.itemsPerSlide === 1 && options.autoHeight) {
                                elContent.css('height', item.innerHeight());
                            }
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
    /**
     * Sanity Tabs
     * Version: 2.4.2 (10/09/2019)
     * https://checksanity.ru
     */
    $.fn.sanityTabs = function (options) {
        new sanityTabsClass($(this), options);
    };
    let sanityTabsClass = function (tabs, options) {
        let vars = {
            timeout: 20
        };
        let elHead, elContent;
        this.construct = function (tabs, options) {
            $.extend(vars, options);
            tabs.addClass('sanity_tabs');
            elHead = $('.sanity_tabs__head', tabs);
            elContent = $('.sanity_tabs__content', tabs);
            $('.sanity_tabs__head__item', elHead).on('click', function () {
                let clicked = $(this);
                if (!clicked.hasClass('active')) {
                    let current = $(this).siblings('.active');
                    let currentIdx = current.index();
                    let clickedIdx = clicked.index();
                    current.removeClass('active');
                    clicked.addClass('active');
                    elContent.children().eq(currentIdx).removeClass('active');
                    elContent.children().eq(clickedIdx).addClass('active');
                    setTimeout(function () {
                        elContent.children().eq(currentIdx).removeClass('visible');
                    }, vars.timeout);
                    setTimeout(function () {
                        elContent.children().eq(clickedIdx).addClass('visible');
                    }, vars.timeout);
                }
            });
        };
        this.construct(tabs, options);
    };
    /**
     * Sanity Smooth Scroll
     * Version: 2.4.1 (13/08/2019)
     * https://checksanity.ru
     */
    $(document).ready(function () {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function (e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000, function () {
                    });
                }
            }
        });

        $('[sanity-smooth-scroll]').click(function (e) {
            $('html,body').animate({scrollTop: $('#' + $(this).attr('sanity-smooth-scroll')).offset().top}, 1000);
        });
    });
    /**
     * Sanity Popup
     * Version: 2.4.5 (13/08/2019)
     * https://checksanity.ru
     */
    $.fn.sanityPopup = function (options) {
        $(this).each(function () {
            new sanityPopupClass($(this), options);
        })
    };
    let sanityPopupClass = function (popup, options) {
        let vars = {closeClass: '', timeout: 1};
        let mPopupTrigger, mPopupClose;
        let mWorking = false;
        this.construct = function (popup, options) {
            $.extend(vars, options);
            popup.addClass('sanity_popup');
            if ($('.sanity_popup__close', popup).length) {
                mPopupClose = $('.sanity_popup__close', popup);
                mPopupClose.addClass(vars.closeClass);
            } else {
                mPopupClose = $('<div class="sanity_popup__close ' + vars.closeClass + '">').appendTo(popup);
            }
            popup.wrapInner('<div class="sanity_popup__content">');
            mPopupTrigger = popup.attr('sanity-popup');
            $('[sanity-popup-trigger="' + mPopupTrigger + '"]').on('click', function () {
                showPopup();
            });
            $(popup).on('click', function (e) {
                let target = $(e.target);
                if (target.is(popup) || target.is(mPopupClose) || target.is($('*', mPopupClose))) {
                    hidePopup();
                }
            });
            $(popup).on('close', function () {
                hidePopup();
            });
        };
        let showPopup = function () {
            if (!mWorking) {
                mWorking = true;
                popup.addClass('sanity_popup_display');
                $('html').addClass('overflow_hidden');
                popup.removeClass('sanity_popup_out').addClass('sanity_popup_in');
                popup.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (e) {
                    mWorking = false;
                });
            }
        };
        let hidePopup = function () {
            if (!mWorking) {
                mWorking = true;
                popup.removeClass('sanity_popup_in').addClass('sanity_popup_out');
                popup.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (e) {
                    mWorking = false;
                    popup.removeClass('sanity_popup_display');
                    $('html').removeClass('overflow_hidden');
                });
            }
        };
        this.construct(popup, options)
    };
})(jQuery);