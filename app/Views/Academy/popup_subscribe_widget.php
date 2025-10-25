<!-- Всплывающее окно -->
<div class="sanity_popup popup_subscribe" sanity-popup="popup-widget">
    <div class="popup_subscribe__inner">
        <div class="popup_subscribe__inner__number img img_center">
            <img src="<?= base_url(); ?>/media/Templates/subscribe/img.png" alt="<?= PROJECT; ?>">
        </div>
        <form class="form popup_subscribe__form">
          <p class="big popup_subscribe__form__title" style="text-align: left">
              <b><?= $widget['title'] ?></b>
            </p>
            <p class="popup_subscribe__form__subtitle" style="text-align: left">
              <?= $widget['text'] ?>
            </p>
            <div class="row">
                <?= view('Academy/input_text', [
                    'name' => 'phone',
                    'placeholder' => 'Ваш телефон:',
                    'label' => null,
                    'required' => true,
                ]); ?>
<!--                <input type="hidden" name="widget" value="--><?php //= $widget['name']; ?><!--">-->
                <input type="hidden" name="subject" value="academy">
                <input type="submit" class="btn" value="Отправить">
            </div>
            <p style="font-size: 11px; font-style: italic">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a style="text-decoration: underline dotted;" href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
        </form>
    </div>
  <button hidden type="button" sanity-popup-trigger="popup-widget" id="open-widget-btn"></button>
</div>
<script>window.popupWidget = '<?= $widget['name']; ?>';</script>
