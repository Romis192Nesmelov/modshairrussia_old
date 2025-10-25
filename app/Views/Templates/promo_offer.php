<div class="sanity_popup popup_subscribe promo-popup" sanity-popup="promo-offer">
    <div class="popup_subscribe__inner">
        <div class="popup_subscribe__inner__number img img_center">
            <img src="<?= base_url(); ?>/media/Templates/subscribe/img.png" alt="<?= PROJECT; ?>">
        </div>
        <form class="form popup_subscribe__form">
            <p class="big popup_subscribe__form__title"><b>Успей записаться СЕЙЧАС</b></p>
            <div class="timer" style="margin-bottom: 15px; justify-content: center;">
                <span class="timer-section minute-1">0</span>
                <span class="timer-section minute-2">0</span>
                <span class="timer-separator">:</span>
                <span class="timer-section second-1">0</span>
                <span class="timer-section second-2">0</span>
            </div>
            <p class="big popup_subscribe__form__title"><b>И получи СКИДКУ 20% на первый визит</b></p>
            <div class="row">
                <?= view('Templates/input_text', [
                    'name' => 'phone',
                    'placeholder' => 'Ваш телефон:',
                    'label' => null,
                    'required' => true,
                ]); ?>
                <input type="hidden" name="subject" value="<?= !empty($service) ? $service['title'] : ''; ?>">
                <input type="hidden" name="discount" value="20%">
                <input type="submit" class="btn" value="Отправить">
            </div>
            <p style="font-size: 11px; font-style: italic; text-decoration: underline">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
        </form>
    </div>
</div>
<div class="promo-footer d-none">
    <div class="promo-footer__container">
        <div class="promo-footer__title">Успей записаться за:</div>
        <div class="timer" style="margin-left: 0;">
            <span class="timer-section minute-1">0</span>
            <span class="timer-section minute-2">0</span>
            <span class="timer-separator">:</span>
            <span class="timer-section second-1">0</span>
            <span class="timer-section second-2">0</span>
        </div>
        <div class="promo-footer__title promo-footer__title--big">Запишитесь на две услуги и получите скидку 20% на первый визит!</div>
        <button class="promo-footer__cta" style="border-radius: 15px" type="button" sanity-popup-trigger="promo-offer">
            Записаться!
        </button>
        <button class="promo-footer__close" aria-label="Закрыть уведомление" type="button"></button>
    </div>
</div>
