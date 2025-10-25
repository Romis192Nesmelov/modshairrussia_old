<?php if (!empty($services)) : ?>
    <!-- Другие услуги -->
    <section class="section template_other_services" id="Services">
        <div>
            <div class="section__heading section__heading_center">
                <h4 class="text_xl section__heading__title">
                    <?= !empty($service) && array_key_exists('other_services', $service) && !empty($service['other_services']) ? $service['other_services']['title'] : '<span class="color_primary">Услуги</span> салона красоты</span> ' . PROJECT_HTML . ':'; ?>
                </h4>
            </div>
            <div class="template_other_services__grid">
                <?php foreach ($services as $service) : ?>
                    <a class="template_other_services__grid__item" href="<?= base_url(); ?>/<?= $service['slug']; ?>"
                       style="background-image: url('<?= base_url(); ?>/media/Pages/<?= $service['slug']; ?>/bg_preview_small.png');">
                        <div class="template_other_services__grid__item__wrapper">
                            <div class="quote">
                                <p class="template_other_services__grid__item__title"><?= $service['title']; ?></p>
                                <p class="template_other_services__grid__item__more">Подробнее...</p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>