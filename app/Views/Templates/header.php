<header class="header header_fixed">
    <div>
        <a class="header__logo" href="<?= base_url(); ?>">
            <img width="194" height="50" src="<?= base_url(); ?>/media/logo.svg" alt="<?= PROJECT; ?>">
        </a>
        <nav class="header__menu">
            <?php if (!empty($custom_menu)) : ?>
                <?php foreach ($custom_menu as $key => $item) : ?>
                    <a class="txt header__menu__item" href="<?= $key; ?>"><?= $item; ?></a>
                <?php endforeach; ?>
                <a class="txt header__menu__item mobile-header-item" href="/la_french">Окрашивание La french</a>
                <a class="header__phone header__menu__item txt roistat_number mobile-header-item"
                   onclick="yaCounter53846524.reachGoal('KlicknaTelefon'); gtag('event', 'done', {'event_category': 'KlicknaTelefon'});"
                   href="tel:<?= SITE_PHONE_LINK; ?>"><?= file_get_contents('./assets/misc/phone.svg'); ?> <?= SITE_PHONE; ?></a>
                <a style="max-width: 60%; text-align: center" href="https://sycret.ru/service/ob/#/?apikey=ckr19uz48z14agow&utm_source=<?= $utm ?>" target="_blank" class="btn">Записаться онлайн</a>
            <?php else: ?>
                <a class="txt header__menu__item" href="#Services">Услуги</a>
                <a class="txt header__menu__item" href="#Team">Специалисты</a>
                <a class="txt header__menu__item" href="#Benefits">Преимущества</a>
                <a class="txt header__menu__item" href="#Pricelist">Меню</a>
                <a class="txt header__menu__item" href="#TotalLook">Total Look</a>
                <a class="txt header__menu__item" href="/blog">Блог</a>
                <a class="txt header__menu__item mobile-header-item" href="/la_french">Окрашивание La french</a>
                <a class="header__phone header__menu__item txt roistat_number mobile-header-item"
                   onclick="yaCounter53846524.reachGoal('KlicknaTelefon'); gtag('event', 'done', {'event_category': 'KlicknaTelefon'});"
                   href="tel:<?= SITE_PHONE_LINK; ?>"><?= file_get_contents('./assets/misc/phone.svg'); ?> <?= SITE_PHONE; ?></a>
                <!--button class="btn" sanity-popup-trigger="subscribe">Записаться</button -->
                <a style="max-width: 60%; text-align: center" href="https://sycret.ru/service/ob/#/?apikey=ckr19uz48z14agow&utm_source=<?= $utm ?>" target="_blank" class="btn">Записаться онлайн</a>
            <?php endif; ?>
        </nav>
        <a class="header__phone txt roistat_number"
           onclick="yaCounter53846524.reachGoal('KlicknaTelefon'); gtag('event', 'done', {'event_category': 'KlicknaTelefon'});"
           href="tel:<?= SITE_PHONE_LINK; ?>"><?= file_get_contents('./assets/misc/phone.svg'); ?> <?= SITE_PHONE; ?></a>
        <button type="button" class="header__burger" aria-label="mobile menu">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</header>
