<?php if (!empty($service)) : ?>
    <!-- Главный экран -->
    <section class="section template_ms">
        <div>
            <div class="template_ms__content">
                <h1 class="template_ms__title"><?= !empty($service['ms']['title']) ? $service['ms']['title'] : 'Первый в России <span class="whitespace_no-wrap color_primary">MOD’S HAIR PARIS</span>'; ?></h1>
                <?= !empty($service['ms']['subtitle']) ? '<p class="template_ms__subtitle">' . $service['ms']['subtitle'] . '</p>' : ''; ?>
                <div class="template_ms__content__inner">
                    <p class="template_ms__content__inner__text"><?= !empty($service['ms']['inner_text']) ? $service['ms']['inner_text'] : 'Умная стрижка не трубующая укладки'; ?></p>
                    <a class="btn" href="<?= !empty($service['ms']['link_to']) ? $service['ms']['link_to'] : '#Style'; ?>">Выбрать</a>
                </div>
            </div>
            <form class="form template_ms__form">
                <h2 class="big template_ms__form__title"><?= !empty($service['ms']['form_title']) ? $service['ms']['form_title'] : 'Записаться в салон онлайн'; ?></h2>
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
                <input type="hidden" name="subject" value="<?= $service['title']; ?>">
                <input type="submit" class="btn" value="Отправить">
                <p style="font-size: 11px; font-style: italic; margin-top: 10px; margin-bottom: 40px">Нажимая кнопку “Отправить”, я даю согласие на обработку и хранение персональных данных и соглашаюсь с <a style="text-decoration: underline dotted;" href="<?= base_url(); ?>/media/policy_mods.pdf" target="_blank">политикой конфиденциальности</a> </p>
            </form>
            <div class="template_ms__image">
                <img alt="Инструменты стилистов" src="<?= base_url(); ?>/media/Pages/<?= $service['slug']; ?>/img_atts.png">
            </div>
            <div class="template_ms__collection">
                <img alt="Коллекция modshair" src="<?= base_url(); ?>/media/Templates/ms/img_collection.png">
            </div>
            <div class="template_ms__look">
                <img alt="Total Look от modshair" src="<?= base_url(); ?>/media/Pages/<?= $service['slug']; ?>/img_look.png">
            </div>
        </div>
    </section>
<?php endif; ?>