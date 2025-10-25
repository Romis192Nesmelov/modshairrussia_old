<?php
$offers = [
    [
        'name' => '32',
        'expires' => strtotime('2020-10-01'),
        'desktop_img' => '32_desktop.jpg',
        'tablet_img' => '32_tablet.jpg',
        'mobile_img' => '32_mobile.jpg',
    ],
    [
        'name' => 'gift',
        'expires' => strtotime('2020-10-01'),
        'desktop_img' => 'gift_desktop.jpg',
        'tablet_img' => 'gift_tablet.jpg',
        'mobile_img' => 'gift_mobile.jpg',
    ],
    [
        'name' => 'obraz',
        'expires' => strtotime('2020-10-01'),
        'desktop_img' => 'obraz_desktop.jpg',
        'tablet_img' => 'obraz_tablet.jpg',
        'mobile_img' => 'obraz_mobile.jpg',
    ],
];
?>

<section class="section template_catalog" id="promo">
  <div class="section__heading section__heading_center">
    <h4 class="text_xxl section__heading__title"><span class="color_primary">Акции</span> салона
      красоты <?= PROJECT_HTML; ?></h4>
  </div>
  <div class="promo-container">
    <div class="owl-carousel owl-theme">
  <?php foreach ($offers as $offer) : ?>
    <?php if ($offer['expires'] > time()) : ?>
      <div class="offers__slide">
        <picture>
          <source media="(max-width: 576px)"
                  srcset="<?= base_url() ?>/media/offers/<?= $offer['mobile_img'] ?>">
          <source media="(max-width: 992px)"
                  srcset="<?= base_url() ?>/media/offers/<?= $offer['tablet_img'] ?>">
          <img
            src="<?= base_url() ?>/media/offers/<?= $offer['desktop_img'] ?>"
            alt="Акция <?= htmlspecialchars($offer['name'], ENT_QUOTES) ?>"
            loading="lazy">
        </picture>
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
  </div>
</section>


<?php if (false) : ?>
  <!--div  class="corona-overlay d-none" style="display:none;"></div>
<div class="corona-popup d-none" style="display: none">
    <div class="corona-popup__img-wrapper">
        <img src="<?= base_url(); ?>/media/Templates/promo/popup-nail.PNG" alt="Мы временно не работаем">
    </div>
    <div class="corona-popup__container">
        <div class="corona-popup__bold">Дорогие друзья!</div>
        <div class="corona-popup__text">
            В соответствии с Указом мэра Москвы с 28 марта по 14 июня,
            мы&nbsp;временно приостанавливаем работу салонов.
            <div class="corona-popup__bold">Продолжаем вести запись на услуги с 15 июня онлайн и по телефонам.</div>

        </div>
        <div class="corona-popup__bold">
            Мы следим за ситуацией,<br>
            Берегите себя и ваших близких!
            <div class="corona-popup__red-text">Красота спасёт мир!</div>
        </div>
    </div>
    <button type="button" class="corona-popup__close-btn close" aria-label="Закрыть окно"></button>
</div -->
<?php endif; ?>
