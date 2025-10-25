<?php if (false) : ?>
    <header class="french-header">
        <nav class="french-header__nav">
            <ul class="french-header-list">
                <li class="french-header-item">
                    <a href="#Staining" class="french-header__nav-link">Окрашивание</a>
                </li>
                <li class="french-header-item">
                    <a href="#Technique" class="french-header__nav-link">Техники</a>
                </li>
                <li class="french-header-item">
                    <a href="#Features" class="french-header__nav-link">Преимущества</a>
                </li>
                <li class="french-header-item">
                    <a href="#Contacts" class="french-header__nav-link">Контакты</a>
                </li>
            </ul>
        </nav>
    </header>
<?php endif; ?>

<header class="french-header">
    <div style="background-image: url(/media/Pages/la_french/header-bg.jpg)"  class="french-header__bg">
        <div class="french-header__wrapper">
            <h1 class="french-header__title">Balayage</h1>
            <div class="french-header__subtitle">La french -</div>
            <div class="french-header__desc">Искусство создания цвета</div>
            <button sanity-popup-trigger="subscribe" type="button" class="french-button">
                <span>Получить консультацию</span>
            </button>
        </div>
    </div>
</header>
<section id="Staining" class="french-staining">
    <h2 class="french-staining__title">Что такое <b>окрашивание la french?</b></h2>
    <div class="french-staining__img">
        <img alt="Окрашивание la-french" src="<?= base_url(); ?>/media/Pages/la_french/stainings.png">
    </div>
    <p class="french-staining__text">
        Новый подход к окрашиванию, который предполагает
        сочетание двух тонов и высветление прядей для получения
        результата многомерного цвета
    </p>
</section>
<section class="french-promo">
    <h2 class="visually-hidden">Оттенок волос - основа нового образа</h2>
    <div class="french-promo__bottom">
        <span class="french-promo__text french-promo__text--red">Сегодня оттенок волос, </span>
        <span class="french-promo__text">как и макияж, определяет моду. </span><br>
        <span class="french-promo__text">Более того, он может стать основой для создания образа.</span>
    </div>
    <div class="french-promo__top">
        <span class="french-promo__text french-promo__text--bold french-promo__text--red">paris berlin</span>
        <span class="french-promo__text french-promo__text--bold">bilbao seoul athens</span>
        <span class="french-promo__text french-promo__text--bold french-promo__text--red">milan</span>
        <span class="french-promo__text french-promo__text--bold">dusseldorf marseille</span>
        <span class="french-promo__text french-promo__text--bold french-promo__text--red">tokyo</span>
        <span class="french-promo__text french-promo__text--bold">vienna</span>
        <span class="french-promo__text french-promo__text--bold french-promo__text--red">moscow</span>
        <span class="french-promo__text french-promo__text--bold">hasselt</span>
        <span class="french-promo__text french-promo__text--bold french-promo__text--red">los angeles</span>
        <span class="french-promo__text french-promo__text--bold french-promo__text--red">aix-en-provence</span>
    </div>
</section>
<section id="Technique" class="french-tech">
    <div class="french-tech__title">
        Арт-директором Mod’s Hair Аливье де Вриенд разработано
        <span class="french-tech__title french-tech__title--red">5 техник выполнения окрашивания</span> волос La
        French
    </div>
    <ul class="french-tech__list">
        <li class="french-tech__item">
            <img alt="Окрашивание starlight" src="<?= base_url() ?>/media/Pages/la_french/starlight.jpg">
            <div class="french-tech__container">
                <h3 class="french-tech__subtitle">Starlight - <span class="french-tech__subtitle-price">стоимость от 9000₽</span></h3>
                <p class="french-tech__text">
                    это рельефное окрашивание для
                    темных волос. Оно идеально подойдет
                    брюнеткам и шатенкам и позволит
                    создать светлые блики внутри стрижки.
                    При этой разновидности французского
                    окрашивания осветленные пряди как
                    бы «подсвечивают» стрижку изнутри,
                    визуально добавляют прическе объем.
                </p>
            </div>
        </li>
        <li class="french-tech__item french-tech__item--mobile-img">
            <picture>
                <source srcset="<?= base_url() ?>/media/Pages/la_french/starlight-sculpting.jpg" media="(max-width: 576px)">
                <img alt="Окрашивание skulpting" src="<?= base_url() ?>/media/Pages/la_french/skulpting.jpg">
            </picture>

            <div class="french-tech__container">
                <h3 class="french-tech__subtitle">Sculpting - <span class="french-tech__subtitle-price">стоимость от 6700₽</span></h3>
                <p class="french-tech__text">
                    создание светлых бликов у
                    лица для освежения образа. Эта
                    техника рельефного окрашивания
                    дает очень натуральный эффект
                    и подчеркнет вашу естественную
                    красоту.
                </p>
            </div>
        </li>
        <li class="french-tech__item">
            <img alt="Окрашивание intersurfing" src="<?= base_url() ?>/media/Pages/la_french/intersurfing.jpg">
            <div class="french-tech__container">
                <h3 class="french-tech__subtitle">Intensurfer gold - <span class="french-tech__subtitle-price">стоимость от 14600₽</span></h3>
                <p class="french-tech__text">
                    яркий интенсивный блонд в
                    медовых оттенках, при котором
                    будто бы выгоревшие на
                    солнце блики создают эффект
                    «только что с пляжа».
                </p>
            </div>
        </li>
        <li class="french-tech__item french-tech__item--mobile-img">
            <picture>
                <source srcset="<?= base_url() ?>/media/Pages/la_french/inten-bronze.jpg" media="(max-width: 576px)">
                <img alt="Окрашивание bronzin" src="<?= base_url() ?>/media/Pages/la_french/bronzin.jpg">
            </picture>
            <div class="french-tech__container">
                <h3 class="french-tech__subtitle">Bronzing - <span class="french-tech__subtitle-price">стоимость от 9800₽</span></h3>
                <p class="french-tech__text">
                    окрашивание волос
                    в бронзовых оттенках.
                    Переливы цвета меди,
                    бронзы, розового золота
                    идеально подчеркнет
                    загорелую кожу.
                </p>
            </div>
        </li>
        <li class="french-tech__item french-tech__item--mobile-img">
            <picture>
                <source srcset="<?= base_url() ?>/media/Pages/la_french/twintwin.jpg" media="(max-width: 576px)">
                <img alt="Окрашивание twinsurfer" src="<?= base_url() ?>/media/Pages/la_french/twinsurfer.jpg">
            </picture>
            <div class="french-tech__container">
                <h3 class="french-tech__subtitle">Twinsurfer - <span class="french-tech__subtitle-price">стоимость от 9800₽</span></h3>
                <p class="french-tech__text">
                    окрашивание волос
                    для более светлых
                    волос. В результате
                    вы получаете яркий
                    блонд с более
                    четкими светлыми
                    прядями.
                </p>
            </div>
        </li>
    </ul>
</section>
<section id="Features" class="french-features">
    <div class="french-features__wrapper">
        <h3 class="french-features__title">
            <b>Преимущества </b><br>техники:
        </h3>
        <ul class="french-features__list">
            <li class="french-features__item">не требует частой коррекции цвета;</li>
            <li class="french-features__item">подходит для любой длины волос;</li>
            <li class="french-features__item">создает визуальный объем волосам, а также дополнительный блеск;
            </li>
            <li class="french-features__item">волосы повреждаются меньше, чем после полного окрашивания волос;
            </li>
            <li class="french-features__item">создает натуральный эффект на волосах, нет четких границ;</li>
            <li class="french-features__item">помогает сгладить недостатки лица;</li>
        </ul>
        <button sanity-popup-trigger="subscribe" type="button" class="french-button">
            <span>Записаться</span>
        </button>
    </div>
</section>
<section class="french-reasons">
    <h2 class="french-reasons__title">
        <span class="french-reasons__count">11</span>
        <span class="french-reasons__red french-reasons--mobile">причин</span> для записи в салон Mod’s Hair Paris:
    </h2>
    <ul class="french-reasons__list">
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Международный опыт – </span> 250 салонов по всему миру.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Смена образа️ </span> за 1 раз – у нас всегда можно кардинально
            преобразиться всего за один визит.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Каталог из 263 образов,</span> не имеющий аналогов. Выберите образ
            своей мечты!
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Отзывы </span> от реальных посетителей опубликованы в нашем
            профиле и на сайте, помогут идеально подобрать мастера для реализации Вашей мечты!
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Академия, </span> мы обучили более 500 колористов и собрали лучших.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Гарантия качества:</span> мы работаем на продукции L’oreal по
            международным стандартам качества.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Постоянное совершенствование </span> и повышение квалификации
            мастеров.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Уникальные </span> французские <span class="french-reasons__red">авторские методики </span>
            окрашивания Balayage. Подберем оттенок под Ваш тип лица, возвратим блеск и мягкость, добавим густоту
            и объем.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Бесплатная экспертиза </span> состояния Ваших волос, составление
            программ лечения, восстановления или окрашивания. Перед началом работы проводим диагностику.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Удобное расположение - </span> 5 минут пешком от метро
            Добрынинская/ Павелецкая.
        </li>
        <li class="french-reasons__reason">
            <span class="french-reasons__red">Бесплатная парковка.</span>
        </li>
    </ul>
</section>
<section class="section template_catalog french-gallery">
    <div class="section__heading section__heading_center">
        <h4 class="text_xxl section__heading__title">
            <span class="color_primary">Фотогалерея</span> салона красоты <?= PROJECT_HTML; ?>
        </h4>
    </div>
    <div class="promo-container">
        <div class="owl-carousel owl-theme">
            <?php foreach ($images as $image) : ?>
                <div class="offers__slide" style="
                        background-image: url(<?= base_url() ?>/media/gallery/<?= $image['desktop_img'] ?>);
                        @media only screen and (max-width:768px) {background-image: url(<?= base_url() ?>/media/gallery/<?= $image['tablet_img'] ?>);}
                        @media only screen and (max-width:576px) {background-image: url(<?= base_url() ?>/media/gallery/<?= $image['mobile_img'] ?>);}
                        ">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
