<section class="section template_about" id="Salon">
    <div>
        <div class="template_about__inner">
            <div class="section__heading">
                <h4 class="text_xxl section__heading__title">Персонализация <span class="whitespace_no-wrap">и стиль</span>
                    <span class="whitespace_no-wrap">в каждой</span> детали</h4>
                <p class="section__heading__subtitle"><?= PROJECT_HTML; ?> - всемирно известный французский парикмахерский бренд, в основе которого – стиль,
                    легкость, свобода и естественная элегантность волос. Основатели марки подиумные стилисты Фредерик и Гийом Берар работают для самых именитых
                    кутюрье и модных журналов.Бренду уже больше полувека, и по всему миру читательницы глянца стремятся попасть в руки его стилистов. Стилисты
                    <?= PROJECT_HTML; ?> предлагают создать клиентам полный total look с учетом их образа жизни и индивидуальных особенностей. В
                    коллекции <?= PROJECT_HTML; ?> более 200 готовых образов для повседневной жизни.
                </p>
            </div>
        </div>
        <div class="template_about__slider">
            <div class="sanity_slider__content">
                <?php
                $path = 'media/Templates/about';
                $map = directory_map('./' . $path);
                ?>
                <?php foreach ($map as $item) : ?>
                    <div class="template_about__slider__item img img_center">
                        <img src="<?= base_url(); ?>/<?= $path; ?>/<?= $item; ?>" alt="Фото салона <?= PROJECT; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>