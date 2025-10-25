<?php if (!empty($name) && !empty($values)) : ?>
    <?php $type = !empty($checkbox) && $checkbox ? 'checkbox' : 'radio'; ?>
    <div class="input_<?= $type; ?> <?= !empty($class) ? $class : ''; ?>">
        <?= !empty($title) ? '<p class="input_' . $type . '__title">' . $title . '</p>' : ''; ?>
        <?php foreach ($values as $value) : ?>
            <label class="input_<?= $type; ?>__item">
                <input class="input_<?= $type; ?>__item__input" type="<?= $type; ?>"
                       name="<?= $name; ?>" <?= !empty($value['required']) && $value['required'] ? 'required' : ''; ?>
                       value="<?= $value['value']; ?>" <?= !empty($value['checked']) && $value['checked'] ? 'checked' : ''; ?>>
                <span class="input_<?= $type; ?>__item__title"><?= $value['title']; ?></span>
            </label>
        <?php endforeach; ?>
    </div>
<?php endif; ?>