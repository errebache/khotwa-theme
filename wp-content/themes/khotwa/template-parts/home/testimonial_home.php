<?php
/**
 * Template Name: Page Testimonial (Desktop + Mobile Sliders) - Inversion
 */

// 1) Récupération des champs ACF
$top_bg            = get_field('image_top_section_testimonial');
$titre_testimonial = get_field('titre_testimonial');
$couleur_btn       = get_field('couleur_next_previous_buttons');
$repetetor         = get_field('testimonial_repetetor');

// 2) Fonction utilitaire pour récupérer l'URL d'une image ACF
function get_image_url_acf($field, $fallback = '/assets/img/background_top_testimonial.png') {
  if (is_array($field) && !empty($field['url'])) {
    return esc_url($field['url']);
  }
  return esc_url(get_template_directory_uri() . $fallback);
}

// 3) Injection de la couleur des boutons (si définie)
if ($couleur_btn) {
  add_action('wp_head', function() use ($couleur_btn) {
    ?>
    <style>
      .btn-circle {
        border-color: <?php echo esc_attr($couleur_btn); ?> !important;
        color: <?php echo esc_attr($couleur_btn); ?> !important;
      }
      .btn-circle:hover {
        background-color: <?php echo esc_attr($couleur_btn); ?> !important;
        color: #fff !important;
      }
    </style>
    <?php
  });
}

// 4) Préparer l'URL de l'image de fond pour le top
$top_bg_url = get_image_url_acf($top_bg);

// 5) Déterminer si le site est en RTL ou LTR
$is_rtl = is_rtl(); // Si true, on applique la configuration LTR inversée ; sinon, on applique la configuration RTL inversée.

// get_header() si nécessaire
get_header();
?>

<!-- ==========================
     SECTION Desktop
========================== -->
<section class="testimonial-section pt-5 pb-2 d-none d-md-block"
         <?php echo $is_rtl ? 'dir="rtl"' : 'dir="ltr"'; ?>>
  <!-- Icônes décoratives statiques -->
  <div class="testimonial-top-right">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png"
         alt="Icon Top Right" class="testimonial-shape">
  </div>
  <div class="testimonial-bottom-left">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png"
         alt="Icon Bottom Left" class="testimonial-shape">
  </div>

  <!-- Image de fond en haut -->
  <div class="testimonial-top-bg">
    <img src="<?php echo $top_bg_url; ?>" alt="Background Top" class="img-fluid">
  </div>

  <div class="container content-container">
    <!-- Titre principal -->
    <?php if (!empty($titre_testimonial)) : ?>
      <div class="row">
        <div class="col-12 text-center">
          <h2 class="testimonial-main-title"><?php echo wp_kses_post($titre_testimonial); ?></h2>
        </div>
      </div>
    <?php endif; ?>

    <!-- Carousel Desktop -->
    <?php if (!empty($repetetor)) : ?>
      <div id="testimonialCarouselDesktop">
        <?php foreach ($repetetor as $index => $testimonial) :
          // Récupération des champs du répéteur
          $bg_video   = $testimonial['background_video_testimonial'];
          $video_url  = $testimonial['url_video_testimonial'];
          $nom        = $testimonial['nom_de_letudiant'];
          $status     = $testimonial['status_etudiant'];
          $texte      = $testimonial['testimonial_paragraphe'];

          // URL de l'image "vidéo"
          $bg_video_url = get_image_url_acf($bg_video);

          /*
           * Configuration inversée :
           * - Si $is_rtl est true (site en RTL) → on applique la configuration LTR :
           *      * Pas de flex-row-reverse (ordre normal) → image reste à gauche, texte à droite.
           *      * Texte aligné à gauche (text-start).
           *      * Boutons : Prev (←) puis Next (→).
           *
           * - Si $is_rtl est false (site en LTR) → on applique la configuration RTL :
           *      * flex-row-reverse → image se retrouve à droite, texte à gauche.
           *      * Texte aligné à droite (text-end).
           *      * Boutons : Next (→) puis Prev (←).
           */
          $rowDirection   = $is_rtl ? '' : 'flex-row-reverse';
          $textAlignClass = $is_rtl ? 'text-start' : 'text-end';
        ?>
          <div class="testimonial-slide" style="display: <?php echo ($index === 0) ? 'block' : 'none'; ?>;">
            <div class="row align-items-center g-5 mt-3 <?php echo $rowDirection; ?>">
              <!-- Colonne Image -->
              <div class="col-md-5 text-center position-relative">
                <img src="<?php echo $bg_video_url; ?>"
                     alt="Photo étudiant"
                     class="testimonial-img img-fluid shadow">
                <?php if (!empty($video_url)) : ?>
                  <a href="<?php echo esc_url($video_url); ?>"
                     class="play-btn d-flex align-items-center justify-content-center"
                     target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-play-circle-fill"></i>
                  </a>
                <?php else : ?>
                  <span class="play-btn disabled d-flex align-items-center justify-content-center">
                    <i class="bi bi-play-circle-fill"></i>
                  </span>
                <?php endif; ?>
              </div>

              <!-- Colonne Texte -->
              <div class="col-md-7 <?php echo $textAlignClass; ?>">
                <?php if (!empty($nom)) : ?>
                  <h2 class="testimonial-name mb-2"><?php echo esc_html($nom); ?></h2>
                <?php endif; ?>
                <?php if (!empty($status)) : ?>
                  <h5 class="testimonial-role mb-4"><?php echo esc_html($status); ?></h5>
                <?php endif; ?>
                <?php if (!empty($texte)) : ?>
                  <p class="testimonial-text"><?php echo wp_kses_post($texte); ?></p>
                <?php endif; ?>

                <!-- Boutons -->
                <div class="d-flex justify-content-end mt-4">
                  <?php if ($is_rtl) : ?>
                    <!-- En RTL (appliqué configuration LTR) : Boutons Prev puis Next -->
                    <button class="btn btn-circle me-2" onclick="prevSlideDesktop()">
                      <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="btn btn-circle" onclick="nextSlideDesktop()">
                      <i class="bi bi-chevron-right"></i>
                    </button>
                  <?php else : ?>
                    <!-- En LTR (appliqué configuration RTL) : Boutons Next puis Prev -->
                    <button class="btn btn-circle" onclick="nextSlideDesktop()">
                      <i class="bi bi-chevron-right"></i>
                    </button>
                    <button class="btn btn-circle ms-2" onclick="prevSlideDesktop()">
                      <i class="bi bi-chevron-left"></i>
                    </button>
                  <?php endif; ?>
                </div>
              </div>
            </div> <!-- .row -->
          </div> <!-- .testimonial-slide -->
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div> <!-- .container -->
</section>

<!-- ==========================
     SECTION Mobile
========================== -->
<section class="testimonial-section mobile-testimonial py-5 d-block d-md-none"
         <?php echo $is_rtl ? 'dir="rtl"' : 'dir="ltr"'; ?>>
  <div class="container content-container">
    <?php if (!empty($repetetor)) : ?>
      <div id="testimonialCarouselMobile">
        <?php foreach ($repetetor as $index => $testimonial) :
          $bg_video   = $testimonial['background_video_testimonial'];
          $video_url  = $testimonial['url_video_testimonial'];
          $nom        = $testimonial['nom_de_letudiant'];
          $status     = $testimonial['status_etudiant'];
          $texte      = $testimonial['testimonial_paragraphe'];

          $bg_video_url = get_image_url_acf($bg_video);
        ?>
          <div class="testimonial-slide" style="display: <?php echo ($index === 0) ? 'block' : 'none'; ?>;">
            <!-- Nom + Rôle (centré sur mobile) -->
            <div class="row">
              <div class="col-12 text-center">
                <?php if (!empty($nom)) : ?>
                  <h2 class="testimonial-name mb-2"><?php echo esc_html($nom); ?></h2>
                <?php endif; ?>
                <?php if (!empty($status)) : ?>
                  <h5 class="testimonial-role mb-4"><?php echo esc_html($status); ?></h5>
                <?php endif; ?>
              </div>
            </div>
            <!-- Image + bouton Play -->
            <div class="row my-3">
              <div class="col-12 text-center position-relative">
                <img src="<?php echo $bg_video_url; ?>"
                     alt="Photo étudiant"
                     class="testimonial-img img-fluid shadow"
                     style="max-width: 250px; margin: 0 auto;">
                <?php if (!empty($video_url)) : ?>
                  <a href="<?php echo esc_url($video_url); ?>"
                     class="play-btn d-flex align-items-center justify-content-center"
                     target="_blank" rel="noopener noreferrer">
                    <i class="bi bi-play-circle-fill"></i>
                  </a>
                <?php else : ?>
                  <span class="play-btn disabled d-flex align-items-center justify-content-center">
                    <i class="bi bi-play-circle-fill"></i>
                  </span>
                <?php endif; ?>
              </div>
            </div>
            <!-- Paragraphe -->
            <?php if (!empty($texte)) : ?>
              <div class="row">
                <div class="col-12 text-center">
                  <p class="testimonial-text"><?php echo wp_kses_post($texte); ?></p>
                </div>
              </div>
            <?php endif; ?>
          </div> <!-- .testimonial-slide -->
        <?php endforeach; ?>
      </div>

      <!-- Boutons Mobile -->
      <div class="row mt-4 justify-content-center">
        <div class="col-auto">
          <?php if ($is_rtl) : ?>
            <!-- En RTL (configuration LTR) : Boutons Prev puis Next -->
            <button class="btn btn-circle me-2" onclick="prevSlideMobile()">
              <i class="bi bi-chevron-left"></i>
            </button>
            <button class="btn btn-circle" onclick="nextSlideMobile()">
              <i class="bi bi-chevron-right"></i>
            </button>
          <?php else : ?>
            <!-- En LTR (configuration RTL) : Boutons Next puis Prev -->
            <button class="btn btn-circle" onclick="nextSlideMobile()">
              <i class="bi bi-chevron-right"></i>
            </button>
            <button class="btn btn-circle ms-2" onclick="prevSlideMobile()">
              <i class="bi bi-chevron-left"></i>
            </button>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- ==========================
     JS Slider (Desktop + Mobile)
========================== -->
<script>
// Desktop slider
let currentIndexDesktop = 0;
const slidesDesktop = document.querySelectorAll('#testimonialCarouselDesktop .testimonial-slide');
function showSlideDesktop(index) {
  slidesDesktop.forEach((slide, i) => {
    slide.style.display = (i === index) ? 'block' : 'none';
  });
}
function nextSlideDesktop() {
  if (!slidesDesktop.length) return;
  currentIndexDesktop = (currentIndexDesktop + 1) % slidesDesktop.length;
  showSlideDesktop(currentIndexDesktop);
}
function prevSlideDesktop() {
  if (!slidesDesktop.length) return;
  currentIndexDesktop = (currentIndexDesktop - 1 + slidesDesktop.length) % slidesDesktop.length;
  showSlideDesktop(currentIndexDesktop);
}

// Mobile slider
let currentIndexMobile = 0;
const slidesMobile = document.querySelectorAll('#testimonialCarouselMobile .testimonial-slide');
function showSlideMobile(index) {
  slidesMobile.forEach((slide, i) => {
    slide.style.display = (i === index) ? 'block' : 'none';
  });
}
function nextSlideMobile() {
  if (!slidesMobile.length) return;
  currentIndexMobile = (currentIndexMobile + 1) % slidesMobile.length;
  showSlideMobile(currentIndexMobile);
}
function prevSlideMobile() {
  if (!slidesMobile.length) return;
  currentIndexMobile = (currentIndexMobile - 1 + slidesMobile.length) % slidesMobile.length;
  showSlideMobile(currentIndexMobile);
}
</script>
