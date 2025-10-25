<!-- Добро пожаловать -->
<section class="section template_welcome" id="Welcome">
    <div>
        <div class="section__heading section__heading_center">
            <h2 class="text_xxl template_welcome__item__title">
              <strong>
                <span class="color_primary">Мечтаете о творческом росте</span> и хотите выйти за пределы своих возможностей?<br>
                Хотите стать <span class="color_primary">коммерчески успешным парикмахером</span> и удивлять клиентов и самих себя?<br>
              </strong>
            </h2>
        </div>
        <?php $steps = [
            'haircut' => [
                'slug' => 'academy1',
                'title' => 'Трансформируйте творчество в технологию, учись у практикующих стилистов',
                'title_html' => 'Трансформируйте творчество в технологию, учись у практикующих стилистов',
                'content' => 'Оптимальный стиль обучения: <ul><li>20 % теории, 80% практики </li><li>индивидуальное сопровождение </li><li>посттренинговая поддержка</li></ul>Методические материалы по каждому курсу входят в обучение и остаются у студентов после завершения программы.'
            ],
            'staining' => [
                'slug' => 'academy2',
                'title_tag' => 'h4',
                'title' => 'Обучение французским стрижкам в технике Mod’s Hair –  техника стрижки завоевавшая миллион почитательниц бренда и более 2500 последователей',
                'title_html' => 'Обучение французским стрижкам в технике Mod’s Hair –  техника стрижки завоевавшая миллион почитательниц бренда и более 2500 последователей',
                'content' => '<ul><li>Быстро – стрижка за 20 минут</li><li>Просто – всего только 7 разделений и 5 срезов</li><li>Надежно - сохраняет форму до 6 месяцев</li><li>Уникально – не требует укладки и доработки</li><li>Удобно - каталог более 250 готовых образов со схемами. </li></ul><br><b class="color_primary">Новые коллекции 2 раза в год!</b>'
            ],
            'stylist' => [
                'slug' => 'academy3',
                'title_tag' => 'h4',
                'title' => 'Обучение быстрым техникам окрашивания Serf la French – Вы отработаете 6 техник разделения, 6 техник нанесения',
                'title_html' => 'Обучение быстрым техникам окрашивания Serf la French – Вы отработаете 6 техник разделения, 6 техник нанесения:',
                'content' => '<ul><li>Starlight </li><li>Twisurfer</li><li>Surfer</li><li>Intensurfer</li><li>Sculpting</li><li>Bronzing</li></ul><br><b>Создавайте персонализированный образ клиента, подчеркивающего форму и фактуру стрижки, с заботой о волосах и времени.</b>'
            ],
            'cosmetics' => [
                'slug' => 'academy4',
                'title_tag' => 'h4',
                'title' => 'Обучение укладкам во французском стиле –создавайте total look в концепции Mod’s Hair:',
                'title_html' => 'Обучение укладкам во французском стиле –создавайте total look в концепции Mod’s Hair:',
                'content' => '<ul><li>Элегантно</li><li>Утонченно</li><li>Задорно</li></ul>'
            ],
        ];
        ?>
        <?php
        if (!empty($service) && array_key_exists('welcome', $service) && !empty($service['welcome']) && is_array($service['welcome'])) {
            foreach ($service['welcome'] as $item) {
                unset($steps[$item]);
            }
        }
        $count = 0;
        ?>
        <?php foreach ($steps as $key => $step) : ?>
            <?php if ($count % 2 === 0) : ?>
                <div class="template_welcome__item">
                    <div class="template_welcome__item__number">0<?= intval($count) + 1; ?><span class="color_primary">.</span></div>
                    <div class="img img_center template_welcome__item__image">
                        <img width="302" height="302" src="<?= base_url(); ?>/media/Templates/welcome/<?= $step['slug']; ?><?= !empty($service) && $service['slug'] === 'man_haircut' ? '_' . $service['slug'] : ''; ?>.png"
                             alt="<?= $step['title']; ?>">
                    </div>
                    <div class="template_welcome__item__inner">
                        <<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?> class="text_xl template_welcome__item__title"><?= $step['title_html']; ?></<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?>>
                        <div class="template_welcome__item__content"><?= $step['content']; ?></div>
                    </div>
                </div>
            <?php else: ?>
                <div class="template_welcome__item template_welcome__item_reversed">
                    <div class="template_welcome__item__inner">
                        <<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?> class="text_xl template_welcome__item__title"><?= $step['title_html']; ?></<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?>>
                        <div class="template_welcome__item__content"><?= $step['content']; ?></div>
                    </div>
                    <div class="img img_center template_welcome__item__image">
                        <img width="302" height="302" src="<?= base_url(); ?>/media/Templates/welcome/<?= $step['slug']; ?><?= !empty($service) && $service['slug'] === 'man_haircut' ? '_' . $service['slug'] : ''; ?>.png"
                             alt="<?= $step['title']; ?>">
                    </div>
                    <div class="template_welcome__item__number">0<?= intval($count) + 1; ?><span class="color_primary">.</span></div>
                </div>
            <?php endif; ?>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>
</section>
