<?php if (!empty($service) && array_key_exists('offer', $service) && !empty($service['offer'])) : ?>
    <!-- Сомневайтесь -->
    <section class="section template_offer">
        <div>
            <div class="section__heading section__heading_center">
                <h3 class="text_xxl section__heading__title"><?= $service['offer']['title']; ?>
                </h3>
                <p class="section__heading__subtitle"><?= $service['offer']['subtitle']; ?></p>
            </div>
            <form class="form template_offer__form">
                <div class="row">
                    <?= view('Templates/input_text', [
                        'name' => 'name',
                        'label' => null,
                        'placeholder' => 'Ваше имя:',
                        'required' => true,
                    ]); ?>
                    <?= view('Templates/input_text', [
                        'name' => 'phone',
                        'label' => null,
                        'placeholder' => 'Ваш телефон:',
                        'required' => true,
                    ]); ?>
                </div>
                <input type="hidden" name="subject" value="academy">
                <input type="submit" class="btn" value="Отправить">
                <p style="font-size: 11px; font-style: italic">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a style="text-decoration: underline dotted;" href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
            </form>
        </div>
    </section>
<?php endif; ?>
