<?php
/**
 * Functions file for Khotwa theme
 */

/**
 * Theme setup: menus, logos, featured images, etc.
 */
function khotwa_theme_setup() {
    // Support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Support for featured images
    add_theme_support('post-thumbnails');

    // Register a main menu
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'khotwa')
    ));
}
add_action('after_setup_theme', 'khotwa_theme_setup');

/**
 * Enqueue styles and scripts
 */
function khotwa_enqueue_assets() {
    // Enqueue the main stylesheet
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // Enqueue Bootstrap CSS (CDN)
    wp_enqueue_style('bootstrap-css', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css');

    // Enqueue additional styles (if you have custom styles)
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css', array(), null);

    // Enqueue Bootstrap JS (CDN)
    wp_enqueue_script('bootstrap-js', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Enqueue your custom JavaScript file
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'khotwa_enqueue_assets');

// Charger le fichier WP_Bootstrap_Navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
