<?php
// Récupération des champs ACF pour la bannière principale
// $bg_image = get_field('background_image');
$title = get_field('title');
$subtitle = get_field('subtitle');
$left_image = get_field('left_image');
$right_image = get_field('right_image');
$video_image = get_field('video_image');
$video_url = get_field('video_url');
$button_text = get_field('cta_button_text');
$button_url = get_field('cta_button_url');
$button_text_color = get_field('button_text_color') ?: '#FFFFFF'; // Couleur par défaut si non définie
$button_text_bgcolor = get_field('button_text_bgcolor') ?: '#FFFFFF'; // Couleur par défaut si non définie

// Vérifications des URLs d'images (tableau ou URL directe)
// $bg_image_url = is_array($bg_image) && isset($bg_image['url']) ? esc_url($bg_image['url']) : esc_url($bg_image);
$left_image_url = is_array($left_image) && isset($left_image['url']) ? esc_url($left_image['url']) : esc_url($left_image);
$right_image_url = is_array($right_image) && isset($right_image['url']) ? esc_url($right_image['url']) : esc_url($right_image);
$video_image_url = is_array($video_image) && isset($video_image['url']) ? esc_url($video_image['url']) : esc_url($video_image);
$key_benefits = get_field('key_benefits');
?>

<!-- Section Bannière -->
<?php if ($title || $subtitle): ?>
    <section class="banner py-5 text-center text-white">
        <div class="container">
            <div class="row align-items-center">

                <!-- Image gauche -->
                <?php if ($left_image_url): ?>
                    <div class="col-md-2 d-none d-md-block">
                        <img src="<?php echo $left_image_url; ?>" alt="Left Image" class="img-fluid">
                    </div>
                <?php endif; ?>

                <!-- Contenu principal -->
                <div class="col-md-8">
                    <?php if ($title): ?>
                        <h1 class="mb-3"><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>

                    <?php if ($subtitle): ?>
                        <p class="mb-4"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>

                    <!-- Liste des avantages principaux -->
                    <?php if ($key_benefits): ?>
                        <div class="row text-start mb-4">
                            <?php foreach ($key_benefits as $benefit):
                                $benefit_icon = $benefit['benefit_icon'];
                                $benefit_text = $benefit['benefit_text'];
                                $benefit_icon_url = is_array($benefit_icon) && isset($benefit_icon['url']) ? esc_url($benefit_icon['url']) : esc_url($benefit_icon);
                                ?>
                                <div class="col-md-6 d-flex mb-3">
                                    <?php if ($benefit_icon_url): ?>
                                        <img src="<?php echo $benefit_icon_url; ?>" alt="Benefit Image" class="me-3" style="width: 40px; height: 40px;">
                                    <?php endif; ?>
                                    <div><?php echo esc_html($benefit_text); ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Bouton d'appel à l'action -->
                    <?php if ($button_text && $button_url): ?>
                        <a style="color: <?php echo esc_attr($button_text_color); ?>; background-color: <?php echo esc_attr($button_text_bgcolor); ?>;"
                           href="<?php echo esc_url($button_url); ?>"
                           class="btn btn-warning mb-4">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    <?php endif; ?>

                    <!-- Image vidéo cliquable -->
                    <?php if ($video_image_url && $video_url): ?>
                        <div class="video-thumbnail mt-4">
                            <a href="<?php echo esc_url($video_url); ?>" target="_blank">
                                <img src="<?php echo $video_image_url; ?>" alt="Video Thumbnail" class="img-fluid rounded shadow">
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Image droite -->
                <?php if ($right_image_url): ?>
                    <div class="col-md-2 d-none d-md-block">
                        <img src="<?php echo $right_image_url; ?>" alt="Right Image" class="img-fluid">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
