<?php
$title = get_field('title');
$subtitle = get_field('subtitle');
$is_banner_home_page = get_field('is_banner_home_page');
$left_image = get_field('left_image');
$right_image = get_field('right_image');
$video_image = get_field('video_image');
$video_url = get_field('video_url');
$button_text = get_field('cta_button_text');
$button_url = get_field('cta_button_url');
$button_text_color = get_field('button_text_color') ?: '#68021A'; // Couleur par défaut si non définie
$button_text_bgcolor = get_field('button_text_bgcolor') ?: '#FFB223'; // Couleur par défaut si non définie

// Vérifications des URLs d'images (tableau ou URL directe)
$left_image_url = is_array($left_image) && isset($left_image['url']) ? esc_url($left_image['url']) : esc_url($left_image);
$right_image_url = is_array($right_image) && isset($right_image['url']) ? esc_url($right_image['url']) : esc_url($right_image);
$video_image_url = is_array($video_image) && isset($video_image['url']) ? esc_url($video_image['url']) : esc_url($video_image);
$key_benefits = get_field('key_benefits');
?>


<style>
    .cta-banner {
        background-color: <?php echo esc_attr($button_text_bgcolor); ?>;
        color: <?php echo esc_attr($button_text_color); ?>;
    }
    .cta-button:hover {
        background-color: <?php echo esc_attr($cta_button_hover_bgcolor); ?>;
        color: <?php echo esc_attr($cta_button_hover_color); ?>;
    }
</style>

<!-- Section Bannière -->
<?php if ($title || $subtitle): ?>
    <section class="banner py-2 text-center text-white">
        <div class="container">
            <div class="row align-items-center">

                <!-- Image gauche -->
                <?php if ($left_image_url): ?>
                    <div class="left_image_banner desktop img_banner">
                        <img src="<?php echo $left_image_url; ?>" alt="Left Image" class="img-fluid">
                    </div>
                <?php endif; ?>

                <!-- Contenu principal -->
                <div class="col-md-12 text-center">
                    <?php if ($title): ?>
                        <h1 class="title mb-3"><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>

                    <?php if ($is_banner_home_page && $subtitle): ?>
                        <p class="sub_title mb-4"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>

                    <!-- Liste des avantages principaux -->
                    <?php if ($key_benefits): ?>
                        <div class="benefit justify-content-center text-center mb-4">
                            <div class="row">
                            <?php foreach ($key_benefits as $benefit):
                                $benefit_icon = $benefit['benefit_icon'];
                                $benefit_text = $benefit['benefit_text'];
                                $benefit_icon_url = is_array($benefit_icon) && isset($benefit_icon['url']) ? esc_url($benefit_icon['url']) : esc_url($benefit_icon);
                                ?>
                                <div class="col-6 col-md-3 d-flex align-items-center justify-content-center mb-3">
                                    <?php if ($benefit_icon_url): ?>
                                        <img src="<?php echo $benefit_icon_url; ?>" alt="Benefit Icon" class="me-2">
                                    <?php endif; ?>
                                    <span class="txt_list"><?php echo esc_html($benefit_text); ?></span>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($button_text && $button_url): ?>
                        <a class="cta-banner"
                            href="<?php echo esc_url($button_url); ?>"
                            class="btn btn-warning mb-4">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($left_image_url): ?>
                        <div class="left_image_banner mobile img_banner py-5">
                            <img src="<?php echo $left_image_url; ?>" alt="Left Image" class="img-fluid">
                        </div>
                    <?php endif; ?> 
                    <!-- Bouton d'appel à l'action -->
                    <?php if ($is_banner_home_page): ?>      
                        <div class="is_homepage">
                            <!-- Image vidéo cliquable -->
                            <?php if ($video_image_url && $video_url): ?>
                                <div class="video-thumbnail">
                                  <a href="#"
                                    class="video-trigger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#videoModal"
                                    data-video-url="<?php echo esc_url(get_field('video_url')); ?>">
                                        <img src="<?php echo $video_image_url; ?>" alt="Video Thumbnail" class="img-fluid rounded shadow">
                                    </a>
                                    <span class="play-icon"
                                    data-bs-toggle="modal"
                                    data-bs-target="#videoModal"
                                    data-video-url="<?php echo esc_url(get_field('video_url')); ?>"
                                    >
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/play_icon.png" alt="Play Icon">
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="is_country_page">
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
                    <?php endif; ?>
                </div>
                <!-- Image droite -->
                <?php if ($right_image_url): ?>
                    <div class="right_image desktop img_banner">
                        <img src="<?php echo $right_image_url; ?>" alt="Right Image" class="img-fluid">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
