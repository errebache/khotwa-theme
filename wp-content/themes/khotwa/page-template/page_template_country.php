<?php
/**
 * Template Name: Country Template
 * Description: A page template for country-specific pages, displaying ACF fields (banner, etc.)
 */

get_header(); // Récupère le header.php du thème
?>

<div>
    <!-- Affichage des sections spécifiques au pays -->
    <div class="country-sections">
        <?php
        // Affiche chaque section si elle est configurée dans ACF
        get_template_part('template-parts/country/why-choose');
        get_template_part('template-parts/country/process-section');
        get_template_part('template-parts/country/consultation-section');
        get_template_part('template-parts/country/testimonial-section');
        get_template_part('template-parts/country/study-countries-section');
        get_template_part('template-parts/country/reviews-section');
        get_template_part('template-parts/country/faq-section');
        ?>
    </div>

    <!-- Affichage du contenu principal de la page -->
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>

</div>

<?php
get_footer(); // Récupère le footer.php du thème
?>
