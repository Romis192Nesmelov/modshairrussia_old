$(function () {
    let scrollToTop = 0;

    function refreshHeader() {
        let header = $('header');
        if (scrollToTop > 0) {
            header.addClass('header_fixed_scrolled');
        } else {
            header.removeClass('header_fixed_scrolled');
        }
    }

    $(document).ready(function () {
        scrollToTop = $(window).scrollTop();
        refreshHeader();
        $('form input[name="phone"]').inputmask({
            'mask': '+7 (999) 999-99-99',
            oncomplete: function () {
                $(this).closest('form').find('input[type="submit"]').attr('disabled', false);
            },
            onincomplete: function () {
                $(this).closest('form').find('input[type="submit"]').attr('disabled', true);
            }
        });
        $('.template_style__tabs__slider').sanitySlider({
            itemsPerSlide: 1,
            loop: true,
            slideByItem: true,
            itemMargin: 0,
            tablet: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile_s: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
        });
        $('.template_style__tabs').sanityTabs();
        $('.template_team__slider').sanitySlider({
            itemsPerSlide: 1,
            loop: true,
            itemMargin: 0,
            height: 450,
            tablet: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile_s: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
        });
        $('.template_about__slider').sanitySlider({
            itemsPerSlide: 1,
            loop: true,
            itemMargin: 0,
            tablet: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile_s: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
        });
        $('.template_total-look__slider').sanitySlider({
            itemsPerSlide: 1,
            loop: true,
            itemMargin: 0,
            autoHeight: true,
            tablet: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
            mobile_s: {itemsPerSlide: 1, itemMargin: 0, itemWidth: null},
        });
        $('.form').sanityForm({
            request: $_BASEURL + 'send',
            actions: {
                error: function () {
                    console.error('Statistics won\'t be written!');
                },
                success: function () {
                    yaCounter53846524.reachGoal('ZayavkaStilist');
                    gtag('event', 'Forma', {'event_category': 'ZayavkaStilist'});
                    //roistatGoal.reach({leadName: 'Лид форма', text: 'done', name: '', phone: ''});
                }
            }
        });
        $('.popup_subscribe').sanityPopup();
    });
    $(window).bind('scroll', function () {
        scrollToTop = $(window).scrollTop();
        refreshHeader();
    });
});

$(document).ready(function () {
    if (window.popupWidget) {
        window.setTimeout(() => {
            $('#open-widget-btn').trigger('click');
        }, 0)
    }
});

$(document).ready(function () {
    if (window.popupWidget) {
        return;
    }
    const mobileAppShowedKey = 'mobileAppShowed';
    const mobileAppShowed = Boolean(window.localStorage.getItem(mobileAppShowedKey));
    if (!mobileAppShowed) {
        const mobileAppOverlay = document.querySelector('.mobile-app-overlay');
        const mobileAppPopup = document.querySelector('.mobile-app-popup');
        const mobileAppCloseBtn = document.querySelector('.mobile-app-popup__close-btn');
        const mobileAppLink = document.querySelector('#mobileAppLink');
        if (mobileAppOverlay && mobileAppPopup && mobileAppCloseBtn && mobileAppLink) {
            mobileAppOverlay.classList.add('mobile-app-show');
            mobileAppPopup.classList.add('mobile-app-show');
            const closePopup = () => {
                mobileAppOverlay.classList.remove('mobile-app-show');
                mobileAppPopup.classList.remove('mobile-app-show');
            };
            mobileAppCloseBtn.addEventListener('click', closePopup);
            mobileAppLink.addEventListener('click', () => {
                closePopup();
                window.localStorage.setItem(mobileAppShowedKey, 'true');
            });
            mobileAppOverlay.addEventListener('click', (evt) => {
                if (evt.currentTarget === mobileAppOverlay) {
                    closePopup();
                }
            });
            return;
        }
    }
    if (window.localStorage.getItem('discountFormSubmited')) {
        return;
    }
    if (window.localStorage.getItem('lastTimerDate')) {
        const lastTimerDate = new Date(window.localStorage.getItem('lastTimerDate'));
        if (Date.now() - lastTimerDate.getTime() > 5 * 24 * 60 * 60 * 1000) {
            window.localStorage.removeItem('leedSeconds');
        }
    }
    let leedSeconds;
    if (window.localStorage.getItem('leedSeconds')) {
        leedSeconds = window.localStorage.getItem('leedSeconds');
    } else {
        leedSeconds = 20 * 60;
        window.localStorage.setItem('lastTimerDate', new Date());
    }
    const timerId = setInterval(function () {
        window.localStorage.setItem('leedSeconds', leedSeconds);
        leedSeconds--;
        const minutes = Math.floor(leedSeconds / 60);
        const seconds = Math.floor(leedSeconds % 60);
        const minuteOne = minutes >= 10 ? minutes.toString()[0] : 0;
        const minuteTwo = minutes >= 10 ? minutes.toString()[1] : minutes.toString()[0];
        const secondOne = seconds >= 10 ? seconds.toString()[0] : 0;
        const secondTwo = seconds >= 10 ? seconds.toString()[1] : seconds.toString()[0];
        $('.minute-1').text(minuteOne);
        $('.minute-2').text(minuteTwo);
        $('.second-1').text(secondOne);
        $('.second-2').text(secondTwo);
    }, 1000);
    window.setTimeout(() => {
        if (leedSeconds > 0) {
            //$('.promo-footer__cta').trigger('click');
            $('.promo-footer').removeClass('d-none');
        }
    }, 3000);
    $('.promo-footer__close').on('click', function (evt) {
        evt.preventDefault();
        clearInterval(timerId);
        window.localStorage.setItem('leedSeconds', 0);
        $('.promo-footer').addClass('d-none');
    })

    window.setTimeout(function() {
        clearInterval(timerId);
        $('.promo-popup').removeClass('sanity_popup_in').addClass('sanity_popup_out');
        $('.promo-popup').one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (e) {
            $('.promo-popup').removeClass('sanity_popup_display');
            $('html').removeClass('overflow_hidden');
        });
        $('.promo-footer').addClass('d-none');
        window.localStorage.setItem('leedSeconds', 0);
    }, leedSeconds * 1000)

    $('.form').on('submit', function () {
        clearInterval(timerId);
        window.localStorage.setItem('leedSeconds', 0);
        window.localStorage.setItem('discountFormSubmited', 1);
    });
});

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        dots: true,
        loop: true,
        autoplay: true,
        items: 1,
        margin: 30,
        smartSpeed: 1500,
        autoplayTimeout: 5000,
        autoplayHoverPause: false
    });

    $('.header__burger').on('click', (evt) => {
        evt.preventDefault();
        $('.header__burger').toggleClass('header__burger--open');
        $('.header__menu').toggleClass('header__menu--open');
    });

    $('.header__menu__item').on('click', (evt) => {
        $('.header__burger').removeClass('header__burger--open');
        $('.header__menu').removeClass('header__menu--open');
    });
});
