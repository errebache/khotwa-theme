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
    // Détection RTL (arabe par ex)
    $is_rtl = is_rtl();

    // Charger Bootstrap RTL ou normal
    if ($is_rtl) {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css');
    } else {
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    }

    // Feuille de style principale
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css',
        array(),
        '1.10.5'
    );
    // Styles personnalisés
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css', array('main-style', 'bootstrap-css'), null);
    wp_enqueue_style('responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array('main-style', 'bootstrap-css', 'custom-style'), null);

    // JS Bootstrap
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), null, true);
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/js/custom.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'khotwa_enqueue_assets');


// Charger le fichier WP_Bootstrap_Navwalker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';


function khotwa_load_textdomain() {
    load_theme_textdomain('khotwa', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'khotwa_load_textdomain');

/**
 * Register ACF options page
 */

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => __('Theme Options', 'khotwa'),
        'menu_title'    => __('Theme Options', 'khotwa'),
        'menu_slug'     => 'theme-options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => 2,
        'icon_url'      => 'dashicons-admin-generic',
    ));
}

add_action('init', function() {
    $test = get_field('footer_social_title', 'option');
    error_log('footer_social_title from init: ' . $test);
});

