<?php
// Récupération des champs ACF du groupe "process home"
$bg_process           = get_field('background_de_process');
$titre_process        = get_field('titre_de_process');
$process_repetetor    = get_field('process_repetetor');
$text_button_process  = get_field('text_button_process');

// Traitement de l'image de fond (si le champ n'est pas renseigné, on utilise une image par défaut)
$bg_process_url = $bg_process 
    ? ( is_array($bg_process) && isset($bg_process['url']) ? esc_url($bg_process['url']) : esc_url($bg_process) )
    : get_template_directory_uri() . '/assets/img/footer-red.png';
?>

<!-- Section Process Home -->
<section class="process-home-section" style="background: linear-gradient(rgba(123, 4, 31, 0.7), rgba(123, 4, 31, 0.7)), url('<?php echo $bg_process_url; ?>'); background-size: cover; background-position: center;">
    <div class="container py-5 text-white text-center">
        
        <!-- Titre principal -->
        <?php if ( $titre_process ) : ?>
            <div class="process-title mb-4">
                <?php echo wp_kses_post($titre_process); ?>
            </div>
        <?php endif; ?>

        <!-- Boucle sur les étapes du répéteur -->
        <?php if ( $process_repetetor ) : ?>
            <div class="row process-steps">
                <?php $step_index = 1; foreach ( $process_repetetor as $step ) : ?>
                    <div class="col-md-4 process-step mb-4">
                        <!-- Numéro de l'étape -->
                        <div class="step-number mb-2">.<?php echo $step_index; ?></div>
                        
                        <!-- Titre de l'étape -->
                        <?php if ( !empty($step['titre_de_step']) ) : ?>
                            <h3 class="step-heading mb-2"><?php echo esc_html($step['titre_de_step']); ?></h3>
                        <?php endif; ?>

                        <!-- Image de l'étape -->
                        <?php if ( !empty($step['image_de_step']) ) : 
                            $step_image = $step['image_de_step'];
                            $step_image_url = is_array($step_image) && isset($step_image['url']) ? esc_url($step_image['url']) : esc_url($step_image);
                        ?>
                            <img src="<?php echo $step_image_url; ?>" alt="<?php echo esc_attr($step['titre_de_step']); ?>" class="img-fluid step-image mb-3" />
                        <?php endif; ?>

                        <!-- Sous-titre de l'étape -->
                        <?php if ( !empty($step['sous_titre_de_step']) ) : ?>
                            <h4 class="step-subtitle mb-2"><?php echo esc_html($step['sous_titre_de_step']); ?></h4>
                        <?php endif; ?>

                        <!-- Paragraphe descriptif -->
                        <?php if ( !empty($step['paragraphe_de_step']) ) : ?>
                            <div class="step-description"><?php echo wp_kses_post($step['paragraphe_de_step']); ?></div>
                        <?php endif; ?>
                    </div>
                <?php $step_index++; endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Bouton d'appel à l'action -->
        <?php if ( $text_button_process ) : ?>
            <div class="process-button mt-4">
                <a href="#" class="btn btn-primary">
                    <?php echo esc_html($text_button_process); ?>
                </a>
            </div>
        <?php endif; ?>
        
    </div>
</section>