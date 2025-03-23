<?php
/**
 * The template for displaying the header
 *
 * @package Khotwa
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Wrapper for all the content -->
<div class="wrapper">

    <!-- Header Section -->
    <header class="header">
        <!-- Navbar Bootstrap -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">

                <!-- Logo Dynamique -->
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <h1><?php bloginfo('name'); ?></h1>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Bouton pour le menu responsive -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu Dynamique -->
                <div class="collapse navbar-collapse" id="mainMenu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container'      => false,
                        'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                        'fallback_cb'    => false,
                        'walker'         => new WP_Bootstrap_Navwalker() // Pour un affichage correct avec Bootstrap
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main id="content" class="site-main">
