<?php
if (!isset($slug) || !isset($name) || !isset($type)) {
    die('internal selector error');
}
?>
<a class="item" data-slug="<?php echo $slug; ?>" href="<?php echo base_url() . 'dashboard/' . $type . '/' . $slug; ?><?php echo isset($get) ? $get : ''; ?>">
    <img src="<?php echo base_url(); ?>media/<?php echo isset($custom_img_path) ? $custom_img_path : $type . '/' . $slug; ?>/preview_small.jpg"
         onerror="this.src='<?php echo base_url(); ?>assets/onerror/<?php echo $type; ?>/preview_small.jpg'">
    <p><?php echo $name; ?></p>
</a>
