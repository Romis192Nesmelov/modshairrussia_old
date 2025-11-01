<?php namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\BlockSeoModel;
use App\Models\OffersModel;
use App\Models\PriceModel;
use App\Models\ServicesModel;
use Config\Database;

class Pages extends BaseController
{
    private $utm_source, $utm_term, $widget;
    private $ArticleModel, $BlockSeoModel, $ServicesModel, $PriceModel, $OffersModel;

    private $services = [
        'woman_haircut' => [
            'slug' => 'woman_haircut',
            'title' => 'Женские стрижки',
            'description' => 'Тест',
            'ms' => [
                'title' => 'Женские стрижки <span class="whitespace_no-wrap color_primary">в ' . PROJECT_HTML . '</span>',
                'subtitle' => 'Легендарный парикмахерский бренд французского стиля - от Лос-Анджелеса до Токио.',
                'inner_text' => '<span class="color_primary">Умная стрижка</span> <span class="whitespace_no-wrap">не требующая</span> укладки',
                'form_title' => 'Записаться <span class="whitespace_no-wrap">на стрижку</span> онлайн',
            ],
            'welcome' => ['staining', 'nail_1', 'nail_2'],
            'styles' => [
                'block_title' => 'Выберите свой стиль <span class="color_primary">стрижки</span> из уникальных образов ' . PROJECT_HTML . ':',
                'items' => [
                    [
                        'slug' => 'long',
                        'title' => 'Длинные',
                        'items' => [
                            [
                                'slug' => 'peggy',
                                'title' => 'Пегги',
                                'text' => '',
                            ],
                            [
                                'slug' => 'rita',
                                'title' => 'Рита',
                                'text' => '',
                            ],

                            [
                                'slug' => 'olga',
                                'title' => 'Ольга',
                                'text' => 'Слоистые стрижки в стиле Mod’s Hair Paris подходят любой форме лица, каскад на средние волосы особенно, это золотая середина во всем, в длине и текстуре. Ступенчатые срезы создают объем. Окрашивание хайлайт или омбре смотрится на каскаде особенно выигрышно.',
                            ],
                            [
                                'slug' => 'kate',
                                'title' => 'Кейт',
                                'text' => 'Слоистые стрижки в стиле Mod’s Hair Paris подходят любой форме лица, каскад на средние волосы особенно, это золотая середина во всем, в длине и текстуре. Ступенчатые срезы создают объем. Окрашивание хайлайт или омбре смотрится на каскаде особенно выигрышно.',
                            ],
                            [
                                'slug' => 'claudia',
                                'title' => 'Клаудиа',
                                'text' => 'Слоистые стрижки в стиле Mod’s Hair Paris подходят любой форме лица, каскад на средние волосы особенно, это золотая середина во всем, в длине и текстуре. Ступенчатые срезы создают объем. Окрашивание хайлайт или омбре смотрится на каскаде особенно выигрышно.',
                            ],
                            [
                                'slug' => 'phoebe',
                                'title' => 'Фиби',
                                'text' => 'Длинные волосы до середины спины - это олицетворение женственности 60-х. Градуировка выполнена по контуру лица. Продолжая традиции растрёпанных укладок coiffé - décoiffé mod’s hair, образ отличается изысканной естественностью. Её подчёркивают балаяж Surfer и узнаваемый стиль mod’s hair. Для гламурной укладки создайте на волосах растрёпанные волны.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'medium',
                        'title' => 'Средние',
                        'items' => [
                            [
                                'slug' => 'debbie',
                                'title' => 'Дэбби',
                                'text' => '',
                            ],
                            [
                                'slug' => 'monica',
                                'title' => 'Моника',
                                'text' => '',
                            ],
                            [
                                'slug' => 'kler',
                                'title' => 'Клэр',
                                'text' => 'Градуированная стрижка — это отличный вариант для создания стильного и уникального образа. Ее легкость и игривость замечательно подходят как на каждый день, так и для праздничных мероприятий.',
                            ],
                            [
                                'slug' => 'polin',
                                'title' => 'Полин',
                                'text' => 'Стрижка на средние волосы в уникальной технике Mod’s Hair Paris в стиле боб интереснее по форме, он выглядит более подвижнее и легче. Подчеркнуть эффектную форму стрижки можно с помощью окрашивания, яркого блика будет достаточно — стрижка преобразится.',
                            ],
                            [
                                'slug' => 'zhanna',
                                'title' => 'Жанна',
                                'text' => 'Стрижка с удлинением к лицу остается на пике популярности. Она полюбилась огромному количеству женщин благодаря своему необычному и стильному виду, ни один модный показ пока еще не обошелся без модели с этой стрижкой.',
                            ],
                            [
                                'slug' => 'raicel',
                                'title' => 'Рэйчел',
                                'text' => 'Каре прострижено выше плеч, чтобы пряди лежали ровно. Для придания образу динамики линия слегка удлинена к лицу. Кончики выделены, чтобы сделать Surfer Ombré более рельефным. Это новая техника балаяжа mod’s hair, при помощи которой создаётся контраст между корнями и концами волос.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'short',
                        'title' => 'Короткие',
                        'items' => [
                            [
                                'slug' => 'naoko',
                                'title' => 'Наоко',
                                'text' => 'Стрижка на короткие волосы в уникальной технике Mod’s Hair Paris в стиле боб интереснее по форме, он выглядит более подвижнее и легче. Подчеркнуть эффектную форму стрижки можно с помощью окрашивания, яркого блика будет достаточно — стрижка преобразится.',
                            ],
                            [
                                'slug' => 'sharlotta',
                                'title' => 'Шарлотта',
                                'text' => 'Разнообразие видов стрижек каре в авторской технике Mod’s Hair Paris позволяет органично вписать его в абсолютно любой женский облик. При этом формула подбора идеальной прически предельно проста: учет структуры волоса, соблюдение пропорций внешности и фактурности, гармония внутреннего состояния и стрижки.',
                            ],
                            [
                                'slug' => 'carmen',
                                'title' => 'Кармен',
                                'text' => 'Градуированная стрижка — это отличный вариант для создания стильного и уникального образа. Ее легкость и игривость замечательно подходят как на каждый день, так и для праздничных мероприятий.',
                            ],
                            [
                                'slug' => 'maria',
                                'title' => 'Мария',
                                'text' => 'Разнообразие видов стрижек каре в авторской технике Mod’s Hair Paris позволяет органично вписать его в абсолютно любой женский облик. При этом формула подбора идеальной прически предельно проста: учет структуры волоса, соблюдение пропорций внешности и фактурности, гармония внутреннего состояния и стрижки.',
                            ],
                        ],
                    ],
                ],
            ],
            'style_more' => [
                'title' => 'Еще больше стилей <span class="whitespace_no-wrap">и образов</span> <span class="whitespace_no-wrap">в салоне</span>',
            ],
            'offer' => [
                'title' => 'Сомневаетесь в выборе стиля? Запишитесь на <span class="color_primary">консультацию</span> у нашего специалиста',
                'subtitle' => 'Получите рекомендации по стилю стрижки, который подходит именно вам. Специалисты салона предложат <span class="whitespace_no-wrap">вам персонализированный</span> стиль на каждый день.',
            ],
            'benefits' => [
                'block_title' => '<span class="color_primary">Особенности</span> стрижки в ' . PROJECT_HTML . ':',
                'items' => [
                    ['title' => 'Умная стрижка, <span class="whitespace_no-wrap">не требующая</span> укладки', 'img' => 'scissors'],
                    ['title' => 'Подбор персонализированного образа', 'img' => 'girl'],
                    ['title' => 'Большой выбор уникальных стилей', 'img' => 'presentation'],
                ],
            ],
        ],
        'staining' => [
            'slug' => 'staining',
            'title' => 'Окрашивание',
            'ms' => [
                'title' => 'Окрашивание волос <span class="whitespace_no-wrap color_primary">в ' . PROJECT_HTML . '</span>',
                'subtitle' => 'Легендарный парикмахерский бренд французского стиля - от Лос-Анджелеса до Токио.',
                'inner_text' => 'Авторская техника современного искусства окрашивания волос',
                'form_title' => 'Записаться <span class="whitespace_no-wrap">на окрашивание</span> онлайн',
            ],
            'welcome' => ['haircut', 'nail_1', 'nail_2'],
            'styles' => [
                'block_title' => 'Выберите свой новый образ <span class="color_primary">окрашивания</span> <span class="whitespace_no-wrap">из уникальной</span> коллекции ' . PROJECT_HTML . ':',
                'items' => [
                    [
                        'title' => 'Омбре',
                        'slug' => 'ombre',
                        'text' => 'Окрашивание «Омбре» остается ультрамодным трендом уже несколько сезонов подряд и не намерено сдавать позиции Если вы мечтаете о воздушной и объемной прическе, хотите поэкспериментировать с цветом, то лучшим выбором станет покраска волос в этом стиле.',
                    ],
                    [
                        'title' => 'Серфер',
                        'slug' => 'surfer',
                        'text' => 'придает локонам эффект выгорания на солнце, его еще называют французским мелированием, шатуш. Корни во время окрашивания не затрагиваются, а концы традиционно высветляются и при желании колорируются в нужный оттенок.',
                    ],
                    [
                        'title' => 'Хайлайт',
                        'slug' => 'highlight',
                        'text' => 'это техника осветления волос, которую можно использовать для частичного мелирования или контуринга. Данная техника сложного окрашивания сохраняет здоровье волос и позволяет не прибегать к регулярным процедурам, поддерживающим первозданную красоту свежего окрашивания.',
                    ],
                    [
                        'title' => 'Контуринг',
                        'slug' => 'counturing',
                        'text' => 'Эта техника окрашивания не случайно пользуется массовой популярностью вот уже несколько сезонов подряд. С помощью контуринга можно выгодно подчеркнуть овал лица, выделяет глаза и выравнивает цвет кожи.',
                    ],
                    [
                        'title' => 'Тила',
                        'slug' => 'tila',
                        'text' => 'техника THILA усиливает сияние «Балаяж» и удивительным образом преображает весь облик в целом, придавая волосам жизненную силу, а лицу – сияние и свежесть. При данном окрашивании кончики волос и их корни не подвергаются вредному воздействию различных красителей – вся основная работа проводится исключительно с длиной волос: краска наносится на отдельные пряди таким образом, чтобы на определенные участки был сделан эффектный цветовой акцент.',
                    ],
                ],
            ],
            'style_more' => [
                'title' => 'Еще больше стилей <span class="whitespace_no-wrap">и образов</span> <span class="whitespace_no-wrap">в салоне</span>',
            ],
            'benefits' => [
                'block_title' => '<span class="color_primary">Особенности</span> окрашивания в ' . PROJECT_HTML . ':',
                'items' => [
                    ['title' => 'Безопасные технологии', 'img' => 'master'],
                    ['title' => 'Средства и косметика <span class="whitespace_no-wrap">на натуральных</span> ингредиентах', 'img' => 'bottles'],
                    ['title' => 'Большой выбор уникальных стилей', 'img' => 'presentation'],
                ],
            ],
            'offer' => [
                'title' => 'Сомневаетесь в выборе окрашивания? Запишитесь на <span class="color_primary">консультацию</span> у нашего специалиста',
                'subtitle' => 'Получите рекомендации по стилю окрашивания, который подходит именно вам. Специалисты салона предложат <span class="whitespace_no-wrap">вам персонализированный</span> стиль на каждый день.',
            ],
        ],
        'manicure' => [
            'slug' => 'manicure',
            'title' => 'Маникюр и педикюр',
            'ms' => [
                'title' => 'Маникюр и педикюр <span class="color_primary whitespace_no-wrap">в ' . PROJECT_HTML . '</span>',
                'subtitle' => 'Легендарный парикмахерский бренд французского стиля - от Лос-Анджелеса до Токио.',
                'inner_text' => 'Стильный и <span class="color_primary">безопасный</span> маникюр в ' . PROJECT_HTML,
                'form_title' => 'Записаться на маникюр онлайн',
            ],
            'welcome' => ['haircut', 'staining', 'stylist', 'cosmetics'],
            'styles' => [
                'block_title' => 'Выберите свой тип услуги из меню <span class="color_primary">ухода</span> за ногтями ' . PROJECT_HTML . ':',
                'items' => [
                    [
                        'title' => 'SPA маникюр',
                        'slug' => 'spa-manicure',
                        'text' => 'Комплекс услуг который включает в себя: снятие любого покрытия, придание формы ногтям, обработка кутикулы, скрабирование рук, массаж, маска для рук и покрытие',
                    ],
                    [
                        'title' => 'Маникюр с покрытием',
                        'slug' => 'manicure-gel-lack',
                        'text' => 'Комплекс услуг который включает в себя: снятие любого покрытия, придание формы ногтям, обработку кутикулы, массаж, покрытие.',
                    ],
                    [
                        'title' => 'SPA педикюр',
                        'slug' => 'spa-pedicure',
                        'text' => 'Комплекс услуг который включает в себя:, снятие любого покрытия, придание формы ногтям, обработку кутикулы, удаление ороговевшей кожи стоп, скрабирование ног, массаж, маска для ног, покрытие.',
                    ],
                    [
                        'title' => 'Педикюр с покрытием',
                        'slug' => 'pedicure-gel-lack',
                        'text' => 'Комплекс услуг который включает в себя: снятие любого покрытия, придание формы ногтям, обработку кутикулы, удаление ороговевшей кожи стоп, покрытие.',
                    ],
                    [
                        'title' => 'Экспресс-маникюр',
                        'slug' => 'express-manicure',
                        'text' => 'Экспресс-маникюр представляет собой быстрый педикюр, на создание которого уходит не больше 0,5 часа. При этом такая процедура так же, как и стандартная, предполагает смягчение огрубевших участков кожи, удаление прежнего лакового покрытия, придание желаемой формы ногтевым пластинам, покраску новым лаком.',
                    ],
                ],
            ],
            'style_more' => null, /*[
                'title' => 'Большой выбор стилей и дизайнов маникюра только в салоне',
            ],*/
            'benefits' => [
                'block_title' => '<span class="color_primary">Особенности</span> маникюра <span class="whitespace_no-wrap"> в ' . PROJECT_HTML . ':</span>',
                'items' => [
                    ['title' => 'Одноразовые комплекты обработки ногтей', 'img' => 'master'],
                    ['title' => 'Широкая палитра сочных оттенков лака', 'img' => 'lack'],
                    ['title' => 'Три способа обработка кутикулы', 'img' => 'presentation'],
                ],
            ],
            'offer' => null,/*[
                'title' => 'Сомневаетесь в выборе маникюра? Запишитесь на <span class="color_primary">консультацию</span> у нашего специалиста',
                'subtitle' => 'Получите рекомендации по маникюру, который подходит именно вам. Специалисты салона предложат <span class="whitespace_no-wrap">вам персонализированный</span> стиль на каждый день.'
            ],*/
        ],
        'makeup' => [
            'slug' => 'makeup',
            'title' => 'Услуги визажа',
            'ms' => [
                'title' => 'Эффектный макияж <span class="whitespace_no-wrap color_primary">в ' . PROJECT_HTML . '</span>',
                'subtitle' => 'Легендарный парикмахерский бренд французского стиля - от Лос-Анджелеса до Токио.',
                'inner_text' => 'Вечерний и повседневный визаж <span class="whitespace_no-wrap">для завершенности</span> образа',
                'form_title' => 'Записаться <span class="whitespace_no-wrap">на макияж</span> онлайн',
            ],
            'welcome' => ['haircut', 'staining', 'nail_1', 'nail_2'],
            'benefits' => [
                'block_title' => '<span class="color_primary">Особенности</span> визажа в ' . PROJECT_HTML . ':',
                'items' => [
                    ['title' => 'Персонализированный подход', 'img' => 'master'],
                    ['title' => 'Создание комплексного образа', 'img' => 'girl'],
                    ['title' => 'Большой выбор уникальных стилей', 'img' => 'presentation'],
                ],
            ],
            'offer' => null,
            'styles' => [
                'block_title' => 'Выберите свой тип услуги из <span class="color_primary">меню макияжа</span> ' . PROJECT_HTML . ':',
                'block_subtitle' => 'Мы не копируем макияж с картинки - мы адаптируем модный макияж под особенности вашего лица, стиля жизни и характера. После нанесения косметики лицо будет выглядеть естественным и более ухоженным.',
                'items' => [
                    ['title' => 'Дневной', 'slug' => 'day'],
                    ['title' => 'Вечерний', 'slug' => 'night'],
                    ['title' => 'Арт-макияж', 'slug' => 'art'],
                ],
            ],
            'style_more' => [
                'title' => 'Большой выбор стилей макияжа <span class="whitespace_no-wrap">в салоне</span> ' . PROJECT_HTML,
            ],
        ],
        'man_haircut' => [
            'slug' => 'man_haircut',
            'title' => 'Мужские стрижки',
            'ms' => [
                'title' => 'Мужские стрижки <span class="whitespace_no-wrap color_primary">в ' . PROJECT_HTML . '</span>',
                'subtitle' => 'Легендарный парикмахерский бренд французского стиля - от Лос-Анджелеса до Токио.',
                'inner_text' => '<span class="color_primary">Умная стрижка</span> <span class="whitespace_no-wrap">не требующая</span> укладки',
                'form_title' => 'Записаться <span class="whitespace_no-wrap">на стрижку</span> онлайн',
            ],
            'welcome' => ['staining', 'nail_1', 'nail_2'],
            'styles' => [
                'block_title' => 'Выберите свой стиль <span class="color_primary">стрижки</span> из уникальных образов ' . PROJECT_HTML . ':',
                'block_subtitle' => 'Мужские стрижки в авторской технике ' . PROJECT_HTML . ' предоставляют различные варианты по длине волос, которые могут быть средними и длинными, совсем короткими в стиле бокс. Мужской облик во многом определяется стилем жизни и является определяющим фактором в выборе прически.',
                'items' => [
                    ['title' => 'Албан', 'slug' => 'alban'],
                    ['title' => 'Чарльз', 'slug' => 'charles'],
                    ['title' => 'Кевин', 'slug' => 'kevin'],
                    ['title' => 'Максим', 'slug' => 'maxim'],
                    ['title' => 'Николас', 'slug' => 'nicolas'],
                    ['title' => 'Симон', 'slug' => 'simon'],
                    ['title' => 'Росс', 'slug' => 'ross'],
                    ['title' => 'Лэрд', 'slug' => 'laird'],
                    ['title' => 'Жорж', 'slug' => 'george'],
                    ['title' => 'Жан', 'slug' => 'jean'],
                    ['title' => 'Кенни', 'slug' => 'kenny'],
                    ['title' => 'Лео', 'slug' => 'leo'],
                ],
            ],
            'style_more' => [
                'title' => 'Еще больше стилей <span class="whitespace_no-wrap">и образов</span> стрижек <span class="whitespace_no-wrap">в салоне</span>',
            ],
            'other_services' => [
                'title' => '<span class="color_primary">Услуги</span> от салона ' . PROJECT_HTML,
            ],
            'offer' => [
                'title' => 'Сомневаетесь в выборе стрижки? Запишитесь на <span class="color_primary">консультацию</span> у нашего специалиста',
                'subtitle' => 'Получите рекомендации по стилю стрижки, который подходит именно вам. Специалисты салона предложат <span class="whitespace_no-wrap">вам персонализированный</span> стиль на каждый день.',
            ],
            'benefits' => null, /*[
                'block_title' => '<span class="color_primary">Особенности</span> стрижки в ' .PROJECT_HTML .':',
                'items' => [
                    ['title' => 'Умная стрижка, <span class="whitespace_no-wrap">не требующая</span> укладки', 'img' => 'scissors'],
                    ['title' => 'Средства и косметика <span class="whitespace_no-wrap">на натуральных</span> ингредиентах', 'img' => 'bottles'],
                    ['title' => 'Большой выбор уникальных стилей', 'img' => 'presentation']
                ]
            ],*/
        ],
    ];

    public function __construct()
    {
        $this->setWidget($_GET);
        $this->setUtmSource($_GET);
        $this->setTerm($_GET);
        $this->changeSalonNumber();
        $this->ArticleModel = new ArticleModel;
        $this->BlockSeoModel = new BlockSeoModel;
        $this->ServicesModel = new ServicesModel;
        $this->PriceModel = new PriceModel;
        $this->OffersModel = new OffersModel;
    }

    private function getPriceBlock($service)
    {
        $price = $this->PriceModel->getPriceByServiceId($service['id']);
        $block_title = 'Цена на <span class="color_primary">' . $service['price_title'] . '</span> в салоне красоты ' . PROJECT_HTML . ': ';
        return [
            'block_title' => $block_title,
            'items' => $price
        ];
    }

    private function setUtmSource(array $query)
    {
        $utm_source = !empty($_COOKIE['utm_source']) ? $_COOKIE['utm_source'] : 'seo';
        if (!empty($query['utm_source'])) {
            switch ($query['utm_source']) {
                case('2gis'):
                    $utm_source = '2gis';
                    break;
                case('yandex'):
                    $utm_source = 'yandex';
                    break;
                case('google'):
                    $utm_source = 'google';
                    break;
                case('instagram'):
                    $utm_source = 'instagram';
                    break;
                case('yandex_maps'):
                    $utm_source = 'yandex_maps';
                    break;
                case('google_maps'):
                    $utm_source = 'google_maps';
                    break;
                case('visitkimods'):
                    $utm_source = 'visitkimods';
                    break;
                default:
                    $utm_source = 'seo';

            }
        }
        $this->utm_source = $utm_source;
        setcookie('utm_source', $utm_source, time() + 14 * 24 * 60 * 60, '/');
        return;
    }

    private function setTerm(array $query)
    {
        $utm_term = !empty($_COOKIE['utm_term']) ? $_COOKIE['utm_term'] : false;
        if (!empty($query['utm_term'])) {
            $utm_term = $query['utm_term'];
        }

        if ($utm_term) {
            setcookie('utm_term', $utm_term, time() + 14 * 24 * 60 * 60, '/');
        }
        $this->utm_term = $utm_term;
    }

    private function setWidget(array $query)
    {
        $widget = !empty($query['widget']) ? $query['widget'] : null;
        switch ($widget) {
            case 'sokolov':
                $this->widget['name'] = $widget;
                $this->widget['title'] = 'Записаться в салон Mod`s Hair Paris на эксклюзивных условиях';
                $this->widget['text'] = '
                Эксклюзивное предложение действительно для клиентов партнера сети <b>SOKOLOV</b>.
                <br>Скидка по промокоду предоставляется однократно и не суммируется с действующими акциями и спец предложениями.
                <br>Для посещения салона на эксклюзивных условиях необходима предварительная запись.';
                break;
            case 'discount20':
                $this->widget['name'] = $widget;
                $this->widget['title'] = 'Дарим вам хорошее настроение на день и персональную <span class="color_primary">скидку 20%</span> на первое посещение';
                $this->widget['text'] = 'Оставьте заявку прямо сейчас и мы перезвоним вам позже.';
                break;
            default:
                $this->widget['name'] = '';
                $this->widget['title'] = '';
                $this->widget['text'] = '';
        }

    }

    private function getUtm()
    {
        return $this->utm_source;
    }

    private function getTerm()
    {
        return $this->utm_term;
    }

    private function changeSalonNumber()
    {
        switch ($this->getUtm()) {
            case '2gis':
                $phone = '+7 (499) 113-71-27';
                $phone_link = '+74991137127';
                break;
            case 'yandex':
                $phone = '+7 (499) 112-48-12';
                $phone_link = '+74991124812';
                break;
            case 'google':
                $phone = '+7 (499) 346-74-39';
                $phone_link = '+74993467439';
                break;
            case 'instagram':
                $phone = '+7 (499) 348-29-45';
                $phone_link = '+74993482945';
                break;
            case 'yandex_maps':
                $phone = '+7 (499) 112-30-68';
                $phone_link = '+74991123068';
                break;
            case 'google_maps':
                $phone = '+7 (499) 113-07-55';
                $phone_link = '+74991130755';
                break;
            case 'vk':
                $phone = '+7 (499) 322-91-45';
                $phone_link = '+74993229145';
                break;
            case 'visitkimods':
                $phone = '+7 (499) 113-66-40';
                $phone_link = '+74991136640';
                break;
            default:
                $phone = '+7 (499) 348-92-81';
                $phone_link = '+74993489281';
                break;
        }
        define('SITE_PHONE', $phone);
        define('SITE_PHONE_LINK', $phone_link);
    }

    public function index()
    {

        $data['utm'] = $this->getUtm();
        $data['service'] = [
            'slug' => 'total_look',
            'title' => 'Total look',
            'ms' => [
                'title' => 'Салон красоты <span class="color_primary">' . PROJECT_HTML . '</span>',
                'subtitle' => 'Легендарная сеть салонов красоты - <span class="whitespace_no-wrap">от Токио</span> <span class="whitespace_no-wrap">до Нью-Йорка</span>',
                'link_to' => '#Services',
                'inner_text' => 'Total Look – персонализированный комплекс услуг <span class="whitespace_no-wrap">для идеального</span> образа',
            ],
            'welcome' => ['nail_1', 'nail_2'],
            'offer' => [
                'title' => 'Сомневаетесь в выборе стиля? Запишитесь на <span class="color_primary">консультацию</span> у нашего специалиста',
                'subtitle' => 'Получите рекомендации по стилю, который подходит именно вам. Специалисты салона предложат <span class="whitespace_no-wrap">вам персонализированный</span> стиль на каждый день.',
            ],
        ];
        $data['services'] = $this->services;
        $data['custom_menu'] = [
            '#TotalLook' => 'Total Look',
            '#Services' => 'Услуги',
            '#Contacts' => 'Контакты',
            '/academy' => 'Академия',
            '/blog' => 'Блог',
            'https://modshairfranchise.ru' => 'Франшиза',
        ];
        $data['widget'] = $this->widget;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('main');
        $data['offers'] = $this->OffersModel->getAllOffers();
        $this->mSeo['title'] = 'Новый салон красоты ' . PROJECT . ' рядом с метро Павелецкая в Москве';
        $this->mSeo['subject'] = 'Страница Total Look';
        $this->viewHead($data);
        echo view('Templates/header', $data);
        echo view('Templates/ms', $data);
        echo view('Templates/welcome', $data);
        echo view('Templates/total_look', $data);
        echo view('Templates/promo', $data);
        echo view('Templates/catalog', $data);
        echo view('Templates/other_services', $data);
        echo view('Templates/privilege');
        echo view('Templates/pricelist', $data);
        //echo view('Templates/subscribe', $data);
        echo view('Templates/offer', $data);
        echo view('Templates/contacts');
        echo view('Templates/seo_block', $data);
        echo view('Templates/footer', $data);
        echo view('Templates/popup_subscribe', $data);
        echo view('Templates/popup_subscribe_widget', $data);
        echo view('Templates/promo_offer', $data);
        $this->viewFoot();
    }

    public function blog()
    {
        $data['utm'] = $this->getUtm();
        $page = isset($_GET['page']) && $_GET['page'] > 1 ? $_GET['page'] : 1;
        $paginator = [];
        $paginator['current'] = (int)$page;
        $paginator['limit'] = 9;
        $paginator['offset'] = $paginator['limit'] * ($paginator['current'] - 1);
        $paginator['count'] = $this->ArticleModel->getCountArticles();
        $paginator['pages'] = $count_pages = ceil($paginator['count'] / $paginator['limit']);
        $articles = $this->ArticleModel->getArticles($paginator['limit'], $paginator['offset']);

        $data['service'] = [
            'slug' => 'total_look',
            'title' => 'Total look',
            'ms' => [
                'title' => 'Салон красоты <span class="color_primary">' . PROJECT_HTML . '</span>',
                'subtitle' => 'Легендарная сеть салонов красоты - <span class="whitespace_no-wrap">от Токио</span> <span class="whitespace_no-wrap">до Нью-Йорка</span>',
                'link_to' => '#Services',
                'inner_text' => 'Total Look – персонализированный комплекс услуг <span class="whitespace_no-wrap">для идеального</span> образа',
            ],
            'welcome' => ['nail_1', 'nail_2'],
            'offer' => [
                'title' => 'Сомневаетесь в выборе стиля? Запишитесь на <span class="color_primary">консультацию</span> у нашего специалиста',
                'subtitle' => 'Получите рекомендации по стилю, который подходит именно вам. Специалисты салона предложат <span class="whitespace_no-wrap">вам персонализированный</span> стиль на каждый день.',
            ],
        ];
        $data['services'] = $this->services;
        $data['custom_menu'] = [
            '/' => 'Салон',
            '/#TotalLook' => 'Total Look',
            '/#Services' => 'Услуги',
            '#Contacts' => 'Контакты',
            'https://modshairfranchise.ru' => 'Франшиза'
        ];
        $this->mSeo['title'] = 'Секреты красоты от специалистов ' . PROJECT;
        $this->mSeo['subject'] = 'Секреты красоты от специалистов ' . PROJECT;
        $this->viewHead($data);
        echo view('Templates/header', $data);
        echo view('Templates/blog', ['blog' => $articles, 'paginator' => $paginator]);
        echo view('Templates/contacts');
        echo view('Templates/footer', $data);
        echo view('Templates/popup_subscribe', $data);
        echo view('Templates/promo_offer', $data);
        $this->viewFoot();
    }

    public function article($key)
    {
        $data['utm'] = $this->getUtm();
        $article = $this->ArticleModel->getArticle($key);
        if ($article) {
            $data['service'] = [
                'slug' => 'total_look',
                'title' => 'Total look',
                'ms' => [
                    'title' => 'Салон красоты <span class="color_primary">' . PROJECT_HTML . '</span>',
                    'subtitle' => 'Легендарная сеть салонов красоты - <span class="whitespace_no-wrap">от Токио</span> <span class="whitespace_no-wrap">до Нью-Йорка</span>',
                    'link_to' => '#Services',
                    'inner_text' => 'Total Look – персонализированный комплекс услуг <span class="whitespace_no-wrap">для идеального</span> образа',
                ],
                'welcome' => ['nail_1', 'nail_2'],
                'offer' => [
                    'title' => 'Сомневаетесь в выборе стиля? Запишитесь на <span class="color_primary">консультацию</span> у нашего специалиста',
                    'subtitle' => 'Получите рекомендации по стилю, который подходит именно вам. Специалисты салона предложат <span class="whitespace_no-wrap">вам персонализированный</span> стиль на каждый день.',
                ],
            ];
            $data['services'] = $this->services;
            $data['custom_menu'] = [
                '/' => 'Салон',
                '/#TotalLook' => 'Total Look',
                '/#Services' => 'Услуги',
                '#Contacts' => 'Контакты',
                '/blog' => 'Блог',
                'https://modshairfranchise.ru' => 'Франшиза'
            ];
            $this->mSeo['title'] = $article['title'];
            $this->mSeo['subject'] =  $article['title'];
            $this->mSeo['description'] =  $article['description'];
            $this->mSeo['description_s'] =  $article['description'];
            $this->viewHead($data);
            echo view('Templates/header', $data);
            echo view('Templates/article', ['article' => $article]);
            echo view('Templates/contacts');
            echo view('Templates/footer', $data);
            echo view('Templates/popup_subscribe', $data);
            echo view('Templates/promo_offer', $data);
            $this->viewFoot();
        } else {
            $this->show404();
        }
    }

    public function man_haircut()
    {
        $data['utm'] = $this->getUtm();
        $this->mSeo['title'] = 'Модные и стильные мужские стрижки рядом с метро Павелецкая в салоне красоты ' . PROJECT . ' в Москве';
        $this->mSeo['subject'] = 'Страница мужских стрижек';
        $service_block = $this->ServicesModel->getServiceByUrl('man_haircut');
        $service = $this->services['man_haircut'];
        $service['service_block'] = $service_block;
        $service['pricelist'] = $this->getPriceBlock($service_block);
        $data['service'] = $service;
        unset($this->services['man_haircut']);
        $data['services'] = $this->services;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('man_haircut');
        $this->view($data);
    }

    public function woman_haircut()
    {
        $data['utm'] = $this->getUtm();
        $this->mSeo['title'] = 'Модные и стильные женские стрижки рядом с метро Павелецкая салоне красоты ' . PROJECT . ' в Москве';
        $this->mSeo['subject'] = 'Страница женских стрижек';
        $service_block = $this->ServicesModel->getServiceByUrl('woman_haircut');
        $service = $this->services['woman_haircut'];
        $service['service_block'] = $service_block;
        $service['pricelist'] = $this->getPriceBlock($service_block);
        $data['service'] = $service;
        unset($this->services['woman_haircut']);
        $data['services'] = $this->services;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('woman_haircut');
        $this->view($data);
    }

    public function makeup()
    {
        $data['utm'] = $this->getUtm();
        $this->mSeo['title'] = 'Мейкап в студии визажа и макияжа рядом с метро Павелецкая ' . PROJECT . ' в Москве';
        $this->mSeo['subject'] = 'Страница визажа';
        $service_block = $this->ServicesModel->getServiceByUrl('makeup');
        $service = $this->services['makeup'];
        $service['service_block'] = $service_block;
        $service['pricelist'] = $this->getPriceBlock($service_block);
        $data['service'] = $service;
        unset($this->services['makeup']);
        $data['services'] = $this->services;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('makeup');
        $this->view($data);
    }

    public function staining()
    {
        $data['utm'] = $this->getUtm();
        $this->mSeo['title'] = 'Модное и стильное окрашивание волос рядом с метро Павелецкая в салоне красоты ' . PROJECT . ' в Москве';
        $this->mSeo['subject'] = 'Страница окрашивания';
        $service_block = $this->ServicesModel->getServiceByUrl('staining');
        $service = $this->services['staining'];
        $service['service_block'] = $service_block;
        $service['pricelist'] = $this->getPriceBlock($service_block);
        $data['service'] = $service;
        unset($this->services['staining']);
        $data['services'] = $this->services;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('staining');
        $this->view($data);
    }

    public function manicure()
    {
        $data['utm'] = $this->getUtm();
        $this->mSeo['title'] = 'Маникюр и педикюр рядом с метро Павелецкая в Москве в салоне красоты ' . PROJECT . ' в Москве';
        $this->mSeo['subject'] = 'Страница маникюра и педикюра';
        $service_block = $this->ServicesModel->getServiceByUrl('manicure');
        $service = $this->services['manicure'];
        $service['service_block'] = $service_block;
        $service['pricelist'] = $this->getPriceBlock($service_block);
        $data['service'] = $service;
        unset($this->services['manicure']);
        $data['services'] = $this->services;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('manicure');
        $this->view($data);
    }

    public function get_gallery_images()
    {
        $images = [];
        for ($i = 1; $i < 12; $i++) {
            $images[] = [
                'desktop_img' => "1170X400_$i.jpg",
                'tablet_img' => "768х263_$i.jpg",
                'mobile_img' => "576х197_$i.jpg",
            ];
        }
        return $images;
    }

    public function la_french()
    {
        $data['utm'] = $this->getUtm();
        $service_block = $this->ServicesModel->getServiceByUrl('staining');
        $service = $this->services['staining'];
        $service['service_block'] = $service_block;
        $service['pricelist'] = $this->getPriceBlock($service_block);
        $data['service'] = $service;
        $data['images'] = $this->get_gallery_images();
        $data['custom_menu'] = [
            '#Staining' => 'Окрашивание',
            '#Technique' => 'Техники',
            '#Features' => 'Преимущества',
            '/' => 'Салон',
            'https://modshairfranchise.ru' => 'Франшиза'
        ];
        $data['widget'] = $this->widget;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('main');
        $this->mSeo['title'] = 'Французское окрашивание в салоне  ' . PROJECT . ' от ведущих стилистов Москвы';
        $this->mSeo['subject'] = 'La French';

        $this->viewHead($data);
        echo view('Templates/header', $data);
        echo view('Templates/la_french', $data);
        echo view('Templates/contacts');
        echo view('Templates/footer', $data);
        echo view('Templates/popup_subscribe');
        echo view('Templates/popup_subscribe_widget', $data);
        echo view('Templates/promo_offer', $data);
        $this->viewFoot();
    }

    public function smart_haircut()
    {
        $data['utm'] = $this->getUtm();
        $service_block = $this->ServicesModel->getServiceByUrl('woman_haircut');
        $service = $this->services['woman_haircut'];
        $service['service_block'] = $service_block;
        $service['pricelist'] = $this->getPriceBlock($service_block);
        $data['service'] = $service;
        $data['images'] = $this->get_gallery_images();
        $data['custom_menu'] = [
            '#Haircut' => 'Стрижка',
            '#Features' => 'Преимущества',
            '#Technique' => 'Техники',
            '/' => 'Салон',
            'https://modshairfranchise.ru' => 'Франшиза'
        ];
        $data['widget'] = $this->widget;
        $data['seo_block'] = $this->BlockSeoModel->getBlockData('main');
        $this->mSeo['title'] = 'Умные стрижки в салоне  ' . PROJECT . ' от ведущих стилистов Москвы';
        $this->mSeo['subject'] = 'Умные стрижки';

        $this->viewHead($data);
        echo view('Templates/header', $data);
        echo view('Templates/smart_haircut', $data);
        echo view('Templates/contacts');
        echo view('Templates/footer', $data);
        echo view('Templates/popup_subscribe');
        echo view('Templates/popup_subscribe_widget', $data);
        echo view('Templates/promo_offer', $data);
        $this->viewFoot();
    }

    public function show404()
    {
        $data['utm'] = $this->getUtm();
        $this->response->setStatusCode(404);
        $this->viewHead($data);
        echo view('Templates/header', $data);
        echo view('Pages/404');
        echo view('Templates/footer');
        $this->viewFoot();
    }

    private function view(array $data)
    {
        $data['utm'] = $this->getUtm();
        $data['widget'] = $this->widget;
        $data['offers'] = $this->OffersModel->getAllOffers();
        $this->viewHead($data);
        echo view('Templates/header', $data);
        echo view('Templates/ms', $data);
        echo view('Templates/welcome', $data);
        echo view('Templates/style', $data);
        echo view('Templates/benefits', $data);
        echo view('Templates/team');
        echo view('Templates/promo', $data);
        echo view('Templates/style_more', $data);
        echo view('Templates/pricelist', $data);
        echo view('Templates/other_services', $data);
        echo view('Templates/about');
        echo view('Templates/total_look');
        //echo view('Templates/subscribe');
        echo view('Templates/catalog');
        echo view('Templates/privilege');
        echo view('Templates/offer', $data);
        echo view('Templates/contacts');
        echo view('Templates/seo_block', $data);
        echo view('Templates/footer');
        echo view('Templates/popup_subscribe', $data);
        echo view('Templates/popup_subscribe_widget', $data);
        echo view('Templates/promo_offer', $data);
        $this->viewFoot();
    }

    //--------------------------------------------------------------------

    private function addLead($request)
    {
        $db = Database::connect();
        $builder = $db->table('leads');

        $lead = [];
        $lead['name'] = $request['name'] ?? 'undefined';
        $lead['tel'] = $request['phone'] ?? $request['tel'] ;
        $lead['salon'] = 'modshairrussia';
        $lead['service'] = $request['widget'] ?? 'default';
        $lead['style'] = 'default';
        $lead['url'] = $_POST['url'] ?? 'default';
        $lead['utm'] = $this->getUtm() ?? 'default';
        $lead['term'] = urldecode($this->getTerm()) ?? 'default';

        return $builder->insert($lead);
    }

    private function telegramMessage($message, $type)
    {
        switch ($type) {
            case 'leed':
                $token = '684302573:AAH_f9OFhbPzOXGeBG7YxoLOLmKMPQsh9E4';
                $chat_id = '-1001717953269';
                $msg = '*Заявка с modshairrussia.ru*' . PHP_EOL;
                break;
            case 'academy':
                $token = '667336240:AAHoxjfnlAq2seHoeC_7-pvWCmO7copfYnI';
                $chat_id = '-416502600';
                $msg = '*Заявка на обучение*' . PHP_EOL;
                break;
            default:
                $token = '684302573:AAH_f9OFhbPzOXGeBG7YxoLOLmKMPQsh9E4';
                $chat_id = '-1001717953269';
                $msg = '*Заявка с modshairrussia.ru*' . PHP_EOL;
        }
        $msg .= $message;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $token . '/sendMessage');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'chat_id=' . $chat_id . '&text=' . urlencode($msg) . '&parse_mode=Markdown');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_exec($ch);
        curl_close($ch);
    }

    private function validateCaptcha($token) {
        $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LejgjYkAAAAAPRRi8D9yJW9nCmgbGgoS2LbHbB2&response=".$token."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        return $response['success'];
    }

    public function send()
    {
        if (!empty($_POST) && $this->validateCaptcha($_POST['token']) && $this->addLead($_POST)) {
            unset($_POST['token']);
            $telegram_message = '';
            $_POST['salon'] = 'Modshair';
            foreach ($_POST as $key => $value) {
                $telegram_message .= '*' . $this->getFormField($key) . '*: ' . $this->getFormValue($value) . PHP_EOL;
            }
            $form_name = $_POST['name'] ?? 'no_name';
            $form_phone = $_POST['phone'] ?? $_POST['tel'];
            if (!empty($_POST['subject']) && $_POST['subject'] === 'academy') {
                $this->telegramMessage($telegram_message, 'academy');
            } else {
                $this->telegramMessage($telegram_message, 'leed');
            }
            header('Content-Type: application/json');
            echo json_encode(['status' => 'ok', 'name' => $form_name, 'phone' => $form_phone]);
            exit();
        } else {
            header('Content-Type: application/json');
            echo json_encode(['status' => 'fail']);
            exit();
        }
    }

    private function getFormValue($name)
    {
        switch ($name) {
            case 'discount20':
                return 'Скидка 20%';
            default:
                return $name;
        }
    }
public function oferta()
{
    return view('Templates/oferta');
}

public function payment_refund()
{
    return view('Templates/payment_refund');
}

public function requisites()
{
    return view('Templates/requisites');
}

public function privacy_policy()
{
    return view('Templates/privacy_policy');
}

    private function getFormField($name)
    {
        switch ($name) {
            case 'widget':
                return 'Спецпредложение';
            case 'service':
                return 'Услуга';
            case 'name':
                return 'Имя';
            case 'salon':
                return 'Салон';
            case 'tel':
            case 'phone':
                return 'Телефон';
            case 'url':
                return 'URL:';
            case 'file':
                return 'Файл во вложении';
            case 'subject':
                return 'Тема';
            case 'time':
                return 'Время';
            case 'task':
                return 'Задача';
            case 'type':
                return 'Тип';
            case 'activity':
                return 'Деятельность';
            case 'products-services':
                return 'Продукты и услуги';
            case 'discount':
                return 'Скидка на первый визит';
            case 'ip':
                return 'IP';
            default:
                return 'undefined';
        }
    }
}
