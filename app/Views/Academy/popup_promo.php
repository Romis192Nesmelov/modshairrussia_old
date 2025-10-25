<!-- Всплывающее окно "Акция" -->
<div class="popup_promo" sanity_dialog="promo">
    <div class="row popup_promo__inner">
        <div class="popup_promo__inner__image"></div>
        <div class="popup_promo__inner__content">
            <p class="big popup_promo__inner__content__title">Только <span class="whitespace_no-wrap">до 15 ДЕКАБРЯ</span>
                Французское окрашивание <span class="whitespace_no-wrap">в стиле</span> <?= PROJECT_HTML; ?>
                <span class="whitespace_no-wrap">по Fix цене</span>
            </p>
            <div class="popup_promo__inner__content__item">
                <p class="big popup_promo__inner__content__item__price">5500₽</p>
                <p class="popup_promo__inner__content__item__desc">Короткие волосы</p>
            </div>
            <div class="popup_promo__inner__content__item">
                <p class="big popup_promo__inner__content__item__price">7000₽</p>
                <p class="popup_promo__inner__content__item__desc">Средняя длина</p>
            </div>
            <div class="popup_promo__inner__content__item">
                <p class="big popup_promo__inner__content__item__price">8500₽</p>
                <p class="popup_promo__inner__content__item__desc">Длинные волосы</p>
            </div>
            <form class="form popup_promo__inner__content__form">
                <p class="big popup_promo__inner__content__form__title"><b>Запишись онлайн или по телефону
                        <a class="txt whitespace_no-wrap roistat_number" href="tel:<?= SITE_PHONE_LINK; ?>"
                           onclick="yaCounter53846524.reachGoal('KlicknaTelefon'); gtag('event', 'done', {'event_category': 'KlicknaTelefon'});"><?= SITE_PHONE; ?></a></b>
                </p>
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
                <p style="font-size: 11px; font-style: italic">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a style="text-decoration: underline dotted;" href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
            </form>
        </div>
    </div>
</div>