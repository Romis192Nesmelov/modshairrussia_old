<!-- Всплывающее окно -->
<div class="sanity_popup popup_subscribe" sanity-popup="subscribe">
    <div class="popup_subscribe__inner">
        <div class="popup_subscribe__inner__number img img_center">
            <img src="<?= base_url(); ?>/media/Templates/subscribe/img.png" alt="<?= PROJECT; ?>">
        </div>
        <form class="form popup_subscribe__form">
            <p class="big popup_subscribe__form__title"><b>Запишись онлайн или по телефону
                    <a class="txt whitespace_no-wrap roistat_number" href="tel:<?= SITE_PHONE_LINK; ?>"
                       onclick="yaCounter53846524.reachGoal('KlicknaTelefon'); gtag('event', 'done', {'event_category': 'KlicknaTelefon'});"><?= SITE_PHONE; ?></a></b>
            </p>
            <p class="popup_subscribe__form__subtitle">Оставь заявку в течении 10 минут и получи уникальное предложение!</p>
            <div class="row">
                <?= view('Templates/input_text', [
                    'name' => 'phone',
                    'placeholder' => 'Ваш телефон:',
                    'label' => null,
                    'required' => true,
                ]); ?>
                <input type="hidden" name="subject" value="academy">
                <input type="submit" class="btn" value="Отправить">
            </div>
            <p style="font-size: 11px; font-style: italic">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a style="text-decoration: underline dotted;" href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>

        </form>
    </div>
</div>
