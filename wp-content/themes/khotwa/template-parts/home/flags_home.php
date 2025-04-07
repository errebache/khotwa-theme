<?php
// Récupération des champs ACF
$bg_top = get_field('background_top_destination');
$avatar_image = get_field('avatar_image_students');
$nombre_avatar = get_field('nombre_avatar_students');
$titre_destination = get_field('titre_destination');
$image_flag = get_field('image_destination_flag');
$bg_map = get_field('background_destination_map');
$paragraphe_destination = get_field('paragraphe_destination');

// Gestion des URLs (tableau ou URL directe) et fallback vers des images par défaut
$bg_top_url = $bg_top
    ? (is_array($bg_top) && isset($bg_top['url']) ? esc_url($bg_top['url']) : esc_url($bg_top))
    : get_template_directory_uri() . '/assets/img/background_top_destination.png';

$avatar_image_url = $avatar_image
    ? (is_array($avatar_image) && isset($avatar_image['url']) ? esc_url($avatar_image['url']) : esc_url($avatar_image))
    : get_template_directory_uri() . '/assets/img/avatar_image_students.png';

$bg_map_url = $bg_map
    ? (is_array($bg_map) && isset($bg_map['url']) ? esc_url($bg_map['url']) : esc_url($bg_map))
    : get_template_directory_uri() . '/assets/img/background_destination_map.png';

$image_flag_url = $image_flag
    ? (is_array($image_flag) && isset($image_flag['url']) ? esc_url($image_flag['url']) : esc_url($image_flag))
    : get_template_directory_uri() . '/assets/img/image_destination_flag.png';

// Fallback pour les textes
$nombre_avatar = $nombre_avatar ?: '12000+ طلب';
$titre_destination = $titre_destination ?: "اختر وجهتك ودعنا نرسم<br>خططك المستقبلية";
$paragraphe_destination = $paragraphe_destination
    ?: "نحن لسنا مجرد وكالة تعليمية، نحن شركاء رحلتك<br>لتحقيق المستقبل الذي تستحقه مع \"خطوة\"، نحن<br>معك في كل لحظة، من الحلم إلى الانطلاق!";
?>

<!-- SECTION DESTINATION -->
<section class="destination-section">
    <!-- Image de fond en haut, pleine largeur sans marge -->
    <div class="background-top-destination">
        <img
            src="<?php echo $bg_top_url; ?>"
            alt="Background Top Destination"
            class="img-fluid w-100">
    </div>

    <!-- Contenu principal -->
    <div class="container py-4">
        <!-- Bloc : avatar + texte (remonté avec marge négative) -->
        <div class="row avatar-row">
            <div class="col-12 text-center mb-3">
                <!-- Avatar et texte dans une seule ligne -->
                <div class="d-inline-flex align-items-center">
                    <img
                        src="<?php echo $avatar_image_url; ?>"
                        alt="Avatar Étudiants"
                        class="avatar-image">
                    <span class="text-orange fw-bold">
                        <?php echo esc_html($nombre_avatar); ?>
                    </span>
                </div>
            </div>
        </div>

        <!-- Titre de la destination -->
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h2 class="destination-title text-violet fw-bold">
                    <?php // On autorise le HTML (ex: <br>) si vous le souhaitez 
                    ?>
                    <?php echo wp_kses_post($titre_destination); ?>
                </h2>
            </div>
        </div>

        <!-- Carte de la destination avec drapeau positionné dessus -->
        <div class="row mb-2">
            <div class="col-12 text-center position-relative">
                <img
                    src="<?php echo $bg_map_url; ?>"
                    alt="Carte de la destination"
                    class="maps-overlay">
                <img
                    src="<?php echo $image_flag_url; ?>"
                    alt="Drapeau de la destination"
                    class="flag-overlay">
            </div>
        </div>

        <!-- Paragraphe descriptif -->
        <div class="row description-row">
            <div class="col-12 text-center">
                <div class="destination-paragraph">
                    <?php echo wp_kses_post($paragraphe_destination); ?>
                </div>
            </div>
        </div>
    </div>
</section>