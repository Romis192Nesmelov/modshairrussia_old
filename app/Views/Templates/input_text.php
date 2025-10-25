<?php if (!empty($name)) : ?>
    <?php $uid = uniqid('input_text_'); ?>
    <div class="input_text <?= !empty($class) ? $class : ''; ?>">
        <?php if (!empty($label)) : ?>
            <label for="<?= $uid; ?>"><?= $label; ?></label>
        <?php endif; ?>
        <input id="<?= $uid; ?>" type="text" placeholder="<?= !empty($placeholder) ? $placeholder : ''; ?>" name="<?= $name; ?>"
               value="<?= !empty($value) ? htmlspecialchars($value) : ''; ?>" <?= !empty($required) && $required ? 'required' : ''; ?>>
    </div>
<?php endif; ?>