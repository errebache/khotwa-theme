<?php
/**
 * Template Name: Service Template
 * Description: A page template for Home pages, displaying ACF fields (banner, etc.)
 */

get_header(); // Récupère le header.php du thème
?>

<div>
    <!-- Affichage des sections spécifiques au HomePage -->
    <div class="country-sections">
       
    </div>
    <?php
        // Affiche chaque section si elle est configurée dans ACF
         get_template_part('template-parts/service/section_service');
        ?>
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