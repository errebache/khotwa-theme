<?php
// Récupération des champs ACF pour la section Process
$titre_de_process = get_field('titre_de_process', false, false);
$background_de_process = get_field('background_de_process');
$process_repetetor     = get_field('process_repetetor');
$text_button_process   = get_field('text_button_process');

// Valeurs par défaut si les champs ne sont pas renseignés
if (!$titre_de_process) {
    $titre_de_process = 'كيف تبدأ رحلتك معنا في ثلاث خطوات ؟';
}

$default_bg = get_template_directory_uri() . '/assets/img/footer-red.png'; // Image de fond par défaut
if (is_array($background_de_process) && isset($background_de_process['url'])) {
    $background_url = esc_url($background_de_process['url']);
} elseif (!empty($background_de_process) && is_string($background_de_process)) {
    $background_url = esc_url($background_de_process);
} else {
    $background_url = $default_bg;
}
?>

<!-- Section Process -->
<section class="process-section text-white position-relative" style="background: linear-gradient(rgba(123,4,31,0.7), rgba(123,4,31,0.7)), url('<?php echo $background_url; ?>'); background-size: cover; background-position: center;">
 <!-- Image Vector3 positionnée sur le background, sous le contenu -->
 <div class="vector3-container">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Vector3.png" alt="Vector3" class="vector3-image">
    </div>    
<!-- Icônes décoratives -->
    <div class="icon-top-left">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Top Left" class="icon-shape">
    </div>
    <div class="icon-top-right">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Top Right" class="icon-shape">
    </div>

    <div class="container py-5">
        <!-- Titre de la section -->
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h2 class="steps-title"><?php echo esc_html($titre_de_process); ?></h2>
            </div>
        </div>

        <!-- Boucle sur le répéteur pour afficher chaque étape -->
        <div class="row gy-4">
            <?php
            if (have_rows('process_repetetor')):
                $i = 1;
                while (have_rows('process_repetetor')): the_row();
                    $titre_de_step      = get_sub_field('titre_de_step');
                    $image_de_step      = get_sub_field('image_de_step');
                    $sous_titre_de_step = get_sub_field('sous_titre_de_step');
                    $paragraphe_de_step = get_sub_field('paragraphe_de_step');

                    // Valeurs par défaut si non définies
                    $default_step_title      = 'عنوان الخطوة';
                    $default_step_subtitle   = 'Sous-titre';
                    $default_step_paragraph  = 'Description de l\'étape';
                    $default_step_image      = get_template_directory_uri() . '/assets/img/step-default.png';

                    if (empty($titre_de_step)) {
                        $titre_de_step = $default_step_title;
                    }
                    if (empty($sous_titre_de_step)) {
                        $sous_titre_de_step = $default_step_subtitle;
                    }
                    if (empty($paragraphe_de_step)) {
                        $paragraphe_de_step = $default_step_paragraph;
                    }
                    // Récupération de l'image de l'étape
                    if (is_array($image_de_step) && isset($image_de_step['url'])) {
                        $step_image_url = esc_url($image_de_step['url']);
                    } elseif (!empty($image_de_step) && is_string($image_de_step)) {
                        $step_image_url = esc_url($image_de_step);
                    } else {
                        $step_image_url = $default_step_image;
                    }
            ?>
            <div class="col-md-4 text-center step-<?php echo $i; ?>">
                <div class="step-box p-3">
                    <!-- Numéro d'étape avec la même couleur que le titre -->
                    <div class="step-number">.<?php echo $i; ?></div>
                    <h3 class="step-heading"><?php echo esc_html($titre_de_step); ?></h3>
                    
                    <!-- Conteneur d'image à hauteur fixe pour aligner les sous-titres -->
                    <div class="step-image-container mb-3">
                        <img src="<?php echo $step_image_url; ?>" alt="<?php echo esc_attr($titre_de_step); ?>" class="step-image">
                    </div>
                    
                    <h4 class="step-subtitle"><?php echo esc_html($sous_titre_de_step); ?></h4>
                    <p class="step-description"><?php echo $paragraphe_de_step; ?></p>
                </div>
            </div>
            <?php
                    $i++;
                endwhile;
            else:
                // Exemple par défaut si aucun répéteur n'est défini
            ?>
            <div class="col-md-4 text-center step-1">
                <div class="step-box p-3">
                    <div class="step-number">.1</div>
                    <h3 class="step-heading">التوجيه</h3>
                    <div class="step-image-container mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/step1.png" alt="التوجيه" class="step-image">
                    </div>
                    <h4 class="step-subtitle">نحدد معًا وجهتك المثالية</h4>
                    <p class="step-description">
                        جلسة مجانية لتقييم طموحاتك، واختيار الجامعة والتخصص المناسبين، مع إجابة على جميع استفساراتك حول الدراسة والمنح بالخارج.
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-center step-2">
                <div class="step-box p-3">
                    <div class="step-number">.2</div>
                    <h3 class="step-heading">التسجيل</h3>
                    <div class="step-image-container mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/step2.png" alt="التسجيل" class="step-image">
                    </div>
                    <h4 class="step-subtitle">عنوان قصير أو جملة تحفيزية</h4>
                    <p class="step-description">
                        وصف مختصر للخطوة الثانية، مع توضيح الإجراءات والخطوات اللازمة لاستكمال العملية بنجاح.
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-center step-3">
                <div class="step-box p-3">
                    <div class="step-number">.3</div>
                    <h3 class="step-heading">السفر</h3>
                    <div class="step-image-container mb-3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/step3.png" alt="السفر" class="step-image">
                    </div>
                    <h4 class="step-subtitle">انطلق نحو المستقبل</h4>
                    <p class="step-description">
                        التجهيز للسفر والبدء في تجربة دراسية جديدة، خطوة نحو المستقبل.
                    </p>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Bouton d'appel à l'action -->
       
        <?php if ($text_button_process): ?>
  <div class="row mt-5">
    <div class="col-12 text-center">
      <a href="#" class="btn-consultation"><?php echo esc_html($text_button_process); ?></a>
    </div>
  </div>
<?php else: ?>
  <div class="row mt-5">
    <div class="col-12 text-center">
      <a href="#" class="btn-consultation">احجز استشارتك المجانية</a>
    </div>
  </div>
<?php endif; ?>

    </div>
</section>
