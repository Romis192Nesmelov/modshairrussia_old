<!-- Запишись -->
<section class="section template_subscribe">
    <div>
        <div class="template_subscribe__inner">
            <div class="template_subscribe__number img img_center">
                <img src="<?= base_url(); ?>/media/Templates/subscribe/img.png" alt="<?= PROJECT; ?>">
            </div>
            <form class="form template_subscribe__form">
                <p class="big template_subscribe__form__title"><b>Запишись онлайн или по телефону</b></p>
                <p class="template_subscribe__form__subtitle">При покупке Total Look шампунь созданный в лаборатории <?= PROJECT_HTML; ?> в подарок</p>
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
                <p style="font-size: 11px; font-style: italic">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>

            </form>
        </div>
    </div>
</section>