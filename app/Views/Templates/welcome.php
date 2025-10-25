<!-- Добро пожаловать -->
<section class="section template_welcome">
    <div class="section__heading section__heading_center">
        <div class="text_xxl section__heading__title">Добро пожаловать <span class="whitespace_no-wrap">в
                    <span class="color_primary"><?= PROJECT_HTML; ?></span></span></div>
        <p class="section__heading__subtitle"><strong>Первый салон в России с уникальным сервисом от французских
                специалистов.</strong><br/>
            <strong class="color_primary">И вот как мы это делаем:</strong>
        </p>
    </div>
    <div class="section_collections__info__content">
        <div class="section_collections__info__video">
            <iframe src="https://vkvideo.ru/video_ext.php?oid=542365921&id=456239022&hd=2&autoplay=1" style="width: 100%; border: 0 none" height="400" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
        </div>
        <?php $steps = [
            'nail_1' => [
                'slug' => 'nail_1',
                'title' => 'Nail сервис в салоне ' . PROJECT,
                'title_html' => 'Nail сервис <span class="whitespace_no-wrap">в салоне</span> ' . PROJECT_HTML,
                'content' => 'Настоящее наслаждение для ваших рук и ног Комплексный подход включает массаж, скрабирование рук,   придание формы, покрытие, масло для кутикулы. Может быть как аппаратных, европейский, так и классический.',
            ],
            'nail_2' => [
                'slug' => 'nail_2',
                'title' => 'Совершенный nail сервис',
                'title_html' => 'Совершенный nail сервис',
                'content' => 'в сочетании с идеальным, культовым покрытием широкой палитры сочных оттенков лака Smith & Cult'
            ],
            'haircut' => [
                'slug' => 'umnie_strijki',
                'title' => 'Умные стрижки не требующие укладки',
                'title_html' => 'Умные стрижки <span class="whitespace_no-wrap">не требующие</span> укладки',
                'content' => 'Устали от долгой утренней укладки, но хотите, чтобы ваша прическа всегда была идеальной, словно как после посещения салона красоты? Стилисты ' . PROJECT_HTML . ' способны воплотить Вашу мечту об экономии времени по утрам с помощью специальной техники «умная стрижка», позволяющая за мгновение уложить волосы в точности так, как это делал Ваш стилист в салоне!'
            ],
            'staining' => [
                'slug' => 'okrashivanie',
                'title_tag' => 'h4',
                'title' => 'Авторская техника современного искусства окрашивания волос',
                'title_html' => 'Авторская техника современного искусства окрашивания волос',
                'content' => 'Мы любим эксперименты, которые помогают менять свой привычный образ и выглядеть ещё лучше. Именно поэтому мы бережно подходим к  вопросу окрашивания, подбирая оттенки индивидуально для каждого. Мы учитываем каждую деталь образа и следим за сохранением здоровья волос.'
            ],
            'stylist' => [
                'slug' => 'stylist',
                'title_tag' => 'h4',
                'title' => 'Международная академия стилистов',
                'title_html' => 'Международная академия стилистов',
                'content' => 'Стилисты в ' . PROJECT_HTML . ' регулярно обучаются у французских мастеров и владеют множеством профессиональных техник стрижки французского парикмахерского дома. Будьте уверены, Ваш образ будет в точь-в-точь как на картинке.'
            ],
            'cosmetics' => [
                'slug' => 'cosmetics',
                'title_tag' => 'h4',
                'title' => 'Косметика и уход на основе натуральных ингредиентов',
                'title_html' => 'Косметика <span class="whitespace_no-wrap">и уход</span> <span class="whitespace_no-wrap">на основе</span> натуральных ингредиентов',
                'content' => 'Натуральная косметика – выбор современных личностей, стремящихся не только хорошо выглядеть, но и поддержать естественную красоту.  Уход является залогом эффектной укладки, без этой базы создать причёску, порождающую воображение невозможно.'
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
        <?php foreach ($steps

        as $key => $step) : ?>
        <?php if ($count % 2 === 0) : ?>
        <div class="template_welcome__item">
            <div class="template_welcome__item__number">0<?= intval($count) + 1; ?><span class="color_primary">.</span>
            </div>
            <div class="img img_center template_welcome__item__image">
                <img width="302" height="302" src="<?= base_url(); ?>/media/Templates/welcome/<?= $step['slug']; ?><?= !empty($service) && $service['slug'] === 'man_haircut' ? '_' . $service['slug'] : ''; ?>.png"
                     alt="<?= $step['title']; ?>">
            </div>
            <div class="template_welcome__item__inner">
                <<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?> class="text_xl
                template_welcome__item__title"><?= $step['title_html']; ?></<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?>
            >
            <p class="template_welcome__item__content"><?= $step['content']; ?></p>
        </div>
    </div>
    <?php else: ?>
        <div class="template_welcome__item template_welcome__item_reversed">
            <div class="template_welcome__item__inner">
                <<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?> class="text_xl
                template_welcome__item__title"><?= $step['title_html']; ?></<?= !empty($step['title_tag']) ? $step['title_tag'] : 'h3'; ?>
            >
            <p class="template_welcome__item__content"><?= $step['content']; ?></p>
        </div>
        <div class="img img_center template_welcome__item__image">
            <img width="302" height="302" src="<?= base_url(); ?>/media/Templates/welcome/<?= $step['slug']; ?><?= !empty($service) && $service['slug'] === 'man_haircut' ? '_' . $service['slug'] : ''; ?>.png"
                 alt="<?= $step['title']; ?>">
        </div>
        <div class="template_welcome__item__number">0<?= intval($count) + 1; ?><span class="color_primary">.</span>
        </div>
        </div>
    <?php endif; ?>
    <?php $count++; ?>
    <?php endforeach; ?>
    <div class="template_welcome__action">
        <button class="btn" sanity-popup-trigger="subscribe">Записаться</button>
    </div>
    </div>
</section>