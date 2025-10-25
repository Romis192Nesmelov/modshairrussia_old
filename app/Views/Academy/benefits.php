<?php if (!empty($service) && array_key_exists('benefits', $service) && !empty($service['benefits'])) : ?>
    <section id="Benefits" class="section template_benefits">
        <div>
            <div class="section__heading section__heading_center">
                <h4 class="text_xxl section__heading__title"><?= $service['benefits']['block_title']; ?></h4>
            </div>
            <div class="template_benefits__inner">
                <?php foreach ($service['benefits']['items'] as $item) : ?>
                    <div class="template_benefits__inner__item"
                         style="background-image: url('<?= base_url(); ?>/media/Templates/benefits/<?= $item['img']; ?>.png');">
                        <p class="template_benefits__inner__item__title"><?= $item['title']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>