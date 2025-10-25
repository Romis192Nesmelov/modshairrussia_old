<?php
if (!isset($data) || !isset($fields)) {
    die('Form internal error');
}
?>
<form autocomplete="off"
    <?php echo array_key_exists('slug', $data) ? 'id="Update" data-request="' . $ajax . '"' : 'id="Add" method="post" accept-charset="utf-8" action="' . $post . '"'; ?>>
    <?php
    foreach ($fields as $field) {
        if (!array_key_exists('value', $field)) {
            $field['value'] = array_key_exists($field['name'], $data) ? $data[$field['name']] : '';
        }
        if (array_key_exists('slug', $data) && $data['slug'] == 'default') {
            $field['required'] = false;
        }
        if ($field['name'] == 'status' && array_key_exists('slug', $data) && $data['slug'] == 'default') {
            //DO nothing, we cant edit default visibility
        } else {
            $this->load->view('widgets/_input-' . $field['type'], $field);
        }
    }
    $this->load->view('widgets/_input-submit', array('value' => isset($data) && array_key_exists('slug', $data) && $data['slug'] ? 'Редактировать' : 'Добавить'));
    ?>
</form>
