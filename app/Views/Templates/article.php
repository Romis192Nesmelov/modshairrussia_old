<?php if ($article) : ?>
    <section id="#Article" class="article">
        <div class="container">
            <h1 class="article__title"><?= $article['h1'] ?></h1>
            <div class="article__date">
                <time datetime="<?= date('Y-m-d', strtotime($article['date'])) ?>"><?= date('d.m.Y г.', strtotime($article['date'])) ?></time>
            </div>
            <div class="article__content">
                <?= $article['text'] ?>
                <?php if (!empty($article['master_name'])) : ?>
                    <div class="article__master">
                        <div class="article__master-name"><?= $article['master_name'] ?></div>
                        <div class="article__master-position">
                            <?= $article['master_position'] ?>
                        </div>
                        <div class="article__master-info">
                            <img src="/media/blog/<?= $article['id'] . '/' . $article['master_img'] . '.jpg' ?>"
                                 alt="<?= $article['master_name'] ?>">
                            <div class="article__master-description">
                                <?= $article['master_description'] ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
    </section>
<?php endif; ?>



<?php if (false) : ?>




  <!--div class="article__gallery w-100">
   class="article__block-title"


    <div class="w-50">
      <img src="/media/blog/21/stilniy_manikur.jpg" alt="Стильный маникюр в 2020 году">
    </div>
  </div>

  <p>Гель-лак – это покрытие для ногтей, которое совмещает в себе свойства лака и геля. Этот современный вид покрытия схож с обычными лаками для ногтей, но техника его нанесения на ногтевую пластину немного другая. </p>
  <h2 class="article__block-title"> Как наносится гель-лак?</h2>

  <div class="article__gallery w-100">
    <div class="w-50">
      <img src="/media/blog/21/manikur.jpg" alt="Процесс маникюра">
    </div>
    <div class="w-50">
      <img src="/media/blog/21/obrabotka_kutukuli.jpg" alt="Обработка кутикулы">
    </div>
  </div>

  <h2 class="article__block-title">Сильные стороны гель-лака – плюсы.</h2 -->
<?php endif; ?>


