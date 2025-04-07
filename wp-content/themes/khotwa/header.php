<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php
    /**
     * The template for displaying the header
     *
     * @package Khotwa
     * @since 1.0.0
     */

    // Vérification si ACF est installé
    if (!function_exists('get_field')) return;

    // Récupération des données ACF
    $bg_image                = get_field('background_image');
    $bg_image_url            = is_array($bg_image) && isset($bg_image['url']) ? esc_url($bg_image['url']) : esc_url($bg_image);
    $header_background_color = get_field('header_background_color');
    $cta_button_text         = get_field('cta_button_text') ?: 'استشارة مجانية';
    $cta_button_color        = get_field('cta_button_color') ?: '#ffffff';
    $cta_button_bgcolor      = get_field('cta_button_bgcolor') ?: '#b9131f';
    $cta_button_hover_color  = get_field('cta_button_hover_color') ?: '#ffffff';
    $cta_button_hover_bgcolor = get_field('cta_button_hover_bgcolor') ?: '#ff4d4d';

    // Détection automatique de la direction (RTL / LTR)
    $is_rtl           = is_rtl();
    $current_language = substr(get_locale(), 0, 2);
    $direction_class  = ($is_rtl && $current_language === 'ar') ? 'rtl' : 'ltr';
    ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>

    <style>
        /* ------------------------------
           FONT-FACE (exemple)
        ------------------------------ */
        @font-face {
            font-family: 'FF Shamel Sans';
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/FFShamelFamilySansOneBook.ttf') format('truetype'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/FFShamelFamilySansOneBook.woff2') format('woff2'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/FFShamelFamilySansOneBook.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        /* ------------------------------
           BANNER SECTION
        ------------------------------ */
        .banner_section {
            background-image: url('<?php echo $bg_image_url; ?>');
        }

        /* ------------------------------
           CTA BUTTON
        ------------------------------ */
        .cta-button {
            background-color: <?php echo esc_attr($cta_button_bgcolor); ?>;
            color: <?php echo esc_attr($cta_button_color); ?>;
        }

        .cta-button:hover {
            background-color: <?php echo esc_attr($cta_button_hover_bgcolor); ?>;
            color: <?php echo esc_attr($cta_button_hover_color); ?>;
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper">
        <!-- BANNER SECTION -->
        <section class="banner_section">
            <!-- HEADER -->
            <header class="header <?php echo $direction_class; ?>">
                <div class="navbar-container">
                    <!-- LOGO -->
                    <div class="navbar-brand">
                        <?php if (has_custom_logo()) : ?>
                            <?php the_custom_logo(); ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <h1><?php bloginfo('name'); ?></h1>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- BOUTON BURGER (mobile) -->
                    <button class="menu-toggle" aria-label="Toggle navigation">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/menu_icon.png" alt="Icône du menu">
                    </button>

                    <!-- MENU NAVBAR -->
                    <div class="navbar-collapse">
                        <button id="closeMenu" type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'navbar-menu',
                            'fallback_cb'    => false,
                        ));
                        ?>
                        <?php
                        $langs = pll_the_languages(['raw' => 1]);

                        $flags = [
                            'fr' => 'http://khotwa.local/wp-content/plugins/polylang/flags/fr.png',
                            'ar' => 'http://khotwa.local/wp-content/plugins/polylang/flags/arab.png',
                        ];
                        ?>
                        <!-- Bouton CTA pour mobile intégré dans le menu -->
                        <button class="cta-button mobile">
                            <?php echo esc_html($cta_button_text); ?>
                        </button>
                    </div>

                    <!-- Bouton CTA pour desktop -->
                    <button class="cta-button desktop">
                        <?php echo esc_html($cta_button_text); ?>
                    </button>
                </div>
            </header>

        <!-- Bannière (exemple pour un pays) -->
        <?php get_template_part('template-parts/common/banner'); ?>
    </section>
           


                <!-- Bouton CTA pour desktop -->
                <button class="cta-button desktop">
                    <?php echo esc_html($cta_button_text); ?>
                </button>
            </div>
        </header>

        <!-- Bannière (exemple pour un pays) -->
        <?php get_template_part('template-parts/common/banner'); ?>
    </section>

            <!-- Bannière (exemple pour un pays) -->
            <?php get_template_part('template-parts/country/banner_country'); ?>
        </section>


        <!-- MAIN CONTENT -->
        <main>
            <!-- ... le reste de ton contenu ... -->