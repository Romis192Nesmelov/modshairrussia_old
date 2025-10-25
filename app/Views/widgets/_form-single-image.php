<?php
if (!isset($params) || !isset($slug) || !isset($type)) {
    echo 'whoops';
}
?>
<form class="w-1 img-uploader" autocomplete="off">
    <input type="hidden" name="type" value="<?php echo $type; ?>">
    <input type="hidden" name="slug" value="<?php echo $slug; ?>">
    <input type="hidden" name="img_name" value="<?php echo $params['name']; ?>">
    <?php if (array_key_exists('slug', $params)) : ?>
        <input type="hidden" name="img_slug" value="<?php echo $params['slug']; ?>">
    <?php endif; ?>
    <h3 class="title"><?php echo $params['title']; ?>:</h3>
    <div class="row w-1">
        <div class="input-group file <?php echo $disabled ? 'disabled' : ''; ?>">
            <label class="rules">
                <b>Требования:</b><br/>
                Размер файла: <?php echo $params['max_size'] / 1000; ?> кб.
                Ширина: <?php echo $params['min_width'] . 'px - ' . $params['max_width'] . 'px'; ?>
                Высота: <?php echo $params['min_height'] . 'px - ' . $params['max_height'] . 'px'; ?>
                Тип: <?php echo $params['ext']; ?>
            </label>
            <input id="<?php echo $params['name']; ?>" type="file" name="upload[]" class="<?php echo $disabled ? 'disabled' : ''; ?>"
                   accept="<?php echo $params['mime']; ?>">
            <label for="<?php echo $params['name']; ?>" class="upload">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 17">
                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                </svg>
                <span>Выберите изображение...</span>
            </label>
        </div>
        <div class="img">
            <img src="<?php echo base_url(); ?>media/<?php echo $type; ?>/<?php echo $slug; ?>/<?php echo $params['name']; ?>.<?php echo $params['ext']; ?>"
                 alt="<?php echo $params['title']; ?>"
                 onerror="this.src='<?php echo base_url(); ?>assets/onerror/<?php echo $type; ?>/<?php echo $params['name']; ?>.<?php echo $params['ext']; ?>'">
        </div>
    </div>
</form>
