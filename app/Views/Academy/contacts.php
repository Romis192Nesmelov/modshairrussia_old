<!-- Контакты -->
<section class="section template_contacts" id="Contacts">
    <div>
        <div id="Map" class="template_contacts__map">

        </div>
        <div class="template_contacts__list">
            <div class="section__heading">
                <h2 class="section__heading__title">Контакты международной академии</h2>
            </div>
            <div class="template_contacts__list__item">
                <p class="template_contacts__list__item__title">Телефон:</p>
                <a class="txt template_contacts__list__item__subtitle roistat_number" href="tel:<?= SITE_PHONE_LINK; ?>"
                   onclick="yaCounter53846524.reachGoal('KlicknaTelefon'); gtag('event', 'done', {'event_category': 'KlicknaTelefon'});"><?= SITE_PHONE; ?></a>
            </div>
            <div class="template_contacts__list__item">
                <p class="template_contacts__list__item__title">Адрес академии:</p>
                <a href="https://yandex.ru/maps/-/CCUyVOxd0A" target="_blank" class="txt template_contacts__list__item__subtitle">Москва, м. Тульская, Холодильный переулок, 3с1к8</a>
            </div>
<!--            <div class="template_contacts__list__item">-->
<!--                <p class="template_contacts__list__item__title">Режим работы:</p>-->
<!--                <p class="template_contacts__list__item__subtitle">--><?php //= SITE_WORKING_HOURS; ?><!--</p>-->
            </div>

            <?php if (false): ?>
        <!-- INSTAGRAM -->
            <div class="row template_contacts__list__social">
                <a class="template_contacts__list__social__item" href="https://www.instagram.com/modshair_russia_academy/" target="_blank">
                    <?= file_get_contents('./assets/misc/instagram.svg'); ?>
                </a>
            </div>
        <!-- -->
        <?php endif; ?>
            <?php /*
            <div class="template_contacts__list__item">
                <p class="template_contacts__list__item__title">Отдел PR:</p>
                <a class="template_contacts__list__item__subtitle" href="tel:<?= SITE_MAIL_PR; ?>"><?= SITE_MAIL_PR; ?></a>
            </div>
            <div class="template_contacts__list__item">
                <p class="template_contacts__list__item__title">Отдел HR:</p>
                <a class="template_contacts__list__item__subtitle" href="tel:<?= SITE_MAIL_HR; ?>"><?= SITE_MAIL_HR; ?></a>
            </div>
            <div class="template_contacts__list__item">
                <p class="template_contacts__list__item__title">Отдел маркетинга:</p>
                <a class="template_contacts__list__item__subtitle" href="tel:<?= SITE_MAIL_MARKETING; ?>"><?= SITE_MAIL_MARKETING; ?></a>
            </div>
            <div class="template_contacts__list__item">
                <p class="template_contacts__list__item__title">Отдел франшизы:</p>
                <a class="template_contacts__list__item__subtitle" href="mailto:<?= SITE_MAIL_FRANCHISE; ?>"><?= SITE_MAIL_FRANCHISE; ?></a>
            </div>
 */ ?>
        </div>
</section>
