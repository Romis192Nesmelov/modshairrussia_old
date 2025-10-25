<?php if (false): ?>
    <!-- Старый прайс -->
    <section class="section template_pricelist" id="Pricelist">
        <div>
            <div class="section__heading section__heading_center">
                <h2 class="section__heading__title"><?= $service['pricelist']['block_title']; ?></h2>
            </div>
            <div class="template_pricelist__inner">
                <div class="template_pricelist__inner__item template_pricelist__inner__item--title">
                    <p class="template_pricelist__inner__item__title">Услуга</p>
                    <?php if ($service['service_block']['grade_2']) : ?>
                        <p class="template_pricelist__inner__item__price"><?= $service['service_block']['grade_1'] ?></p>
                        <p class="template_pricelist__inner__item__price"><?= $service['service_block']['grade_2'] ?></p>
                    <?php else: ?>
                        <p class="template_pricelist__inner__item__price">Цена</p>
                    <?php endif; ?>
                </div>
                <?php foreach ($service['pricelist']['items'] as $price) : ?>
                    <div class="template_pricelist__inner__item">
                        <div class="template_pricelist__inner__item__container">
                            <h3 class="template_pricelist__inner__item__title"><?= $price['title']; ?></h3>
                            <p class="template_pricelist__inner__item__subtitle"><?= $price['subtitle']; ?></p>
                        </div>
                        <p class="template_pricelist__inner__item__price"><?= $price['grade_1']; ?></p>
                        <?php if ($service['service_block']['grade_2']): ?>
                            <p class="template_pricelist__inner__item__price"><?= $price['grade_2']; ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<section class="section template_pricelist" id="Pricelist">
    <div>
        <div class="section__heading section__heading_center">
            <h2 class="section__heading__title">Ознакомиться с полным <span class="color_primary"> меню услуг</span></h2>
        </div>
        <div class="template_pricelist__inner">
            <a class="template__pricelist-link" href="<?= base_url(); ?>/media/mods_price_2025.pdf">
                <svg width="26" height="41" viewBox="0 0 26 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.5 0H20H25.5L11.5 41H0.5L14.5 0Z" fill="white"/>
                </svg>
                <span>смотреть</span>
                <svg width="163" height="129" viewBox="0 0 163 129" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.83937 16.1667C1.83937 14.2928 1.26252 13.705 0.804782 12.7702C11.1422 7.73247 12.1765 0 27.4549 0C35.6106 0 43.0775 2.81184 47.9021 10.6605C53.4153 5.62274 56.8623 0 69.8458 0C83.3999 0 94.6568 11.7155 94.6568 25.4187V52.3655C94.6568 57.1675 95.8059 58.2225 97.1844 59.2744H84.3175C86.5011 57.8705 86.6143 55.9981 86.6143 52.7141V26.5924C86.6143 16.1667 78.9191 7.96578 68.5801 7.96578C59.1604 7.96578 54.1053 15.6979 52.2672 17.4551V52.3658C52.2672 57.1678 53.415 58.2228 54.7966 59.2747H41.9285C44.1121 57.8708 44.2268 55.9984 44.2268 52.7144V26.5927C44.2268 16.167 36.5304 7.96609 26.1914 7.96609C16.7716 7.96609 12.1765 15.6983 9.88033 17.4554V55.1764C9.88033 57.2852 11.8326 58.5735 12.7521 59.275H0C1.60832 58.106 1.83937 56.5819 1.83937 53.5367V16.1674V16.1667Z" fill="white"/>
                    <path d="M100.77 30.5751C100.77 13.4721 115.014 3.05176e-05 131.784 3.05176e-05C148.557 3.05176e-05 162.801 13.4721 162.801 30.5748V30.5751L154.531 30.5748H109.04V30.5751C109.04 42.9949 119.378 53.1829 131.784 53.1829C141.803 53.1829 150.471 46.5406 153.438 37.4449H153.44H162.008H163C162.746 37.5946 162.526 37.7633 162.335 37.9482C162.194 38.0846 162.069 38.2303 161.958 38.384C161.811 38.5885 161.688 38.8078 161.587 39.0402C157.812 51.9185 145.667 61.1496 131.784 61.1496C115.014 61.1496 100.77 47.6779 100.77 30.5748V30.5751ZM153.926 25.4342C151.547 15.4653 142.426 7.96706 131.784 7.96706C121.143 7.96706 112.024 15.4653 109.645 25.4342H153.926Z" fill="white"/>
                    <path d="M52.5968 77.691C57.258 73.8273 60.0047 69.7253 70.8832 69.7253C84.9863 69.7253 96.6976 81.4408 96.6976 95.1455V122.089C96.6976 126.893 97.8915 127.948 99.329 129H85.9399C88.213 127.596 88.3324 125.72 88.3324 122.441V96.3173C88.3324 85.8901 80.3239 77.6907 69.568 77.6907C59.7668 77.6907 54.9843 85.4232 52.5961 87.1816V124.9C52.5961 127.01 54.6273 128.299 55.5845 129H42.3176C43.9908 127.831 44.2265 126.307 44.2265 123.262V75.6388C44.2265 73.4113 44.1087 71.4202 42.3176 70.3649H52.5961V77.6913L52.5968 77.691Z" fill="white"/>
                    <path d="M150.012 121.034C145.351 124.898 142.604 129 131.726 129C117.623 129 105.911 117.284 105.911 103.58V76.636C105.911 71.8325 104.717 70.7775 103.28 69.7256H116.669C114.396 71.1291 114.277 73.005 114.277 76.2843V102.408C114.277 112.835 122.285 121.035 133.041 121.035C142.842 121.035 147.625 113.302 150.013 111.544V73.8254C150.013 71.7154 147.982 70.4258 147.024 69.7253H160.291C158.618 70.8946 158.382 72.4187 158.382 75.4636V123.086C158.382 125.314 158.5 127.305 160.291 128.36H150.013V121.034L150.012 121.034Z" fill="white"/>
                </svg>
            </a>
        </div>
    </div>
</section>