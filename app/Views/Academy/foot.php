<script src="https://www.google.com/recaptcha/api.js?render=6LejgjYkAAAAAGOF9yROsbo3uMlIlxSKyvm6dMWU"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/old.browser<?= (ENVIRONMENT == 'production') ? '.min' : ''; ?>.js<?= (ENVIRONMENT == 'production') ? '?' . VERSION : ''; ?>"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.inputmask.bundle.min.js"></script>
<?php if (ENVIRONMENT === 'production') : ?>
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function (event) {
      ymaps.ready(function () {
        let mmsMap = new ymaps.Map('Map', {
            center: [55.708831, 37.628155],
            controls: ['zoomControl', 'typeSelector', 'fullscreenControl'],
            zoom: 14
          }, {}),

          mmsOffice = new ymaps.Placemark(mmsMap.getCenter(), {
            hintContent: 'Международная академия Mod\'s Hair Paris',
          });
        mmsMap.geoObjects
          .add(mmsOffice);
      });
    });
  </script>
<?php endif; ?>
<script src="<?= base_url(); ?>/assets/js/plugins<?= (ENVIRONMENT == 'production') ? '' : ''; ?>.js<?= (ENVIRONMENT == 'production') ? '?' . '29.01.2023' : ''; ?>"></script>
<script src="<?= base_url(); ?>/assets/js/owl.carousel.min.js"></script>
<?php // при обновлении минифицируем и меняем дату на текущую для очистки кэша ?>
<script src="<?= base_url(); ?>/assets/js/site<?= (ENVIRONMENT == 'production') ? '' : ''; ?>.js?<?= '29.01.2023' ?>'"></script>
</body>
</html>
