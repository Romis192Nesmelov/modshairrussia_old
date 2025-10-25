<?php if (!empty($service) && array_key_exists('style_more', $service) && !empty($service['style_more'])): ?>
    <!-- Еще больше -->
    <section class="section template_style_more">
        <div>
            <div class="template_style_more__inner">
                <div class="template_style_more__number img img_center">
                    <img src="<?= base_url(); ?>/media/Templates/style_more/200+.png" alt="200+">
                </div>
                <form class="form template_style_more__form">
                    <p class="big template_style_more__form__title">
                        <b>
                            <?= !empty($service) && array_key_exists('style_more', $service) && array_key_exists('title', $service['style_more']) ? $service['style_more']['title'] : 'Еще больше стилей <span class="whitespace_no-wrap">и образов</span> <span class="whitespace_no-wrap">в салоне</span>'; ?>
                        </b>
                    </p>
                    <p class="template_style_more__form__subtitle">Запишись сейчас онлайн:</p>
                    <div class="row">
                        <?= view('Templates/input_text', ['name' => 'phone',
                            'placeholder' => 'Ваш телефон:',
                            'label' => null,
                            'required' => true,]); ?>

                        <input type="hidden" name="subject" value="<?= !empty($service) ? $service['title'] : ''; ?>">
                        <input type="submit" class="btn" value="Отправить">
                    </div>
                    <p style="font-size: 11px; font-style: italic">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a style="" href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
                </form>
            </div>
        </div>
    </section>
<?php endif; ?>