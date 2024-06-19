<?php 
/*
 * Plugin Name:       Deer Tests CPT
 * Plugin URI:        https://github.com/lucassdantas/DD-WordPress-Test---Lucas-Dantas
 * Description:       CPT for Deer Tests
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Lucas Dantas
 * Author URI:        linkedin.com/in/lucas-de-sousa-dantas/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */


defined('ABSPATH') or die('not allowed');

function create_deer_tests_cpt() {
    register_post_type('deer_test', array(
        'label' => 'Deer Tests',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
    ));
}
add_action('init', 'create_deer_tests_cpt');

require_once plugin_dir_path(__FILE__) . 'src/add-meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'src/save-meta-box-data.php';
