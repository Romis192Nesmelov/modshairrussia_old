<footer class="footer">
    <div class="footer__row">
        <div style="flex-shrink: 0" class="img img_left footer__logo">
            <img width="174" height="80" src="<?= base_url(); ?>/media/logo.svg" alt="<?= PROJECT; ?>">
        </div>
        <p class="small footer__address"><?= SITE_ADDRESS; ?></p>
        <nav class="footer__menu">
            <?php if (!empty($custom_menu)) : ?>
                <?php foreach ($custom_menu as $key => $item) : ?>
                    <a class="txt footer__menu__item" href="<?= $key; ?>"><?= $item; ?></a>
                <?php endforeach; ?>
            <?php else: ?>
                <a class="txt footer__menu__item" href="#Services">Услуги</a>
                <a class="txt footer__menu__item" href="#Team">Специалисты</a>
                <a class="txt footer__menu__item" href="#Benefits">Преимущества</a>
                <a class="txt footer__menu__item" href="#Pricelist">Меню</a>
                <a class="txt footer__menu__item" href="#TotalLook">Total Look</a>
            <?php endif; ?>
        </nav>
    </div>
    <?php /*<div class="footer__row footer__contacts">
        <div class="footer__contacts__item">
            <p class="footer__contacts__item__title">Отдел PR:</p>
            <a class="footer__contacts__item__subtitle" href="mailto:<?= SITE_MAIL_PR; ?>"><?= SITE_MAIL_PR; ?></a>
        </div>
        <div class="footer__contacts__item">
            <p class="footer__contacts__item__title">Отдел HR:</p>
            <a class="footer__contacts__item__subtitle" href="mailto:<?= SITE_MAIL_HR; ?>"><?= SITE_MAIL_HR; ?></a>
        </div>
        <div class="footer__contacts__item">
            <p class="footer__contacts__item__title">Отдел маркетинга:</p>
            <a class="footer__contacts__item__subtitle" href="mailto:<?= SITE_MAIL_MARKETING; ?>"><?= SITE_MAIL_MARKETING; ?></a>
        </div>
        <div class="footer__contacts__item">
            <p class="footer__contacts__item__title">Отдел франшизы:</p>
            <a class="footer__contacts__item__subtitle" href="mailto:<?= SITE_MAIL_FRANCHISE; ?>"><?= SITE_MAIL_FRANCHISE; ?></a>
        </div>
    </div>*/ ?>
    <div class="copyright footer__copyright">
        <a href="https://primeproduction.ru/" target="_blank">
            <img src="<?= base_url(); ?>/media/logo_full_horizontal_black-white.svg" alt="Prime Production">
        </a>
    </div>
</footer>
