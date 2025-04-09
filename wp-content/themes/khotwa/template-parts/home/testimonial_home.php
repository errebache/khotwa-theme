<?php
// Récupération des champs ACF
$image_top         = get_field('image_top_section_testimonial');
$testimonial_title = get_field('titre_testimonial') ?: '<h2>رحلتك تبدأ هنا ... ولكن هل لديك خطة واضحة ؟</h2>';
$testimonials      = get_field('testimonial_repetetor');
?>

<?php if ($testimonials) : ?>
  <!-- SECTION Témoignage - Version Desktop en RTL -->
  <section class="testimonial-section py-5 d-none d-md-block" dir="rtl">
    <!-- Image décorative en haut -->
    <?php if ($image_top) : ?>
      <div class="testimonial-top-bg">
        <img src="<?php echo esc_url($image_top['url']); ?>" alt="Background Top" class="img-fluid">
      </div>
    <?php endif; ?>

    <!-- Icône décorative en haut à droite -->
    <div class="testimonial-top-right">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Top Right" class="testimonial-shape">
    </div>

    <div class="container">
      <!-- Titre de la section -->
      <div class="row">
        <div class="col-12 text-center">
          <?php echo $testimonial_title; ?>
        </div>
      </div>

      <!-- Conteneur du slider -->
      <div id="testimonial-slider" class="position-relative">
        <?php foreach ($testimonials as $index => $testimonial) :
          // Récupération des champs avec valeur par défaut si non renseigné
          $bg_video       = !empty($testimonial['background_video_testimonial']) ? $testimonial['background_video_testimonial'] : null;
          $url_video      = !empty($testimonial['url_video_testimonial']) ? $testimonial['url_video_testimonial'] : '#';
          $student_name   = !empty($testimonial['nom_de_letudiant']) ? $testimonial['nom_de_letudiant'] : "Nom de l'étudiant inconnu";
          $student_status = !empty($testimonial['status_etudiant'])   ? $testimonial['status_etudiant']   : "Statut non renseigné";
          $text_content   = !empty($testimonial['testimonial_paragraphe']) ? $testimonial['testimonial_paragraphe'] : "Aucun témoignage disponible pour le moment.";
          // La couleur récupérée via ACF servira pour le hover (si renseignée)
          $hover_color    = !empty($testimonial['couleur_next_previous_buttons']) ? $testimonial['couleur_next_previous_buttons'] : '#ccc';
        ?>
          <div class="testimonial-slide" 
               data-hover-color="<?php echo esc_attr($hover_color); ?>" 
               style="<?php echo ($index === 0) ? 'display:block;' : 'display:none;'; ?>">
            
            <div class="row align-items-center g-5 mt-3">
              <!-- Colonne vidéo -->
              <div class="col-md-5 text-center position-relative">
                <?php if ($bg_video) : ?>
                  <img src="<?php echo esc_url($bg_video['url']); ?>" alt="Photo de l'étudiant" class="testimonial-img img-fluid shadow">
                <?php else: ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default_testimonial.jpg" alt="Photo par défaut" class="testimonial-img img-fluid shadow">
                <?php endif; ?>
                
                <?php if ($url_video !== '#') : ?>
                  <a href="<?php echo esc_url($url_video); ?>" class="play-btn d-flex align-items-center justify-content-center">
                    <i class="bi bi-play-circle-fill"></i>
                  </a>
                <?php endif; ?>
              </div>
              
              <!-- Colonne texte -->
              <div class="col-md-7 text-start">
                <h2 class="testimonial-name mb-2"><?php echo esc_html($student_name); ?></h2>
                <h5 class="testimonial-role mb-4"><?php echo esc_html($student_status); ?></h5>
                <p class="testimonial-text"><?php echo $text_content; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Navigation du slider avec Bootstrap -->
      <div class="row mt-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
          <!-- Bouton Next en RTL (placé à gauche, icône de flèche gauche) -->
          <button id="testimonial-next" class="btn btn-circle"
                  style="border-color: #ccc; color: #ccc; z-index:10;">
            <i class="bi bi-chevron-left"></i>
          </button>
          <!-- Bouton Prev en RTL (placé à droite, icône de flèche droite) -->
          <button id="testimonial-prev" class="btn btn-circle"
                  style="border-color: #ccc; color: #ccc; z-index:10;">
            <i class="bi bi-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Icône décorative en bas à gauche -->
    <div class="testimonial-bottom-left">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Bottom Left" class="testimonial-shape">
    </div>
  </section>

  <!-- Script JavaScript pour le slider, navigation manuelle et auto next toutes les 5 secondes -->
  <script>
    document.addEventListener('DOMContentLoaded', function(){
      var slides       = document.querySelectorAll('#testimonial-slider .testimonial-slide');
      var currentSlide = 0;
      var initialColor = '#ccc';
      var nextBtn      = document.getElementById('testimonial-next');
      var prevBtn      = document.getElementById('testimonial-prev');

      function showSlide(index) {
        slides.forEach(function(slide, idx){
          slide.style.display = (idx === index) ? 'block' : 'none';
        });
        var activeSlide = slides[index];
        var hoverColor  = activeSlide.getAttribute('data-hover-color') || initialColor;
        nextBtn.setAttribute('data-hover-color', hoverColor);
        prevBtn.setAttribute('data-hover-color', hoverColor);
      }

      nextBtn.addEventListener('click', function(){
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
      });

      prevBtn.addEventListener('click', function(){
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
      });

      [nextBtn, prevBtn].forEach(function(btn){
        btn.addEventListener('mouseover', function(){
          var hoverColor = this.getAttribute('data-hover-color') || initialColor;
          this.style.borderColor = hoverColor;
          this.style.color = hoverColor;
        });
        btn.addEventListener('mouseout', function(){
          this.style.borderColor = initialColor;
          this.style.color = initialColor;
        });
      });

      // Passage automatique au slide suivant toutes les 5 secondes
      setInterval(function(){
        nextBtn.click();
      }, 5000);

      // Affichage initial
      showSlide(currentSlide);
    });
  </script>
<?php endif; ?>
