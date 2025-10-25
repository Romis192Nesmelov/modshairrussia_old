<?php if (empty($seo)) {
    die('Internal error');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="format-detection" content="telephone=no">
    <!-- SEO -->
    <meta name="description" content="<?= array_key_exists('description', $seo) ? $seo['description'] : ''; ?>">
    <meta name="subject" content="<?= array_key_exists('subject', $seo) ? $seo['subject'] : ''; ?>">
    <meta name="keywords" content="<?= array_key_exists('keywords', $seo) ? $seo['keywords'] : ''; ?>">
    <!-- OGP -->
    <meta property="og:title" content="<?= array_key_exists('title', $seo) ? $seo['title'] : ''; ?>">
    <meta property="og:description" content="<?= array_key_exists('description_s', $seo) ? $seo['description_s'] : ''; ?>">
    <meta property="og:url" content="<?= current_url(); ?>">
    <meta property="og:image" content="<?= current_url(); ?>media/logo_ogp.jpg">
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url(); ?>/media/favicon/favicon-16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="<?= base_url(); ?>/media/favicon/favicon-32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?= base_url(); ?>/media/favicon/favicon-48.png" sizes="48x48" type="image/png">
    <link rel="icon" href="<?= base_url(); ?>/media/favicon/favicon-62.png" sizes="62x62" type="image/png">
    <link rel="icon" href="<?= base_url(); ?>/media/favicon/favicon-192.png" sizes="192x192" type="image/png">
    <link rel="apple-touch-icon" href="<?= base_url(); ?>/media/favicon/favicon-apple.png">
    <!-- Google -->
    <meta itemprop="name" content="<?= array_key_exists('title', $seo) ? $seo['title'] : ''; ?>"/>
    <meta itemprop="description" content="<?= array_key_exists('description_s', $seo) ? $seo['description_s'] : ''; ?>"/>
    <meta itemprop="image" content="<?= current_url(); ?>/media/logo_ogp.jpg"/>
    <!-- Прочее -->
    <link rel="canonical" href="<?= current_url(); ?>"/>
    <title><?= array_key_exists('title', $seo) ? $seo['title'] : ''; ?></title>
    <!-- Style -->
    <link href="<?php echo base_url(); ?>/assets/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>/assets/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>/assets/css/fonts.css" type="text/css" rel="stylesheet">
    <?php // ПРИ ИЗМЕНЕНЕИИ CSS минимизируем исходный файл и подставляем дату модификации ниже ?>
    <link href="<?= base_url(); ?>/assets/css/style.min.css?<?= '17.06.2021' ?>" type="text/css" rel="stylesheet">
    <?php if (ENVIRONMENT == 'production') : ?>
        <!-- Yandex.Metrika counter -->
        <script> (function (m, e, t, r, i, k, a) {
                m[i] = m[i] || function () {
                    (m[i].a = m[i].a || []).push(arguments)
                };
                m[i].l = 1 * new Date();
                k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
            })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
            ym(53846524, "init", {clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true, trackHash: true}); </script>
        <!-- /Yandex.Metrika counter -->
        <script>
            function gtag() {}
        </script>
    <?php endif; ?>
    <script>
        let $_BASEURL = '<?= base_url(); ?>/';
    </script>
</head>
<body>
