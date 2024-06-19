<?php 
function add_deer_test_meta_boxes() {
    add_meta_box('deer_test_details', 'Deer Test Details', 'render_deer_test_meta_box', 'deer_test', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_deer_test_meta_boxes');

function render_deer_test_meta_box($post) {
    wp_nonce_field('deer_test_nonce_action', 'deer_test_nonce');

    $start_date = get_post_meta($post->ID, '_start_date', true);
    $end_date = get_post_meta($post->ID, '_end_date', true);
    $description = get_post_meta($post->ID, '_description', true);
    $cover_image = get_post_meta($post->ID, '_cover_image', true);
    $application_link = get_post_meta($post->ID, '_application_link', true);

    echo '<p><label for="start_date">Start Date:</label><input type="date" id="start_date" name="start_date" value="'.esc_attr($start_date).'" /></p>';
    echo '<p><label for="end_date">End Date:</label><input type="date" id="end_date" name="end_date" value="'.esc_attr($end_date).'" /></p>';
    echo '<p><label for="description">Description:</label><textarea id="description" name="description">'.esc_textarea($description).'</textarea></p>';
    echo '<p><label for="cover_image">Cover Image:</label><input type="text" id="cover_image" name="cover_image" value="'.esc_url($cover_image).'" /><button type="button" id="upload_cover_image_button">Upload Image</button></p>';
    echo '<p><label for="application_link">Application Link:</label><input type="url" id="application_link" name="application_link" value="'.esc_url($application_link).'" /></p>';
    echo '<script>
            jQuery(document).ready(function($){
                $("#upload_cover_image_button").click(function(e) {
                    e.preventDefault();
                    var image = wp.media({title: "Upload Image", multiple: false}).open().on("select", function() {
                        var uploaded_image = image.state().get("selection").first();
                        var image_url = uploaded_image.toJSON().url;
                        $("#cover_image").val(image_url);
                    });
                });
            });
          </script>';
}
