<?php 

function save_deer_test_meta_box_data($post_id) {
    if (!isset($_POST['deer_test_nonce']) || !wp_verify_nonce($_POST['deer_test_nonce'], 'deer_test_nonce_action')) return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_start_date', sanitize_text_field($_POST['start_date']));
    update_post_meta($post_id, '_end_date', sanitize_text_field($_POST['end_date']));
    update_post_meta($post_id, '_description', sanitize_textarea_field($_POST['description']));
    update_post_meta($post_id, '_cover_image', esc_url_raw($_POST['cover_image']));
    update_post_meta($post_id, '_application_link', esc_url_raw($_POST['application_link']));
}
add_action('save_post', 'save_deer_test_meta_box_data');
