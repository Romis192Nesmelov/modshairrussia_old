<?php if (!empty($service) && array_key_exists('pricelist', $service)) : ?>
    <!-- Прайс-лист -->
    <section class="section template_pricelist" id="Pricelist">
        <div>
            <div class="section__heading section__heading_center">
                <h2 class="section__heading__title"><?= $service['pricelist']['block_title']; ?></h2>
            </div>
            <div class="template_pricelist__inner">
                <?php foreach ($service['pricelist']['items'] as $price) : ?>
                    <div class="template_pricelist__inner__item">
                        <h3 class="template_pricelist__inner__item__title"><?= $price['title']; ?></h3>
                        <p class="template_pricelist__inner__item__price"><?= $price['price']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
