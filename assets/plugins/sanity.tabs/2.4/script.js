'use strict';
(function ($) {
    /**
     * Sanity Tabs
     * Version: 2.4.1 (13/08/2019)
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
            $('> *', elHead).on('click', function () {
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
})(jQuery);
