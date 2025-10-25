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
            <p class="popup_subscribe__form__subtitle">При покупке Total Look шампунь созданный <span class="whitespace_no-wrap">в лаборатории</span>
                <?= PROJECT_HTML; ?> <span class="whitespace_no-wrap">в подарок</span></p>
            <div class="row">
                <?= view('Templates/input_text', [
                    'name' => 'phone',
                    'placeholder' => 'Ваш телефон:',
                    'label' => null,
                    'required' => true,
                ]); ?>
                <input type="hidden" name="subject" value="<?= !empty($service) ? $service['title'] : ''; ?>">
                <input type="submit" class="btn" value="Отправить">
            </div>
            <p style="font-size: 11px; font-style: italic; text-decoration: underline">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
        </form>
    </div>
</div>