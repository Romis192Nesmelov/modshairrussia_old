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
                $.ajax({
                    url: vars.request,
                    method: 'post',
                    data: new FormData(this),
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
                        }
                    },
                    error: function (response) {
                        console.error(response);
                        showResponse('fail', vars.messages.error);
                        vars.actions.error();
                    }
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
})(jQuery);