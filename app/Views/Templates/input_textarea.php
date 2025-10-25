<?php if (!empty($name)) : ?>
    <?php $uid = !empty($id) ? $id : uniqid('input_textarea_'); ?>
    <div class="input_text input_textarea">
        <?php if (!empty($label)) : ?>
            <label for="<?= $uid; ?>"><?= $label; ?></label>
        <?php endif; ?>
        <textarea id="<?= $uid; ?>" placeholder="<?= !empty($placeholder) ? $placeholder : ''; ?>"
                  name="<?= $name; ?>" <?= !empty($required) && $required ? 'required' : ''; ?>><?= !empty($value) ? htmlspecialchars($value) : ''; ?></textarea>
    </div>
<?php endif; ?>