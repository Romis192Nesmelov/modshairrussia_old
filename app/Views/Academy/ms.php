<?php if (!empty($service)) : ?>
    <!-- Главный экран -->
    <section class="section template_ms">
        <div>
            <div class="template_ms__content">
                <h1 class="template_ms__title"><?= !empty($service['ms']['title']) ? $service['ms']['title'] : 'Первый в России <span class="whitespace_no-wrap color_primary">MOD’S HAIR PARIS</span>'; ?></h1>
                <?= !empty($service['ms']['subtitle']) ? '<p class="template_ms__subtitle">' . $service['ms']['subtitle'] . '</p>' : ''; ?>
                <div class="template_ms__content__inner">
                    <p class="template_ms__content__inner__text"><?= !empty($service['ms']['inner_text']) ? $service['ms']['inner_text'] : 'Умная стрижка не трубующая укладки'; ?></p>
                </div>
            </div>
            <form class="form template_ms__form">
                <h2 class="big template_ms__form__title"><?= !empty($service['ms']['form_title']) ? $service['ms']['form_title'] : 'Получить расписание тренингов'; ?></h2>
                <?= view('Templates/input_text', [
                    'name' => 'name',
                    'label' => 'Ваше имя:',
                    'placeholder' => 'Например: Женя',
                    'required' => true,
                ]); ?>
                <?= view('Templates/input_text', [
                    'name' => 'phone',
                    'label' => 'Ваш телефон:',
                    'placeholder' => 'Например: 8 800 555 35 35',
                    'required' => true,
                ]); ?>
                <input type="hidden" name="subject" value="academy">
                <p style="font-size: 11px; font-style: italic">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a href="<?= base_url(); ?>/media/policy_mods.pdf" style="text-decoration: underline dotted;" target="_blank">политикой конфиденциальности</a> </p>
                <input type="submit" class="btn" value="Отправить">
            </form>
        </div>
    </section>
<?php endif; ?>
