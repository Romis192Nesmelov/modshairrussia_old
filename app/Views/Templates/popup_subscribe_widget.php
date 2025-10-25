<!-- Всплывающее окно -->
<div class="sanity_popup popup_subscribe" sanity-popup="popup-widget">
    <div class="popup_subscribe__inner popup_subscribe__widget">
        <form class="form popup_subscribe__form">
          <p class="big popup_subscribe__form__title" style="text-align: center">
              <b><?= $widget['title'] ?></b>
            </p>
            <p class="popup_subscribe__form__subtitle" style="text-align: center">
              <?= $widget['text'] ?>
            </p>
            <div class="column">
                <p class="popup_subscribe__form__subtitle" style="text-align: center">
                    Ваше имя:
                </p>
                <?= view('Templates/input_text', [
                    'name' => 'name',
                    'label' => null,
                    'placeholder' => 'Например: Женя',
                    'required' => true,
                ]); ?>
                <p class="popup_subscribe__form__subtitle" style="text-align: center">
                    Ваш телефон:
                </p>
                <?= view('Templates/input_text', [
                    'name' => 'phone',
                    'placeholder' => 'Например: 8 800 555 35 35',
                    'label' => null,
                    'required' => true,
                ]); ?>
                <p class="popup_subscribe__form__subtitle" style="text-align: center">
                    На какую услугу хотели бы записаться:
                </p>
                <?= view('Templates/input_text', [
                    'name' => 'service',
                    'placeholder' => 'Например: окрашивание, стрижка, маникюр',
                    'label' => null,
                    'required' => false,
                ]); ?>
                <input type="hidden" name="widget" value="<?= $widget['name']; ?>">
                <p style="font-size: 11px; font-style: italic; text-decoration: underline">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
                <input type="submit" class="btn" value="Отправить">
            </div>
        </form>
    </div>
  <button hidden type="button" sanity-popup-trigger="popup-widget" id="open-widget-btn"></button>
</div>
<script>window.popupWidget = '<?= $widget['name']; ?>';</script>
