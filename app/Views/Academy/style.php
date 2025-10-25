<?php if (!empty($service)) : ?>
    <?php
    /*
        Здесь происходит полный пиздос за счет огромной волны правок и низкого чека,
        которые выставил заказчик, я очень сочувствую тому, кто будет вносить сюда правки,
        но сделать "нормально" и провести рефакторинг уже нет не сил, не времени, не денег
        В целом "полным пиздосом" характеризуется вся техническая часть проекта все по тем же причинам, что и выше :С
    */
    ?>
    <!-- Выберите свой стиль -->
    <section class="section template_style" id="Style">
        <div>
            <div class="template_style__tabs">
                <div class="sanity_tabs__head">
                    <div class="section__heading">
                        <h2 class="section__heading__title">
                            <?= array_key_exists('block_title', $service['styles']) ? $service['styles']['block_title'] : 'Выберите свой стиль из уникальных образов ' . PROJECT_HTML . ':'; ?>
                        </h2>
                        <p class="section__heading__subtitle">
                            <?= array_key_exists('block_subtitle', $service['styles']) ? $service['styles']['block_subtitle'] : ''; ?>
                        </p>
                    </div>
                    <div class="template_style__tabs__wrapper">
                        <?php foreach ($service['styles']['items'] as $key => $value) : ?>
                            <?php reset($service['styles']['items']); ?>
                            <div class="sanity_tabs__head__item <?= $key === key($service['styles']['items']) ? 'active' : ''; ?>">
                                <div class="template_style__tabs__preview"
                                     style="background-image: url('<?= base_url(); ?>/media/Pages/<?= $service['slug']; ?>/style/<?= $value['slug']; ?>/1.jpg');"></div>
                                <h3 class="template_style__tabs__title"><?= $value['title']; ?></h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="sanity_tabs__content template_style__content">
                    <?php foreach ($service['styles']['items'] as $key => $value) : ?>
                        <?php reset($service['styles']['items']); ?>
                        <div class="sanity_tabs__content__item <?= $key === key($service['styles']['items']) ? 'active visible' : ''; ?> template_style__content__item">
                            <div class="template_style__tabs__slider">
                                <div class="sanity_slider__content">
                                    <?php if (array_key_exists('items', $value) && !empty($value['items'])) : ?>
                                        <?php foreach ($value['items'] as $item) : ?>
                                            <?php $path = 'media/Pages/' . $service['slug'] . '/style/' . $value['slug']; ?>
                                            <div class="template_style__tabs__slider__item"
                                                 style="background-image: url('<?= base_url() .'/' . $path . '/' . $item['slug'] . '.jpg'; ?>')">
                                                <div class="template_style__content__item__wrapper">
                                                    <p class="big template_style__content__item__title"><?= $item['title']; ?></p>
                                                    <?= !empty($item['text']) ? '<p class="small template_style__content__item__subtitle">' . $item['text'] . '</p>' : ''; ?>
                                                    <button class="btn" sanity-popup-trigger="subscribe">Записаться</button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <?php
                                        $path = 'media/Pages/' . $service['slug'] . '/style/' . $value['slug'];
                                        $map = directory_map('./' . $path);
                                        ?>
                                        <?php foreach ($map as $item) : ?>
                                            <div class="template_style__tabs__slider__item"
                                                 style="background-image: url('<?= base_url() .'/' . $path . '/' . $item; ?>')">
                                                <div class="template_style__content__item__wrapper">
                                                    <p class="big template_style__content__item__title"><?= $value['title']; ?></p>
                                                    <?= !empty($value['text']) ? '<p class="small template_style__content__item__subtitle">' . $value['text'] . '</p>' : ''; ?>
                                                    <button class="btn" sanity-popup-trigger="subscribe">Записаться</button>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>