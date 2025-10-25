'use strict';
(function ($) {
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
