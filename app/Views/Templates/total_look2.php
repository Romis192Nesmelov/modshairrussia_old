<!-- Total look -->
<section class="section template_total-look" id="TotalLook">
    <div>
        <div class="section__heading">
            <h3 class="section__heading__title">Отличие французского салона красоты <?= PROJECT_HTML; ?><span class="color_primary"> - Total Look - </span>
                подбор<span> индивидуального образа</span></h3>

            <p class="section__heading__subtitle">
                <span class="template_total-look__sep">/</span>Стрижка +
                <span class="template_total-look__sep">/</span>Тонирование +
                <?php if (!empty($service) && $service['slug'] !== 'man_haircut') : ?>
                    <span class="template_total-look__sep">/</span>Окрашивание +
                <?php endif; ?>
                <span class="template_total-look__sep">/</span>Профессиональный уход +
                <span class="template_total-look__sep">/</span>Стайлинг
                <?php if (!empty($service) && $service['slug'] !== 'man_haircut') : ?>
                    = <span class="template_total-look__total">Выгода до <span class="color_primary">5 000 руб.</span></span>
                <?php endif; ?>
            </p>
        </div>
        <div class="template_total-look__info">

        </div>
        <div class="template_total-look__slider">
            <div class="sanity_slider__content">
                <?php $looks = [
                    [
                        'type' => 'woman',
                        'slug' => 'debbie',
                        'title' => 'Образ Дэбби',
                        'list' => [
                            ['title' => 'Окрашивание mod’s hair Surfer Babylight', 'text' => 'Сияние подчёркивает тонкий узор балаяжа и его характер "haute couture»'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Французское каре средней длины с неровно простриженной верхней частью. Форма усовершенствована за счет длинной пряди, обрамляющей лицо. '],
                            ['title' => 'Укладка на гладкие волосы', 'text' => 'Нанесите мусс Mousse Légère на корни, просушите волосы. Используйте спрей Sel Marin в прикорневой зоне для обьема. Приступайте к брашингу при помощи круглой щётки.']
                        ]
                    ],
                    [
                        'type' => 'man',
                        'slug' => 'george',
                        'title' => 'Образ Джордж',
                        'list' => [
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Градуированная стрижка с челкой'],
                            ['title' => 'Укладка', 'text' => 'При сушке зачёсывайте волосы вперёд. Нанесите крем Spider mod’s hair, чтобы подчеркнуть движение стрижки. '],
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'rita',
                        'title' => 'Образ Рита',
                        'list' => [
                            ['title' => 'Окрашивание mod’s hair в технике балаяж Soft Surfer', 'text' => 'Лёгкий и естественный, он играет на волосах с разных сторон.'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Каре на длинные волосы с ярко выраженной структурой'],
                            ['title' => 'Укладка', 'text' => 'Чтобы сделать причёску более модной и придать ей динамики, уложите длинные волосы волнами при помощи спрея Detangler mod`s hair'],
                        ]
                    ],
                    [
                        'type' => 'man',
                        'slug' => 'jean',
                        'title' => 'Образ Жан',
                        'list' => [
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Градуированная стрижка с челкой'],
                            ['title' => 'Укладка', 'text' => 'Уложите волосы вперёд при помощи воска Mat Modeler mod’s hair.'],
                        ]
                    ],
                    [
                        'type' => 'man',
                        'slug' => 'kenny',
                        'title' => 'Образ Кенни',
                        'list' => [
                            ['title' => 'Окрашивание mod’s hair в технике балаяж', 'text' => 'Для создания более холодных оттенков блонд'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Стрижка выполняется на сухие волосы без разделений '],
                            ['title' => 'Укладка', 'text' => 'Чтобы придать причёске дополнительный объём, в конце используйте пудру Powder Grip от Redken.'],
                        ]
                    ],
                    [
                        'type' => 'man',
                        'slug' => 'leo',
                        'title' => 'Образ Лео',
                        'list' => [
                            ['title' => 'Окрашивание mod’s hair в технике балаяж Soft Surfer', 'text' => 'Для мягких и естественных бликов'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Стрижка с градуировкой выполняется  при помощи машинки или в технике ножницы на расчёске'],
                            ['title' => 'Укладка', 'text' => 'Нанесите мусс Légère mod’s hair или лосьон Ringlet Curvaceous от Redken и просушите волосы пальцами. Естественно уложите волосы при помощи рук. Чтобы зафиксировать причёску, в конце нанесите воск Mat Modeler mod’s hair'],
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'peggy',
                        'title' => 'Образ Пегги',
                        'list' => [
                            ['title' => 'Окрашивание mod’s hair балаяж  Surfer Contouring mod`s hair', 'text' => 'В персиковых оттенках, которые выгодно подсвечивают лицо'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Стрижка на длинные волосы с лёгкой градуировкой и мягкой укладкой.'],
                            ['title' => 'Укладка', 'text' => 'Слегка зафиксируйте причёску небольшим количеством спрея Vento mod`s hair'],
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'kler',
                        'title' => 'Образ Клэр',
                        'list' => [
                            ['title' => 'Окрашивание mod\'s hair Intensurfer gold', 'text' => 'Легкая вуаль и блики разных оттенков;'],
                            ['title' => 'Уход от L’Oréal Professionnel', 'text' => 'Укрепление и защита волос;'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос;'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Мягкая форма каре для объема и легкости.']
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'kate',
                        'title' => 'Образ Кейт',
                        'list' => [
                            ['title' => 'Окрашивание balayage', 'text' => 'Игра света и тени, выгодно подчеркнёт черты лица;'],
                            ['title' => 'Тонирование', 'text' => 'Придаст волосам блеск и усилит оттенок;'],
                            ['title' => 'Уход от L’Oréal Professionnel', 'text' => 'Укрепление и защита волос;'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос;'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Градуированная стрижка на средние и длинные волосы придаст дополнительный объем и добавит легкости.']
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'oreli',
                        'title' => 'Образ Орели',
                        'list' => [
                            ['title' => 'Тонирование', 'text' => 'Придаст волосам блеск и усилит оттенок;'],
                            ['title' => 'Уход от L’Oréal Professionnel', 'text' => 'Укрепление и защита волос;'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос;'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => ''],
                            ['title' => 'Стайлинг', 'text' => 'Придаст форму и стиль.']
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'sharlotta',
                        'title' => 'Образ Шарлотта',
                        'list' => [
                            ['title' => 'Скульптурное окрашивание mod\'s hair', 'text' => 'Волосы переливаются благодаря тщательно подобранных прядей;'],
                            ['title' => 'Тонирование', 'text' => 'Придаст волосам блеск и усилит оттенок;'],
                            ['title' => 'Уход от L’Oréal Professionnel', 'text' => 'Укрепление и защита волос;'],
                            ['title' => 'Шампунь и уход', 'text' => 'Уход за кожей головы и типу волос;'],
                            ['title' => 'Стрижка по технике coiffe decoiffe', 'text' => 'Каре с легким удлинением к лицу.'],
                        ]
                    ],
                    [
                        'type' => 'man',
                        'slug' => 'vensan',
                        'title' => 'Образ Венсан',
                        'list' => [
                            ['title' => 'Шампунь + уход', 'text' => 'Подобранные для вашего типа волос, чтобы обеспечить их защиту и красоту;'],
                            ['title' => 'Color Camo от Redken Brews', 'text' => 'Индивидуальное камуфлирование седых волос за 5 минут;'],
                            ['title' => 'Стрижка', 'text' => 'Следуйте рекомендациям нашего стилиста mod\'s hair;'],
                            ['title' => 'Укладка', 'text' => 'Воск, нанесенный на волосы при помощи пальцев, сделает образ более динамичным.'],
                        ]
                    ],
                    [
                        'type' => 'man',
                        'slug' => 'julien',
                        'title' => 'Образ Жюльен',
                        'list' => [
                            ['title' => '«Жюльен»', 'text' => 'это трендовый андеркат с сильно выраженным пробором;'],
                            ['title' => 'Шампунь + уход', 'text' => 'Подобранные для вашего типа волос, чтобы обеспечить их защиту и красоту;'],
                            ['title' => 'Укладка', 'text' => 'Волосы зачёсаны назад с использованием небольшого количества Clay Pommade от Redkens Brews для придания большей выразительности.'],
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'bella',
                        'title' => 'Образ Белла',
                        'list' => [
                            ['title' => 'Техника обратного среза backcutting', 'text' => 'Создает текстуру, придает волосам лёгкость и растрёпанный стиль;'],
                            ['title' => 'Окрашивание Glow от L’Oréal Professionnel', 'text' => 'Эффект сияния и бликов на полупрозрачных прядях;'],
                            ['title' => 'K Water от Kérastase', 'text' => 'Структура волоса мгновенно станет гладкой, лёгкой и блестящей;'],
                            ['title' => 'Подкручиваем волосы у корней', 'text' => 'Для гламурного вида и мягких подвижных прядей по длине и на кончиках.']
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'naomi',
                        'title' => 'Образ Наоми',
                        'list' => [
                            ['title' => 'Короткое текстурное каре с небольшим удлинением к лицу.', 'text' => ''],
                            ['title' => 'Знаменитый стиль укладки décoiffé', 'text' => 'Придаёт стрижке элемент сексуальности;'],
                            ['title' => 'Pli от L’Oréal Professionnel', 'text' => 'Обеспечит упругость и зафиксирует локоны;'],
                            ['title' => 'Ring Light от L’Oréal Professionnel', 'text' => 'Для придания волосам блеска и сияния.']
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'kara',
                        'title' => 'Образ Кара',
                        'list' => [
                            ['title' => 'Стрижка средней длины с ярко выраженной градуировкой.', 'text' => 'Вдохновлена градуированными стрижками 80-х;'],
                            ['title' => 'Окрашивание Glow от L’Oréal Professionnel', 'text' => 'Эффект "естественных вуалей” с холодными бликами на полупрозрачных прядях;'],
                            ['title' => 'Техника брашинга с муссом Légère mod’s hair', 'text' => 'Вытянуть волосы по всей длине;'],
                            ['title' => 'Взъерошьенные волосы', 'text' => 'Взъерошьенные волосы - сделают образ более рок-н-ролльным, с воском Mat Modeler от mod’s hai.']
                        ]
                    ],
                    [
                        'type' => 'woman',
                        'slug' => 'adriana',
                        'title' => 'Образ Адриана',
                        'list' => [
                            ['title' => 'Основой данной стрижки является каре', 'text' => 'но с ярко выраженной текстурой;'],
                            ['title' => 'Балаяж в технике Twinsurfer mod’s hair', 'text' => 'Создаёт яркий контраст и рельефность;'],
                            ['title' => 'Эффект взъерошенности достигается укладкой сильными потоками воздуха;'],
                            ['title' => 'Спрей Sel Marin от mod’s hair добавит волосам плотности и текстуры.']
                        ]
                    ]

                ]; ?>
                <?php foreach ($looks as $item) : ?>
                    <?php if (
                        !empty($service) && (
                            ($service['slug'] === 'man_haircut' && $item['type'] === 'man') ||
                            ($service['slug'] !== 'man_haircut' && $item['type'] !== 'man')
                        )
                    ) : ?>
                        <div class="template_total-look__slider__item">
                            <div class="template_total-look__slider__item__preview img img_center">
                                <img width="350" src="<?= base_url(); ?>/media/Templates/total_look/<?= $item['slug']; ?>.jpg" alt="<?= $item['title']; ?>">
                            </div>
                            <div class="template_total-look__slider__item__content">
                                <p class="template_total-look__slider__item__content__title"><?= $item['title']; ?></p>
                                <ul class="template_total-look__slider__item__content__list">
                                    <?php foreach ($item['list'] as $li) : ?>
                                        <li class="template_total-look__slider__item__content__list__item">
                                            <p class="template_total-look__slider__item__content__list__item__title"><?= $li['title']; ?></p>
                                            <?= !empty($li['text']) ? '<p class="template_total-look__slider__item__content__list__item__text">' . $li['text'] . '</p>' : ''; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <p class="template_total-look__slider__item__content__offer">
                                    <strong>
                                        Не бойтесь перевоплощаться, выбирая свой уникальный образ <span class="whitespace_no-wrap">из 200 коллекций</span>
                                        <span class="whitespace_no-wrap">в салоне</span> <?= PROJECT_HTML; ?>
                                    </strong>
                                </p>
                                <button class="btn" sanity-popup-trigger="subscribe">Записаться</button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
