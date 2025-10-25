<?php if (!empty($offers)): ?>
    <section class="section template_catalog" id="promo">
        <div class="section__heading section__heading_center">
            <h4 class="text_xxl section__heading__title"><span class="color_primary">Акции</span> салона
                красоты <?= PROJECT_HTML; ?></h4>
        </div>
        <div class="promo-container">
            <div class="owl-carousel owl-theme">
                <?php foreach ($offers as $k => $offer) : ?>
                    <div class="offers__slide offer_<?= $k+1 ?>"></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<div  class="mobile-app-overlay"></div>
<div class="mobile-app-popup">
    <ul class="mobile-app__features-list">
        <li class="mobile-app__feature">Получайте бонусы</li>
        <li class="mobile-app__feature">Дарите подарки</li>
        <li class="mobile-app__feature">Быстрая запись</li>
        <li class="mobile-app__feature">Будьте первыми</li>
    </ul>
    <div class="mobile-app__container">
        <div class="mobile-app__description"><span class="mobile-app__high">Скачайте</span> мобильное приложение Mod’s Hair Paris</div>
        <a href="https://mymodshair.ru/proga" target="_blank" class="mobile-app__link btn" id="mobileAppLink">Скачать</a>
    </div>
    <button type="button" class="mobile-app-popup__close-btn close" aria-label="Закрыть окно"></button>
</div>
